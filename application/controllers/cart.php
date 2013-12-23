<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('cart_model');
	}

	public function index(){

		

		//Prepare Header Data
		$header['page_title'] = 'Shopping Cart';
		
		//Navigation
		$navigation['page_cur_nav'] = 'cart';

		//Main Content
		$cart['cart_contents'] = $this->cart->contents();
		$cart['total_price'] = $this->cart->format_number($this->cart->total());
		$cart['total_items'] = $this->cart->total_items();

	


		$cart['available'] = $this->cart_model->check_product_qty($this->cart->contents());

		// echo "<pre>";
		// 	var_dump($cart['available']);

		// 	$var = array_merge();


		// 	var_dump($this->cart->contents());


		// 	$test = array_merge($cart['available'][0], $this->cart->contents());
		// 	var_dump($test);
		// die();


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		if (count($this->cart->contents()) == 0) {
			$this->load->view('cart/cart_empty');
		}else{
			$this->parser->parse('cart/cart', $cart);	
		}
		//Page Footer
		$this->load->view('template/footer');
	}

	public function add($id, $qty=1){


		//Store the referring link to the sessions
		// $ref = $this->uri->uri_to_assoc(5);
		// echo '<pre>';
		// var_dump($ref);
		// echo '</pre>';
		// die();
		//Retrivie later when in cart.
		
		//Check if the book already exist in the cart.
		$this->check_cart($id);
		//If yes it append +1 qty in the cart.
		

		$product_info = $this->cart_model->get_product_info($id);

		if ($product_info[0]['product_qty'] >= $qty) {
			$available = '';
		}else{
			$available = 'This book(s) that you ordered is either on limited stock or not available.';
		}


		$product = array(
               'id'      => $product_info[0]['product_id'],
               'qty'     => $qty,
               'price'   => $product_info[0]['price'],
               'name'    => $product_info[0]['title'],
               'image' => $product_info[0]['image'],
               'link' => url_title($product_info[0]['title']),
               'available' => $available
            );

		if($this->cart->insert($product)){
			redirect('cart');
		}else{
			die('Something is wrong');
		}


	}

	public function update(){
		/*
			@task Remember to add codes here to update the cart
		*/	
		$update = $this->input->post('cart');

		foreach ($update as $key => $value) {

			$data[] = array_merge(array('rowid' => $key, 'qty' => $value));
		}

		if ($this->cart->update($data)) {

			redirect('cart');

		}else{
			redirect('cart');
		}

		
	}

	public function destroy(){
		/*
			This function destroys the existing cart and its contents
		*/
		$this->cart->destroy();
		redirect('cart');
	}

	public function check_cart($id, $qty = 1){
		$data = array();
		foreach ($this->cart->contents() as $key => $inner) {
				foreach ($inner as $key => $value) {
					if ($inner[$key] == $id) {
						$data[] = array('rowid' => $inner['rowid'],
										'qty' => $inner['qty'] + $qty);
					}
				}
			}

			if (count($data) > 0) {

				if ($this->cart->update($data)) {
					redirect('cart');
				}else{
					echo 'Error';
				}
			}else{
				return FALSE;
			}
	}



}