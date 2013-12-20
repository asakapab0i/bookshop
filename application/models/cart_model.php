<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function get_product_info($id){

		$this->db->where('product_id', $id);
		$sql = $this->db->get('books');

		return $sql->result_array();
	}


}