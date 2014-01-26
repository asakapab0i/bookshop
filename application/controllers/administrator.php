<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrator_model');
		$this->load->model('customer_model');
		$this->load->library('datatables');
		



		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if ($this->_is_logged_in() == false) {
			redirect('home');
		}
	}

	private function _is_logged_in(){
		$login_session = $this->session->userdata('login');
		
		if ($login_session['type'] == 'admin') {
			return true;
		}else{
			return false;
		}

	}

	public function index()
	{
		//Prepare Header Data
		$header['page_title'] = 'Administrator';
	
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$index['net_income'] = $this->administrator_model->get_net_income();
		$index['recent_books'] =  $this->administrator_model->get_recent_books();
		$index['recent_orders'] = $this->administrator_model->get_recent_orders();
 

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('administrator/administrator_dashboad_view', $index);
		//Page Footer
		$this->load->view('template/footer');
	}

	public function orders(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Orders';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_orders_view');
		//Page Footer
		$this->load->view('template/footer');
	}

	public function order($id){

		//Prepare Header Data
		$header['page_title'] = 'Administrator | Order No: ' . $id;
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$order['id'] = $id;
		$order['order_data'] = $this->administrator_model->get_order($id);

		$order['order_cart_contents'] = $this->customer_model->get_order_cart_contents($id);
		$order['total'] = $this->customer_model->get_order_cart_total($id);
		$order['message_box'] = $this->administrator_model->get_messages($id);



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('administrator/administrator_order_view', $order);
		//Page Footer
		$this->load->view('template/footer');
	}

	public function shipments(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Shipments';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		//$order['id'] = $id;
		//$order['order_data'] = $this->administrator_model->get_order($id);


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_shipments_view');
		//Page Footer
		$this->load->view('template/footer');
	}

	public function shipment($shipment_id){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Shipments No '.$shipment_id.' ';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content
		$shipment['shipment_data'] = $this->administrator_model->get_shipment($shipment_id);

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('administrator/administrator_shipment_view', $shipment);
		//Page Footer
		$this->load->view('template/footer');
	}

	public function books(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Books';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_books_view');
		//Page Footer
		$this->load->view('template/footer');
	}

	public function book($id){

		//Prepare Header Data
		$header['page_title'] = 'Administrator | Book No '.$id.' ';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		$book['book_info'] = $this->administrator_model->get_book_by_id($id);
		$book['categories'] = $this->administrator_model->get_category();


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('administrator/administrator_book_edit_view', $book);
		//Page Footer
		$this->load->view('template/footer');

	}

	public function book_add(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Book No ';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		$book_add['category'] = $this->administrator_model->get_category();

		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('administrator/administrator_book_add_view', $book_add);
		//Page Footer
		$this->load->view('template/footer');

	}

	public function  book_add_validate(){

	
		$this->form_validation->set_rules('title', 'Book Title', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
		$this->form_validation->set_rules('format', 'Format', 'trim|required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|integer|callback_check_number');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|integer|callback_check_number');

		if (empty($_FILES['userfile']['name']))
		{
		    $this->form_validation->set_rules('userfile', 'Image', 'required');
		}

		//do an upload first before inserting the whole data

			$config['file_name'] = $this->input->post('title');
			$config['upload_path'] = './assets/img/books_image/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';

			
			$this->load->library('upload', $config);

		



		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());	
			var_dump($error);
			die();	
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}


$product_id = rand(100, 9999);
$product_id = 'SKU'.$product_id; 

$form_data = array('title' => $this->input->post('title'),
							'author' => $this->input->post('author'),
							'description' => $this->input->post('description'),
							'publisher' => $this->input->post('publisher'),
							'format' => $this->input->post('format'),
							'isbn' => $this->input->post('isbn'),
							'dateadd' => date('Y-m-d'),
							'category' => $this->input->post('category'),
							'price' => $this->input->post('price'),
							'product_id' => $product_id,
							'product_qty' => $this->input->post('quantity'),
							'image' => $data['upload_data']['file_name'],
							'product_url' => url_title($this->input->post('title'))
							);





		if ($this->form_validation->run() == False) {
			// var_dump(validation_errors());
			// die();
			redirect('administrator/book_add');
		}else{
			$this->session->set_flashdata('add_success', 'Book Successfully Added!');
			$this->administrator_model->insert_add_book($form_data);
			redirect('administrator/book_add');
		}



	}


	public function check_number($number){

		if ($number > 0) {
			return TRUE;
		}else{
			$this->form_validation->set_message('check_number', 'This field should not be negative.');
			return False;
		}

	}


	public function book_edit($id){

		$this->form_validation->set_rules('title', 'Book Title', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
		$this->form_validation->set_rules('format', 'Format', 'trim|required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|callback_check_number');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|callback_check_number');



		$form_data = array('title' => $this->input->post('title'),
							'author' => $this->input->post('author'),
							'description' => $this->input->post('description'),
							'publisher' => $this->input->post('publisher'),
							'format' => $this->input->post('format'),
							'isbn' => $this->input->post('isbn'),
							'dateadd' => date('Y-m-d'),
							'category' => $this->input->post('category'),
							'price' => $this->input->post('price'),
							'product_qty' => $this->input->post('quantity'),
							'product_url' => url_title($this->input->post('title'))
							);







		if ($this->form_validation->run() == False) {

			$this->session->set_flashdata('edit_error', 'There is an error on the form field.');
			 // var_dump(validation_errors());
			 // die();
			redirect('administrator/book/'.$id.'');
		}else{
			$this->session->set_flashdata('edit_success', 'Book Successfully Edited!');
			$this->administrator_model->update_book($form_data,$id);
			redirect('administrator/book/'.$id.'');
		}



	}

	public function category_add(){

		//Prepare Header Data
		$header['page_title'] = 'Administrator | Add Category';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_category_add_view');
		//Page Footer
		$this->load->view('template/footer');

	}




	public function category_add_validate(){

		$this->form_validation->set_rules('category', 'Category Name', 'trim|required|is_unique[category.name]');
		$form_data = array('name' => $this->input->post('category'));

		if ($this->form_validation->run() == FALSE) {
			redirect('administrator/category_add');
		}else{
			$this->session->set_flashdata('category_success', 'Category Successfully Added!');
			$this->administrator_model->insert_add_category($form_data);
			redirect('administrator/category_add');
		}

	}

	public function settings(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Settings';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_settings_view');
		//Page Footer
		$this->load->view('template/footer');

	}

	public function datatables_orders(){
		$this->datatables->select('order_id,order_total, dateadd, lname,order_status')->from('orders')->join('users', 'users.id = orders.user_id');
		$datatables = $this->datatables->generate();
		echo $datatables;
	}

	public function datatables_shipments(){
		$this->datatables->select('shipment_id, shipment_date,order_total, dateadd, lname,order_status')->from('shipments')->join('orders', 'shipments.order_id = orders.order_id')->join('users', 'users.id = orders.user_id');
		$datatables = $this->datatables->generate();
		echo $datatables;
	}

	public function datatables_books(){
		$this
		->datatables
		->select('product_id, title, author, category, product_qty, price, dateadd')
		->from('books');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;

	}


}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */