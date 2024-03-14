<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='coupons';
		// $this->tableSpecifications = 'product_specifications';
		$this->view_path='admin/coupons/';
		// $this->file_name='file';
    	// $this->number_of_images=10;
       // $this->output->enable_profiler(TRUE);
		
	}
    public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Coupons';
		$this->load->view('admin/partials/header',$header);
		
		if($this->auth_user->role=='admin'){
		//	$data['allitems']=$this->select->select->getResult($conditions);
			//$this->select->select_table($this->table_name,'id','asc');
			$data['allitems']=$this->select->custom_qry("select * from ".$this->table_name." where is_draft=0");
		}else{
			$data['allitems']=$this->select->custom_qry("select * from ".$this->table_name." where is_draft=0 and is_visible=1 and user_id=".$this->auth_user->id);
			//$conditions['where'] = array('user_id'=>$this->auth_user->id);
			//,'user_id',
			//$this->select->select->getResult($conditions);
			
		}
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

    public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Coupons';
		$this->load->view('admin/partials/header',$header);
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$this->load->view($this->view_path.'basic_info',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function price_details()
	{
		//echo $this->session->userdata('modesy_sess_product_id');
		if($this->uri->segment(4)=='' || $this->uri->segment(4)!=$this->session->userdata('modesy_sess_product_id')){
			//echo $this->uri->segment(4);
		//	echo '<br>Session '.$this->session->userdata('modesy_sess_product_id');die;
			redirect('admin/coupons/add_new');
		}
		$header['pagecss']="";
		$header['title']='Add New Coupons';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$this->load->view($this->view_path.'price_details',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	} 
	public function price_details_edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Coupons';
		$this->load->view('admin/partials/header',$header);
		$data['categories']=$this->select->get_parent_categories();
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$productArray[0];
		$this->load->view($this->view_path.'price_details_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function usage_restriction_edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Coupons';
		$this->load->view('admin/partials/header',$header);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$productArray[0];
		$this->load->view($this->view_path.'usage_restriction_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function process()
	{
		$this->form_validation->set_rules('cpcode', 'Coupone Code', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'coupons_code'=>$this->input->post('cpcode', true),
				'description'=>$this->input->post('desc', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'is_draft '=> 0

			);

			$coupons_id=$this->insert_model->insert_data($data,$this->table_name);
			if($coupons_id){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				// $user_data = array(
                //     'modesy_sess_product_id' => $coupons_id
                // );
                // $this->session->set_userdata($user_data);
				redirect('admin/coupons/price-details-edit/'.$coupons_id);
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}
	public function price_update_process(){
		$this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required|xss_clean|max_length[200]');
		// $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'currency_code'=>$this->input->post('currency_code', true),
				'expiry_date'=>$this->input->post('expiry_date', true),
				'discount_type'=>$this->input->post('discount', true),
				'amount'=>$this->input->post('amount', true),
				'free_shipping'=>$this->input->post('freesipp', true),
			);
			//$product_id=$this->insert_model->insert_data($data,$this->table_name);
			$update=$this->edit_model->edit($data,$this->input->post('coupons_id'),'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data Updated successfully');
				
				redirect('admin/coupons/usage_restriction_edit/'.$this->input->post('coupons_id'));
			//	redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
				redirect($this->agent->referrer());
			}
		}
	}

	public function restriction_update_process(){
		$data=array(
			'minimum_spend'=>$this->input->post('min_sp', true),
			'maximum_spend'=>$this->input->post('max_sp', true),
			// 'products_id'=>$this->input->post('discount', true),
		);
		//$product_id=$this->insert_model->insert_data($data,$this->table_name);
		$update=$this->edit_model->edit($data,$this->input->post('coupons_id'),'id',$this->table_name);
		if($update){
			$this->session->set_flashdata('success', 'Data Updated successfully');
			
			redirect('admin/coupons');
		//	redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			redirect($this->agent->referrer());
		}
	}
	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Coupons';
		$this->load->view('admin/partials/header',$header);
		$data['currencies']=$this->select->select_single_data('currencies','is_visible',1);
		$productArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$productArray[0];
		$this->load->view($this->view_path.'basic_info_edit',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function update_process()
	{
		$this->form_validation->set_rules('cpcode', 'Coupone Code', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'coupons_code'=>$this->input->post('cpcode', true),
				'description'=>$this->input->post('desc', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'is_draft '=> 0

			);
		}

		$update=$this->edit_model->edit($data,$this->input->post('coupons_id'),'id',$this->table_name);
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
	
	public function search_products(){

	}
}