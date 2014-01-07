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
		$main['featured'] = $featured = $this->home_model->home_featured();
		$main['releases'] = $releases = $this->home_model->home_releases();
		$main['random'] = $random = $this->home_model->home_random();
		//var_dump($main);


		foreach ($featured as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['featured'][$key]['title'] = character_limiter($featured[$key]['title'], 20);
				}

		}

		foreach ($releases as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['releases'][$key]['title'] = character_limiter($releases[$key]['title'], 20);
				}

		}

		foreach ($random as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['random'][$key]['title'] = character_limiter($random[$key]['title'], 20);
				}

		}




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