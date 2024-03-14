<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Retailers extends Core_Controller {
	public function __construct()
    {
        parent::__construct();
	//	$this->is_logged_in();
		//$this->output->enable_profiler(TRUE);
		// $this->load->library('google');
		// $this->load->library('facebook');
    	//$this->table_name='membership_plan';
	}
	
	
	public function emailtest(){
	    $this->email_template->testemail('debabrata.mondal0@gmail.com');
	}

	public function login(){
		$this->isLoggedIn();
		$this->load->view('auth/login',$data);
	}
	
		
	
	public function signup(){
		$this->isLoggedIn();
		$this->load->view('partials/header',$data);
		$this->load->view('auth/retailers',$data);
		$this->load->view('partials/footer',$data);
	}





	
	
	
///generate otp
public function generate_otp() {
		$OTP 	=	rand(1,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		return $OTP;
}
	
}