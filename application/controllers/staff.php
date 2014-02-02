<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'Administrator.php';

class Staff extends Administrator {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');

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
		$header['page_title'] = 'Staff Page';
	
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$index['net_income'] = $this->administrator_model->get_net_income();
		$index['recent_books'] =  $this->administrator_model->get_recent_books();
		$index['recent_orders'] = $this->administrator_model->get_recent_orders();
 		$index['recent_message'] = $this->administrator_model->get_recent_messages();

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('administrator/administrator_dashboad_view', $index);
		//Page Footer
		$this->load->view('template/footer'); 
        }

        public function test(){
                echo 'hello world';
        }

}
