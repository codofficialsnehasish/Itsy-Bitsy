<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='about';
		$this->view_path='admin/about/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Abouts';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$data['image']=$this->select->get_about_images();
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
    public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New About';
		$this->load->view('admin/partials/header',$header);
		$data[]="";
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}
    public function add_new_image()
	{
		$header['pagecss']="";
		$header['title']='Add New About Image';
		$this->load->view('admin/partials/header',$header);
		$data['image']=$this->select->get_about_images();
		$this->load->view($this->view_path.'add_image',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}
    public function process()
	{
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			// $this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			if($this->input->post('main_about', true) == 1){
				$data = $this->select->select_table($this->table_name,'id','asc');
				foreach($data as $d){
                    $gg = array(
                        'main_about'=>0
                    );
                    $this->edit_model->edit($gg,$d->id,'id','about');
				}
			}
			$data1=array(
				'about_header'=>$this->input->post('name', true),
				'about_content'=>$this->input->post('desc', true),
				'main_about'=>$this->input->post('main_about', true),
				// 'main_about'=>0,
				'visiblity'=>$this->input->post('is_visible', true)
			);
            // if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            //     $data2=array(
            //         'visibility'=>$this->input->post('img_is_visible', true)
            //     );
            //     if(is_uploaded_file($_FILES['file']['tmp_name'])) 
            //     {  
            //         $data2['media_id']=$this->mediaupload->doUpload('file');
            //     }else{
            //         $data2['media_id']=$this->input->post('media_id', true);
            //     }
            //     $insert2=$this->insert_model->insert_data($data2,'about_images');
            // }
			$insert=$this->insert_model->insert_data($data1,$this->table_name);
			if($insert || $insert2){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

    public function image_process()
	{
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            if($this->input->post('img_is_visible', true)  == 1){
                $data = $this->select->get_about_images();
                foreach($data as $d){
                    $gg = array(
                        'visibility'=>0
                    );
                    $this->edit_model->edit($gg,$d->id,'id','about_images');
                }
            }
            $data2=array(
                'visibility'=>$this->input->post('img_is_visible', true)
            );
            if(is_uploaded_file($_FILES['file']['tmp_name'])) 
            {  
                $data2['media_id']=$this->mediaupload->doUpload('file');
            }else{
                $data2['media_id']=$this->input->post('media_id', true);
            }
            $insert2=$this->insert_model->insert_data($data2,'about_images');
        }
        if($insert2){
            $this->session->set_flashdata('success', 'Data has been inserted successfully');
            redirect($this->agent->referrer());
        }else{
            $this->session->set_flashdata('errors', 'Query error');
            redirect($this->agent->referrer());
        }
	}

    public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit About';
		$this->load->view('admin/partials/header',$header);
		$sliderArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$sliderArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}
    public function edit_image()
	{
        $id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit About Image';
		$this->load->view('admin/partials/header',$header);
		$data['image']=$this->select->select_single_data('about_images','id',$id);
		$this->load->view($this->view_path.'edit_image',$data);
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
			if($this->input->post('main_about', true) == 1){
				$data = $this->select->select_table($this->table_name,'id','asc');
				foreach($data as $d){
                    $gg = array(
                        'main_about'=>0
                    );
                    $this->edit_model->edit($gg,$d->id,'id','about');
				}
			}
			$data=array(
                'about_header'=>$this->input->post('name', true),
				'about_content'=>$this->input->post('desc', true),
				'main_about'=>$this->input->post('main_about', true),
				// 'main_about'=>0,
				'visiblity'=>$this->input->post('is_visible', true)
			);
			// if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			// {  
			// 	$data['media_id']=$this->mediaupload->doUpload('file');
			// }else{
			// 	if($this->input->post('media_id', true)!=''){
			// 		$data['media_id']=$this->input->post('media_id', true);
			// 	}else{
			// 		$data['media_id']=$this->input->post('hdn_media_id', true);	
			// 	}
				
			// }
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
    public function update_image_process()
	{
        $id=$this->uri->segment(4);
        if($this->input->post('img_is_visible', true)  == 1){
            $data = $this->select->get_about_images();
            foreach($data as $d){
                $gg = array(
                    'visibility'=>0
                );
                $this->edit_model->edit($gg,$d->id,'id','about_images');
            }
        }
        $data2=array(
            'visibility'=>$this->input->post('img_is_visible', true)
        );
        if(is_uploaded_file($_FILES['file']['tmp_name'])) 
        {  
            $data2['media_id']=$this->mediaupload->doUpload('file');
        }else{
            if($this->input->post('media_id', true)!=''){
                $data2['media_id']=$this->input->post('media_id', true);
            }else{
                $data2['media_id']=$this->input->post('hdn_media_id', true);	
            }
            
        }
        $update=$this->edit_model->edit($data2,$id,'id','about_images');
        if($update){
            $this->session->set_flashdata('success', 'Data has been updated successfully');
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

    public function img_delete($id){
		// $id= $this->input->post('id');
		$this->delete_model->delete('about_images','id',$id);
		redirect($this->agent->referrer());
	}

}