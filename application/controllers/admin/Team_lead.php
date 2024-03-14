<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_lead extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='users';
		$this->view_path='admin/team_lead/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Team Lead';
		$this->load->view('admin/partials/header',$header);
		// $data['allitems']=$this->select->select_single_data($this->table_name,'role','teamlead');
		$data['allitems']=$this->select->select_teamlead($this->table_name,'role','teamlead','is_approved',1);
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

    public function request(){
        $header['pagecss']="contentCss";
		$header['title']='Team Lead Request';
		$this->load->view('admin/partials/header',$header);
		// $data['allitems']=$this->select->select_single_data($this->table_name,'role','teamlead');
		$data['allitems']=$this->select->select_teamlead_data($this->table_name);

		$this->load->view($this->view_path.'team_lead_request',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
    }

	public function request_approve(){
		$id=$this->uri->segment(4);
		$res = $this->edit_model->edit(array('is_approved'=>1),$id,'id',$this->table_name);
		if($res){
			$this->session->set_flashdata('success', 'Requested Approved');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			 redirect($this->agent->referrer());
		}
	}

	public function request_remove(){
		$id=$this->uri->segment(4);
		$res = $this->delete_model->delete($this->table_name,'id',$id);
		if($res){
			$this->session->set_flashdata('success', 'Requested Removed');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			 redirect($this->agent->referrer());
		}
	}

	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
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
		$header['title']='Team Lead';
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
		$header['title']='Edit seller';
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
			$this->session->set_flashdata('errors', validation_errors());
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
				'address'=>$this->input->post('address', true),
				// 'shop_name'=>$this->input->post('shop_name', true),
				'pan_no'=>$this->input->post('pan_no', true),
				'aadhar_no'=>$this->input->post('aadhar_no', true),
				'zip_code'=>$this->input->post('zip_code', true),

			);

			if(is_uploaded_file($_FILES['pan_proof']['tmp_name'])) 
			{  
				$data['pan_proof']=$this->mediaupload->doUpload('pan_proof');
			}

			if(is_uploaded_file($_FILES['aadhar_proof']['tmp_name'])) 
			{  
				$data['aadhar_proof']=$this->mediaupload->doUpload('aadhar_proof');
			}

			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}


			$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
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

	public function team_lead_process()
	{
	//	$id=$this->uri->segment(4);
		$id =	$this->input->post('id');
		$this->form_validation->set_rules('first_name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
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
				'address'=>$this->input->post('address', true),
				// 'shop_name'=>$this->input->post('shop_name', true),
				'pan_no'=>$this->input->post('pan_no', true),
				'aadhar_no'=>$this->input->post('aadhar_no', true),
				'zip_code'=>$this->input->post('zip_code', true),
				'role'=>'teamlead',
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

			if(is_uploaded_file($_FILES['aadhar_proof']['tmp_name'])) 
			{  
				$data['aadhar_proof']=$this->mediaupload->doUpload('aadhar_proof');
			}

			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}

			// $update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			$insert=$this->insert_model->insert_data($data,$this->table_name);
			if($insert){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

}
