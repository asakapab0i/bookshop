<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function get_book_by_id($product_id){

		$this->db->where('product_id', $product_id);
		$query = $this->db->get('books');

		return $query->result_array();
	}

	public function get_books($page, $limit, $order_by, $order, $category){
			
			if ($category != 'all') {
				$this->db->where('category', $category);
			}

		$this->db->order_by($order_by, $order);
		$this->db->limit($limit, $page);
		$sql = $this->db->get('books');
		return $sql->result_array();

		

		//var_dump($sql);
		//die();
	}

	public function get_total_books($category){
		if ($category != 'all') {
			$this->db->where('category', $category);
		}
		$sql = $this->db->get('books');
		return $sql->num_rows();
	}

	public function get_categories(){
		$this->db->order_by('name', 'ASC');
		$sql = $this->db->get('category');

		return $sql->result_array();
	}

	public function insert_rate($form_data){
		$this->db->select('*')->from('ratings');
		$this->db->where('user_id', $form_data['user_id']);
		$result = $this->db->get();

		if (!$result->num_rows() > 0) {
			$sql = $this->db->insert('ratings', $form_data);	
		}else{
			echo 'User already exist';
		}

		

	}

}