<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Authentication extends Core_Controller {
	public function __construct()
    {
        parent::__construct();
	//	$this->is_logged_in();
		//$this->output->enable_profiler(TRUE);
		// $this->load->library('google');
		// $this->load->library('facebook');
		// $this->load->helper('cookie');
		$this->load->helper(array('cookie', 'url'));
    	//$this->table_name='membership_plan';
	}
	
	/**
	*ajax login 
	*/
	public function ajax_login_process(){
		$this->form_validation->set_rules('email', 'eMail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		} else {
			if ($this->auth_model->ajaxlogin()) {
		    	$user = $this->auth_model->get_user_by_email_or_username($this->input->post('email'));
				$status=1;
				// set_cookie('user_id',1,time() + (86400 * 30)); 
				$msg='Loggedin Successfully';
				//$this->auth_model->update_loginhistory($user->id);
			} else {
				$msg=$this->session->flashdata('error');
				$status=0;
			}
		}
		reset_flash_data();
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	// public function emailtest(){
	//     $this->email_template->testemail('debabrata.mondal0@gmail.com');
	// }

	public function login(){
		$this->isLoggedIn();
		$data[]="";
		$this->load->view('partials/header');
		$this->load->view('auth/login',$data);
		$this->load->view('partials/footer');
	}
	
		
	
	public function signup(){
		$this->isLoggedIn();
	//	$data['googleLoginURL'] = $this->google->loginURL();
		$this->load->view('partials/header');
		$this->load->view('auth/buyer/signup',$data);
		$this->load->view('partials/footer');
	}


	public function login_process(){
		//validate inputs
		$this->form_validation->set_rules('email', 'eMail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		} else {
			if ($this->auth_model->login()) {
				$this->session->set_flashdata('success', 'Login Successfully'); 
				redirect($this->agent->referrer());
				// redirect('');
			} else {
				//error
				$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}
		}
		
	}



	
	/////////////////Buyer register 
	public function reg_process(){
		//validate inputs
		$this->form_validation->set_rules('first_name', 'Name', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|xss_clean|max_length[30]');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');
		if ($this->form_validation->run() == false) {
			$msg = validation_errors();
			$status='errors';
			$this->session->set_flashdata('errors', $msg); 
			redirect($this->agent->referrer());
		} else {
			$email = $this->input->post('email', true);
			$phone = $this->input->post('phone_number', true);
			//is email unique
			if (!$this->auth_model->is_unique_email($email)) {
				$msg="eMail is Already Taken.Please Try with Different eMail Id";
				$status=0;
			}else if(!$this->auth_model->is_unique_phone_no($phone)){
				$msg="Phone No. Already Exists!";
				$status=0;
			}else{
				//register
				$user_id = $this->auth_model->register();
				if ($user_id) {
					$user = $this->auth_model->get_user($user_id);
					if (!empty($user)) {
						//update slug
						$this->auth_model->update_slug($user->id);
						if($this->auth_check){
							$this->session->set_flashdata('success', 'Application Submit, Waiting for approval'); 
							redirect($this->agent->referrer());
						}
						redirect('/login');
						$msg="Thank You for Registered With Us.We have Sent a Activation email Link Please Activate Your Account from Your eMail Only.";
						$status=1;
					}else{
						$status = 0;
						$msg = "Error!";
					}
				}else{
					//error
					$status = 0;
					$msg = "Error!";
				}
			}
		}
		// echo json_encode(array('status'=>$status,'msg'=>$msg));
		$this->session->set_flashdata(['status'=>$status,'msg'=>$msg]);
		redirect($this->agent->referrer());
	}

//////verify email
public function verify_email(){
	//validate inputs
		$email = $this->input->post('email', true);
		$otp = $this->input->post('otp', true);
			$user = $this->auth_model->get_user_by_email($email);
			if (!empty($user)) {
				$verify = $this->auth_model->verify_email($email, $otp);
				if(!empty($verify)){	
				   
					$this->db->update('users', array('email_status'=>1,'register_through'=>'email'), array('id' => $user->id));

					$edit=$this->edit_model->edit( array('email_status'=>1,'status'=>1),$user->id,'id','users');
					$msg="Thank You for Registered With Us.";
					$status=1;
					//$user = $this->get_user_by_email($email);
					if(!empty($user)){
						$user_data = array(
						'modesy_sess_user_id' => $user->id,
						'modesy_sess_user_email' => $user->email,
						'modesy_sess_user_role' => $user->role,
						'modesy_sess_logged_in' => true,
						'modesy_sess_app_key' => $this->config->item('app_key'),
						'user_token'   => $token
					);
					if($this->session->userdata('user_token')!=''){
						$this->edit_model->edit( array('token'=>$this->session->userdata('user_token')),$user->id,'id','users');
						//$token = $this->session->userdata('user_token');
						}else{
						$user_data['user_token'] = $user->token;
						}

					$this->session->set_userdata($user_data);
					$this->auth_model->moveAnswer($user->id);
					}
				}else{
					$status = 0;
					$msg = "Invalid OTP or eMail!";
				}
			}else{
					$status = 0;
					$msg = "Invalid eMail!";
			  }
	echo json_encode(array('flag'=>$status,'msg'=>$msg));
}




	
	public function change_password(){
		$result=$this->auth_model->change_password($this->auth_user->id);
		echo json_encode($result);
	}

////////////////14/11/22
public function update_process(){
	$userData=array(
		'first_name'=>$this->input->post('first_name',true),
		'middle_name'=>$this->input->post('middle_name',true),
		'last_name'=>$this->input->post('last_name',true),
		//'phone_number'=>$this->input->post('phone_number',true),
		'nationality'=>$this->input->post('nationality',true),
		'gender'=>$this->input->post('gender',true),
		//'email'=>$this->input->post('email',true),
		'dob'=>$this->input->post('dob',true),
		'city'=>$this->input->post('city',true),
		// 'nationality'=>$this->input->post('nationality',true),
		// 'nationality'=>$this->input->post('nationality',true),
	);
	if($this->auth_user->register_through!='email'){
		$userData['email']=$this->input->post('email',true);
	}
	if($this->auth_user->register_through!='mobile'){
		$userData['phone_number']=$this->input->post('phone_number',true);
	}

	$edit=$this->edit_model->edit($userData,$this->auth_user->id,'id','users');
	if($edit){
		$this->session->set_flashdata('success', 'Updated Successfully.');
		redirect($this->agent->referrer());
	}

}

public function forgot_password(){
	$this->isLoggedIn();
	$data[]="";
	$this->load->view('partials/header');
	$this->load->view('auth/forget_password',$data);
	$this->load->view('partials/footer');
}
		
/////////////13/05/2022
  /**
     * Forgot Password Post
     */

    public function forgot_password_post()
    {
        //check auth
        if ($this->auth_check) {
            redirect($this->agent->referrer());
        }

        $email = $this->input->post('email', true);
        //get user
        $user = $this->auth_model->get_user_by_email_or_username($email);
		// print_r($user);
		$data['user'] = $user;

        // if user not exists
        if (empty($user)) {
            // $this->session->set_flashdata('forgotemailstatus', html_escape('eerror'));
            // $this->session->set_flashdata('forgotemailerror', html_escape('eMail id is not registered with us'));
			$this->session->set_flashdata('error', 'E-Mail ID is Not Registered With Us!');
            redirect($this->agent->referrer());
        } else {
            $this->load->view('partials/header');
			$this->load->view('auth/make_forget_password',$data);
			$this->load->view('partials/footer');
        }
    }

    /**
     * Reset Password
     */
    public function reset_password()
    {
        //check if logged in
        if ($this->auth_check) {
            redirect(base_url());
        }

        $data['title'] = 'Reset Password';
        $token = $this->input->get('token', true);
        //get user
        $data["user"] = $this->auth_model->get_user_by_token($token);
        $data["success"] = $this->session->flashdata('success');

        if (empty($data["user"]) && empty($data["success"])) {
            redirect(base_url());
        }

        $this->load->view('partials/header', $data);
        $this->load->view('template/auth/reset_password');
        $this->load->view('partials/footer');
    }

    /**
     * Reset Password Post
     */
    public function reset_password_post()
    {
        // $success = $this->input->post('success', true);
        // if ($success == 1) {
        //     redirect(base_url());
        // }

        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[4]|max_length[50]');
        // $this->form_validation->set_rules('password_confirm', 'Confirm Password Not Match!', 'required|xss_clean|matches[password]');

        if ($this->form_validation->run() == false) {
            $inputArray=array('password'=>$this->input->post('password', true),'password'=>$this->input->post('password_confirm', true));
           // $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('passerror', form_error('password'));
            // $this->session->set_flashdata('cpasserror', form_error('password_confirm'));
            $this->session->set_flashdata('form_data', $inputArray);
            redirect($this->agent->referrer());
        } else {
            $token = $this->input->post('token', true);
            $user = $this->auth_model->get_user_by_token($token);
            if (!empty($user)) {
                if ($this->auth_model->reset_password($user->id)) {
                    // $this->session->set_flashdata('success', 'New Password Has Been Set Successfully');
                    // redirect($this->agent->referrer());
					redirect('/login');
                }else{
					$this->session->set_flashdata('error', 'Error.');
					redirect($this->agent->referrer());
				}
            }
        }
    }

	////////////////////get mobile otp
	public function getMobileOtp(){
		$mobile = $this->input->post('mobile_no');
			if (empty($mobile)) {
				$msg="Please Provide Valid Mobile No.";
				$status=0;
			} else {
				$user = $this->auth_model->get_user_by_mobile($mobile);
				if (!empty($user)) {
				    if($this->auth_model->otpCountByUser($user->id)<5){
    					// Generate OTP
    					$otp = $this->generate_otp();
    					$edit=$this->edit_model->edit(array('otp'=>$otp,'otp_created_at'=>date('Y-m-d H:i:s')),$user->id,'id','users');
    					$msg = 'Dear User, use this One Time Password '.$otp.' to verify your mobile number. This OTP will be valid for the next 10 mins. ANANDU TRADERS (AKDTS)';
    					send_sms($mobile,$msg);
    					$this->auth_model->userotpInsert($user->id,$mobile);
    					$msg = "An OTP has been sent to your registered mobile";
    					$status=1;
				    }else{
				        
				        if($this->check24Hrs($user->id)==true ){
				        $this->auth_model->deletepreviousOtpcount($user->id);
				       // Generate OTP
    					$otp = $this->generate_otp();
    					$edit=$this->edit_model->edit(array('otp'=>$otp,'otp_created_at'=>date('Y-m-d H:i:s')),$user->id,'id','users');
    					$msg = 'Dear User, use this One Time Password '.$otp.' to verify your mobile number. This OTP will be valid for the next 10 mins. ANANDU TRADERS (AKDTS)';
    					send_sms($mobile,$msg);
    					
    					$this->auth_model->userotpInsert($user->id,$mobile);
    					$msg = "An OTP has been sent to your registered mobile";
    					$status=1;
				        }else{
				          	$status = 2;
				        	$msg = $this->otpUnlock($this->auth_model->lsatOtpTime($user->id));  
				        }
				    }
					
					}else{
						$status = 0;
						$msg = "Sorry your mobile no. is not resistered with us.";
				  }
			}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}



//////verify mobile
public function verify_mobile(){
	//validate inputs
		$mobile = $this->input->post('mobile', true);
		$otp = $this->input->post('otp', true);
			$user = $this->auth_model->get_user_by_mobile($mobile);
			if (!empty($user)) {
				$verify = $this->auth_model->verify_mobile($mobile, $otp);
				if(!empty($verify)){	
				   if($user->status==1){
				//	$this->db->update('users', array('email_status'=>1,'register_through'=>'email'), array('id' => $user->id));
                    //,'status'=>1
					$edit=$this->edit_model->edit( array('phone_status'=>1),$user->id,'id','users');
					$msg="Logedin Successfully";
					$status=1;
					
					//$user = $this->get_user_by_email($email);
					if(!empty($user)){
						$user_data = array(
						'modesy_sess_user_id' => $user->id,
						'modesy_sess_user_email' => $user->email,
						'modesy_sess_user_role' => $user->role,
						'modesy_sess_logged_in' => true,
						'modesy_sess_app_key' => $this->config->item('app_key')
						//'user_token'   => $token
					);
					    
					//  $this->auth_model->update_loginhistory($user->id);  
				
					$this->session->set_userdata($user_data);
				//	$this->auth_model->moveAnswer($user->id);
					}
				  }elseif($user->status==2){
					$msg="Your Account has been Deleted";
					$status=0;
				  }else{
					$msg="Your Account is not Active";
					$status=0;
				  }
				}else{
				   // $token =	$this->session->userdata('user_token');
					$status = 0;
					$msg = "Invalid OTP or Mobile No.!";
				}
			}else{
					$status = 0;
					$msg = "Invalid Mobile No.!";
			  }
	echo json_encode(array('flag'=>$status,'user_role'=>$user->role,'login_type'=>$login_type,'msg'=>$msg,'token'=>$this->session->userdata('user_token')));
	
}





/////////////////////////////////////register with mobile
public function getMobileOtpReg(){
	//validate inputs
	$mobile_no = $this->input->post('phone_number', true);
		if (empty($mobile_no)) {
			$msg="Please Provide Valid Mobile No.";
			$status=0;
		} else {
		//is email unique
		if (!$this->auth_model->is_unique_phone_no($mobile_no)) {
			
			if($this->input->post('resend_otp')==1){
				$user = $this->auth_model->get_user_by_mobile($mobile_no);
				if($this->auth_model->otpCountByUser($user->id)<5){
				 ///generate otp
				$otp = $this->generate_otp();
				$edit=$this->edit_model->edit(array('otp'=>$otp,'phone_number'=>$mobile_no,'otp_created_at'=>date('Y-m-d H:i:s')),$mobile_no,'phone_number','users');
				$msg = 'Dear User, use this One Time Password '.$otp.' to verify your mobile number. This OTP will be valid for the next 10 mins. ANANDU TRADERS (AKDTS)';
				send_sms($mobile_no,$msg);
				
				$this->auth_model->userotpInsert($user->id,$mobile_no);
				$msg = "An OTP has been sent to your registered Mobile No.";
				$status=1;
				}else{
				   if($this->check24Hrs($user->id)==true){  
				   $this->auth_model->deletepreviousOtpcount($user->id);    
				///generate otp
				   $otp = $this->generate_otp();
				$edit=$this->edit_model->edit(array('otp'=>$otp,'phone_number'=>$mobile_no,'otp_created_at'=>date('Y-m-d H:i:s')),$mobile_no,'phone_number','users');
				$msg = 'Dear User, use this One Time Password '.$otp.' to verify your mobile number. This OTP will be valid for the next 10 mins. ANANDU TRADERS (AKDTS)';
				send_sms($mobile_no,$msg);
				
				$this->auth_model->userotpInsert($user->id,$mobile_no);
				$msg = "An OTP has been sent to your registered Mobile No.";
				$status=1;
				   }else{
					$status = 2;
					  $msg = $this->otpUnlock($this->auth_model->lsatOtpTime($user->id));
				   }
				}
			}	
			
	// 			else if($this->input->post('customer')==1){
	// 				$user = $this->auth_model->get_user_by_mobile($mobile_no);
	// 				if($this->auth_model->otpCountByUser($user->id)<5){
	// 				 ///generate otp
	// 				$otp = $this->generate_otp();
	// 				$edit=$this->edit_model->edit(array('otp'=>$otp,'phone_number'=>$mobile_no,'otp_created_at'=>date('Y-m-d H:i:s')),$mobile_no,'phone_number','users');
	// 				$msg = 'Dear User, use this One Time Password '.$otp.' to verify your mobile number. This OTP will be valid for the next 10 mins. ANANDU TRADERS (AKDTS)';
	// 				send_sms($mobile_no,$msg);
					
	// 				$this->auth_model->userotpInsert($user->id,$mobile_no);
	// 				$msg = "An OTP has been sent to your registered Mobile No.";
	// 				$status=1;
	// 				}else{
	// 				   if($this->check24Hrs($user->id)==true){  
	// 				   $this->auth_model->deletepreviousOtpcount($user->id);    
	// 				///generate otp
	// 				   $otp = $this->generate_otp();
	// 				$edit=$this->edit_model->edit(array('otp'=>$otp,'phone_number'=>$mobile_no,'otp_created_at'=>date('Y-m-d H:i:s')),$mobile_no,'phone_number','users');
	// 				$msg = 'Dear User, use this One Time Password '.$otp.' to verify your mobile number. This OTP will be valid for the next 10 mins. ANANDU TRADERS (AKDTS)';
	// 				send_sms($mobile_no,$msg);
					
	// 				$this->auth_model->userotpInsert($user->id,$mobile_no);
	// 				$msg = "An OTP has been sent to your registered Mobile No.";
	// 				$status=1;
	// 				   }
	// 				   else{
	// 					$status = 2;
	// 					  $msg = $this->otpUnlock($this->auth_model->lsatOtpTime($user->id));
	// 				   }
	// 				}
	// 			}

			
			else{
				$msg="Mobile number is already in use";
				$status=0;
			}

			
			// $msg="Mobile number is already in use";
			// $status=0;
			
			
		}else{
		//register
		$user_id = $this->auth_model->register();
		if ($user_id) {
			$user = $this->auth_model->get_user($user_id);
			if (!empty($user)) {
				//update slug
				$this->auth_model->update_slug($user->id);
			   
				if($this->auth_model->otp_count_by_user($user->id)>=5){
					$status = 2;
					  $msg = $this->otpUnlock($this->auth_model->lsatOtpTime($user->id));
					  }else{
					 if($this->check24Hrs($user->id)==true){
					 $this->auth_model->deletepreviousOtpcount($user->id);    
				// Generate OTP
					$otp = $this->generate_otp();
					$edit=$this->edit_model->edit(array('otp'=>$otp,'otp_created_at'=>date('Y-m-d H:i:s')),$user->id,'id','users');
					$msg = 'Hello, '.$otp.' is your OTP for sign up on Independent (INDPNT). For security purposes, this OTP is valid for 10 minutes only. Kindly do not share the OTP with anyone.';
					send_sms($mobile_no,$msg);
					//$user = $this->auth_model->get_user_by_mobile($mobile);
					$this->auth_model->userotpInsert($user->id,$mobile_no);

					//$this->auth_model->send_email_activation($user_id,$user->token);
					$msg = "An OTP has been sent to your registered Mobile No.";
					$status=1;
					 }else{
					$status = 2;
					  $msg = $this->otpUnlock($this->auth_model->lsatOtpTime($user->id));				        
					  }
				 }
				}else{
					$status = 0;
					$msg = "Error!";
			  }
			}else {
			//error
			$status = 0;
			$msg = "Error!";
		}
	}
}
	echo json_encode(array('status'=>$status,'msg'=>$msg));
}


//////verify mobile register
public function verify_mobileReg(){
//validate inputs
	$mobile = $this->input->post('mobile', true);
	$otp = $this->input->post('otp', true);
		$user = $this->auth_model->get_user_by_mobile($mobile);
		if (!empty($user)) {
			$verify = $this->auth_model->verify_mobile($mobile, $otp);
			if(!empty($verify)){	
			   
				$this->db->update('users', array('phone_status'=>1), array('id' => $user->id));

				$edit=$this->edit_model->edit( array('phone_status'=>1,'status'=>1),$user->id,'id','users');
				$msg="Mobile No. Verified Successfully";
				$status=1;
				//$user = $this->get_user_by_email($email);
				if(!empty($user)){
					$user_data = array(
					'modesy_sess_user_id' => $user->id,
					'modesy_sess_user_email' => $user->email,
					'modesy_sess_user_role' => $user->role,
					'modesy_sess_logged_in' => true,
					'modesy_sess_app_key' => $this->config->item('app_key')
				);
			
		//	$this->auth_model->update_loginhistory($user->id);
		   /////update user token
			
			//	$this->session->set_userdata($user_data);
				
					

				}
			}else{
				$status = 0;
				$msg = "Invalid OTP or Mobile No.!";
			}
		}else{
				$status = 0;
				$msg = "Invalid Mobile No.!";
		  }
echo json_encode(array('flag'=>$status,'msg'=>$msg,token=>$this->session->userdata('user_token')));

}


////////////////////////get state list
public function get_state_list(){
	//$consumer_type = $this->input->post('consumer_type');
	$conditions['tblName'] = 'location_states';
	$conditions['where'] = array('country_id'=>$this->input->post('country_id'));
	$conditions['is_visible'] = 1;
	$result = $this->select->select->getResult($conditions);
	echo json_encode($result);
}
////////////////////////get city list
public function get_city_list(){
	//$consumer_type = $this->input->post('consumer_type');
	$conditions['tblName'] = 'location_cities';
	$conditions['where'] = array('state_id'=>$this->input->post('state_id'));
	$conditions['is_visible'] = 1;
	$result = $this->select->select->getResult($conditions);
	echo json_encode($result);
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
public function check24Hrs($user_id){
	$input = $this->auth_model->lsatOtpTime($user_id);
	if(empty($input)){
	   return true;  
	}
	$plus_24hrs = DateTime::createFromFormat('Y-m-d H:i:s', $input)->modify('+24 hour');
	$unlockdate =$plus_24hrs->format('Y-m-d H:i:s');
	$remaining = DateTime::createFromFormat('U', time());
	$diff = $remaining->diff($plus_24hrs);
   if(date('Y-m-d H:i:s') > $unlockdate){
	   return true;
   }else{
	 return false;
   }
}

public function otpUnlock($date){
	$input = $date;
	if(empty($input)){
	   return true;  
	}
	$plus_24hrs = DateTime::createFromFormat('Y-m-d H:i:s', $input)->modify('+24 hour');
   // echo '+24hrs = ' . $plus_24hrs->format('Y-m-d H:i:s') . PHP_EOL;
	
	$remaining = DateTime::createFromFormat('U', time());
	$diff = $remaining->diff($plus_24hrs);
	return $plus_24hrs->format('Y-m-d H:i:s');
   // echo 'to go: ' . $diff->format('%hh %im %ss');
}


public function seller_profile_update(){
	// print_r($_FILES);
	$data=array(
		'first_name'=>$this->input->post('first_name', true),
		'last_name'=>$this->input->post('last_name', true),
		'full_name'=>$this->input->post('first_name', true).' '.$this->input->post('last_name', true),
		'email'=>$this->input->post('email', true),
		'phone_number'=>$this->input->post('phone_number', true),
		'address'=>$this->input->post('address', true),
		'country_id'=>$this->input->post('country_id', true),
		'state_id'=>$this->input->post('state_id', true),
		'city_id'=>$this->input->post('city_id', true),
		'zip_code'=>$this->input->post('zip_code', true),
	);

	if(is_uploaded_file($_FILES['profile_image']['tmp_name'])) 
	{  
		$data['user_image']=$this->mediaupload->doUpload('profile_image');
	}


	$update=$this->edit_model->edit($data,$this->auth_user->id,'id','users');
	if($update){
		$this->session->set_flashdata('success', 'Data has been updated successfully');
		redirect($this->agent->referrer());
	}else{
		$this->session->set_flashdata('errors', 'Query error');
		 redirect($this->agent->referrer());
	}
}



}