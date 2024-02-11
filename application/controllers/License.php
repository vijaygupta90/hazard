<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class License extends CI_Controller {
        
        public function index() {
            $this->load->view('admin/index');
        }
        
        public function licenseType() {
            $data['licenseType'] = $this->Db_model->selectAll('license_type');
            $this->load->view('admin/license/license-type', $data);
        }

        public function addLicenseType() {
            $data = $_POST;

            $query = $this->Db_model->insertData('license_type',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('License/licenseType');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('License/licenseType');
            }
        }

        public function editLicenseType($table="", $id="") {
            $query['page'] = 'license_type';
            $condition = array('id' => $id);
            $query['update_license_type'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/license/license-type', $query);
        }

        public function updateLicenseType($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('license_type', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('License/licenseType');
            } else {
                return redirect('License/licenseType');
            }
        }
        
        public function licenseCategory() {
            $data['category'] = $this->Db_model->selectAll('license_category');
            $this->load->view('admin/license/license-category', $data);
        }

        public function addLicenseCategory() {
            $data = $_POST;

            $query = $this->Db_model->insertData('license_category',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('License/licenseCategory');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('License/licenseCategory');
            }
        }

        public function editLicenseCategory($table="", $id="") {
            $query['page'] = 'license_category';
            $condition = array('id' => $id);
            $query['update_license_category'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/license/license-category', $query);
        }

        public function updateLicenseCategory($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('license_category', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('License/licenseCategory');
            } else {
                return redirect('License/licenseCategory');
            }
        }
        
        public function occupation() {
            $data['occupation'] = $this->Db_model->selectAll('license_occupation');
            $this->load->view('admin/license/occupation', $data);
        }

        public function addOccupation() {
            $data = $_POST;

            $query = $this->Db_model->insertData('license_occupation',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('License/occupation');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('License/occupation');
            }
        }

        public function editOccupation($table="", $id="") {
            $query['page'] = 'occupation';
            $condition = array('id' => $id);
            $query['update_occupation'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/license/occupation', $query);
        }

        public function updateOccupation($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('license_occupation', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('License/occupation');
            } else {
                return redirect('License/occupation');
            }
        }
        
        public function licenseRegistration() {
            $data['registration'] = $this->Db_model->selectAll('license_registration');
            $this->load->view('admin/license/license-registration', $data);
        }

        public function addLicense() {
            $data = $_POST;

            $query = $this->Db_model->insertData('license_registration',$data);

            if ($query) {
                $this->session->set_flashdata('success', 'Success !');
                return redirect('License/licenseRegistration');
            } else {
                $this->session->set_flashdata('error', 'Success !');
                return redirect('License/licenseRegistration');
            }
        }

        public function editLicense($table="", $id="") {
            $query['page'] = 'license_registration';
            $condition = array('id' => $id);
            $query['update_license'] = $this->Db_model->editData($table, $condition);
            $this->load->view('admin/license/license-registration', $query);
        }

        public function updateLicense($table="", $id="") {
            $data = $_POST;
            $query = $this->Db_model->updateData('license_registration', $id, $data);

            if ($query) {
                $this->session->set_flashdata('msg', 'Updated successfully !');
                return redirect('License/licenseRegistration');
            } else {
                return redirect('License/licenseRegistration');
            }
        }
        
    }
    
?>