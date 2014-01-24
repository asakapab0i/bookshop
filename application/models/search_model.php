<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

	public function search_query($term){

		$this->db->select('*')->from('books')->like('title', $term);
		$result = $this->db->get();

		if ($result->num_rows() > 0 ) {
			return $result->result_array();
		}else{
			return false;
		}
	}
}

/* End of file search_model.php */
/* Location: ./application/models/search_model.php */