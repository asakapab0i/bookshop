<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('chat_model');

		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->is_logged_in()) {
			redirect("home");
		}
	}

	public function is_logged_in(){
		$login_session = $this->session->userdata('login');
		return $login_session["logged_in"];
	}


	public function index()
	{
		
	}

	public function messages(){
		//ajax request
		$order_id = $this->input->post('order_id');
		$result = $this->chat_model->get_messages_product($order_id);
		$haha = '';
		foreach ($result as $key => $value) {
			$data[] = $value;
			$haha .=  '<p><strong>'.$data[$key]['fname'].'</strong>: '.wordwrap($data[$key]['message'], 21, "<br/>",true).'<br/><span>sent on: '.$data[$key]['date'].'</span></p>';
		}

		echo $haha;
	}

	public function post_message(){
		$message = $this->input->post('message');
		$order_id = $this->input->post('order_id');
		$session = $this->session->userdata('login');
		$user_id = $session['id'];

		$data = array('user_id' => $user_id, 'message' => $message, 'order_id' => $order_id);

		$this->chat_model->insert_message($data);


	}

}

/* End of file chat.php */
/* Location: ./application/controllers/chat.php */