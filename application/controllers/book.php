<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('book_model');
	}


	public function view($product_id){

		$book['bookview'] = $this->book_model->get_book_by_id($product_id);
		$book['subtotal'] = $this->cart->total();
		$book['items'] = $this->cart->total_items();
		

		$q1 = $this->cart->contents();
		shuffle($q1);



		$book['recent_cart'] = $q1;
		//Prepare Header Data
		$header['page_title'] = 'Book | ' .$book['bookview'][0]['title'];
		
		//Navigation
		$navigation['page_cur_nav'] = 'Book';

		//Main Content




		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('book/book_view', $book);
		//Page Footer
		$this->load->view('template/footer');


	}

	public function browse($category = 'all'){
		//Prepare Header Data
		$header['page_title'] = 'Book | Browse All';
		
		//Navigation
		$navigation['page_cur_nav'] = 'Book';

		//Main Content
		$book['subtotal'] = $this->cart->total();
		$book['items'] = $this->cart->total_items();
		$q1 = $this->cart->contents();
		shuffle($q1);
		$book['recent_cart'] = $q1;
		$result = $this->book_model->get_books();

		 foreach ($result as $key => $value) {		 	
		 	
		 		//echo $value['title'];
		 			foreach ($value as $key2 => $value) {
		 				//echo $key2;
		 				if ($key2 == 'title') {
		 					//var_dump($result[$key][$key2]);

		 					$end = $result[$key][$key2];
		 					array_push($result[$key], $end);

		 					$result[$key][$key2] = character_limiter($result[$key][$key2], 20);

		 					
		 				}

		 				if ($key2 == 'author') {
		 					$end = $result[$key][$key2];
		 					array_push($result[$key], $end);
		 					
		 					$result[$key][$key2] = character_limiter($result[$key][$key2], 20);
		 				}
		 				
		 			}

		 			
		 		
		 	
		 }
		
		$book['books'] = $result;
		


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('book/book_browse', $book);
		//Page Footer
		$this->load->view('template/footer');
	}

}