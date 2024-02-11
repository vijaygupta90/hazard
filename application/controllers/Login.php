<?php defined("BASEPATH") OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function index() {
            $this->load->view('login');
        }
    
        public function authenticate() {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == true) {
                // Success
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                // print_r($password); exit();
                $admin = $this->Db_model->verify_user($username, $password);
                if (!empty($admin)) {
                    if ($admin['role'] == 1) {
                        $password = $this->input->post('password');
                        $this->session->set_userdata('admin', $admin);
                        redirect(base_url('Admin'));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Either username or password is incorrect');
                    redirect(base_url('Login'));
                }
            } else {
                // Error
                $this->session->set_flashdata('error', 'Input valid field.');
                $this->load->view('login');
            }
        }

        public function logout() {
            $this->session->unset_userdata('admin');
            $this->session->set_flashdata('success', 'Logged out successfully.');
            redirect(base_url('Login'));
        }

    }

?>