<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Watertax extends CI_Controller {

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

        // FinancialYear
        public function financialYear() {
            $data['financialYear'] = $this->Db_model->selectAll('fin_year');
            $this->load->view('admin/housetax/financial-year', $data);
        }

        public function addFinancialYear() {
            $data = $_POST;

            $query = $this->Db_model->insertData('fin_year',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Admin/financialYear');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('Admin/financialYear');
            }
        }

        public function editFinancialYear($table="", $id="") {
            $condition = array('id' => $id);
            $query['update_year'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/housetax/financial-year', $query);
        }

        public function updateFinancialYear($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('fin_year', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Admin/financialYear');
            } else {
                return redirect('Admin/financialYear');
            }
        }

        // Ward
        public function waterWard() {
            $data['ward_name'] = $this->Db_model->selectAll('watertax_ward');
            $this->load->view('admin/watertax/ward', $data);
        }

        public function addWard() {
            $data = $_POST;

            $query = $this->Db_model->insertData('watertax_ward',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Watertax/waterWard');
            } else {
                $this->session->set_flashdata('error', 'Failed !');
                return redirect('Watertax/waterWard');
            }
        }

        public function editWard($table="", $id="") {
            $condition = array('id' => $id);
            $query['update_ward'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/watertax/ward', $query);
        }

        public function updateWard($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('watertax_ward', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Watertax/waterWard');
            } else {
                return redirect('Watertax/waterWard');
            }
        }

        // Assessee Details
        public function assesseeDetailWater() {
            $this->load->view('admin/watertax/assessee-detail');
        }

        public function addAssessee() {
            $data = $_POST;
            // print_r($_POST); exit();
            $query = $this->Db_model->insertData('watertax_registrations', $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Watertax/assesseeDetailWater');
            } else {
                return redirect('Watertax/assesseeDetailWater');
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
            $data['assesseeLists'] = $this->db->select("watertax_registrations.*, watertax_ward.ward_name")->from("watertax_registrations")
                                    ->join('watertax_ward', 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                    ->where('watertax_registrations.ward_no', $ward_name)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/assessee-list-ward-wise', $data);
        }

        public function editAssesseeDetail($table, $id) {
            $condition = array('id' => $id);
            $query['row'] = $this->db->get_where("watertax_registrations",["id"=>$id])->row();
            $query['update_detail'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/watertax/assessee-list-ward-wise', $query);
        }

        public function updateAssesseeDetail($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('watertax_registrations', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Watertax/assesseeListWardWise');
            } else {
                return redirect('Watertax/assesseeListWardWise');
            }
        }

        // Tax Calculation
        public function calculateWaterTax() {
            $this->load->view('admin/watertax/house-tax-calc');
        }
    
        // Tax Calculation-list
        public function houseTaxCalcList() {
            $fin_year   = $this->input->post('fin_year');
            $ward_no    = $this->input->post('ward_no');
            $from_crn   = $this->input->post('from_crn');
            $to_crn     = $this->input->post('to_crn');
            // print_r($to_crn); exit();
            $data['assesseeLists'] = $this->db->select("watertax_registrations.*, watertax_ward.ward_name")
                                    ->from("watertax_registrations")
                                    ->join('watertax_ward', 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                    ->where([
                                        'watertax_registrations.fin_year'=> $fin_year,
                                        'watertax_registrations.ward_no'=> $ward_no,
                                        'watertax_registrations.crn >=' => $from_crn,
                                        'watertax_registrations.crn <=' => $to_crn
                                    ])->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/house-tax-calc-list', $data);
        }
	
        public function saveDemandTax() {
            $this->db->trans_start();
    
            $fin_year   			=	$this->input->post('fin_year');
            $ward_no				=	$this->input->post('ward_no');
            $crn					=	$this->input->post('crn');
            $name					=	$this->input->post('name');
            $arv 			        =	$this->input->post('arv');
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
                $data1[$i]['arv']                   = $arv[$i];
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
                $query                              = $this->db->update('watertax_registrations', $update_year);
            }
            // print_r($data1); exit();
            $query = $this->db->insert_batch('watertax_demand', $data1); 
            $this->db->trans_complete();
            return redirect('Watertax/calculateWaterTax');
        }

        // Tax Demand
        public function houseTaxDemand() {
            $this->load->view('admin/watertax/house-tax-demand');
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
            $data['demandLists'] = $this->db->select("watertax_demand.*, watertax_registrations.name, watertax_registrations.demand_no")
                                ->from("watertax_demand")
                                ->join("watertax_registrations", 'watertax_registrations.crn = watertax_demand.crn')
                                ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                ->join("fin_year", 'watertax_registrations.fin_year = fin_year.fin_year')
                                ->where('watertax_demand.ward_no', $ward_name)
                                ->where('watertax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/house-tax-demand-list', $data);
        }
	
        // Print Bill
        public function printBill($billno) {
            $data['demand'] = $this->db->select("watertax_demand.*, watertax_registrations.name, watertax_registrations.father_name, watertax_registrations.address, watertax_registrations.demand_no")
                            ->from('watertax_demand')
                            ->join('watertax_registrations', 'watertax_registrations.crn = watertax_demand.crn')
                            ->join("fin_year", 'watertax_registrations.fin_year = fin_year.fin_year')
                            ->where('watertax_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/watertax/house-tax-bill', $data);
        }

    	public function printAllBill() {
    	    $start  = $this->input->get('start');
    	    $end    = $this->input->get('end');
            
    	    $data['demand'] = $this->db->select("watertax_demand.*, watertax_registrations.name, watertax_registrations.father_name, watertax_registrations.address, watertax_registrations.demand_number")
                            ->from('watertax_demand')
                            ->join('watertax_registrations', 'watertax_registrations.crn = watertax_demand.crn')
                            ->where("watertax_demand.billno >=", $start)
    		                ->where("watertax_demand.billno <=", $end)->get()->result();
        // 	print_r($data); exit();
        	$this->load->view('admin/watertax/all-bill', $data);
    	}

        // Pay Bill List
        public function payWaterTax()
        {
            $this->load->view('admin/watertax/pay-house-tax');
        }
    
        public function payHouseTaxList()
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
            $data['demandLists'] = $this->db->select("watertax_demand.*, watertax_registrations.name, watertax_registrations.father_name, watertax_registrations.demand_no")
                                ->from("watertax_demand")
                                ->join("watertax_registrations", 'watertax_registrations.crn = watertax_demand.crn')
                                ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                ->join("fin_year", 'watertax_registrations.fin_year = fin_year.fin_year')
                                ->where('watertax_demand.ward_no', $ward_name)
                                ->where('watertax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/pay-house-tax-list', $data);
        }

        // Pay Tax
        public function payTax($billno) {
            $data['row']    = $this->db->select("watertax_demand.*, watertax_registrations.name, watertax_registrations.father_name, watertax_registrations.address, watertax_registrations.demand_no")
                            ->from('watertax_demand')
                            ->join('watertax_registrations', 'watertax_registrations.crn = watertax_demand.crn')
                            ->where('watertax_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/watertax/pay-house-tax-list', $data);
        }

        public function savePayment($billno)
        {
            $dataa['paid_amount']       = $this->input->post('paid_amount');
            $dataa['curr_arrear']       = $this->input->post('opening_arrear');
            $dataa['curr_advance']      = $this->input->post('opening_advance');
            $dataa['status']            = 1;
            // print_r($dataa); exit();
            $this->db->where('billno', $billno);
            $query                      = $this->db->update('watertax_demand', $dataa);
            
            $crn                        = $this->input->post('crn');
            $dataaa['opening_arrear']   = $this->input->post('opening_arrear');
            $dataaa['opening_advance']  = $this->input->post('opening_advance');
            // print_r($dataaa); exit();
            $this->db->where('crn', $crn);
            $query                      = $this->db->update('watertax_registrations', $dataaa);
            
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
            $query                      = $this->db->insert('watertax_payment', $data);
            
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                // return redirect('Admin/printReceipt/'.$this->input->post('payment_id'));
                return redirect('Watertax/payHouseTaxList');
            } else {
                return redirect('Watertax/payTax');
            }
        }

        public function getTaxReceipt() {
            $this->load->view('admin/watertax/get-tax-receipt');
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
            $data['paidList']=$this->db->select("watertax_payment.*, watertax_demand.curr_arrear, watertax_registrations.name, watertax_registrations.father_name, watertax_registrations.demand_no, watertax_ward.ward_name")
                                ->from('watertax_payment')
                                ->join('watertax_demand', 'watertax_demand.billno = watertax_payment.billno')
                                ->join('watertax_registrations', 'watertax_registrations.crn = watertax_demand.crn')
                                ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                ->where("watertax_payment.ward_no", $ward_name)
                                ->where("watertax_payment.fin_year", $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/get-tax-receipt-list', $data);
        }
    
        public function printReceipt($billno) {
            $data['demand'] = $this->db->select("watertax_payment.*,watertax_demand.from_date, watertax_demand.to_date,watertax_registrations.name, watertax_registrations.father_name, watertax_registrations.address, watertax_registrations.demand_no, watertax_ward.ward_name")
                            ->from('watertax_payment')
                            ->join('watertax_demand', 'watertax_demand.billno = watertax_payment.billno')
                            ->join('watertax_registrations', 'watertax_registrations.crn = watertax_demand.crn')
                            ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                            ->where('watertax_payment.billno', $billno)->get()->row();
            // print_r($data); exit();                    
            $this->load->view('admin/watertax/house-tax-receipt', $data);
        }

        public function WaterTaxReport() {
            $this->load->view('admin/watertax/house-tax-report');
        }

        public function getDefaulterList() {
            $fin_year   = $this->input->post('fin_year');
            $range      = $this->input->post('range');
            $ward_name  = $this->input->post('ward_no');
            $data['defaulterList'] = $this->db->select("watertax_registrations.crn,watertax_registrations.name,watertax_registrations.father_name,watertax_registrations.demand_no,watertax_demand.arv,watertax_demand.opening_arrear,watertax_demand.total_tax,watertax_demand.paid_amount,watertax_demand.curr_arrear,watertax_ward.ward_name")
                                    ->from("watertax_registrations")
                                    ->join("watertax_demand", 'watertax_demand.crn = watertax_registrations.crn')
                                    ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                    ->where('watertax_demand.curr_arrear >=', $range)
                                    ->where('watertax_demand.ward_no', $ward_name)
                                    ->where('watertax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/get-defaulter-list', $data);
        }

        public function getListYearWise() {
            $fin_year   = $this->input->post('fin_year');
            $data['yearWiseList'] = $this->db->select("watertax_registrations.crn,watertax_registrations.name,watertax_registrations.father_name,watertax_registrations.demand_no,watertax_demand.arv,watertax_demand.opening_arrear,watertax_demand.total_tax,watertax_demand.paid_amount,watertax_demand.curr_arrear,watertax_ward.ward_name")
                                    ->from("watertax_registrations")
                                    ->join("watertax_demand", 'watertax_demand.crn = watertax_registrations.crn')
                                    ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                    ->where('watertax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/get-list-year-wise', $data);
        }
    
        public function getListWardWise(){
            $ward_name   = $this->input->post('ward_no');
            $data['wardWiseList'] = $this->db->select("watertax_registrations.crn,watertax_registrations.name,watertax_registrations.father_name,watertax_registrations.demand_no,watertax_demand.arv,watertax_demand.opening_arrear,watertax_demand.total_tax,watertax_demand.paid_amount,watertax_demand.curr_arrear,watertax_ward.ward_name")
                                    ->from("watertax_registrations")
                                    ->join("watertax_demand", 'watertax_demand.crn = watertax_registrations.crn')
                                    ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                    ->where('watertax_demand.ward_no', $ward_name)->get()->result_array();
            $this->load->view('admin/watertax/get-list-ward-wise', $data);
        }
    
        public function getListDateWise(){
            $from_date      = $this->input->post('from_date');
            // $f_date         = date("d-m-Y", strtotime($from_date));
            $to_date        = $this->input->post('to_date');
            // $t_date         = date("d-m-Y", strtotime($to_date));
            // print_r($from_date); exit();
            $data['dateWiseList'] = $this->db->select("watertax_registrations.crn,watertax_registrations.name,watertax_registrations.father_name,watertax_registrations.demand_no,watertax_demand.arv,watertax_demand.opening_arrear,watertax_demand.total_tax,watertax_demand.paid_amount,watertax_demand.curr_arrear,watertax_ward.ward_name")
                                    ->from("watertax_registrations")
                                    ->join("watertax_demand", 'watertax_demand.crn = watertax_registrations.crn')
                                    ->join("watertax_ward", 'watertax_registrations.ward_no = watertax_ward.ward_no')
                                    ->where('watertax_demand.from_date', $from_date)
                                    ->where('watertax_demand.to_date', $to_date)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/watertax/get-list-date-wise', $data);
        }

    }

?>