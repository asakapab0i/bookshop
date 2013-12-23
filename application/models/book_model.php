<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function get_book_by_id($product_id){

		$this->db->where('product_id', $product_id);
		$query = $this->db->get('books');

		return $query->result_array();
	}

	public function get_books($page = 0, $limit = 0){
		$this->db->limit($limit, $page);
		$sql = $this->db->get('books');
		return $sql->result_array();

		

		//var_dump($sql);
		//die();
	}

	public function get_total_books(){
		$sql = $this->db->get('books');
		return $sql->num_rows();
	}

}