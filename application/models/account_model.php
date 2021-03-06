<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function get_login_by_email($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$result = $this->db->get();

		return $result->result_array();
	}

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


		//address1
		$var = array('user_id' => $this->db->insert_id());
		$address1 = array_merge($address, $var);

		//address2
		$address2 = array_replace($address1, array('type' => 'shipping'));

		$sql2 = $this->db->insert('address', $address1);
		$sql3 = $this->db->insert('address', $address2);

		if ($sql1 == TRUE && $sql2 == TRUE) {
			return TRUE;
		}else{
			var_dump($sql1 . $sql2);
		}
		
	}

	

	

	
}