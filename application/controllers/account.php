<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('account_model');
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

		$this->account_model->login_validate($email, $password);
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('loginform_error');
		}
		else
		{
			$this->load->view('loginform_success');
		}
	}

	public function register_validate(){
		$personal = array('' => $this->input->post('fname'));
	}

}