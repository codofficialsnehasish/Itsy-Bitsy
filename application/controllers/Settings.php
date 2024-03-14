<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Core_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->library('ajax_pagination');
			$this->is_notLoggedIn();
		$this->activeStatus=$this->isActive();
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index(){
		if ($this->auth_check) {
			if($this->auth_user->role=='buyer'){
				$this->buyer_settings();
			}elseif($this->auth_user->role == 'retailer'){
				$this->retailer_settings();
			}elseif($this->auth_user->role=='seller'){
				$this->seller_settings();
			}elseif($this->auth_user->role=='admin'){
				redirect('admin/settings');
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
    }

	public function buyer_settings(){
		$this->load->view('partials/header');
		$data['countries']=$this->select->select_single_data('location_countries','is_visible',1,'name','asc');
    ////////states
		$conditions = array(
			'tblName' =>'location_states',
			'where' => array(
				'is_visible'=>1,
				'country_id'=> $this->auth_user->country_id
				)
		);
		$data['states'] = $this->select->getResult($conditions);
		////////Cities
		$conditions1 = array(
			'tblName' =>'location_cities',
			'where' => array(
				'is_visible'=>1,
				'state_id'=> $this->auth_user->state_id
				)
		);
		$data['cities'] = $this->select->getResult($conditions1);

		// if($this->isActive()==true){
			$this->load->view('auth/buyer/edit_profile',$data);
		// }else{
		// 	$this->load->view('template/buyer_dashboard/inactive',$data);
		// }
		$this->load->view('partials/footer');
    }

	public function seller_settings(){
		$this->load->view('partials/header');
		// if($this->isActive()==true){
		$data['countries']=$this->select->select_single_data('location_countries','is_visible',1,'name','asc');
		
		////////states
		$conditions = array(
			'tblName' =>'location_states',
			'where' => array(
				'is_visible'=>1,
				'country_id'=> $this->auth_user->country_id
				)
		);
		$data['states'] = $this->select->getResult($conditions);
		////////Cities
		$conditions1 = array(
			'tblName' =>'location_cities',
			'where' => array(
				'is_visible'=>1,
				'state_id'=> $this->auth_user->state_id
				)
		);
		$data['cities'] = $this->select->getResult($conditions1);

		//$data['states']=$this->select->select_single_data('location_states','is_visible',1,'name','asc');
		$this->load->view('auth/seller/edit_profile',$data);
		// }else{
		// 	$this->load->view('template/seller_dashboard/inactive',$data);
		// }
		$this->load->view('partials/footer');
    }


	public function retailer_settings(){
		$this->load->view('partials/header');
		// if($this->isActive()==true){
		$data['countries']=$this->select->select_single_data('location_countries','is_visible',1,'name','asc');
		
		////////states
		$conditions = array(
			'tblName' =>'location_states',
			'where' => array(
				'is_visible'=>1,
				'country_id'=> $this->auth_user->country_id
				)
		);
		$data['states'] = $this->select->getResult($conditions);
		////////Cities
		$conditions1 = array(
			'tblName' =>'location_cities',
			'where' => array(
				'is_visible'=>1,
				'state_id'=> $this->auth_user->state_id
				)
		);
		$data['cities'] = $this->select->getResult($conditions1);

		//$data['states']=$this->select->select_single_data('location_states','is_visible',1,'name','asc');
		$this->load->view('auth/seller/edit_profile',$data);
		// }else{
		// 	$this->load->view('template/seller_dashboard/inactive',$data);
		// }
		$this->load->view('partials/footer');
    }


}


