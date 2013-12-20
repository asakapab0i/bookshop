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
		$cart['total_price'] = number_format($this->cart->total(), 2, '.', '');
		$cart['total_items'] = $this->cart->total_items();



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

	public function add($id=9, $qty=3){

		$product_info = $this->cart_model->get_product_info($id);
		
		$product = array(
               'id'      => $product_info[0]['product_id'],
               'qty'     => $qty,
               'price'   => $product_info[0]['price'],
               'name'    => $product_info[0]['title'],
               'image' => $product_info[0]['image']
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

			$data[] = array_merge(array('rowid' => $key, 'qty' => $value ));
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



}