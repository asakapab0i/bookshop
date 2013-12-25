<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('checkout_model');
	}

	public function index(){
		$SHIPPING_COST = 900.31;

		$checkout['items'] = $this->cart->total_items();
		$checkout['address'] = $this->checkout_model->get_address($id = 40);

		$checkout['total_price'] = $this->cart->format_number($this->cart->total());
		$checkout['total_items'] = $this->cart->total_items();
		$checkout['cart_contents'] = $this->cart->contents();

		$checkout['shipping_cost'] = (float)$SHIPPING_COST;
		$checkout['grand_total'] = (float)$this->cart->total() + $SHIPPING_COST;





	
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