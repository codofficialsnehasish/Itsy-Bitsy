<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dristributor extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='users';
		$this->view_path='admin/dristributor/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Dristributor';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_teamlead($this->table_name,'role','dristributor','is_approved',1);
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function visibility_status(){
		$id= $this->input->post('id');
		$this->edit_model->edit(array('status'=>1),$id,'id',$this->table_name);
		echo 'Lived Successfully';
	}
	
	public function update_process()
	{
		$id=$this->input->post('user_id', true);
			$data=array(
				'status'=>$this->input->post('status', true),
                'commission_rate'=>$this->input->post('commission_rate', true),
			);
			
			$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
	
	}



	public function details()
	{
		$id=$this->uri->segment(4);
		
		$header['pagecss']="contentCss";
		$header['title']='Dristributor';
		$this->load->view('admin/partials/header',$header);
		$items=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$items[0];
		$this->load->view($this->view_path.'details',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Dristributor';
		$this->load->view('admin/partials/header',$header);
		$sellerArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$sellerArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function updateProcess()
	{
	//	$id=$this->uri->segment(4);
		$id =	$this->input->post('id');
		$this->form_validation->set_rules('first_name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'first_name'=>$this->input->post('first_name', true),
				'last_name'=>$this->input->post('last_name', true),
				'full_name'=>$this->input->post('first_name', true).' '.$this->input->post('last_name', true),
				'email'=>$this->input->post('email', true),
				'status'=>$this->input->post('status', true),
				'phone_number'=>$this->input->post('phone_number', true),
				'alt_phone_number'=>$this->input->post('alt_phone_number', true),
				'address'=>$this->input->post('address', true),
				'zip_code'=>$this->input->post('zip_code', true),
				'police_station'=>$this->input->post('police_station', true),
				'shop_name'=>$this->input->post('shop_name', true),
				'shop_address'=>$this->input->post('shop_address', true),
				'shop_pin_code'=>$this->input->post('shop_pin_code', true),
				'shop_police_station'=>$this->input->post('shop_police_station', true),
				'pan_no'=>$this->input->post('pan_no', true),
				'gst_no'=>$this->input->post('gst_no', true),
				'trade_licence_no'=>$this->input->post('trade_license', true),
				'prefarable_zip_code'=>$this->input->post('prefer_pin', true)

			);

			if(is_uploaded_file($_FILES['pan_proof']['tmp_name'])) 
			{  
				$data['pan_proof']=$this->mediaupload->doUpload('pan_proof');
			}
			
			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}

			if(is_uploaded_file($_FILES['gst_proof']['tmp_name'])) 
			{  
				$data['gst_proof']=$this->mediaupload->doUpload('gst_proof');
			}

			if(is_uploaded_file($_FILES['trade_license_proof']['tmp_name'])) 
			{  
				$data['trade_licence_proof']=$this->mediaupload->doUpload('trade_license_proof');
			}


			$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function add_new(){
		$header['pagecss']="";
		$header['title']='Add Dristributor';
		$this->load->view('admin/partials/header',$header);
		$this->load->view($this->view_path.'add');
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function add_new_process()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('phone_number', 'Password', 'required|xss_clean|max_length[30]');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|xss_clean|max_length[30]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else if($this->input->post('password', true) != $this->input->post('confirm_password', true)){
			$this->session->set_flashdata('error', 'Confirm Password Not Matched');
			redirect($this->agent->referrer());
		}else if (!$this->auth_model->is_unique_email($this->input->post('email', true))) {
			$this->session->set_flashdata('error', 'E-Mail is Already Taken. Please Try with Different E-Mail');
			redirect($this->agent->referrer());
		}else if(!$this->auth_model->is_unique_phone_no($this->input->post('phone_number', true))){
			$this->session->set_flashdata('error', 'Phone No. Already Exists!');
			redirect($this->agent->referrer());
		}
		else{
			$data=array(
				'first_name'=>$this->input->post('first_name', true),
				'last_name'=>$this->input->post('last_name', true),
				'full_name'=>$this->input->post('first_name', true).' '.$this->input->post('last_name', true),
				'email'=>$this->input->post('email', true),
				'status'=>$this->input->post('status', true),
				'phone_number'=>$this->input->post('phone_number', true),
				'alt_phone_number'=>$this->input->post('alt_phone_number', true),
				'address'=>$this->input->post('address', true),
				'zip_code'=>$this->input->post('zip_code', true),
				'police_station'=>$this->input->post('police_station', true),
				'shop_name'=>$this->input->post('shop_name', true),
				'shop_address'=>$this->input->post('shop_address', true),
				'shop_pin_code'=>$this->input->post('shop_pin_code', true),
				'shop_police_station'=>$this->input->post('shop_police_station', true),
				'pan_no'=>$this->input->post('pan_no', true),
				'gst_no'=>$this->input->post('gst_no', true),
				'trade_licence_no'=>$this->input->post('trade_license', true),
				'prefarable_zip_code'=>$this->input->post('prefer_pin', true),
				'role'=>'dristributor',
				'is_approved'=>1,
				'password'=>$this->input->post('password', true)
			);
			$this->load->library('bcrypt');
			$user_name = remove_special_characters(strtolower($data['first_name']));
			$data["username"] = $user_name;
			$data['password'] = $this->bcrypt->hash_password($data['password']);
        	$data['role'] = $data['role'];
        	$data['user_type'] = 'admin_register';
        	$data["slug"] = $this->slug->create_unique_slug($data["username"], 'users','slug');
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$data['token'] = generate_token();

			if(is_uploaded_file($_FILES['pan_proof']['tmp_name'])) 
			{  
				$data['pan_proof']=$this->mediaupload->doUpload('pan_proof');
			}
			
			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}

			if(is_uploaded_file($_FILES['gst_proof']['tmp_name'])) 
			{  
				$data['gst_proof']=$this->mediaupload->doUpload('gst_proof');
			}

			if(is_uploaded_file($_FILES['trade_license_proof']['tmp_name'])) 
			{  
				$data['trade_licence_proof']=$this->mediaupload->doUpload('trade_license_proof');
			}


			// $update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			$user_id=$this->insert_model->insert_data($data,$this->table_name);
			if($user_id){
				$datas=array(
					'user_id'=>'dist/'.strtolower(remove_special_characters($this->input->post('first_name', true))).'/00'.$user_id
				);
				$update=$this->edit_model->edit($datas,$user_id,'id',$this->table_name);
				$this->session->set_flashdata('success', 'Data Inserted successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}

}
