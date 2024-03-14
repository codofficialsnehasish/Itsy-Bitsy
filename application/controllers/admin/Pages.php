<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='pages';
		$this->custom_table='custom_fields_value';
		$this->view_path='admin/pages/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Pages';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'page_id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Page';
		$this->load->view('admin/partials/header',$header);
		//$data['categories']=$this->select->get_parent_categories();
		$data['']="";
		$data['custom_fields']="";
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('page_title', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'page_title'=>$this->input->post('page_title', true),
				'page_content'=>$this->input->post('page_content', true),
				'page_name'	=>$this->input->post('page_name', true),
				'page_slug'=>$this->createSlug($this->input->post('page_name', true)),
				'page_template'=>$this->input->post('page_template', true),
				'is_visible'=>$this->input->post('is_visible', true),
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
		$header['title']='Edit Page';
		$this->load->view('admin/partials/header',$header);
		$categoryArray=$this->select->select_single_data($this->table_name,'page_id',$id);
		$data['custom_fields']=$this->select->custom_qry("SELECT c.*,i.type_name from custom_fields c inner join input_type_master i on c.type_id=i.type_id where page_id=".$id);
		$data['item']=$categoryArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function update_process()
	{
		$id=$this->uri->segment(4);
		$this->form_validation->set_rules('page_title', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'page_title'=>$this->input->post('page_title', true),
				'page_content'=>$this->input->post('page_content', true),
				'page_name'	=>$this->input->post('page_name', true),
				'page_slug'=>$this->createSlug($this->input->post('page_name', true)),
				'page_template'=>$this->input->post('page_template', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'meta_title_tag'=>$this->input->post('meta_title_tag', true),
				'meta_keywords'=>$this->input->post('meta_keywords', true),
				'meta_description'=>$this->input->post('meta_description', true)
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
			$update=$this->edit_model->edit($data,$id,'page_id',$this->table_name);

			$this->delete_model->delete($this->custom_table,'page_id',$id);


			$custom_fields=$this->select->custom_qry("SELECT c.*,i.type_name from custom_fields c inner join input_type_master i on c.type_id=i.type_id where page_id=".$id);
			foreach($custom_fields as $field){
				$customFieldArray['field_type']=$field->type_name;
				$customFieldArray['field_name']=$field->field_name;

				if($field->type_name=='file'){
					if(is_uploaded_file($_FILES[$field->field_name]['tmp_name'])){
						$customFieldArray['field_value']=$this->mediaupload->doUpload($field->field_name);
						}
						else{
						$customFieldArray['field_value']=$this->input->post($field->field_name.'_hdn_file');
						}
				}else{
					// $customFieldArray['field_name']=$field->type_name;
					// $customFieldArray['field_name']=$field->field_name;
					$customFieldArray['field_value']=$this->input->post($field->field_name,true);
				}
				$customFieldArray['page_id']=$id;
				$this->insert_model->insert_data($customFieldArray,$this->custom_table);
			}

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
		$this->delete_model->delete($this->table_name,'page_id',$id);
		echo 'Deleted Successfully';
	}

}
