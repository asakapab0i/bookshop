<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index(){
		
		//Prepare Header Data
		$header['page_title'] = 'Home';
		$header['meta_keywords'] = 'book, bookshop, labelle aurore bookshop, used books, old books, classic books, cheap books, books for sale, good books to read, read books, bargain books, bookstore, cheap bookstore, overstock books, secondhand bookstore, ssecondhand books';
		$header['meta_desc'] = 'La Belle Aurore Bookshop is a second-hand bookstore located in Hernan Cortes St., Mandaue City, Cebu. It was established in December 2009. It currently carries more than seven thousand volumes of used and overstock books';		
		//Navigation
		$navigation['page_cur_nav'] = 'home';

		//Prepare Main Data
		$main['featured'] = $featured = $this->home_model->home_featured();
		$main['releases'] = $releases = $this->home_model->home_releases();
		$main['ratings'] = $ratings = $this->home_model->home_ratings();
                $main['random'] = $random = $this->home_model->home_random();
		$main['most_viewed'] = $most_viewed = $this->home_model->home_mostviewed();
		$main['bestseller'] = $bestseller = $this->home_model->home_bestseller();


                //var_dump($main);


		foreach ($featured as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['featured'][$key]['title'] = character_limiter($featured[$key]['title'], 20);
				}

		}

		
		foreach ($bestseller as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['bestseller'][$key]['title'] = character_limiter($bestseller[$key]['title'], 20);
				}

		}

		

		foreach ($releases as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['releases'][$key]['title'] = character_limiter($releases[$key]['title'], 20);
				}

		}

		foreach ($ratings as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['ratings'][$key]['title'] = character_limiter($ratings[$key]['title'], 20);
				}

		}

        	foreach ($random as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['random'][$key]['title'] = character_limiter($ratings[$key]['title'], 20);
				}

		}

		foreach ($most_viewed as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$main['random'][$key]['title'] = character_limiter($ratings[$key]['title'], 20);
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
