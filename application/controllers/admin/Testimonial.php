<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='testimonial';
		$this->view_path='admin/testimonial/';
		//$this->output->enable_profiler(TRUE);
    }

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Testimonial';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Testimonial';
		$this->load->view('admin/partials/header',$header);
		$data[]="";
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function process()
	{
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('rating', 'Rating', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'name'=>$this->input->post('name', true),
				'title'=>$this->input->post('title', true),
				// 'slug'=>generate_slug($this->input->post('name', true)),
				'description'=>$this->input->post('desc', true),
				'rating'=>$this->input->post('rating', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'created_at'=>$this->currentTime
			);
			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['media_id']=$this->mediaupload->doUpload('file');
			}else{
				$data['media_id']=$this->input->post('media_id', true);
			}
			$insert=$this->insert_model->insert_data($data,$this->table_name);
			if($insert){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Slider';
		$this->load->view('admin/partials/header',$header);
		$sliderArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$sliderArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function update_process()
	{
		$id=$this->uri->segment(4);
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'name'=>$this->input->post('name', true),
				// 'slug'=>generate_slug($this->input->post('name', true)),
				'title'=>$this->input->post('title', true),
				'description'=>$this->input->post('desc', true),
				'rating'=>$this->input->post('rating', true),
				'is_visible'=>$this->input->post('is_visible', true)
			);
			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['media_id']=$this->mediaupload->doUpload('file');
			}else{
				if($this->input->post('media_id', true)!=''){
					$data['media_id']=$this->input->post('media_id', true);
				}else{
					$data['media_id']=$this->input->post('hdn_media_id', true);	
				}
				
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


	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}
}