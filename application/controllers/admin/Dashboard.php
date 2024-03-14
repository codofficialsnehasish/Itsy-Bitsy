<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
	//	$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="dashboardCss";
		$header['title']='Dashboard';
		$this->load->view('admin/partials/header',$header);
		//	$data['allitems']=$this->select->select_table('payment_details','id','desc',0,10);
		//	print_r($data['allitems']);die;
		$date = date('Y-m-d');
		$data['today_visitor'] = get_visitor_count($date);
		$date = date('Y-m-d', strtotime('-1 day', strtotime(date("Y-m-d"))));
		$data['previous_visitor'] = get_visitor_count($date);
		$data['total_product'] = $this->select->product_count();
		$this->load->view('admin/dashboard',$data);
		$script['pagescript']='dashboardScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function home()
	{
		$header['pagecss']="dashboardCss";
		$header['title']='Dashboard';
		$this->load->view('admin/partials/header',$header);
		$this->load->view('admin/content');
		$script['pagescript']='dashboardScript';
		$this->load->view('admin/partials/footer',$script);
	}

	/**
     * Logout
     */
    public function logout()
    {
        if (!$this->auth_check) {
            redirect(admin_url());
        }
		if($this->auth_user->role == "admin"){
			$this->auth_model->logout();
          	redirect('/mdm');
		}else{
			$this->auth_model->logout();
			//   redirect('/mdm');
			redirect('');
		}
    }

	public function copytbl(){
		$this->load->library('bcrypt');
		$contents=$this->select->select_table('technician_details','tech_id ','asc');

		foreach($contents as $item){
			$technicianArray = array(
				'token' => generate_token(),
				'password' => $this->bcrypt->hash_password($item->mobile),
				'role' => 'technician',
				'technician_idno' => $item->technician_idno,
				'full_name' => $item->name,
				'address' => $item->addr,
				'dob' =>$item->dob,
				'phone_number' => $item->mobile,
				'email' => $item->email,
				'alt_mobile' => $item->alt_mobile,
				'aadhar' => $item->aadhar,
				'zip_code' => $item->pincode,
				'user_image' => $item->tech_photo,
				'state_code' => $item->state_code,
				'dist_code' => $item->dist_code,
				'taluk_code' => $item->taluk_code,
				'father_name' => $item->father_name,
				'mother_name' => $item->mother_name,
				'gender' => $item->sex,
				'qualification' => $item->qualification,
				'blood_group' => $item->blood_group,
				'religion_caste' => $item->religion_caste,
				'created_at' => $item->created_at,
				'modified_at' => $item->modify_on,
				'is_paid' => $item->is_paid,
				'paid_amount' => $item->paid_amount,
				'paid_on' => $item->paid_on,
				'subscribed_amount' => $item->subscribed_amount,
				'subscribed_amount_paid_on' => $item->subscribed_amount_paid_on,
				'package' => $item->package,
				'is_subscribed_amount_paid' => $item->is_subscribed_amount_paid,
				'subscribed_on' => $item->subscribed_on,
				'is_subscribed' => $item->is_subscribed,
				'is_registered' => $item->is_registered,
				'registered_on' => $item->registered_on,
				'expired_on' => $item->expired_on,
				'status' => $item->status
			);
			
			 $this->insert_model->insert_data($technicianArray,'users');
			//$this->edit_model->edit(array('tech_photo'=>$media_id),$content->tech_id,'tech_id','technician_details');
			//$data,$id,$field_id,$id1,$field_id1,$table
			//$this->edit_model->edit_multi($data,$content->state_id,'state_code',$content->dist_code,'dist_code','taluk_master');
		}

	}
    
    public function update_token(){
        $token=$this->input->post('token');
        $this->edit_model->edit(array('notification_token'=>$token),2,'id','users');
        echo 'success';
    }

}





?>