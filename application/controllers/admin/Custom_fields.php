<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_fields extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='custom_fields';
		$this->type_master='input_type_master';
		$this->pages='pages';
		$this->view_path='admin/custom_fields/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Custom Fields';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->custom_qry("SELECT * FROM ".$this->pages." WHERE page_id in(select page_id from ".$this->table_name.")");
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Custom Fields';
		$this->load->view('admin/partials/header',$header);
		$data['type_master']=$this->select->select_table($this->type_master,'type_id','asc');
		$data['allpages']=$this->select->select_table($this->pages,'page_id','asc');
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('page_id', 'Page Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		}else{
			foreach($this->input->post('label_name', true) as $k=>$v){
				if($this->input->post('required['.$k.']', true)!=''){$required=1;}else{$required=0;}
				if($this->input->post('readonly['.$k.']', true)!=''){$readonly=1;}else{$readonly=0;}
				$metarray=array(
				'page_id'=>$this->input->post('page_id', true),
				'type_id'=>$this->input->post('type_id['.$k.']', true),
				'label_name'=>$this->input->post('label_name['.$k.']', true),
				'field_id'=>$this->createName($this->input->post('label_name['.$k.']', true)),
				'class_name'=>$this->input->post('class_name['.$k.']', true),
				'field_name'=>$this->createName($this->input->post('label_name['.$k.']', true)),
				'required'=>$required,
				'readonly'=>$readonly,
				'is_visible'=>$this->input->post('is_visible', true)
				);
				if($this->input->post('option['.$k.']')!=''){$metarray['options']=$this->input->post('option['.$k.']');}else{$options="";}
				$insert=$this->insert_model->insert_data($metarray,$this->table_name);
			}
	
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
		$header['title']='Edit Custom Fields';
		$this->load->view('admin/partials/header',$header);
		$categoryArray=$this->select->select_single_data($this->table_name,'page_id',$id);
		$data['item']=$categoryArray[0];
		$data['type_master']=$this->select->select_table($this->type_master,'type_id','asc');
		$data['allpages']=$this->select->select_table($this->pages,'page_id','asc');
		$data['allfields']=$this->select->select_single_data($this->table_name,'page_id',$id);
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function update_process()
	{
		$id=$this->uri->segment(4);
		$this->form_validation->set_rules('page_id', 'Page Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		}else{
			foreach($this->input->post('label_name', true) as $k=>$v){
				if($this->input->post('required['.$k.']', true)!=''){$required=1;}else{$required=0;}
				if($this->input->post('readonly['.$k.']', true)!=''){$readonly=1;}else{$readonly=0;}
				$metarray=array(
				'page_id'=>$this->input->post('page_id', true),
				'type_id'=>$this->input->post('type_id['.$k.']', true),
				'label_name'=>$this->input->post('label_name['.$k.']', true),
				'field_id'=>$this->createName($this->input->post('label_name['.$k.']', true)),
				'class_name'=>$this->input->post('class_name['.$k.']', true),
				'field_name'=>$this->createName($this->input->post('label_name['.$k.']', true)),
				'required'=>$required,
				'readonly'=>$readonly,
				'is_visible'=>$this->input->post('is_visible', true)
				);
				if($this->input->post('option['.$k.']')!=''){$metarray['options']=$this->input->post('option['.$k.']');}else{$options="";}
				if($this->input->post('type_id['.$k.']', true)!=''){
					$insert=$this->insert_model->insert_data($metarray,$this->table_name);
				}
			}
			if($insert){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', "Label Name Can't be blank");
		     	redirect($this->agent->referrer());
			}
		}
		// 	$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
		// 	if($update){
		// 		$this->session->set_flashdata('success', 'Data has been updated successfully');
		// 		redirect($this->agent->referrer());
		// 	}else{
		// 		$this->session->set_flashdata('errors', 'Query error');
		//      	redirect($this->agent->referrer());
		// 	}
		// }
	}


	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}

	public function delete_meta(){
		$id=$this->uri->segment(4);
		$this->delete_model->delete($this->table_name,'id',$id);
		$this->session->set_flashdata('success', 'Data has been Deleted successfully');
		redirect($this->agent->referrer());
	}

}
