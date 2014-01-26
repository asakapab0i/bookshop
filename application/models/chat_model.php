<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model {

	public function get_messages_product($order_id){

		$this->db->select('fname, message, date')->from('messages')->where('order_id', $order_id)->join('users', 'users.id = messages.user_id', 'right')->order_by('date', 'DESC');
		$sql = $this->db->get();

		return $sql->result_array();


	}

	public function insert_message($data){

		$this->db->insert('messages', $data);
	}

}

/* End of file chat_model.php */
/* Location: ./application/models/chat_model.php */