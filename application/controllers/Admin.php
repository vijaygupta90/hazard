<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller {

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
        

        //admin_budget
       
    


        public function saveBudget() {
           
            $data = $_POST;
    
            $a = $_FILES['image']['name'];
            if ($a) {
                $config = array(
                    'upload_path' => "bhadohi_pdf/",
                    'allowed_types' => "jpg|pdf|jpeg",
                );
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
                $img = $this->upload->data();
                $data['image'] = $img['file_name'];
            }
    
            $query = $this->Db_model->insertData('admin_budget', $data);
    
            if ($query) {
                $this->session->set_flashdata('success');
                return redirect('Admin/Admin_budget');
            }
        }

        
        public function saveTender() {
            $data = $_POST;
    
            $a = $_FILES['image']['name'];
            if ($a) {
                $config = array(
                    'upload_path' => "./assets/uploads/complaint",
                    'allowed_types' => "jpg|pdf|jpeg",
                );
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
                $img = $this->upload->data();
                $data['image'] = $img['file_name'];
            }
    
            $query = $this->Db_model->insertData('tender', $data);
    
            if ($query) {
                $this->session->set_flashdata('success');
                return redirect('Admin/Admin_tender');
            }
        }

        //admin_budget
        public function Admin_budget() {            
            $this->load->view('admin/admin_budget');
        }
        

        //admin_tender
        public function Admin_tender() {            
            $this->load->view('admin/admin_tender');
        }
        
        // Grievance
        public function grievance() {
            $data['grievance'] = $this->Db_model->selectAll('grievance');
            // print_r($data); exit();
            $this->load->view('admin/grievance', $data);
        }

        public function editGrievance($table="", $id="") {
            // $query['page'] = 'dispose';
            $condition = array('id' => $id);
            $query['update_grievance'] = $this->Db_model->editData($table, $condition);
            // print_r($query); exit();
            $this->load->view('admin/dispose', $query);
        }

        public function updateGrievance($table="", $id="") {
            $data = $_POST;
            $a = $_FILES['dispose_image']['name'];
    		if ($a) {
    			$config = array(
        			'upload_path' => "./assets/uploads/disposed",
        			'allowed_types' => "jpg|png|jpeg|pdf",
        		);
    			$this->load->library('upload', $config);
    			$this->upload->do_upload('dispose_image');
    			$img = $this->upload->data();
    			$data['dispose_image'] = $img['file_name'];
    		}
    // 		print_r($data); exit();
            $query = $this->Db_model->updateData('grievance', $id, $data);

            if ($query) {
                $this->session->set_flashdata('success', 'Disposed successfully !');
                return redirect('Admin/grievance');
            } else {
                return redirect('Admin/grievance');
            }
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
        public function houseWard() {
            $data['ward_name'] = $this->Db_model->selectAll('house_ward');
            $this->load->view('admin/housetax/ward', $data);
        }

        public function addWard() {
            $data = $_POST;

            $query = $this->Db_model->insertData('house_ward',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Admin/houseWard');
            } else {
                $this->session->set_flashdata('error', 'Failed !');
                return redirect('Admin/houseWard');
            }
        }

        public function editWard($table="", $id="") {
            $condition = array('id' => $id);
            $query['update_ward'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/housetax/ward', $query);
        }

        public function updateWard($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('house_ward', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Admin/houseWard');
            } else {
                return redirect('Admin/houseWard');
            }
        }

        // Assessee Details
        public function assesseeDetail() {
            $this->load->view('admin/housetax/assessee-detail');
        }

        public function addAssessee() {
            $data = $_POST;
            $query  =   $this->db->get_where('registrations',['crn'=>$this->input->post('crn')])->row();
            $query1 =   $this->db->get_where('registrations',['house_number'=>$this->input->post('house_number')])->row();
            $query2 =   $this->db->get_where('registrations',['demand_no'=>$this->input->post('demand_no')])->row();

            if($query){
                $this->session->set_flashdata('msg', 'House Number already exist !');
                return redirect('Admin/assesseeRegistration');
            }
            
            if($query1){
                $this->session->set_flashdata('msg', 'Demand Number already exist !');
                return redirect('Admin/assesseeRegistration');
            }
            
            if($query2){
                $this->session->set_flashdata('msg', 'Account Number already exist !');
                return redirect('Admin/assesseeRegistration');
            }
            // print_r($_POST); exit();
            $query = $this->Db_model->insertData('registrations', $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Admin/assesseeDetail');
            } else {
                return redirect('Admin/assesseeDetail');
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
            $data['assesseeLists'] = $this->db->select("registrations.*, house_ward.ward_name")->from("registrations")
                                    ->join('house_ward', 'registrations.ward_no = house_ward.ward_no')
                                    ->where('registrations.ward_no', $ward_name)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/assessee-list-ward-wise', $data);
        }

        public function editAssesseeDetail($table, $id) {
            $condition = array('id' => $id);
            $query['row'] = $this->db->get_where("registrations",["id"=>$id])->row();
            $query['update_detail'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/housetax/assessee-list-ward-wise', $query);
        }

        public function updateAssesseeDetail($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('registrations', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Admin/assesseeListWardWise');
            } else {
                return redirect('Admin/assesseeListWardWise');
            }
        }

        // Tax Calculation
        public function calculateHouseTax() {
            $this->load->view('admin/housetax/house-tax-calc');
        }
    
        // Tax Calculation-list
        public function houseTaxCalcList() {
            $fin_year   = $this->input->post('fin_year');
            $ward_no    = $this->input->post('ward_no');
            $from_crn   = $this->input->post('from_crn');
            $to_crn     = $this->input->post('to_crn');
            // print_r($to_crn); exit();
            $data['assesseeLists'] = $this->db->select("registrations.*, house_ward.ward_name")
                                    ->from("registrations")
                                    ->join('house_ward', 'registrations.ward_no = house_ward.ward_no')
                                    ->where(['registrations.fin_year'=> $fin_year, 'registrations.ward_no'=> $ward_no, 'registrations.crn >=' => $from_crn, 'registrations.crn <=' => $to_crn])->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/house-tax-calc-list', $data);
        }
	
        public function saveDemandTax() {
            $this->db->trans_start();
    
            $fin_year   					=	$this->input->post('fin_year');
            $ward_no						=	$this->input->post('ward_no');
            $crn							=	$this->input->post('crn');
            $name							=	$this->input->post('name');
            $arv 			        		=	$this->input->post('arv');
            $opening_arrear 	    		=	$this->input->post('opening_arrear');
            $opening_advance 	    		=	$this->input->post('opening_advance');
            if($this->input->post('total_tax') <= 0) {
                $total_tax       	    = '0';
                $curr_arrear     		= '0';
                $curr_advance    		= abs($this->input->post('total_tax'));
            }else{
                $total_tax       	    = $this->input->post('total_tax');
                $curr_arrear     		= $this->input->post('total_tax');
                $curr_advance    		= '0';
            }
            $arv_water 			        	=	$this->input->post('arv_water');
            $opening_arrear_water 	    	=	$this->input->post('opening_arrear_water');
            $opening_advance_water 	    	=	$this->input->post('opening_advance_water');
            if($this->input->post('total_tax_water') <= 0) {
                $total_tax_water 		    = '0';
                $curr_arrear_water  		= '0';
                $curr_advance_water 		= abs($this->input->post('total_tax_water'));
            }else{
                $total_tax_water 		    = $this->input->post('total_tax_water');
                $curr_arrear_water  		= $this->input->post('total_tax_water');
                $curr_advance_water 		= '0';
            }
            $billno 						=   $this->input->post('billno');
            $from_date 						=   $this->input->post('from_date');
            $to_date 						=   $this->input->post('to_date');
            
            $len = count($crn);
            
            $data1 = [];
            for($i = 0; $i<$len; $i++){
                $data1[$i]['fin_year']              = $fin_year[$i];
                $data1[$i]['ward_no']               = $ward_no[$i];
                $data1[$i]['crn']                   = $crn[$i];
                $data1[$i]['name']                  = $name[$i];
                $data1[$i]['arv']                   = $arv[$i];
                $data1[$i]['opening_arrear']        = $opening_arrear[$i];
                $data1[$i]['opening_advance']       = $opening_advance[$i];
                $data1[$i]['total_tax']       	    = $total_tax[$i];
                $data1[$i]['curr_arrear']       	= $curr_arrear[$i];
                $data1[$i]['curr_advance']       	= $curr_advance[$i];
                $data1[$i]['arv_water']             = $arv_water[$i];
                $data1[$i]['opening_arrear_water']  = $opening_arrear_water[$i];
                $data1[$i]['opening_advance_water'] = $opening_advance_water[$i];
                $data1[$i]['total_tax_water']       = $total_tax_water[$i];
                $data1[$i]['curr_arrear_water']     = $curr_arrear_water[$i];
                $data1[$i]['curr_advance_water']    = $curr_advance_water[$i];
                $data1[$i]['billno']                = $billno[$i];
                $data1[$i]['from_date']             = $from_date[$i];
                $data1[$i]['to_date']               = $to_date[$i];

                $get_id                             = $this->db->select('*')->from('fin_year')->where('fin_year',$fin_year[$i])->get()->row();
                $get_year							= $this->db->get_where("fin_year",['id'=>$get_id->id+1])->row();
                
                $update_year['opening_arrear']      = $data1[$i]['curr_arrear'];
                $update_year['opening_advance']     = $data1[$i]['curr_advance'];
                $update_year['opening_arrear_water']    = $data1[$i]['curr_arrear_water'];
                $update_year['opening_advance_water']   = $data1[$i]['curr_advance_water'];
                $update_year['fin_year']            = $get_year->fin_year;
                $this->db->where('crn', $this->input->post('crn')[$i]);
                $query                              = $this->db->update('registrations', $update_year);
            }
            // print_r($data1); exit();
            $query = $this->db->insert_batch('housetax_demand', $data1); 
            $this->db->trans_complete();
            return redirect('Admin/calculateHouseTax');
        }

        // Tax Demand
        public function houseTaxDemand() {
            $this->load->view('admin/housetax/house-tax-demand');
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
            $data['demandLists'] = $this->db->select("housetax_demand.*, registrations.name, registrations.demand_no")
                                ->from("housetax_demand")
                                ->join("registrations", 'registrations.crn = housetax_demand.crn')
                                ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                ->join("fin_year", 'registrations.fin_year = fin_year.fin_year')
                                ->where('housetax_demand.ward_no', $ward_name)
                                ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/house-tax-demand-list', $data);
        }
	
        // Print Bill
        public function printBill($billno) {
            $data['demand'] = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.address, registrations.demand_no")
                            ->from('housetax_demand')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->join("fin_year", 'registrations.fin_year = fin_year.fin_year')
                            ->where('housetax_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/housetax/house-tax-bill', $data);
        }

        // Water Tax Demand
        public function waterTaxDemand() {
            $this->load->view('admin/housetax/water-tax-demand');
        }
    
        // Water Tax Demand-list
        public function waterTaxDemandList() {
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
            $data['demandLists'] = $this->db->select("housetax_demand.*, registrations.name, registrations.demand_no")
                                ->from("housetax_demand")
                                ->join("registrations", 'registrations.crn = housetax_demand.crn')
                                ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                ->join("fin_year", 'registrations.fin_year = fin_year.fin_year')
                                ->where('housetax_demand.ward_no', $ward_name)
                                ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/water-tax-demand-list', $data);
        }
	
        // Print Water Bill
        public function printWaterBill($billno) {
            $data['demand'] = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.address, registrations.demand_no")
                            ->from('housetax_demand')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->join("fin_year", 'registrations.fin_year = fin_year.fin_year')
                            ->where('housetax_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/housetax/water-tax-bill', $data);
        }

    	public function printAllBill() {
    	    $start  = $this->input->get('start');
    	    $end    = $this->input->get('end');
            
    	    $data['demand'] = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.address, registrations.demand_number")
                            ->from('housetax_demand')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->where("housetax_demand.billno >=", $start)
    		                ->where("housetax_demand.billno <=", $end)->get()->result();
        // 	print_r($data); exit();
        	$this->load->view('admin/housetax/all-bill', $data);
    	}

        // Pay Bill List
        public function payHouseTax()
        {
            $this->load->view('admin/housetax/pay-house-tax');
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
            $data['demandLists'] = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.demand_no")
                                ->from("housetax_demand")
                                ->join("registrations", 'registrations.crn = housetax_demand.crn')
                                ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                ->join("fin_year", 'registrations.fin_year = fin_year.fin_year')
                                ->where('housetax_demand.ward_no', $ward_name)
                                ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/pay-house-tax-list', $data);
        }

        // Pay Tax
        public function payTax($billno) {
            $data['row']    = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.address, registrations.demand_no")
                            ->from('housetax_demand')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->where('housetax_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/housetax/pay-house-tax-list', $data);
        }

        public function savePayment($billno)
        {
            $dataa['curr_arrear']       = $this->input->post('opening_arrear');
            $dataa['curr_advance']      = $this->input->post('opening_advance');
            $dataa['status']            = 1;
            $this->db->where('billno', $billno);
            $query                      = $this->db->update('housetax_demand', $dataa);
            
            $crn                        = $this->input->post('crn');
            $dataaa['opening_arrear']   = $this->input->post('opening_arrear');
            $dataaa['opening_advance']  = $this->input->post('opening_advance');
            $this->db->where('crn', $crn);
            $query                      = $this->db->update('registrations', $dataaa);
            
            $data['billno']             = $billno;
            $data['fin_year']           = $this->input->post('fin_year');
            $data['ward_no']            = $this->input->post('ward_no');
            $data['crn']                = $this->input->post('crn');
            // $data['unique_id']          = $this->input->post('unique_id');
            $data['total_tax']          = $this->input->post('total_tax');
            $data['paid_amount']        = $this->input->post('paid_amount');
            $data['arrear']             = $this->input->post('opening_arrear');
            $data['advance']            = $this->input->post('opening_advance');
            $data['payment_id']         = $this->input->post('payment_id');
            $data['payment_date']       = $this->input->post('payment_date');
            // print_r($data); exit();
            $query                      = $this->db->insert('housetax_payment', $data);
            
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                // return redirect('Admin/printReceipt/'.$this->input->post('payment_id'));
                return redirect('Admin/payHouseTaxList');
            } else {
                return redirect('Admin/payTax');
            }
        }

        public function getTaxReceipt() {
            $this->load->view('admin/housetax/get-tax-receipt');
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
            $data['paidList']   = $this->db->select("housetax_payment.*, housetax_demand.curr_arrear, registrations.name, registrations.father_name, registrations.demand_no, house_ward.ward_name")
                                ->from('housetax_payment')
                                ->join('housetax_demand', 'housetax_demand.crn = housetax_payment.crn')
                                ->join('registrations', 'registrations.crn = housetax_demand.crn')
                                ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                ->where("housetax_payment.ward_no", $ward_name)
                                ->where("housetax_payment.fin_year", $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-tax-receipt-list', $data);
        }
    
        public function printReceipt($billno) {
            $data['demand'] = $this->db->select("housetax_payment.*,housetax_demand.from_date, housetax_demand.to_date,registrations.name, registrations.father_name, registrations.address, registrations.demand_no, house_ward.ward_name")
                            ->from('housetax_payment')
                            ->join('housetax_demand', 'housetax_demand.billno = housetax_payment.billno')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                            ->where('housetax_payment.billno', $billno)->get()->row();
            // print_r($data); exit();                    
            $this->load->view('admin/housetax/house-tax-receipt', $data);
        }

        // Water Tax
        // Pay Bill List
        public function payWaterTax()
        {
            $this->load->view('admin/housetax/pay-water-tax');
        }
    
        public function payWaterTaxList()
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
            $data['demandLists'] = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.demand_no")
                                ->from("housetax_demand")
                                ->join("registrations", 'registrations.crn = housetax_demand.crn')
                                ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                ->join("fin_year", 'registrations.fin_year = fin_year.fin_year')
                                ->where('housetax_demand.ward_no', $ward_name)
                                ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/pay-water-tax-list', $data);
        }

        // Pay Tax
        public function payTaxWater($billno) {
            $data['row']    = $this->db->select("housetax_demand.*, registrations.name, registrations.father_name, registrations.address, registrations.demand_no")
                            ->from('housetax_demand')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->where('housetax_demand.billno', $billno)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/housetax/pay-water-tax-list', $data);
        }

        public function savePaymentWater($billno)
        {
            $dataa['curr_arrear_water']       = $this->input->post('opening_arrear');
            $dataa['curr_advance_water']      = $this->input->post('opening_advance');
            $dataa['status']            = 1;
            $this->db->where('billno', $billno);
            $query                      = $this->db->update('housetax_demand', $dataa);
            
            $crn                        = $this->input->post('crn');
            $dataaa['opening_arrear_water']   = $this->input->post('opening_arrear');
            $dataaa['opening_advance_water']  = $this->input->post('opening_advance');
            $this->db->where('crn', $crn);
            $query                      = $this->db->update('registrations', $dataaa);
            
            $data['billno']             = $billno;
            $data['fin_year']           = $this->input->post('fin_year');
            $data['ward_no']            = $this->input->post('ward_no');
            $data['crn']                = $this->input->post('crn');
            // $data['unique_id']          = $this->input->post('unique_id');
            $data['total_tax']          = $this->input->post('total_tax');
            $data['paid_amount']        = $this->input->post('paid_amount');
            $data['arrear']             = $this->input->post('opening_arrear');
            $data['advance']            = $this->input->post('opening_advance');
            $data['payment_id']         = $this->input->post('payment_id');
            $data['payment_date']       = $this->input->post('payment_date');
            // print_r($data); exit();
            $query                      = $this->db->insert('h_watertax_payment', $data);
            
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                // return redirect('Admin/printReceipt/'.$this->input->post('payment_id'));
                return redirect('Admin/payWaterTaxList');
            } else {
                return redirect('Admin/payTax');
            }
        }

        public function getWaterTaxReceipt() {
            $this->load->view('admin/housetax/get-watertax-receipt');
        }
    
        public function getWaterTaxReceiptList() {
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
            $data['paidList']   = $this->db->select("h_watertax_payment.*, housetax_demand.curr_arrear_water, registrations.name, registrations.father_name, registrations.demand_no, house_ward.ward_name")
                                ->from('h_watertax_payment')
                                ->join('housetax_demand', 'housetax_demand.crn = h_watertax_payment.crn')
                                ->join('registrations', 'registrations.crn = housetax_demand.crn')
                                ->join('house_ward', 'registrations.ward_no = house_ward.ward_no')
                                ->where('h_watertax_payment.ward_no', $ward_name)
                                ->where('h_watertax_payment.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-watertax-receipt-list', $data);
        }
    
        public function printReceiptWater($billno) {
            $data['demand'] = $this->db->select("h_watertax_payment.*,housetax_demand.from_date, housetax_demand.to_date,registrations.name, registrations.father_name, registrations.address, registrations.demand_no, house_ward.ward_name")
                            ->from('h_watertax_payment')
                            ->join('housetax_demand', 'housetax_demand.billno = h_watertax_payment.billno')
                            ->join('registrations', 'registrations.crn = housetax_demand.crn')
                            ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                            ->where('h_watertax_payment.billno', $billno)->get()->row();
            // print_r($data); exit();                    
            $this->load->view('admin/housetax/water-tax-receipt', $data);
        }

        // House Tax Report
        public function HouseTaxReport() {
            $this->load->view('admin/housetax/house-tax-report');
        }

        public function getDefaulterList() {
            $fin_year   = $this->input->post('fin_year');
            $range      = $this->input->post('range');
            $ward_name  = $this->input->post('ward_no');
            $data['defaulterList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv,housetax_demand.opening_arrear,housetax_demand.total_tax,housetax_demand.curr_arrear,housetax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("housetax_payment", 'housetax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'house_ward.ward_no = registrations.ward_no')
                                    ->where('housetax_demand.curr_arrear >=', $range)
                                    ->where('housetax_demand.ward_no', $ward_name)
                                    ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-defaulter-list', $data);
        }

        public function getListYearWise() {
            $fin_year   = $this->input->post('fin_year');
            $data['yearWiseList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv,housetax_demand.opening_arrear,housetax_demand.total_tax,housetax_demand.curr_arrear,housetax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("housetax_payment", 'housetax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                    ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-list-year-wise', $data);
        }
    
        public function getListWardWise(){
            $ward_name   = $this->input->post('ward_no');
            $data['wardWiseList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv,housetax_demand.opening_arrear,housetax_demand.total_tax,housetax_demand.curr_arrear,housetax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("housetax_payment", 'housetax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                    ->where('housetax_demand.ward_no', $ward_name)->get()->result_array();
            $this->load->view('admin/housetax/get-list-ward-wise', $data);
        }
    
        public function getListDateWise(){
            $from_date      = $this->input->post('from_date');
            // $f_date         = date("d-m-Y", strtotime($from_date));
            $to_date        = $this->input->post('to_date');
            // $t_date         = date("d-m-Y", strtotime($to_date));
            // print_r($from_date); exit();
            $data['dateWiseList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv,housetax_demand.opening_arrear,housetax_demand.total_tax,housetax_demand.curr_arrear,housetax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("housetax_payment", 'housetax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                    ->where('housetax_demand.from_date', $from_date)
                                    ->where('housetax_demand.to_date', $to_date)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-list-date-wise', $data);
        }

        // Water Tax Report
        public function WaterTaxReport() {
            $this->load->view('admin/housetax/water-tax-report');
        }

        public function getDefaulterListWater() {
            $fin_year   = $this->input->post('fin_year');
            $range      = $this->input->post('range');
            $ward_name  = $this->input->post('ward_no');
            $data['defaulterList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv_water,housetax_demand.opening_arrear_water,housetax_demand.total_tax_water,housetax_demand.curr_arrear_water,h_watertax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("h_watertax_payment", 'h_watertax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'house_ward.ward_no = registrations.ward_no')
                                    ->where('housetax_demand.curr_arrear_water >=', $range)
                                    ->where('housetax_demand.ward_no', $ward_name)
                                    ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-defaulter-list-water', $data);
        }

        public function getListYearWiseWater() {
            $fin_year   = $this->input->post('fin_year');
            $data['yearWiseList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv_water,housetax_demand.opening_arrear_water,housetax_demand.total_tax_water,housetax_demand.curr_arrear_water,h_watertax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("h_watertax_payment", 'h_watertax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                    ->where('housetax_demand.fin_year', $fin_year)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-list-year-wise-water', $data);
        }
    
        public function getListWardWiseWater(){
            $ward_name   = $this->input->post('ward_no');
            $data['wardWiseList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv_water,housetax_demand.opening_arrear_water,housetax_demand.total_tax_water,housetax_demand.curr_arrear_water,h_watertax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("h_watertax_payment", 'h_watertax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                    ->where('housetax_demand.ward_no', $ward_name)->get()->result_array();
            $this->load->view('admin/housetax/get-list-ward-wise-water', $data);
        }
    
        public function getListDateWiseWater(){
            $from_date      = $this->input->post('from_date');
            // $f_date         = date("d-m-Y", strtotime($from_date));
            $to_date        = $this->input->post('to_date');
            // $t_date         = date("d-m-Y", strtotime($to_date));
            // print_r($from_date); exit();
            $data['dateWiseList'] = $this->db->select("registrations.crn,registrations.name,registrations.father_name,registrations.demand_no,housetax_demand.arv_water,housetax_demand.opening_arrear_water,housetax_demand.total_tax_water,housetax_demand.curr_arrear_water,h_watertax_payment.paid_amount,house_ward.ward_name")
                                    ->from("registrations")
                                    ->join("housetax_demand", 'housetax_demand.crn = registrations.crn')
                                    ->join("h_watertax_payment", 'h_watertax_payment.billno = housetax_demand.billno')
                                    ->join("house_ward", 'registrations.ward_no = house_ward.ward_no')
                                    ->where('housetax_demand.from_date', $from_date)
                                    ->where('housetax_demand.to_date', $to_date)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/housetax/get-list-date-wise-water', $data);
        }

    }

?>