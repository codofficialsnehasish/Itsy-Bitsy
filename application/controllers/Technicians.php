<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Technicians extends Core_Controller {
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
		$data['category']=$this->select->select_table('category','id','asc');
		$data['allstates']=$this->select->select_table('location_states','name','asc');
		$data['qualification']=$this->select->select_table("qualification_master","quli_id","asc");		
		$this->load->view('partials/header',$data);
		$this->load->view('auth/technician',$data);
		$this->load->view('partials/footer',$data);
	}



	public function signup_process()
	{
			$response=array();
	   if(checkduplicate_technician($this->input->post('aadhar'))==true){
		if(!empty($this->input->post('service_pincode'))){
			$service_area_pin=array_filter($this->input->post('service_pincode'));
		}
		
			$udata = array(
				//'token' => generate_token(),
				//'role' => 'technician',
				'full_name' => $this->input->post('name'),
				'address' => $this->input->post('addr'),
				//'phone_number' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'alt_mobile' => $this->input->post('alt_mobile'),
				'aadhar' => $this->input->post('aadhar'),
				'zip_code' => $this->input->post('pincode'),
				'state_code' => $this->input->post('state_code'),
				'dist_code' => $this->input->post('dist_code'),
				'taluk_code' => $this->input->post('taluk_code'),
				'father_name' => $this->input->post('father_name'),
				'mother_name' => $this->input->post('mother_name'),
				'gender' => $this->input->post('sex'),
				'qualification' => $this->input->post('qualification'),
				'blood_group' => $this->input->post('blood_group'),
				'religion_caste' => $this->input->post('religion_caste'),
				//'created_at' => date('Y-m-d H:i:s'),
				'modified_at' => date('Y-m-d H:i:s'),
				'status' => 1
			);

			if($this->input->post('dob')!=''){ 
			$dob_date=date_create($this->input->post('dob'));
			$dob=date_format($dob_date,'Y-m-d');
			}
			$udata['dob'] = $dob;
			if(is_uploaded_file($_FILES['photo']['tmp_name'])) 
			{  
				$udata['user_image']=$this->mediaupload->doUpload('photo');
			}else{
				$udata['user_image']=0;
			}

			//$udata['profile_completed'] = 1;
			//$insert_id=$this->insert_model->insert_data($udata,'users');
			$user = $this->auth_model->get_user_by_mobile($this->input->post('mobile'));
			//echo 'Mobile= '.$this->input->post('mobile');
			//print_r($user);die;

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
				$tech_id=generate_technician_id($user->id);
				 $this->edit_model->edit(array('technician_idno'=>$tech_id),$user->id,'id','users');

				foreach($service_area_pin as $pin){
					$this->insert_model->insert_data(array('user_id'=>$user->id,'pincode'=>$pin),'serving_area_pincode');
				}
				
				if(!empty($this->input->post('cat_id'))){
					foreach($this->input->post('cat_id') as $servicecat){
						$this->insert_model->insert_data(array('user_id'=>$user->id,'cat_id'=>$servicecat),'service_categories');
					}
				}

				//$status=1;
			//	$msg= 'Well done! Data Has been Sent successfully.';
		    //	 $this->create_login($insert_id);
			//	send_mail('Thanks To Signup',$udata['email'],'thankyou',$udata);
				$status=1; 
				$msg= 'Well done! Data Has been Sent successfully.';
				$this->session->set_flashdata('message', 'Well done! Data Has been Sent successfully.');
				
				$user_data = array(
						'modesy_sess_user_id' => $user->id,
						'modesy_sess_user_email' => $user->email,
						'modesy_sess_user_role' => $user->role,
						'modesy_sess_logged_in' => true,
						'modesy_sess_app_key' => $this->config->item('app_key'),
						'user_token'   => $user->token
					);
				
				$this->session->set_userdata($user_data);
				//	$msgtxt = 'Congratulations! You have been successfully Registered with us. Kindly Pay the Subscription fees to avail our services. Ignore if Paid! Anandu Trader (AITS)';
    		    //	send_sms($user->phone_number,$msgtxt);
				redirect('my-dashboard');
		    	//redirect($this->agent->referrer());
				}else{
				$status=0;
				$msg= 'Error! Form Submission.';
				$this->session->set_flashdata('message', 'Error! Form Submission.');
				redirect($this->agent->referrer());
				}
			
			}else{
				$status=0;
				$msg= 'Sorry! The Aadhar No. You have Given is Already Exists!';
				$this->session->set_flashdata('message', 'Sorry! The Aadhar No. You have Given is Already Exists!');
				redirect($this->agent->referrer());
			}

				$response['status']=$status;
				$response['message']=$msg;
				//echo json_encode($response);
	}


	public function get_district(){
		//echo 'hello';
		$state_id=$this->input->post('state_id');
		//echo $state_id;
		$result=$this->select->select_single_data('location_districts','state_id',$state_id);
		echo '<option value="">Choose District</option>';
		foreach($result as $r){
			echo '<option value="'.$r->dist_code.'">'.$r->name.'</option>';
		}
		
	}
		public function get_taluk(){
		//echo 'hello';
		$state_code=$this->input->post('state_id');
		$dist_code=$this->input->post('dist_id');
		
		 $conditions['tblName']='taluk_master';
		 $conditions['where']=array('state_code'=>$state_code,'dist_code'=>$dist_code);
		 $conditions['returnType']="";
		 $conditions['order_by'] = "taluk_code DESC";
	  	 $result=$this->select->getResult($conditions);
		echo '<option value="">Choose Taluk</option>';
		foreach($result as $r){
			echo '<option value="'.$r->taluk_id.'">'.$r->taluk_name.'</option>';
		}
		
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