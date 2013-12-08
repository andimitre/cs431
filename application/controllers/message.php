<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message extends CI_Controller {

	public function __construct() {
        parent::__construct();
    	$this->load->helper('url');
    	$this->load->library('session');
    	$this->load->model('Wall_message');
    }

    public function send(){
    	if($this->input->post()){
    		$this->Wall_message->send($this->input->post());
    	}
    	$user_id = $this->input->post('receiver_id');

		redirect("/welcome/dashboard/$user_id", 'refresh');
    }
	
}
