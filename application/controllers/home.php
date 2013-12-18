<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index(){
		
		//Prepare Header Data
		$header['page_title'] = 'Home';
		
		//Navigation
		$navigation['page_cur_nav'] = 'home';

		//Prepare Main Data
		$main['featured'] = $this->home_model->home_featured();
		$main['releases'] = $this->home_model->home_releases();
		$main['random'] = $this->home_model->home_random();
		//var_dump($main);





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