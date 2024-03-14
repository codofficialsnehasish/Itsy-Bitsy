<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_report extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='users';
		$this->view_path='admin/sales_report/';
		//$this->output->enable_profiler(TRUE);
		
	}
    public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Sales Report';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_single_data($this->table_name,'is_approved',1);
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
}