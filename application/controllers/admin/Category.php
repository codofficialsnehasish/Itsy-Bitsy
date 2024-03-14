<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='categories';
		$this->view_path='admin/category/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Category';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'cat_id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Category';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('cat_name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'cat_name'=>$this->input->post('cat_name', true),
				'parent_id'=>$this->input->post('parent_id', true),
				'cat_slug'=>generate_slug($this->input->post('cat_name', true)),
				'cat_desc'=>$this->input->post('cat_desc', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'is_home'=>$this->input->post('is_home', true),
				'is_in_dropdown'=>$this->input->post('is_in_dropdown', true),
				'is_popular'=>$this->input->post('is_popular', true),
                'is_menu'=>$this->input->post('is_menu', true),
                'is_special'=>$this->input->post('is_special', true),
				'meta_title_tag'=>$this->input->post('meta_title_tag', true),
				'meta_keywords'=>$this->input->post('meta_keywords', true),
				'meta_description'=>$this->input->post('meta_description', true),
				'created_at'=>$this->currentTime
			);

			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['media_id']=$this->mediaupload->doUpload('file');
			}else{
				$data['media_id']=$this->input->post('media_id', true);
			}

			if(is_uploaded_file($_FILES['catagory_image']['tmp_name'])) 
			{  
				$data['catagory_image']=$this->mediaupload->doUpload('catagory_image');
			}else{
				$data['catagory_image']=$this->input->post('media_id', true);
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
		$header['title']='Edit Category';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$categoryArray=$this->select->select_single_data($this->table_name,'cat_id',$id);
		$data['item']=$categoryArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function update_process()
	{
	//	$id=$this->uri->segment(4);
		$id =	$this->input->post('cat_id');
		$this->form_validation->set_rules('cat_name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'cat_name'=>$this->input->post('cat_name', true),
				'parent_id'=>$this->input->post('parent_id', true),
				'cat_slug'=>generate_slug($this->input->post('cat_name', true)),
				'cat_desc'=>$this->input->post('cat_desc', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'is_home'=>$this->input->post('is_home', true),
				'is_in_dropdown'=>$this->input->post('is_in_dropdown', true),
				'is_popular'=>$this->input->post('is_popular', true),
             	'is_menu'=>$this->input->post('is_menu', true),
                'is_special'=>$this->input->post('is_special', true),
				'meta_title_tag'=>$this->input->post('meta_title_tag', true),
				'meta_keywords'=>$this->input->post('meta_keywords', true),
				'meta_description'=>$this->input->post('meta_description', true)
			);

			// print_r($_FILES);

			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{
				// echo "media id";  
				$data['media_id']=$this->mediaupload->doUpload('file');
			}else{
				if($this->input->post('media_id', true)!=''){
					$data['media_id']=$this->input->post('media_id', true);
				}else{
					$data['media_id']=$this->input->post('hdn_media_id', true);	
				}
				
			}

			if(is_uploaded_file($_FILES['catagory_image']['tmp_name'])) 
			{  
				// echo "catagory_image";
				$data['catagory_image']=$this->mediaupload->doUpload('catagory_image');
			}else{
				if($this->input->post('catagory_image', true)!=''){
					$data['catagory_image']=$this->input->post('catagory_image', true);
				}else{
					$data['catagory_image']=$this->input->post('catagory_image_mda', true);	
				}
			}

			$update=$this->edit_model->edit($data,$id,'cat_id',$this->table_name);
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
		$this->delete_model->delete($this->table_name,'cat_id',$id);
		echo 'Deleted Successfully';
	}

}
