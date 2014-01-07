<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function home_featured(){
		$sql = $this->db->get('books', 4);
		return $sql->result_array();
	}

	public function home_releases(){
		$sql = $this->db->get('books', 4);
		return $sql->result_array();
	}

	public function home_random(){
		$sql = $this->db->get('books', 4);
		return $sql->result_array();
	}

}