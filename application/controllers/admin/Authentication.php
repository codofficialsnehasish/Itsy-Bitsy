<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends Core_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->is_logged_in();
		//$this->output->enable_profiler(TRUE);
	}
	
	public function index()
	{
		$this->load->view('admin/auth/login');
	}

	public function test(){
		echo 'This Is for Testing.';
	}
	public function process(){
		//validate inputs
		$this->form_validation->set_rules('email', 'eMail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		} else {
			if ($this->auth_model->login()) {
				redirect(admin_url('dashboard'));
			} else {
				//error
				$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}
		}
		

	}

	/////ajax login process
	public function ajax_login_process(){
		
		//validate inputs
		$this->form_validation->set_rules('email', 'eMail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('form_data', $this->auth_model->input_values());
		//	redirect($this->agent->referrer());
		$msg="Login Error!";
		$status=0;
		} else {
			if ($this->auth_model->ajaxlogin()) {
				//redirect('my-dashboard');
				$status=1;
				$msg='Loggedin Successfully';
			} else {
				//error
			//	$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				//redirect($this->agent->referrer());
				$msg=$this->session->flashdata('error');
				$status=0;
			//	$msg='Invalid email/password';
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}
		

	}

	
}
