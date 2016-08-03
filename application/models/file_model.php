<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model{

	public function input($data){
		$this -> db -> insert('file',$data);
	}

	public function output($id){
		$data = $this->db->get_where('file', array('id' => $id))-> result_array();
		return $data;
	}
}