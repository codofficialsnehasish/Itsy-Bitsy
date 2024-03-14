<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class My_dashboard extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('ajax_pagination');
		$this->is_notLoggedIn();
		$this->activeStatus=$this->isActive();
		$this->user_id = $this->auth_user->id;
		//$this->output->enable_profiler(TRUE);
		$this->order_per_page = 15;
        $this->earnings_per_page = 15;
        $this->user_id = $this->auth_user->id;

	}

	public function index(){
		if ($this->auth_check) {
			if($this->auth_user->role=='customer'){
			    	redirect('buyer/dashboard');
			//	$this->user_dashboard();
			}elseif($this->auth_user->role == 'buyer'){
				redirect('buyer/dashboard');
			}elseif($this->auth_user->role == 'dristributor'){
				redirect('distributer/dashboard');
			}elseif($this->auth_user->role=='technician'){
				redirect('admin/dashboard');
			}elseif($this->auth_user->role=='admin'){
				redirect('admin/dashboard');
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
    }
	public function user_dashboard(){
    
		$this->load->view('partials/header');
		// $pagination = $this->paginate(base_url("orders"), $this->order_model->get_orders_count($this->user_id), $this->order_per_page);
        // $data['orders'] = $this->order_model->get_paginated_orders($this->user_id, $pagination['per_page'], $pagination['offset']);
		$data[]="";
		$this->load->view('auth/dashboard',$data);
		$this->load->view('partials/footer');

    }

	public function buyer_dashboard(){
		$this->load->view('partials/header');
		$conditions['tblName']='products';
		$conditions['where']=array('user_id'=>$this->auth_user->id);
		$products=$this->select->getResult($conditions);
////////////listed products
		$lconditions['tblName']='products';
		$lconditions['where']=array('user_id'=>$this->auth_user->id,'is_visible'=>1);
		$lproducts=$this->select->getResult($lconditions);
		$data['allproducts']=$products; 
		$data['livedproducts']=$lproducts;
		$data['product_images']=$this->select->select_single_data('product_images','product_id',$data['allproducts'][0]->id);
		$this->load->view('auth/buyer/dashboard',$data);
		$this->load->view('partials/footer');
    }

	public function distributer_dashboard(){
		$this->load->view('partials/header');
		$conditions['tblName']='products';
		$conditions['where']=array('user_id'=>$this->auth_user->id);
		$products=$this->select->getResult($conditions);
////////////listed products
		$lconditions['tblName']='products';
		$lconditions['where']=array('user_id'=>$this->auth_user->id,'is_visible'=>1);
		$lproducts=$this->select->getResult($lconditions);
		$data['allproducts']=$products; 
		$data['livedproducts']=$lproducts;
		$data['product_images']=$this->select->select_single_data('product_images','product_id',$data['allproducts'][0]->id);
		$this->load->view('auth/seller/dashboard',$data);
		$this->load->view('partials/footer');
    }

	public function address(){
		$this->load->view('partials/header');
		$pagination = $this->paginate(base_url("orders"), $this->order_model->get_orders_count($this->user_id), $this->order_per_page);
        $data['orders'] = $this->order_model->get_paginated_orders($this->user_id, $pagination['per_page'], $pagination['offset']);
        $data['countries']=$this->select->select_single_data('location_countries','is_visible',1,'name','asc');

		$this->load->view('auth/buyer/addressbook',$data);
		$this->load->view('partials/footer');
    }

	public function wishlist(){
		// $conditions1['tblName'] = 'products';
        //  $data['allproducts'] = $this->select->getProducts($conditions1);
        $data['allproducts'] = $this->select->custom_qry('SELECT products.* FROM products LEFT JOIN favorite_products ON products.id = favorite_products.product_id WHERE favorite_products.user_id = '.$this->auth_user->id);
        $this->load->view('partials/header', $data);
        $this->load->view('auth/buyer/wishlist', $data);
        $this->load->view('partials/footer');
    }


	public function my_riskprofile(){
    
		$this->load->view('partials/header');
		$data[]="";
		$this->load->view('auth/my_result',$data);
		$this->load->view('partials/footer');

    }
}
?>