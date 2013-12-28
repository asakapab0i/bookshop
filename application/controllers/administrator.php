<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrator_model');
		$this->load->library('datatables');
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
		$this->datatables->select('*')->from('orders');
		$datatables = $this->datatables->generate();



		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('administrator/administrator_order_view');
		//Page Footer
		$this->load->view('template/footer');
	}

	public function datatables_orders(){
		$this->datatables->select('*')->from('orders');
		$datatables = $this->datatables->generate();
		echo $datatables;
	}

}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */