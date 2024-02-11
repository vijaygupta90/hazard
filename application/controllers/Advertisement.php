<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Advertisement extends CI_Controller {
        
        public function index() {
            $this->load->view('admin/index');
        }

        // Ward
        public function ward() {
            $data['ward_name'] = $this->Db_model->selectAll('advertisement_ward');
            $this->load->view('admin/advertisement/ward', $data);
        }

        public function addWard() {
            $data = $_POST;

            $query = $this->Db_model->insertData('advertisement_ward',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Advertisement/ward');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('Advertisement/ward');
            }
        }

        public function editWard($table="", $id="") {
            $query['page'] = 'ward';
            $condition = array('id' => $id);
            $query['update_ward'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/advertisement/ward', $query);
        }

        public function updateWard($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('advertisement_ward', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Advertisement/ward');
            } else {
                return redirect('Advertisement/ward');
            }
        }

        // Advertisement Type
        public function advertisementType() {
            $data['advertisementType'] = $this->Db_model->selectAll('advertisement_type');
            $this->load->view('admin/advertisement/advertisement-type', $data);
        }

        public function addadvertisementType() {
            $data = $_POST;

            $query = $this->Db_model->insertData('advertisement_type',$data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                return redirect('Advertisement/advertisementType');
            } else {
                return redirect('Advertisement/advertisementType');
            }
        }

        public function editadvertisementType($table="", $id="") {
            $query['page'] = 'category';
            $condition = array('id' => $id);
            $query['update_advertisement_type'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/advertisement/advertisement-type', $query);
        }

        public function updateadvertisementType($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('advertisement_type', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Advertisement/advertisementType');
            } else {
                return redirect('Advertisement/advertisementType');
            }
        }

        public function addAssessee() {
            $data = $_POST;
            $query=$this->db->get_where('advertisement_registrations', ['crn'=>$this->input->post('crn')])->row();

            if($query){
                $this->session->set_flashdata('msg', 'Account Number already exist !');
                return redirect('Advertisement/assesseeDetail');
            }
            // print_r($data); exit();
            $query = $this->Db_model->insertData('advertisement_registrations', $data);
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                return redirect('Advertisement/assesseeDetail');
            } else {
                return redirect('Advertisement/assesseeDetail');
            }
        }

        // Assessee Details
        public function assesseeDetail() {
            $this->load->view('admin/advertisement/assessee-detail');
        }
	
        public function getadvertisementType() {
            $result=$this->db->select('*')->from('advertisement_type')->where('type_id',$this->input->get('id'))->get()->row();
            // print($this->input->get('type_id')); exit();
            echo json_encode($result->rate);
        }
    
        // Assessee-list
        public function assesseeListWardWise() {
            $this->load->library('session');
            if($this->input->post('type_id')){
                $this->session->unset_userdata('type_id');
                $advertisement_type = $this->input->post('type_id');
                $this->session->set_userdata('advertisement_type', $advertisement_type);
            } else {
                $advertisement_type = $this->session->userdata('advertisement_type');
            }
            
            $data['assesseeLists'] = $this->db->select("advertisement_registrations.*, advertisement_ward.ward_name, advertisement_type.advertisement_type")
                                    ->from("advertisement_registrations")
                                    ->join('advertisement_ward', 'advertisement_ward.ward_no = advertisement_registrations.ward_no')
                                    ->join('advertisement_type', 'advertisement_type.type_id= advertisement_registrations.type_id')
                                    ->where('advertisement_registrations.type_id', $advertisement_type)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/advertisement/assessee-list-ward-wise', $data);
        }

        public function editAssesseeDetail($table, $id) {
            // print_r($table); exit();
            $condition = array('id' => $id);
            $query['row'] = $this->db->get_where("advertisement_registrations",["id"=>$id])->row();
            $query['updateAssesseeDetail'] = $this->Db_model->editData($table, $condition);
            // print_r($query['row']); exit();
            $this->load->view('admin/advertisement/assessee-list-ward-wise', $query);
        }

        public function updateAssesseeDetail($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('advertisement_registrations', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Advertisement/assesseeListWardWise');
            } else {
                return redirect('Advertisement/assesseeListWardWise');
            }
        }

        // Tax Calculation
        public function advertisementCalc() {
            $this->load->view('admin/advertisement/advertisement-calc');
        }
    
        // Tax Calculation-list
        public function advertisementCalcList() {
            $this->load->library('session');
            if($this->input->post('type_id')){
                $this->session->unset_userdata('type_id');
                $advertisement_type = $this->input->post('type_id');
                $this->session->set_userdata('advertisement_type', $advertisement_type);
            } else {
                $advertisement_type = $this->session->userdata('advertisement_type');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("advertisement_registrations")
                                    ->where('advertisement_registrations.type_id', $advertisement_type)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/advertisement/advertisement-calc-list', $data);
        }
    
        public function printReceipt($crn) {
            $data['demand'] = $this->db->select("*")
                                ->from("advertisement_registrations")
                                ->where('advertisement_registrations.crn', $crn)->get()->row();
            // print_r($data); exit();
            $this->load->view('admin/advertisement/bill-receipt', $data);
        }

        public function cancelReceipt($table="", $id="") {
            $condition = array('id' => $id);
            $query['update_receipt'] = $this->Db_model->editData($table, $condition);
            // print_r($query); exit();
            $this->load->view('admin/advertisement/cancel-receipt', $query);
        }

        public function updateReceipt($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('advertisement_registrations', $id, $data);

            if ($query) {
                $this->session->set_flashdata('success', 'Cancelled successfully !');
                return redirect('Advertisement/advertisementCalc');
            } else {
                return redirect('Advertisement/advertisementCalc');
            }
        }

        // Date Wise Status List
        public function getListDate(){
            $this->load->view('admin/advertisement/get-list');
        }
    
        public function getListDateWise(){
            $from_date      = $this->input->post('from_date');
            $to_date        = $this->input->post('to_date');
            $data['paidListDateWise'] = $this->db->select("*")
                                    ->from("advertisement_registrations")
                                    ->where('advertisement_registrations.reg_date >=', $from_date)
                                    ->where('advertisement_registrations.reg_date <=', $to_date)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/advertisement/get-list-date-wise', $data);
        }

    }
    
?>