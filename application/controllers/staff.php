<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'administrator.php';

class Staff extends Administrator {

	public function __construct()
	{
		parent::__construct();
		#$this->load->model('staff_model');

		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if ($this->_is_logged_in() == false) {
			redirect('home');
		}
	}

        public function _is_logged_in(){
                $login_session = $this->session->userdata("login");
                if($login_session["type"] == "staff" || $login_session["type"] == "admin"){
                  return true;
                }else{
                  return false;
                }
        }

        public function index(){
                //Prepare Header Data
		$header['page_title'] = 'Staff Dashboard';
	
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$index['net_income'] = $this->administrator_model->get_net_income();
		$index['recent_books'] =  $this->administrator_model->get_recent_books();
		$index['recent_orders'] = $this->administrator_model->get_recent_orders();
 		$index['recent_message'] = $this->administrator_model->get_recent_messages();
		$index['latest_claims']	= $this->administrator_model->get_latest_claims(10);
 
		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('staff/administrator_orders_view.php', $index);
		//Page Footer
		$this->load->view('template/footer'); 
        }

	public function order($id){
		//Prepare Header Data
		$header['page_title'] = 'Staff | Order No: ' . $id;
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$order['id'] = $id;
		$order['order_data'] = $this->administrator_model->get_order($id);

		$order['order_cart_contents'] = $this->customer_model->get_order_cart_contents($id);
		$order['total'] = $this->customer_model->get_order_cart_total($id);
		$order['message_box'] = $this->administrator_model->get_messages($id);



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('staff/administrator_order_view', $order);
		//Page Footer
		$this->load->view('template/footer');

	}
	public function post_change_package_status(){
		$status = $this->input->post('status');
		$order_id = $this->input->post('order_id');
		$status_arr = array('package_status' => $status);

		//Update
		$this->db->where('order_id', $order_id);
		$this->db->update('orders', $status_arr);
		//Retrieve
		$this->db->select('package_status')->from('orders')->where('order_id', $order_id);
		$sql = $this->db->get();
		$result = $sql->result_array();

		//Send this message back to HTML
		echo $result[0]['package_status'];

	}
	public function settings(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Settings';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('staff/administrator_settings_view');
		//Page Footer
		$this->load->view('template/footer');

	}
}
