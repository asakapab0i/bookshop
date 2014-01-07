<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->library('datatables');

		
		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->is_logged_in()) {
			redirect("home");
		}

	}

	public function is_logged_in(){
		$login_session = $this->session->userdata('login');
		return $login_session["logged_in"];
	}

	public function index(){
		$this->dashboard();
	}

	public function dashboard(){
		/*
		DONE: @task - : remember to get the session user id
		*/
		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];



		//Prepare Header Data
		$header['page_title'] = 'Customer Dashboard';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$dashboard['user_info'] = $this->customer_model->customer_info($user_id);
		$dashboard['user_shipping_info'] = $this->customer_model->customer_shipping_info($user_id);

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('dashboard/account_dashboard', $dashboard);
		//Page Footer
		$this->load->view('template/footer');
	}

	public function account(){

		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];

		//Prepare Header Data
		$header['page_title'] = 'Account Information';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$information['account_information'] = $this->customer_model->customer_personal_info($user_id);



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('dashboard/account_information', $information);
		//Page Footer
		$this->load->view('template/footer');
	}

	public function account_validate(){
		/*
		@task : remember to get the session user id
		*/

		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];


		$personal = array('fname' => $this->input->post('fname'),
						  'lname' => $this->input->post('lname'),
						  'email' => $this->input->post('email'),
						  'mobile' => $this->input->post('mobile'),
						  'dob' => $this->input->post('dob'),
						  'gender' => $this->input->post('gender'),
						  'marital_status' => $this->input->post('mstatus')
						  );

		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','Email Address','required|valid_email');
		$this->form_validation->set_message('valid_email', 'Must contain valid email.');
		$this->form_validation->set_rules('mobile','Mobile Number','required');
		$this->form_validation->set_rules('dob','Date of birth','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('mstatus','Marital Status','required');



		if ($this->form_validation->run() == FALSE){
			$this->account_validate_error();
		}
		else{

			if ($this->customer_model->insert_personal_record($personal, $user_id)) {
				redirect('customer/dashboard');
			}
		}
	}

	public function account_validate_error(){
		//Prepare Header Data
		$header['page_title'] = 'Account Information';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('dashboard/account_information_validate');
		//Page Footer
		$this->load->view('template/footer');
	}

	public function orders(){
		//Prepare Header Data
		$header['page_title'] = 'My Orders';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		//$orders['order_history'] = $this->customer_model->get_order_history($id = 40);

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('dashboard/account_orders');
		//Page Footer
		$this->load->view('template/footer');
	}


	public function datatables_order(){
		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];

		$this
		->datatables
		->select('order_id, dateorder, lname, order_total, order_status')
		->from('users')
		->join('address', 'users.id = address.user_id')
		->join('orders','orders.address_id = address.address_id')
		->where('users.id', $user_id);


		$datatables = $this->datatables->generate('JSON');
		echo $datatables;


	}


}