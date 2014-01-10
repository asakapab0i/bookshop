<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_model extends CI_Model {

	public function get_address($id){
		
		$this->db->select('*');
		$this->db->from('address');
		$this->db->join('users', 'users.id = address.user_id');
		$this->db->where('address.user_id', $id);		
		$sql = $this->db->get();

		return $sql->result_array();

	}

	public function insert_paypal_log($data){
		$this->db->insert('paypal_log', $data);
	}

	public function insert_order_data($data){
		$this->db->insert('orders', $data);
	}


}