<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Mutation extends CI_Controller {
        
        public function index() {
            $this->load->view('admin/index');
        }

        // Ward
        public function mutationWard() {
            $data['ward_name'] = $this->Db_model->selectAll('mutation_ward');
            $this->load->view('admin/mutation/ward', $data);
        }

        public function addWard() {
            $data = $_POST;

            $query = $this->Db_model->insertData('mutation_ward',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('Mutation/mutationWard');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('Mutation/mutationWard');
            }
        }

        public function editWard($table="", $id="") {
            $query['page'] = 'ward';
            $condition = array('id' => $id);
            $query['update_ward'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/mutation/ward', $query);
        }

        public function updateWard($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('mutation_ward', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Mutation/mutationWard');
            } else {
                return redirect('Mutation/mutationWard');
            }
        }

        // Mutation Type
        public function mutationType() {
            $data['mutationType'] = $this->Db_model->selectAll('mutation_type');
            $this->load->view('admin/mutation/mutation-type', $data);
        }

        public function addMutationType() {
            $data = $_POST;

            $query = $this->Db_model->insertData('mutation_type',$data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                return redirect('Mutation/mutationType');
            } else {
                return redirect('Mutation/mutationType');
            }
        }

        public function editMutationType($table="", $id="") {
            $query['page'] = 'category';
            $condition = array('id' => $id);
            $query['update_mutation_type'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/mutation/mutation-type', $query);
        }

        public function updateMutationType($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('mutation_type', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Mutation/mutationType');
            } else {
                return redirect('Mutation/mutationType');
            }
        }

        // Assessee Details
        public function assesseeDetailMutation() {
            $this->load->view('admin/mutation/assessee-detail');
        }

        public function addAssessee() {
            $data = $_POST;
            $query=$this->db->get_where('mutation_registrations',['crn'=>$this->input->post('crn')])->row();

            if($query){
                $this->session->set_flashdata('msg', 'Account Number already exist !');
                return redirect('Mutation/assesseeDetailMutation');
            }
            // print_r($data); exit();
            $query = $this->Db_model->insertData('mutation_registrations', $data);
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                return redirect('Mutation/assesseeDetailMutation');
            } else {
                return redirect('Mutation/assesseeDetailMutation');
            }
        }
    
        // Assessee-list
        public function assesseeListWardWise() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/assessee-list-ward-wise', $data);
        }

        public function editAssesseeDetail($table, $id) {
            // print_r($table); exit();
            $query['page'] = 'mutation_registrations';
            $condition = array('id' => $id);
            $query['row'] = $this->db->get_where("mutation_registrations",["id"=>$id])->row();
            $query['update_detail'] = $this->Db_model->editData($table, $condition);
            // print_r($query['row']); exit();
            $this->load->view('admin/mutation/assessee-list-ward-wise', $query);
        }

        public function updateAssesseeDetail($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('mutation_registrations', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('Mutation/assesseeListWardWise');
            } else {
                return redirect('Mutation/assesseeListWardWise');
            }
        }
        
        // Assessee-publication
        public function assesseeDetailpublication() {
            $this->load->view('admin/mutation/assessee-detail-publication');
        }
        
        public function assesseePublicationWardWise() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            
            // print_r($data); exit();
            $this->load->view('admin/mutation/assessee-publication-ward-wise', $data);
        }

        public function publication($id) {
            $data['crn'] = $id;
            $data['assesseeLists'] = $this->db->select('*')->from('mutation_publication')->where('crn', $id)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/add-publication', $data, $id);
        }

        public function addPublication() {
            $data = $_POST;

            // print_r($data); exit();
            $query = $this->Db_model->insertData('mutation_publication', $data);
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                return redirect('Mutation/publication/'.$data['crn']);
            } else {
                return redirect('Mutation/publication/'.$data['crn']);
            }
        }
        
        // Assessee-objection
        public function assesseeDetailObjection() {
            $this->load->view('admin/mutation/assessee-detail-objection');
        }
        
        public function assesseeObjectionWardWise() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->join('mutation_publication', 'mutation_publication.crn = mutation_registrations.crn')
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/assessee-objection-ward-wise', $data);
        }

        public function objection($crn, $id) {
            $data['crn'] = $crn;
            $data['id'] = $id;
            $data['assesseeLists'] = $this->db->select('*')->from('mutation_objection')->where('crn', $crn)->get()->result();
            // print_r($data); exit();
            $this->load->view('admin/mutation/add-objection', $data, $crn, $id);
        }

        public function addObjection() {
            $data = $_POST;

            // print_r($data); exit();
            $query = $this->Db_model->insertData('mutation_objection', $data);
            if ($query) {
                $this->session->set_flashdata('msg', 'Success !');
                return redirect('Mutation/objection/'.$data['crn'].'/'.$data['pub_id']);
            } else {
                return redirect('Mutation/objection/'.$data['crn'].'/'.$data['pub_id']);
            }
        }
        
        // Mutation Status
        public function mutationStatus() {
            $this->load->view('admin/mutation/mutation-status');
        }
        
        public function mutationStatusWardWise() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/mutation-status-ward-wise', $data);
        }

        public function statusShow($id) {
            $data['crn'] = $id;
            $data['assesseeLists'] = $this->db->select('*')->from('mutation_publication')->where('crn', $id)->get()->result();
            // print_r($data); exit();
            $this->load->view('admin/mutation/mutation-status-view', $data, $id);
        }
        
        public function inspectionReport() {
            $this->load->view('admin/mutation/mutation-status');
        }
        
        public function inspectionReportList() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/mutation-status-ward-wise', $data);
        }
        
        public function mutationReport() {
            $this->load->view('admin/mutation/mutation-report');
        }
        
        public function mutationReportList() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/mutation-report-ward-wise', $data);
        }
        
        public function issueMutationReport() {
            $this->load->view('admin/mutation/issue-mutation-report');
        }
        
        public function issueMutationReportList() {
            $this->load->library('session');
            if($this->input->post('ward_no')){
                $this->session->unset_userdata('ward_no');
                $ward_no = $this->input->post('ward_no');
                $this->session->set_userdata('ward_no', $ward_no);
            } else {
                $ward_no = $this->session->userdata('ward_no');
            }
            
            $data['assesseeLists'] = $this->db->select("*")
                                    ->from("mutation_registrations")
                                    ->where('mutation_registrations.ward_no', $ward_no)->get()->result_array();
            // print_r($data); exit();
            $this->load->view('admin/mutation/issue-mutation-report-ward-wise', $data);
        }

    }
    
?>