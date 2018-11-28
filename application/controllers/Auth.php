<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		   $this->load->library('form_validation');

		   $this->form_validation->set_rules('username', 'Username', 'trim|required');
		   $this->form_validation->set_rules('password', 'Password', 'trim|required');

		    if( $this->session->userdata('isLoggedIn') ) {
				redirect('profil');
			} else {
				redirect('login');
			}
	}


	function show_login( $show_error = false ) {
		$data['error'] = $show_error;

		$this->load->helper('form');
		$this->load->view('login',$data);
	}

	public function login()
	{
		$this->load->model('User');
		$email = $this->input->post('username');
		$pass  = $this->input->post('password');
		$level = $this->input->post('level');
		if( $email && $pass && $level && $this->User->validate_user($email,$pass,$level)) {
			$result = array(
				'success' => true,
				'message' => "Welcome to Proyecto."
			);
		  } else {
			$result = array(
				'success' => false,
				'message' => "User or Password not matchxxx."
			);
		  }
		  echo json_encode($result);
    }


        public function logout()
	{
			$this->session->unset_userdata('isLoggedIn');
			$this->session->unset_userdata('username');
            redirect('auth');
	}


}
