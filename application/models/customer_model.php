<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_model {


	public function customer_info($user_id){

	$this->db->select('*');
	$this->db->from('address');
	$this->db->join('users', 'address.user_id = users.id');
	$this->db->where('type', 'primary');

	$query = $this->db->get();

	return $query->result_array();

// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id

	}

	public function customer_shipping_info(){
	$this->db->select('*');
	$this->db->from('address');
	$this->db->join('users', 'address.user_id = users.id');
	$this->db->where('type', 'shipping');

	$query = $this->db->get();

	return $query->result_array();
	}

	public function customer_personal_info(){
	$this->db->select('*');
	$this->db->from('users');

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

}