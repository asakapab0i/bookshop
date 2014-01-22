<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('search_model');
	}

	public function index()
	{
		$search_term = $this->input->post('search');
		$search['search_result'] = $this->search_model->search_query($search_term);
		$search['term'];

		//Prepare Header Data
		$header['page_title'] = 'Search Book | '.$search.'';
		
		//Navigation
		$navigation['page_cur_nav'] = 'search';


		//Page Header
		$this->parser->parse('template/header', $header);
		//Page Nav
		$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->parser->parse('search/search_view', $search);
		//Page Footer
		$this->load->view('template/footer');
	}

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */