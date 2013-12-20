<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('book_model');
	}


	public function view($product_id){

		$book['bookview'] = $this->book_model->get_book_by_id($product_id);


		//Prepare Header Data
		$header['page_title'] = 'Book';
		
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

}