<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('checkout_model');
	}

	public function index(){
		
		$checkout['subtotal'] = $this->cart->format_number($this->cart->total());
		$checkout['items'] = $this->cart->total_items();
		

		$q1 = $this->cart->contents();
		shuffle($q1);



		$checkout['recent_cart'] = $q1;


		//Prepare Header Data
		$header['page_title'] = 'Checkout Express';
		
		//Navigation
		$navigation['page_cur_nav'] = 'checkout';


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('checkout/checkout_view', $checkout);
		//Page Footer
		$this->load->view('template/footer');

		
		
	}

}