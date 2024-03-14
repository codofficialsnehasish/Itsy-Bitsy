<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Customers extends Core_Controller {
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
		$this->load->view('auth/customer',$data);
		$this->load->view('partials/footer',$data);
	}




	public function signup_process()
	{
		$response=array();
			$udata = array(
				'full_name' => $this->input->post('name'),
				'address' => $this->input->post('addr'),
				'email' => $this->input->post('email'),
				'zip_code' => $this->input->post('pincode'),
				'modified_at' => date('Y-m-d H:i:s'),
				'status' => 1
			);

			$user = $this->auth_model->get_user_by_mobile($this->input->post('mobile'));
			
			if(empty($this->input->post('otp_mobileReg'))){
				$this->session->set_flashdata('message', 'Please enter OTP');
				redirect($this->agent->referrer());
			}

			if($this->input->post('otp_mobileReg')!=$user->otp){
				$this->session->set_flashdata('message', 'OTP you entered is invalid');
				redirect($this->agent->referrer());
			}
			$insert =$this->edit_model->edit($udata,$user->id,'id','users');
			if($insert){
			// 	$enquiry = array(
			// 		'user_id'=>$user->id,
			// 		'user_role' => $this->input->post('user_role'),
			// 		'cat_id' => $this->input->post('cat_id'),
			// 		'msg' => $this->input->post('msg'),
			// 		'created_at' => date('Y-m-d H:i:s'),
			// 		'status' => 0
			// 	);
			// $this->insert_model->insert_data($enquiry,'enquiry');
			//	send_mail('Thanks To Signup',$udata['email'],'thankyou',$udata);
				$status=1; 
				$msg= 'Well done! Data Has been Sent successfully.';
			//	$this->session->set_flashdata('message', 'Message has been sent successfully');
				
					$user_data = array(
						'modesy_sess_user_id' => $user->id,
						'modesy_sess_user_email' => $user->email,
						'modesy_sess_user_role' => $user->role,
						'modesy_sess_logged_in' => true,
						'modesy_sess_app_key' => $this->config->item('app_key'),
						'user_token'   => $user->token
					);
				
				$this->session->set_userdata($user_data);
				redirect('enquiry');
				
				//redirect($this->agent->referrer());
				}else{
				$status=0;
				$msg= 'Error! Form Submission.';
				$this->session->set_flashdata('message', 'Error!');
				redirect($this->agent->referrer());
				}
				$response['status']=$status;
				$response['message']=$msg;
				echo json_encode($response);
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