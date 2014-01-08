<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function home_featured(){
		$this->db->select('*')->from('featured')->join('books', 'featured.product_id = books.product_id');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function home_releases(){

		$this->db->select('*')->from('books')->order_by('dateadd','asc')->limit(4);
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function home_random(){

		$sql =  $this->db->query("SELECT * FROM books ORDER BY RAND() LIMIT 4");
		return $sql->result_array();
	}

}