<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function get_book_by_id($product_id){

		$this->db->where('product_id', $product_id);
		$query = $this->db->get('books');

		return $query->result_array();
	}

}