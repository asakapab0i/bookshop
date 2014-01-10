<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('checkout_model');
		$this->load->helper('string');

		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->_is_logged_in()) {
			$this->session->set_flashdata('checkout', 'You need to be logged in to checkout!');
			redirect("account/login");
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
	
	public function pay_with_paypal($address_id, $shipping_type){

				if ($this->input->post()) {
				//save paypal_log
				$paypal_log = $this->input->post();
				$this->checkout_model->insert_paypal_log(array('data' => serialize($paypal_log)));
				}


				 $login = $this->session->userdata('login');
				 $user_id = $login['id'];

				 $cart = $this->cart->contents();
				//insert order data
				$order_data = array('order_id' => random_string('alnum', 8),
									'address_id' => $address_id,
									'order_total' => $this->cart->total(),
									'order_status' => 'Pending', //Always pending, to be changed by administrator
									'dateorder' => date('Y-m-d H:i:s'),
									'user_id' => $user_id,
									'payment_method' => 'Paypal',
									'shipping_info' => 'Standard',
									'cart_data' => serialize($cart)
									); 
				$this->checkout_model->insert_order_data($order_data);

				//destory the cart
				$this->cart->destroy();

				

				//Perform the payment
                $config['business']                         = 'bojorquebryan-facilitator@gmail.com';
                $config['cpp_header_image']         = ''; //Image header url [750 pixels wide by 90 pixels high]
                $config['return']                                 = base_url() . 'checkout/notify_payment';
                $config['cancel_return']                 = base_url() . 'checkout/cancel_payment';
                $config['notify_url']                         = base_url() . 'checkout/pay_with_paypal'; //IPN Post
                $config['production']                         = FALSE; //Its false by default and will use sandbox
                $config["invoice"]                                = random_string('alnum', 8); //The invoice id
                
                $this->load->library('paypal',$config);
                
                #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

               

				foreach ($cart as $key => $cart2) {
					foreach ($cart2 as $key2 => $value) {
					}

					$this->paypal->add($cart2['name'],$cart2['price'],$cart2['qty']); //First item

				}

                
               $this->paypal->pay(); //Proccess the payment


	}

	public function pay_with_bank($address_id, $shipping_type){
		
	}

	public function pay_with_credit_card($address_id, $shipping_type){
		
	}

	public function notify_payment(){
		

		// echo '<h1>Success!</h1>';
		// echo '<pre>';
		// var_dump($return_info);

		//Prepare Header Data
		$header['page_title'] = 'My Orders';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('checkout/checkout_success_view');
		//Page Footer
		$this->load->view('template/footer');

	}

	public function cancel_payment(){


		echo 'Cancelled!';
	}

	/*
	Email Template
	*/


}