<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator_model extends CI_Model {

	public function get_orders(){
		$this->db->select('order_id')->from('*')->join('users', 'users.id = orders.user_id');
		$sql = $this->db->get();

		return $sql->result_array();

	}

	public function get_order($id){
		$this->db->select('*')->from('orders')->join('users', 'users.id = orders.user_id')->where('order_id', $id)->join('address', 'address.user_id = users.id')->where('address.type', 'primary');
		$sql = $this->db->get();

		return $sql->result_array();

        }

        public function get_sales_by_date($date){
        	$sql = $this->db->query("SELECT order_id, order_total, dateorder, CONCAT(fname, ' ', lname) as name FROM orders LEFT JOIN users ON users.id = orders.user_id WHERE order_status = 'Approved' AND dateorder LIKE '%$date%'");
                $result = $sql->result_array();
                
                return $result;

        }

	public function get_account($id){

		$this->db->select('*')->from('users')->join('address', 'address.user_id = users.id')->where('users.id',$id)->where('address.type', 'primary');
		$result = $this->db->get();

		return $result->result_array();

	}

	public function get_account_orders($id){

		$this->db->select('*')->from('users')->join('orders', 'orders.user_id = users.id')->where('users.id',$id);
		$result = $this->db->get();

		return $result->result_array();

	}

	public function get_shipment($shipment_id){
		$this->db->select('*')
		->from('shipments')
		->join('orders', 'orders.order_id = shipments.order_id')
		->join('users', 'users.id = orders.user_id')
		->join('address', 'address.user_id = users.id')
		->where('shipment_id', $shipment_id)
		->where('type', 'primary');

		$sql = $this->db->get();
		return $sql->result_array();

	}

	public function insert_add_book($formdata){

		$this->db->insert('books', $formdata);
	}

	public function insert_add_category($formdata){
		$this->db->insert('category', $formdata);
	}
	

	public function get_category(){

		$sql = $this->db->get('category');
		return $sql->result_array();
	}

	public function get_book_by_id($id){

		$this->db->select('*')->from('books')->where('product_id', $id);
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function update_book($formdata, $id){
		$this->db->where('product_id', $id);
		$this->db->update('books', $formdata); 
	}

	public function get_net_income(){
		$sql = $this->db->query("SELECT FORMAT(SUM(order_total),2) AS total_net_income FROM orders WHERE order_status = 'Approved'");
		return $sql->result_array();
	}

	public function get_recent_books(){
		$this->db->select('*')->from('books')->order_by('dateadd', 'DESC')->limit(10);
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function get_recent_orders(){
		$this->db->select('*')->from('orders')->order_by('dateorder', 'DESC')->limit(15)->join('users', 'users.id = orders.user_id');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function get_messages($order_id){
		$this->db->select('fname AS name, message, date')->from('messages')->where('order_id', $order_id)->join('users', 'users.id = messages.user_id', 'left')->order_by('date', 'DESC');
		$sql = $this->db->get();

		return $sql->result_array();
	}

	public function get_recent_messages(){
		$this->db->select('fname AS name, message, date, order_id')->from('messages')->join('users', 'users.id = messages.user_id', 'left')->order_by('date', 'DESC');
		$sql = $this->db->get();
		return $sql->result_array();
	}
	
	public function get_latest_claims($limit){
		$this->db->select('*')->from('orders')->where('package_status', 'Claimed')->order_by('dateorder', 'DESC')->limit($limit);
		$sql = $this->db->get();
		
		return $sql->result_array();
	}

        public function check_if_email_to_wishlist($id){
                $this->load->library('email');
                $this->db->select('user_id')->from('wishlist')->where('product_id', $id);      
                $check = $this->db->get();


                if($check->num_rows() > 0){
                    $check = $check->result_array();
                    $email_array = array();
              

                    foreach($check as $key => $value){
                      foreach($value as $user => $user_id){
                      
                        $this->db->select('email')->from('users')->where('id', $user_id);
                        $emails = $this->db->get();
                        $emails_resource = $emails->result_array();    

                        foreach($emails_resource as $key => $emails){
                          
                          foreach($emails as $email){
                          
                              $email_array[] = $email;                        
                          }                        
      

                        }
                      
                      } 
                    
                    
                    
                    }

                    $recipients = implode(',',$email_array);
                    #var_dump($recipients);
          




                    $this->email->from('helpdesk@labelleaurorebookshop.com', 'Wishlist Notification');
                    $this->email->to($recipients);
                    $this->email->cc('helpdesk@labelleaurorebookshop.com');
                    
                    $this->email->subject('Your wishlisted book is now available in the store!');
                    $this->email->message('Visit our store now to buy your favorite book.');

                    $this->email->send();

                    #echo $this->email->print_debugger();
			return;

  
                }


        }

}

/* End of file administrator_model.php */
/* Location: ./application/models/administrator_model.php */
