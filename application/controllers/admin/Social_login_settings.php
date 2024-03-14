<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_login_settings extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->general_setting='general_settings';
		$this->setting='settings';
		$this->email_content='email_content';
		$this->view_path='admin/settings/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="";
		$header['title']='General Settings';
		$this->load->view('admin/partials/header',$header);
		$allitems=$this->select->select_table($this->general_setting,'id','asc');
		$data['item']=$allitems[0];
		$this->load->view($this->view_path.'google_login_settings',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}
	
	
	///////////////
		/////////////////////////////
		public function google_process(){
			$id=$this->uri->segment(4);
			$data=array(
				'google_client_id'=>$this->input->post('google_client_id', true),
				'google_client_secret'=>$this->input->post('google_client_secret', true),
				'google_redirect_url'=>$this->input->post('google_redirect_url', true)
			);
			$update=$this->edit_model->edit($data,$id,'id',$this->general_setting);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
					redirect($this->agent->referrer());
			}
		
		}
	
		public function facebook_settings()
		{
		$header['pagecss']="";
		$header['title']='General Settings';
		$this->load->view('admin/partials/header',$header);
		$allitems=$this->select->select_table($this->general_setting,'id','asc');
		$data['item']=$allitems[0];
		$this->load->view($this->view_path.'fb_login_settings',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
		}
	
	/////////////////////////////
	public function facebook_process(){
		$id=$this->uri->segment(4);
		$data=array(
			'facebook_app_id'=>$this->input->post('facebook_app_id', true),
			'facebook_app_secret'=>$this->input->post('facebook_app_secret', true)
		);
		$update=$this->edit_model->edit($data,$id,'id',$this->general_setting);
		if($update){
			$this->session->set_flashdata('success', 'Data has been updated successfully');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
				redirect($this->agent->referrer());
		}
	}
}