<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('account_model');
	}

	public function index(){

		$this->login();
	}

	public function login(){
		
		//Prepare Header Data
		$header['page_title'] = 'Login';
		
		//Navigation
		$navigation['page_cur_nav'] = 'account';

		//Main Content




		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('account/login');
		//Page Footer
		$this->load->view('template/footer');

		
		
	}

	public function register(){

		//Prepare Header Data
		$header['page_title'] = 'Register';
		
		//Navigation
		$navigation['page_cur_nav'] = 'account';

		//Main Content

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('account/register');
		//Page Footer
		$this->load->view('template/footer');

	}


	public function login_validate(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');

		
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('email','Email','required|callback_checklogin['.$password.']');
		

		if ($this->form_validation->run() == FALSE){
			$this->login_validate_error();
		}
		else{
			redirect('customer/dashboard');
		}


	}

	public function login_validate_error(){
		
		//Prepare Header Data
		$header['page_title'] = 'Login';		
		//Navigation
		$navigation['page_cur_nav'] = 'account';

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('account/login_validate_error');
		//Page Footer
		$this->load->view('template/footer');
	}

	public function register_validate(){

		$personal = array('fname' => $this->input->post('fname'),
						  'lname' => $this->input->post('lname'),
						  'email' => $this->input->post('email'),
						  'mobile' => $this->input->post('mobile'),
						  'dob' => $this->input->post('dob'),
						  'gender' => $this->input->post('gender'),
						  'marital_status' => $this->input->post('mstatus'),
						  'password' => md5($this->input->post('password'))
						  );
		$address  = array('company' => $this->input->post('company'),
						  'city' => $this->input->post('city'),
						  'zip' => $this->input->post('zip'),
						  'state' => $this->input->post('state'),
						  'country' => $this->input->post('country'),
						  'street' => $this->input->post('street'),
						  'telephone' => $this->input->post('telephone')
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

		$this->form_validation->set_rules('company','Company','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('zip','Zip/Postal Code','required');
		$this->form_validation->set_rules('state','State/Province','required');
		$this->form_validation->set_rules('country','Country','required');
		$this->form_validation->set_rules('street','Street','required');

		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('cpassword','Password','required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$this->register_validate_error();
		}
		else{

			if ($this->account_model->insert_register_record($personal, $address)) {
				redirect('account/register_validate_success');
			}

			
		}

	}

		public function register_validate_success(){

		//Prepare Header Data
		$header['page_title'] = 'Register';
		
		//Navigation
		$navigation['page_cur_nav'] = 'account';

		//Main Content

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('account/register_validate_success');
		//Page Footer
		$this->load->view('template/footer');

	}


	public function register_validate_error(){
			//Prepare Header Data
		$header['page_title'] = 'Register';
		
		//Navigation
		$navigation['page_cur_nav'] = 'account';

		//Main Content

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('account/register_validate_error');
		//Page Footer
		$this->load->view('template/footer');
	}

	//login_validate callback
	public function checklogin($email, $password){

		if ($this->account_model->login_validate($email, $password)) {
			return TRUE;
		}else{
			$this->form_validation->set_message('checklogin', 'Incorrect Username/Password');
			return FALSE;
		}

	}

}