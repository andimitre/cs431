<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
    	$this->load->helper('url');
    	$this->load->library('session');
    	$this->load->model('User');
    }
	

	public function index()
	{	
		$data = array();
		if($this->session->userdata('error')){
			$data['error'] = $this->session->userdata('error');
			$this->session->unset_userdata('error');
		} else {
			$data['error'] = false;
		}
		if($this->session->userdata('success')){
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
		} else {
			$data['success'] = false;
		}
		$this->load->view('login', $data);
	}

	public function check_session(){
		if(!$this->session->userdata("user")){
			$this->session->set_userdata(array('error' => "You must be logged in to view this page!"));
			redirect('/', 'refresh');
		};
	}

	public function login(){
		if($this->input->post()){
			$user = $this->User->login($this->input->post());
			if($user){
				$ucid = $user['ucid'];
				$this->session->set_userdata(array('user' => $user));
				redirect("/welcome/dashboard/$ucid", 'refresh');
			} else {
				$this->session->set_userdata(array('error' => "Please Register Before logging in"));
				redirect('/', 'refresh');
			}

		}
	}

	public function register(){
		if($this->input->post()){
			$this->load->model('User');
			$user_id = $this->User->register($this->input->post());
			if($user_id){
				$this->session->set_userdata(array('success' => "Successfully Registered! Please log in"));
				redirect('/', 'refresh');
			} else {
				echo "fail";
			}
		}
	}

	public function dashboard($ucid){
		$this->check_session();
		$data['user'] = $this->User->get($ucid);
		$this->load->view('dashboard', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');

	}
}
