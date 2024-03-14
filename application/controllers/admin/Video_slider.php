<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_slider extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='video_slider';
		$this->view_path='admin/video_slider/';
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
		$header['title']='Add New Video Link';
		$this->load->view('admin/partials/header',$header);
		$data[]="";
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function process()
	{
		preg_match('/src="([^"]+)"/', $this->input->post('name', true), $matches);
		$src = isset($matches[1]) ? $matches[1] : '';
        $data=array(
            'video_link'=>$src,
            'is_visible'=>$this->input->post('is_visible', true),
            'created_at'=>$this->currentTime
        );
        $insert=$this->insert_model->insert_data($data,$this->table_name);
        if($insert){
            $this->session->set_flashdata('success', 'Data has been inserted successfully');
            redirect($this->agent->referrer());
        }else{
            $this->session->set_flashdata('error', 'Query error');
            redirect($this->agent->referrer());
        }
	}

	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Video Link';
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
		preg_match('/src="([^"]+)"/', $this->input->post('name', true), $matches);
		$src = isset($matches[1]) ? $matches[1] : '';
        $data=array(
            'video_link'=>$src,
            'is_visible'=>$this->input->post('is_visible', true),
        );
        $update=$this->edit_model->edit($data,$id,'id',$this->table_name);
        if($update){
            $this->session->set_flashdata('success', 'Data has been updated successfully');
            redirect($this->agent->referrer());
        }else{
            $this->session->set_flashdata('error', 'Query error');
            redirect($this->agent->referrer());
        }
	}


	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}
}