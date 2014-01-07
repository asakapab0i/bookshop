<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('checkout_model');

		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->_is_logged_in()) {
			$this->session->set_flashdata('checkout', 'You need to be logged in to checkout!');
			redirect("home");
		}

	}

	private function _is_logged_in(){
		$login_session = $this->session->userdata('login');
		return $login_session["logged_in"];
	}

	public function index(){
		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];


		$SHIPPING_COST = 900.31;

		$checkout['items'] = $this->cart->total_items();
		$checkout['address'] = $this->checkout_model->get_address($user_id);

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


	public function place_order(){

		$payment_info = array('shipping_address' => $this->input->post('shipping_address'),
							'shipping_type' => $this->input->post('shipping_type'),
							'payment_method' => $this->input->post('payment_method')
							);


		if ($payment_info['payment_method'] == 'paypal_checkout') {
			$this->pay_with_paypal($payment_info['shipping_address'], $payment_info['shipping_type']);
		}else if ($payment_info['payment_method'] == 'bank') {
			$this->pay_with_bank($payment_info['shipping_address'], $payment_info['shipping_type']);
		}else if ($payment_info['payment_method'] == 'credit_card') {
			$this->pay_with_credit_card($payment_info['shipping_address'], $payment_info['shipping_type']);
		}


	}
	
	private function pay_with_paypal($address_id, $shipping_type){

	}

	private function pay_with_bank($address_id, $shipping_type){
		
	}

	private function pay_with_credit_card($address_id, $shipping_type){
		
	}

	/*
	Email Template
	*/


}