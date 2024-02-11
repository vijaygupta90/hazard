<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

	public function verify_user($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
        $user = $this->db->get('admin')->row_array();
        return $user;
	}

	public function insertData($table='', $data='') {

		$query=$this->db->insert($table, $data);
		return $query;
	}

	public function editData($table='', $condition='') {

		$data=$_POST;
		$query=$this->db->get_where($table,$condition)->row_array();
		return $query;
	}

	public function updateData($table='', $condition='', $data='') {

		$query=$this->db->where('id',$condition)->update($table,$data);
		return $query;
	}
 
	public function deleteData($table='',$id='') {

		$condition = array('id' => $id);
		$query=$this->db->delete($table,$condition);
		return $query;
	}

	public function selectAll($table) {

		$query=$this->db->select('*')->get($table)->result_array();
		return $query;
	}

	public function selectData($table, $id) {

		$query=$this->db->select('*')->from($table)->where('id',$id)->get()->result_array();
		return $query;
	}

}