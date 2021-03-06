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

		$this->db->select('*')->from('books')->join('wishlist', 'books.product_id = wishlist.product_id')->where('wishlist.user_id', $user_id);
		$sql = $this->db->get();

		return $sql->result_array();

	}

	public function remove_wishlist($product_id){
		$this->db->where('product_id', $product_id);
		$this->db->delete('wishlist');
	}

	public function get_order_by_order_no($order_no){

		$this->db->select('*')->from('orders')
		->join('users', 'orders.user_id = users.id')
		->join('address', 'orders.user_id = address.user_id')
		->where('order_id', $order_no)
		->limit(1);
		$sql = $this->db->get();
		return $sql->result_array();

	}

	public function get_order_cart_contents($order_no){
		$this->db->select('cart_data')->from('orders')->where('order_id', $order_no);
		$sql  = $this->db->get();

		$sql1 =  $sql->result_array();
		$result = unserialize($sql1[0]['cart_data']);

		return $result;		
	}

	public function get_order_cart_total($order_no){
		$this->db->select('order_total')->from('orders')->where('order_id', $order_no);
		$sql  = $this->db->get();
		return  $sql->result_array();
				
	}

	public function get_paypal_log($order_id){

		$this->db->select('*')->from('paypal_log')->where('order_id', $order_id);
		$sql = $this->db->get();

		if ($sql->num_rows() > 0) {
			
			$result = $sql->result_array();
			return unserialize($result['0']['data']);
		}


	}

	public function change_password($userid, $new_password){

		$data = array('password' => md5($new_password));

		$this->db->where('id', $userid);
		$this->db->update('users', $data);
	}

}
