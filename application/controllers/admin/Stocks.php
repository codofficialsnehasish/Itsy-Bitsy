<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='products';
		$this->tableSpecifications = 'product_specifications';
		$this->view_path='admin/stocks/';
		$this->file_name='file';
    	$this->number_of_images=10;
       // $this->output->enable_profiler(TRUE);
		
	}
    public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Products';
		$this->load->view('admin/partials/header',$header);

	//	$conditions['tblName'] = $this->table_name;
	//	$where[]=array('is_draft'=>0);
		//$conditions['where'] = $where;
		//$conditions['is_visible'] = 1;
	//	$result = $this->select->select->getResult($conditions);
		
		if($this->auth_user->role=='admin'){
		//	$data['allitems']=$this->select->select->getResult($conditions);
			//$this->select->select_table($this->table_name,'id','asc');
			$data['allitems']=$this->select->custom_qry("select * from ".$this->table_name." where is_draft=0 and is_visible=1");
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
}