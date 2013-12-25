<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_model extends CI_Model {

	public function get_address($id){
		
		$this->db->select('*');
		$this->db->from('address');
		$this->db->join('users AS user_table', 'user_table.id = address.user_id');
		$this->db->where('user_id', $id);		
		$sql = $this->db->get();

		return $sql->result_array();


	}



}