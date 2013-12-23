<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function get_product_info($id){

		$this->db->where('product_id', $id);
		$sql = $this->db->get('books');

		return $sql->result_array();
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

							if ($inner['qty'] >= $product_qty ) {
								
								// $content[] = array_merge(array('rowid' => $inner['rowid'],
								// 							   'availability' => True));

							
								$data[] = array('rowid' => $inner['rowid'], 'availability' => TRUE);


							}else{

								$data[] = array('rowid' => $inner['rowid'], 'availability' => FALSE);
							}
						
					}
					
				}
		}
		return $data;
	}

	

}

