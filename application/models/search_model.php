<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

	public function search_model($term){

		$this->db->select('*')->from('books')->like('books', $term);
		$result = $this->db->get();

		if ($result->num_rows() > 0 ) {
			return $result;
		}else{
			return false;
		}
	}
	

}

/* End of file search_model.php */
/* Location: ./application/models/search_model.php */