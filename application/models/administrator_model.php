<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator_model extends CI_Model {

	public function get_orders(){
		$this->db->select('order_id')->from('*')->join('users', 'users.id = orders.user_id');
		$sql = $this->db->get();

		return $sql->result_array();

	}

	public function get_order($id){
		$this->db->select('*')->from('orders')->join('users', 'users.id = orders.user_id')->where('order_id', $id)->join('address', 'address.user_id = users.id')->where('address.type', 'primary');
		$sql = $this->db->get();

		return $sql->result_array();

	}

	public function get_shipment($shipment_id){
		$this->db->select('*')
		->from('shipments')
		->join('orders', 'orders.order_id = shipments.order_id')
		->join('users', 'users.id = orders.user_id')
		->join('address', 'address.user_id = users.id')
		->where('shipment_id', $shipment_id)
		->where('type', 'primary');

		$sql = $this->db->get();
		return $sql->result_array();

	}

	public function insert_add_book($formdata){

		$this->db->insert('books', $formdata);
	}
	



}

/* End of file administrator_model.php */
/* Location: ./application/models/administrator_model.php */