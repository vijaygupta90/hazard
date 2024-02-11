<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$this->load->view('mainpage');
	}
	

	
    
	

	

	public function About()
	{
		$this->load->view('web/about');
	}

	public function Digitalmarketing()
	{
		$this->load->view('web/digitalmarketing');
	}

	public function Webdevelopment()
	{
		$this->load->view('web/Webdevelopment');
	}

	public function Leadgenration()
	{
		$this->load->view('web/leadgenration');
	}

	public function Enrollment()
	{
		$this->load->view('web/enrollment');
	}

	public function Appdevelopment()
	{
		$this->load->view('web/appdevelopment');
	}
	
    public function Staffingservices()
	{
		$this->load->view('web/staffingservices');
	}
	
	
	
    public function Paypercall()
	{
		$this->load->view('web/paypercall');
	}

	public function Callfiltering()
	{
		$this->load->view('web/callfiltering');
	}

	public function Fruadprevention()
	{
		$this->load->view('web/fruadprevention');
	}

	public function Industries()
	{
		$this->load->view('web/Industries');
	}
	
	
	
	
	

	
	
        
	// public function sendRequest() {
	// 	$data = $_POST;

	// 	$a = $_FILES['image']['name'];
	// 	if ($a) {
	// 		$config = array(
	// 			'upload_path' => "./assets/uploads/complaint",
	// 			'allowed_types' => "jpg|pdf|jpeg",
	// 		);
	// 		$this->load->library('upload', $config);
	// 		$this->upload->do_upload('image');
	// 		$img = $this->upload->data();
	// 		$data['image'] = $img['file_name'];
	// 	}

	// 	$query = $this->Db_model->insertData('grievance', $data);

	// 	if ($query) {
	// 		$this->session->set_flashdata('success', 'शिकायत सफलता पूर्वक दर्ज़ कर लिया गया है!');
	// 		return redirect('Web/index');
	// 	}
	// }

	// public function Budgetlist() {
	// 	$data['budgetList']=$this->db->select('*')
	// 					 ->from('admin_budget')
	// 					 ->get()->result_array();
		
	// 	$this->load->view('admin/budget',$data);
	// }

	public function Contact()
	{
		$this->load->view('Web/contact');
	}

	// public function Tenderlist() {
	// 	$data['tenderList']=$this->db->select('*')
	// 					 ->from('tender')
	// 					 ->get()->result_array();
		
	// 	$this->load->view('web/tender',$data);
	// }
   
	public function leadRegister() {
		// print_r($_POST); exit();
		$data = $_POST;
		$query = $this->Db_model->insertData('registration', $data);
		$this->load->view('mainpage',$data);
		
		}
		public function debtInsurance() {
			// print_r($_POST); exit();
			$data = $_POST;
			$query = $this->Db_model->insertData('debtins', $data);
			if ($query) {
				$this->session->set_flashdata('success', 'your form is submitted sucessfully,our agents will contact you shortly');
				return redirect('Web/index');
			}
			
			}
	
    
}
