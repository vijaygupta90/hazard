<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Garbage extends CI_Controller {

        public function __construct() {

            parent::__construct();
            $admin = $this->session->userdata('admin');
            if (empty($admin)) {
                $this->session->set_flashdata('error', 'Session expired! Please log in again.');
                redirect(base_url().'Login');
            }
        }

        public function index() {
            $this->load->view('admin/index');
        }

        // Ward
        public function garbageWard() {
            $data['ward_name'] = $this->Db_model->selectAll('garbage_ward');
            $this->load->view('admin/garbage/ward', $data);
        }

        public function addWard() {
            $data = $_POST;

            $query = $this->Db_model->insertData('garbage_ward',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Garbage/garbageWard');
            } else {
                $this->session->set_flashdata('error', 'Failed !');
                return redirect('Garbage/garbageWard');
            }
        }

        public function editWard($table="", $id="") {
            $condition = array('id' => $id);
            $query['update_ward'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/garbage/ward', $query);
        }

        public function updateWard($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('garbage_ward', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Garbage/garbageWard');
            } else {
                return redirect('Garbage/garbageWard');
            }
        }

        // Assessee Details
        public function assesseeDetailGarbage() {
            $this->load->view('admin/garbage/assessee-detail');
        }

        public function addAssessee() {
            $data = $_POST;
            // print_r($_POST); exit();
            $query = $this->Db_model->insertData('garbage_registrations', $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Garbage/assesseeDetailGarbage');
            } else {
                return redirect('Garbage/assesseeDetailGarbage');
            }
        }
    
        // Assessee-list
        public function assesseeListWardWise() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_name = $this->input->post('ward_no');
                $this->session->set_userdata('ward_name', $ward_name);
            } else {
                $ward_name = $this->session->userdata('ward_name');
            }
            // print_r($ward_name); exit();
            $data['assesseeLists'] = $this->db->select("garbage_registrations.*, garbage_ward.ward_name")->from("garbage_registrations")
                                    ->join('garbage_ward', 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                    ->where('garbage_registrations.ward_no', $ward_name)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/assessee-list-ward-wise', $data);
        }

        public function editAssesseeDetail($table, $id) {
            $condition = array('id' => $id);
            $query['row'] = $this->db->get_where("garbage_registrations",["id"=>$id])->row();
            $query['update_detail'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/garbage/assessee-list-ward-wise', $query);
        }

        public function updateAssesseeDetail($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('garbage_registrations', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Garbage/assesseeListWardWise');
            } else {
                return redirect('Garbage/assesseeListWardWise');
            }
        }

        // Tax Calculation
        public function calculateGarbage() {
            $this->load->view('admin/garbage/house-tax-calc');
        }
    
        // Tax Calculation-list
        public function houseTaxCalcList() {
            $fin_year   = $this->input->post('fin_year');
            $ward_no    = $this->input->post('ward_no');
            $from_crn   = $this->input->post('from_crn');
            $to_crn     = $this->input->post('to_crn');
            // print_r($to_crn); exit();
            $data['assesseeLists'] = $this->db->select("garbage_registrations.*, garbage_ward.ward_name")
                                    ->from("garbage_registrations")
                                    ->join('garbage_ward', 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                    ->where([
                                        'garbage_registrations.fin_year'=> $fin_year,
                                        'garbage_registrations.ward_no'=> $ward_no,
                                        'garbage_registrations.crn >=' => $from_crn,
                                        'garbage_registrations.crn <=' => $to_crn
                                    ])->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/house-tax-calc-list', $data);
        }
	
        public function saveDemandTax() {
            $this->db->trans_start();
    
            $fin_year   			=	$this->input->post('fin_year');
            $ward_no				=	$this->input->post('ward_no');
            $crn					=	$this->input->post('crn');
            $name					=	$this->input->post('name');
            $arv 			        =	$this->input->post('rent');
            $opening_arrear 	    =	$this->input->post('opening_arrear');
            $opening_advance 	    =	$this->input->post('opening_advance');
            $billno 				=   $this->input->post('billno');
            $from_date 				=   $this->input->post('from_date');
            $to_date 				=   $this->input->post('to_date');
            
            $len = count($crn);
            // print_r($len); exit();
            
            $data1 = [];
            for($i = 0; $i<$len; $i++){
                $data1[$i]['fin_year']              = $fin_year[$i];
                $data1[$i]['ward_no']               = $ward_no[$i];
                $data1[$i]['crn']                   = $crn[$i];
                $data1[$i]['rent']                  = $arv[$i];
                $data1[$i]['opening_arrear']        = $opening_arrear[$i];
                $data1[$i]['opening_advance']       = $opening_advance[$i];
                $data1[$i]['total_tax']             = $arv[$i] + $opening_arrear[$i] - $opening_advance[$i];
                $data1[$i]['curr_arrear']           = $arv[$i] + $opening_arrear[$i] - $opening_advance[$i];
                $data1[$i]['billno']                = $billno[$i];
                $data1[$i]['from_date']             = $from_date[$i];
                $data1[$i]['to_date']               = $to_date[$i];

                $get_id                             = $this->db->select('*')->from('fin_year')->where('fin_year',$fin_year[$i])->get()->row();
                $get_year=$this->db->get_where("fin_year",['id'=>$get_id->id+1])->row();
                // print_r($get_year); exit;
                $update_year['opening_arrear']      = $data1[$i]['total_tax'];
                $update_year['fin_year']            = $get_year->fin_year;
                $this->db->where('crn', $this->input->post('crn')[$i]);
                $query                              = $this->db->update('garbage_registrations', $update_year);
            }
            // print_r($data1); exit();
            $query = $this->db->insert_batch('garbage_demand', $data1); 
            $this->db->trans_complete();
            return redirect('Garbage/calculateGarbage');
        }

        // Tax Demand
        public function houseTaxDemand() {
            $this->load->view('admin/garbage/house-tax-demand');
        }
    
        // Tax Demand-list
        public function houseTaxDemandList() {
            $this->load->library('session');
            if($this->input->post('ward_no') && $this->input->post('fin_year')){
                $this->session->unset_userdata('ward_no');
                $this->session->unset_userdata('fin_year');
                $ward_name      = $this->input->post('ward_no');
                $fin_year       = $this->input->post('fin_year');
                $this->session->set_userdata('ward_name', $ward_name);
                $this->session->set_userdata('fin_year', $fin_year);
            } else {
                $ward_name      = $this->session->userdata('ward_name');
                $fin_year       = $this->session->userdata('fin_year');
            }
            // print_r($ward_name); exit();
            $data['demandLists'] = $this->db->select("garbage_demand.*, garbage_registrations.name")
                                ->from("garbage_demand")
                                ->join("garbage_registrations", 'garbage_registrations.crn = garbage_demand.crn')
                                ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                ->join("fin_year", 'garbage_registrations.fin_year = fin_year.fin_year')
                                ->where('garbage_demand.ward_no', $ward_name)
                                ->where('garbage_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/house-tax-demand-list', $data);
        }
	
        // Print Bill
        public function printBill($billno) {
            $data['demand'] = $this->db->select("garbage_demand.*, garbage_registrations.name, garbage_registrations.father_name, garbage_registrations.address")
                            ->from('garbage_demand')
                            ->join('garbage_registrations', 'garbage_registrations.crn = garbage_demand.crn')
                            ->join("fin_year", 'garbage_registrations.fin_year = fin_year.fin_year')
                            ->where('garbage_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/garbage/house-tax-bill', $data);
        }

    	public function printAllBill() {
    	    $start  = $this->input->get('start');
    	    $end    = $this->input->get('end');
            
    	    $data['demand'] = $this->db->select("garbage_demand.*, garbage_registrations.name, garbage_registrations.father_name, garbage_registrations.address, garbage_registrations.demand_number")
                            ->from('garbage_demand')
                            ->join('garbage_registrations', 'garbage_registrations.crn = garbage_demand.crn')
                            ->where("garbage_demand.billno >=", $start)
    		                ->where("garbage_demand.billno <=", $end)->get()->result();
        // 	print_r($data); exit();
        	$this->load->view('admin/garbage/all-bill', $data);
    	}

        // Pay Bill List
        public function payGarbage()
        {
            $this->load->view('admin/garbage/pay-house-tax');
        }
    
        public function payGarbageList()
        {
            $this->load->library('session');
            if($this->input->post('ward_no') && $this->input->post('fin_year')){
                $this->session->unset_userdata('ward_no');
                $this->session->unset_userdata('fin_year');
                $ward_name   = $this->input->post('ward_no');
                $fin_year    = $this->input->post('fin_year');
                $this->session->set_userdata('ward_name', $ward_name);
                $this->session->set_userdata('fin_year', $fin_year);
            } else {
                $ward_name   = $this->session->userdata('ward_name');
                $fin_year    = $this->session->userdata('fin_year');
            }
            $data['demandLists'] = $this->db->select("garbage_demand.*, garbage_registrations.name, garbage_registrations.father_name")
                                ->from("garbage_demand")
                                ->join("garbage_registrations", 'garbage_registrations.crn = garbage_demand.crn')
                                ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                ->join("fin_year", 'garbage_registrations.fin_year = fin_year.fin_year')
                                ->where('garbage_demand.ward_no', $ward_name)
                                ->where('garbage_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/pay-house-tax-list', $data);
        }

        // Pay Tax
        public function payTax($billno) {
            $data['row']    = $this->db->select("garbage_demand.*, garbage_registrations.name, garbage_registrations.father_name, garbage_registrations.address")
                            ->from('garbage_demand')
                            ->join('garbage_registrations', 'garbage_registrations.crn = garbage_demand.crn')
                            ->where('garbage_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/garbage/pay-house-tax-list', $data);
        }

        public function savePayment($billno)
        {
            $dataa['paid_amount']       = $this->input->post('paid_amount');
            $dataa['curr_arrear']       = $this->input->post('opening_arrear');
            $dataa['curr_advance']      = $this->input->post('opening_advance');
            $dataa['status']            = 1;
            // print_r($dataa); exit();
            $this->db->where('billno', $billno);
            $query                      = $this->db->update('garbage_demand', $dataa);
            
            $crn                        = $this->input->post('crn');
            $dataaa['opening_arrear']   = $this->input->post('opening_arrear');
            $dataaa['opening_advance']  = $this->input->post('opening_advance');
            // print_r($dataaa); exit();
            $this->db->where('crn', $crn);
            $query                      = $this->db->update('garbage_registrations', $dataaa);
            
            $data['billno']             = $billno;
            $data['fin_year']           = $this->input->post('fin_year');
            $data['ward_no']            = $this->input->post('ward_no');
            $data['crn']                = $this->input->post('crn');
            $data['total_tax']          = $this->input->post('total_tax');
            $data['paid_amount']        = $this->input->post('paid_amount');
            $data['arrear']             = $this->input->post('opening_arrear');
            $data['advance']            = $this->input->post('opening_advance');
            $data['payment_date']       = $this->input->post('payment_date');
            // print_r($data); exit();
            $query                      = $this->db->insert('garbage_payment', $data);
            
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                // return redirect('Admin/printReceipt/'.$this->input->post('payment_id'));
                return redirect('Garbage/payGarbageList');
            } else {
                return redirect('Garbage/payTax');
            }
        }

        public function getTaxReceipt() {
            $this->load->view('admin/garbage/get-tax-receipt');
        }
    
        public function getTaxReceiptList() {
            $this->load->library('session');
            if($this->input->post('ward_no') && $this->input->post('fin_year')){
                $this->session->unset_userdata('ward_no');
                $this->session->unset_userdata('fin_year');
                $ward_name      = $this->input->post('ward_no');
                $fin_year    = $this->input->post('fin_year');
                $this->session->set_userdata('ward_name', $ward_name);
                $this->session->set_userdata('fin_year', $fin_year);
            } else {
                $ward_name      = $this->session->userdata('ward_name');
                $fin_year    = $this->session->userdata('fin_year');
            }
            $data['paidList']=$this->db->select("garbage_payment.*, garbage_demand.curr_arrear, garbage_registrations.name, garbage_registrations.father_name, garbage_ward.ward_name")
                                ->from('garbage_payment')
                                ->join('garbage_demand', 'garbage_demand.billno = garbage_payment.billno')
                                ->join('garbage_registrations', 'garbage_registrations.crn = garbage_demand.crn')
                                ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                ->where("garbage_payment.ward_no", $ward_name)
                                ->where("garbage_payment.fin_year", $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/get-tax-receipt-list', $data);
        }
    
        public function printReceipt($billno) {
            $data['demand'] = $this->db->select("garbage_payment.*,garbage_demand.from_date, garbage_demand.to_date,garbage_registrations.name, garbage_registrations.father_name, garbage_registrations.address, garbage_ward.ward_name")
                            ->from('garbage_payment')
                            ->join('garbage_demand', 'garbage_demand.billno = garbage_payment.billno')
                            ->join('garbage_registrations', 'garbage_registrations.crn = garbage_demand.crn')
                            ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                            ->where('garbage_payment.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/garbage/house-tax-receipt', $data);
        }

        public function GarbageReport() {
            $this->load->view('admin/garbage/house-tax-report');
        }

        public function getDefaulterList() {
            $fin_year   = $this->input->post('fin_year');
            $range      = $this->input->post('range');
            $ward_name  = $this->input->post('ward_no');
            $data['defaulterList'] = $this->db->select("garbage_registrations.crn,garbage_registrations.name,garbage_registrations.father_name,garbage_demand.rent,garbage_demand.opening_arrear,garbage_demand.total_tax,garbage_demand.paid_amount,garbage_demand.curr_arrear,garbage_ward.ward_name")
                                    ->from("garbage_registrations")
                                    ->join("garbage_demand", 'garbage_demand.crn = garbage_registrations.crn')
                                    ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                    ->where('garbage_demand.curr_arrear >=', $range)
                                    ->where('garbage_demand.ward_no', $ward_name)
                                    ->where('garbage_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/get-defaulter-list', $data);
        }

        public function getListYearWise() {
            $fin_year   = $this->input->post('fin_year');
            $data['yearWiseList'] = $this->db->select("garbage_registrations.crn,garbage_registrations.name,garbage_registrations.father_name,garbage_demand.rent,garbage_demand.opening_arrear,garbage_demand.total_tax,garbage_demand.paid_amount,garbage_demand.curr_arrear,garbage_ward.ward_name")
                                    ->from("garbage_registrations")
                                    ->join("garbage_demand", 'garbage_demand.crn = garbage_registrations.crn')
                                    ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                    ->where('garbage_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/get-list-year-wise', $data);
        }
    
        public function getListWardWise(){
            $ward_name   = $this->input->post('ward_no');
            $data['wardWiseList'] = $this->db->select("garbage_registrations.crn,garbage_registrations.name,garbage_registrations.father_name,garbage_demand.rent,garbage_demand.opening_arrear,garbage_demand.total_tax,garbage_demand.paid_amount,garbage_demand.curr_arrear,garbage_ward.ward_name")
                                    ->from("garbage_registrations")
                                    ->join("garbage_demand", 'garbage_demand.crn = garbage_registrations.crn')
                                    ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                    ->where('garbage_demand.ward_no', $ward_name)->get()->result_array();
            $this->load->view('admin/garbage/get-list-ward-wise', $data);
        }
    
        public function getListDateWise(){
            $from_date      = $this->input->post('from_date');
            // $f_date         = date("d-m-Y", strtotime($from_date));
            $to_date        = $this->input->post('to_date');
            // $t_date         = date("d-m-Y", strtotime($to_date));
            // print_r($from_date); exit();
            $data['dateWiseList'] = $this->db->select("garbage_registrations.crn,garbage_registrations.name,garbage_registrations.father_name,garbage_demand.rent,garbage_demand.opening_arrear,garbage_demand.total_tax,garbage_demand.paid_amount,garbage_demand.curr_arrear,garbage_ward.ward_name")
                                    ->from("garbage_registrations")
                                    ->join("garbage_demand", 'garbage_demand.crn = garbage_registrations.crn')
                                    ->join("garbage_ward", 'garbage_registrations.ward_no = garbage_ward.ward_no')
                                    ->where('garbage_demand.from_date', $from_date)
                                    ->where('garbage_demand.to_date', $to_date)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/garbage/get-list-date-wise', $data);
        }

    }

?>