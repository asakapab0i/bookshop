<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index(){
		
		//Prepare Header Data
		$header['page_title'] = 'Login';
		
		//Navigation
		$navigation['page_cur_nav'] = 'account';

		




		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('home/main', $main);
		//Page Footer
		$this->load->view('template/footer');

		
		
	}

}