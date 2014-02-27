<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('book_model');
		$this->load->model('home_model');
	}

	public function index(){
		$this->browse();
	}



	public function view($product_id){
		$login = $this->session->userdata('login');
		$login = $login["id"];

		$book['bookview'] = $this->book_model->get_book_by_id($product_id);
		$book['subtotal'] = $this->cart->format_number($this->cart->total());
		$book['items'] = $this->cart->total_items();
		$book['rate'] = $this->book_model->get_avg_ratings($product_id);
		$book['people'] = $this->book_model->get_people_rate($product_id);
		$book['user'] = $login;
		$sum_rating = $this->book_model->get_ratings($product_id);
		$book['random'] = $random = $this->home_model->home_random();
		

		//Limit character in titles
		foreach ($random as $key => $value) {
				
				foreach ($value as $key2 => $value2) {
					$book['random'][$key]['title'] = character_limiter($random[$key]['title'], 20);
				}

		}


		$q1 = $this->cart->contents();
		shuffle($q1);
		
		//Add pageviews
		$this->book_model->insert_pageview($product_id);



		$book['recent_cart'] = $q1;
		//Prepare Header Data
		$header['page_title'] = 'La Belle Aurore Books | ' .$book['bookview'][0]['title'];
		$header['meta_desc'] = character_limiter($book['bookview'][0]['description'], 300);		
		$header['meta_keywords'] = '';
		//Navigation
		$navigation['page_cur_nav'] = 'book';

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
		$navigation['page_cur_nav'] = 'book';

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

		
		// var_dump($book['books'][0]['author']);
		// die();		
		


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

        public function author($authorname){
         
        	//Prepare Header Data
		$header['page_title'] = 'Book | Author '.urldecode($authorname).' ';
		
		//Navigation
                $navigation['page_cur_nav'] = 'book';
                $navigation['authorname'] = $authorname;
                $mode = 'grid';

		$book_author['subtotal'] = $this->cart->format_number($this->cart->total());
		$book_author['items'] = $this->cart->total_items();
                
                
                $name = urldecode($authorname);
                $result = $this->book_model->get_authordata($name);
                $book_author['book_author'] = $this->modify_array_data($result);


                $q1 = $this->cart->contents();
		shuffle($q1);
		$book_author['recent_cart'] = $q1;
		
		
	

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		if ($mode == 'grid') {
			$this->parser->parse('book/book_authorview', $book_author);
		}
		//Page Footer
		$this->load->view('template/footer');






        }

	public function search_results(){

		$term = $this->input->post('term');
	
		$mode = 'grid';
		$book['term'] = $term;
		$config['uri_segment'] = 8;
		$this->pagination->initialize($config); 


		//Prepare Header Data
		$header['page_title'] = 'Book | Search '.$term.' ';
		
		//Navigation
		$navigation['page_cur_nav'] = 'book';
		$navigation['term'] = $term;


		$search['subtotal'] = $this->cart->format_number($this->cart->total());
		$search['items'] = $this->cart->total_items();
		$result = $this->book_model->get_search_books($term);
		$search['search_result'] = $this->modify_array_data($result);
		$q1 = $this->cart->contents();
		shuffle($q1);
		$search['recent_cart'] = $q1;
		
		
	

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		if ($mode == 'grid') {
			$this->parser->parse('search/search_view', $search);
		}
		//Page Footer
		$this->load->view('template/footer');
	}

	public function ratings(){

		$rate_data = array('product_id' => $this->input->post('product_id'),
							'user_id' => $this->input->post('user_id'),
							'rate' => $this->input->post('rate')
							);

		$this->book_model->insert_rate($rate_data);

		

	}

	public function avg_ratings(){
		$id = $this->input->post('product_id');
		$sql = $this->db->query("SELECT SUM(rate)/COUNT(rate) as rating FROM ratings WHERE product_id = '$id'");

		$result = $sql->result();

		echo number_format((float)$result[0]->rating, 1, '.', '');

	}

	public function people_rate(){
		$id = $this->input->post('product_id');

		$this->db->select('*')->from('ratings')->where('product_id', $id);

		$result = $this->db->get();

		echo $result->num_rows();


	}


	public function add_wishlist($product_id){

		if (!$this->session->userdata('login')) {
			$this->session->set_flashdata('wishlist', 'You need to be logged in to able to add this book to your wishlist.');
			redirect('book');
		}


		$login = $this->session->userdata('login');
		$user_id = $login['id'];
		
		$wishlish_data = array('product_id'=> $product_id,
								'user_id' => $user_id);


		$this->book_model->add_wishlist($wishlish_data, $user_id);

		redirect('customer/wishlist');

	}



	private function modify_array_data($result){


		 foreach ($result as $key => $value) {		 	
		 	
		 		//echo $value['title'];
		 			foreach ($value as $key2 => $value) {
		 				//echo $key2;
		 				if ($key2 == 'title') {
	 					//var_dump($result[$key][$key2]);_e_

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
