<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('customer_model');
	}

	public function index(){
		$this->dashboard();
	}

	public function dashboard($user_id = 40){
		/*
		@task : remember to get the session user id
		*/

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

		//Prepare Header Data
		$header['page_title'] = 'Account Information';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$information['account_information'] = $this->customer_model->customer_personal_info($user_id = 40);



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('dashboard/account_information', $information);
		//Page Footer
		$this->load->view('template/footer');
	}

	public function account_validate($user_id = 40){
		/*
		@task : remember to get the session user id
		*/

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
		$this->parser->parse('dashboard/account_information_validate');
		//Page Footer
		$this->load->view('template/footer');
	}


}