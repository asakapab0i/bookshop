<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrator_model');
		$this->load->library('datatables');


		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->_is_logged_in()) {
			redirect("home");
		}
	}

	private function _is_logged_in(){
		$login_session = $this->session->userdata('login');
		return $login_session["logged_in"];
	}

	public function index()
	{
		//Prepare Header Data
		$header['page_title'] = 'Administrator';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';

		//Main Content


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_dashboad_view');
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


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_book_view');
		//Page Footer
		$this->load->view('template/footer');

	}

	public function book_add(){
		//Prepare Header Data
		$header['page_title'] = 'Administrator | Book No ';
		
		//Navigation
		$navigation['page_cur_nav'] = 'dashboard';


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_book_add_view');
		//Page Footer
		$this->load->view('template/footer');

	}

	public function  book_add_validate(){

		$form_data = array('title' => $this->input->post('title'),
							'author' => $this->input->post('author'),
							'description' => $this->input->post('desc'),
							'publisher' => $this->input->post('publisher'),
							'format' => $this->input->post('format'),
							'isbn' => $this->input->post('isbn'),
							'category' => $this->input->post('category'),
							'price' => $this->input->post('price'),
							'product_qty' => $this->input->post('product_qty'),
							'image' => $this->input->post('image')
							);



		$this->form_validation->set_rules('title', 'Book Title', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
		$this->form_validation->set_rules('format', 'Format', 'trim|required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		$this->form_validation->set_rules('product_qty', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('image', 'Image', 'trim|required');



		if ($this->form_validation->run() == false) {
			
			$this->load->view('administrator/administrator_book_add_view_validation');
		}else{

			$this->administrator_model->insert_add_book($form_data);

			redirect('administrator/book/'.$product_id.' ');
		}



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