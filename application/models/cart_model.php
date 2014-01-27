<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function get_order_cart_data($order_id){
		$this->db->select('cart_data, order_id')->from('orders')->where('order_id', $order_id);
		$sql = $this->db->get();

		$result = $sql->result_array();
		return $result;
	}

	public function get_product_info($id){

		$this->db->where('product_id', $id);
		$sql = $this->db->get('books');

		return $sql->result_array();
	}

	//Checks if the quantity of each book is available or > 0
	public function check_checkout($contents){
		
		$data = array();
		foreach ($contents as $key1 => $inner) {
				foreach ($inner as $key => $value) {

					if ($key1 == $value) {

						//var_dump($inner);

							$this->db->where('product_id', $inner['id']);
							$sql = $this->db->get('books');
							$sql = $sql->result_array();

							$product_qty = $sql[0]['product_qty'];

							if ($inner['qty'] > $product_qty ) {
								
								 return false;

							}else{
								 $data = true;
							}
						
					}
					
				}
		}
		return $data;
	}

	public function check_product_qty($contents){
		
		$data = array();
		foreach ($contents as $key1 => $inner) {
				foreach ($inner as $key => $value) {

					if ($key1 == $value) {

						//var_dump($inner);

							$this->db->where('product_id', $inner['id']);
							$sql = $this->db->get('books');
							$sql = $sql->result_array();

							$product_qty = $sql[0]['product_qty'];

							if ($inner['qty'] > $product_qty ) {
								
								 $inner = array_merge($inner, array('availability' => 'This book that you ordered is either out of stock or in limited stock only.'));
								 $data[] = $inner;
								
								//$data[] = array('rowid' => $inner['rowid'], 'availability' => TRUE);


							}else{
								 $inner = array_merge($inner, array('availability' => ''));
								 $data[] = $inner;

								//$data[] = array('rowid' => $inner['rowid'], 'availability' => FALSE);
							}
						
					}
					
				}
		}
		return $data;
	}

	

}

