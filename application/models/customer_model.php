<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_model {


	public function customer_info($user_id){

	$this->db->select('*');
	$this->db->from('address');
	$this->db->join('users', 'address.user_id = users.id');

	$query = $this->db->get();

	return $query->result_array();

// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id

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

}