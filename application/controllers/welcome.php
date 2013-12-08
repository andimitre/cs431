<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function login(){
		if($this->input->post()){
			$this->load->model('User');
			$is_user_logged_in = $this->User->login($this->input->post());

			if($is_user_logged_in){
				echo "login";
			} else {
				echo "fail";
			}

		}
	}

	public function register(){
		if($this->input->post()){
			$this->load->model('User');
			$is_user_logged_in = $this->User->register($this->input->post());
			if($is_user_logged_in){
				echo "login";
			} else {
				echo "fail";
			}
		}
	}

	public function dashboard(){
		$this->load->view('dashboard');
	}
}
