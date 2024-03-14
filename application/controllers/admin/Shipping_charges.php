<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping_charges extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='shipping_charges';
		$this->view_path='admin/shipping_charges/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Shipping Charges';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Slider';
		$this->load->view('admin/partials/header',$header);
		$data[]="";
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'payment_mode'=>$this->input->post('payment_mode', true),
				'min_order_amount'=> !empty($this->input->post('min_amount', true)) ? $this->input->post('min_amount', true) : NULL,
				'max_order_amount'=> !empty($this->input->post('max_amount', true)) ? $this->input->post('max_amount', true) : NULL,
				'shipping_charge'=>$this->input->post('shipping_charge', true),
				'created_at'=>$this->currentTime
			);
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
		$this->form_validation->set_rules('payment_mode', 'Payment M\ode', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'payment_mode'=>$this->input->post('payment_mode', true),
				'min_order_amount'=>$this->input->post('min_amount', true),
				'max_order_amount'=>$this->input->post('max_amount', true),
				'shipping_charge'=>$this->input->post('shipping_charge', true),
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
	}


	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}

}
