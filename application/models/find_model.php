<?php

class Find_model extends CI_Model{

	public function __construct(){
	
	parent::__construct();
	$this->load->database();

	}

	public function search($dept){
	
	$res = $this->db->get_where('departments',array('dept_name' => $dept));
	
	return $res->result_array();
	}

}

?>