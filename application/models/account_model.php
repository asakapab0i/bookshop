<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function login_validate($username, $password){
		
		$this->db->where('email', $username);
		$this->db->where('password', md5 ($username));	
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
			
		}	
	}
}