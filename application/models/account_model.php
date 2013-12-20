<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function login_validate($email, $password){
		
		$this->db->where('email', $email);
		$this->db->where('password', md5 ($password));	
		$query=$this->db->get('users');

		if($query->num_rows() == 1){
			return TRUE;
		}else{
			return FALSE;
			
		}
	}

	public function insert_register_record($personal, $address){


		$sql1 = $this->db->insert('users', $personal);


		$var = array('user_id' => $this->db->insert_id());
		$address = array_merge($address, $var);

		$sql2 = $this->db->insert('address', $address);

		if ($sql1 == TRUE && $sql2 == TRUE) {
			return TRUE;
		}else{
			var_dump($sql1 . $sql2);
		}
		
	}

	

	
}