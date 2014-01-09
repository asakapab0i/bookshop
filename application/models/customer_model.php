<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_model {

	public function insert_shipping_address($formdata){
		$this->db->insert('address', $formdata);
	}

	public function get_address_primary($user_id){
		$this->db->select('*')->from('address')->where('user_id', $user_id)->join('users', 'users.id = address.user_id')->where('type', 'primary');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function get_address_shipping($user_id){
		$this->db->select('*')->from('address')->where('user_id', $user_id)->join('users', 'users.id = address.user_id')->where('type', 'shipping');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function customer_info($user_id){

	$this->db->select('*');
	$this->db->from('address');
	$this->db->join('users', 'address.user_id = users.id');
	$this->db->where('type', 'primary');
	$this->db->where('user_id', $user_id);
	$query = $this->db->get();

	return $query->result_array();

// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id

	}

	public function customer_shipping_info($user_id){
	$this->db->select('*');
	$this->db->from('address');
	$this->db->join('users', 'address.user_id = users.id');
	$this->db->where('type', 'shipping');
	$this->db->where('user_id', $user_id);
	$this->db->limit(1);
	
	$query = $this->db->get();

	return $query->result_array();
	}

	public function customer_personal_info($user_id){
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('id', $user_id);

	$query = $this->db->get();

	return $query->result_array();

// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id
	}

	public function insert_personal_record($personal, $user_id){

		$this->db->where('id', $user_id);
		$this->db->update('users', $personal); 

		return TRUE;
		// Produces:
		// UPDATE mytable 
		// SET title = '{$title}', name = '{$name}', date = '{$date}'
		// WHERE id = $id
	}

	public function get_order_history($delivery_id){

		$this->db->select('*')->from('users')->join('address', 'users.id = address.user_id')->join('orders', 'orders.address_id = address.address_id');
		$sql = $this->db->get();
		$sql = $sql->result_array();
		
		//var_dump($sql);
		return $sql;
	}

	public function get_wishlist($user_id){

		$this->db->select('*')->from('books')->join('wishlist', 'books.product_id = wishlist.product_id');
		$sql = $this->db->get();

		return $sql->result_array();

	}

	public function remove_wishlist($product_id){
		$this->db->where('product_id', $product_id);
		$this->db->delete('wishlist');
	}

}