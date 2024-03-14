<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='offer';
		$this->view_path='admin/offer/';
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Offer';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Offer';
		$this->load->view('admin/partials/header',$header);
		// $data[]="";
		$data['categories']=$this->select->get_parent_categories();
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'title'=>$this->input->post('name', true),
				'category_id'=>$this->input->post('cat_id', true),
				'subcategory_id'=>$this->input->post('subcat_id', true),
				'description'=>$this->input->post('desc', true),
				'link_title'=>$this->input->post('link_title', true),
				'link_url'=>$this->input->post('link', true),
				'is_visiable'=>$this->input->post('is_visible', true)
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
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Offer';
		$this->load->view('admin/partials/header',$header);
		$sliderArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$sliderArray[0];
		$data['categories']=$this->select->get_parent_categories();
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
				'title'=>$this->input->post('name', true),
				'category_id'=>$this->input->post('cat_id', true),
				'subcategory_id'=>$this->input->post('subcat_id', true),
				'description'=>$this->input->post('desc', true),
				'link_title'=>$this->input->post('link_title', true),
				'link_url'=>$this->input->post('link', true),
				'is_visiable'=>$this->input->post('is_visible', true)
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
				$this->session->set_flashdata('errors', 'Query error');
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
