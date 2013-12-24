<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('book_model');
	}


	public function view($product_id){

		$book['bookview'] = $this->book_model->get_book_by_id($product_id);
		$book['subtotal'] = $this->cart->format_number($this->cart->total());
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

	public function browse($category = 'all', $mode = 'grid', $order_by = 'title', $order = 'asc', $limit = 10, $page = 0){


		$url = site_url("book/browse/$category/$mode/$order_by/$order/$limit/");

		$config['base_url'] = $url;
		$config['total_rows'] = $this->book_model->get_total_books($category);
		if ($limit > $config['total_rows']) {
			//Temporary Solution
			$limit = 10;
		}
		$config['per_page'] = $limit;
		$config['uri_segment'] = 8;
		$this->pagination->initialize($config); 



		//Prepare Header Data
		$header['page_title'] = 'Book | Browse '.ucfirst($category).' ';
		
		//Navigation
		$navigation['page_cur_nav'] = 'Book';

		//Main Content
		$book['pagination'] = $this->pagination->create_links();
		$book['subtotal'] = $this->cart->format_number($this->cart->total());
		$book['items'] = $this->cart->total_items();
		$q1 = $this->cart->contents();
		shuffle($q1);
		$book['recent_cart'] = $q1;
		$book['url'] = $url;
		$book['category'] = $this->book_model->get_categories();
		
		$result = $this->book_model->get_books($page, $limit, $order_by, $order, $category);
		$book['books'] = $this->modify_array_data($result);
		
		
		


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		if ($mode == 'grid') {
			$this->parser->parse('book/book_browse', $book);
		}else{
			$this->parser->parse('book/book_browse_listmode', $book);
		}
		//Page Footer
		$this->load->view('template/footer');
	}


	private function modify_array_data($result){


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

		 				if ($key2 == 'product_qty') {
		 					

		 					
		 					if ($result[$key][$key2] > 0) {
		 						$link = site_url('cart/add/'.$result[$key]['product_id'].'/');
		 						$result[$key] = array_merge($result[$key], array('available' => '<span class=""><a class="label label-success" href="'.$link.'">Add to Cart</a></span>'));

		 					}else{
		 						$link = site_url('book/view/'.$result[$key]['product_id'].'/'.$result[$key]['product_url'].'/');
		 						$result[$key] = array_merge($result[$key], array('available' => '<span class=""><a class="label label-danger" href="'.$link.'">Special</a></span>'));	
		 					}

		 					
		 				}
		 				
		 			}

		 			
		 		
		 	
		 }

		 return $result;
	}

}