<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function search_query($term){

		$this->db->select('*')->from('books')->like('title', $term);
		$result = $this->db->get();

		if ($result->num_rows() > 0 ) {
			return $result->result_array();
		}else{
			return false;
		}
	}

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
	}


	public function get_search_books($term){
		$this->db->select('*')->from('books')->like('title', $term);
		$sql = $this->db->get();
		return $sql->result_array();

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
		$id = $form_data['user_id'];
		$product_id = $form_data['product_id'];

		$result = $this->db->query("SELECT * FROM ratings WHERE user_id = '$id' AND product_id = '$product_id' ");

		if ($result->num_rows() == 0) {
			$sql = $this->db->insert('ratings', $form_data);	
		}else{
			echo 'existed';
		}

		

	}

	public function add_wishlist($data, $user_id){

		$product_id = $data["product_id"];

		$this->db->select('*')->from('wishlist')->where('product_id', $product_id)->where('user_id', $user_id);
		$sql = $this->db->get();

		if ($sql->num_rows() == 0) {
			$this->db->insert('wishlist', $data);
		}else{
			$this->session->set_flashdata('wishlist', 'The book is already exist in the wishlist.');
		}

		
	
	}

	public function get_ratings($id){

		$this->db->select_avg('rate', 'rate');
		$this->db->from('ratings');
		$this->db->where('product_id', $id);
		$query = $this->db->get();

	}


	public function get_avg_ratings($product_id){
		$id = $product_id;

		$sql = $this->db->query("SELECT SUM(rate)/COUNT(rate) as rating FROM ratings WHERE product_id = '$id' ");

		$result = $sql->result();

		return number_format((float)$result[0]->rating, 1, '.', '');

	}

	public function get_people_rate($product_id){
		$id = $product_id;

		$this->db->select('*')->from('ratings')->where('product_id', $id);

		$result = $this->db->get();

		return $result->num_rows();


	}

	

}