<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends Core_Controller {
    
    function __construct() {
        parent::__construct();
    	// $this->output->enable_profiler(TRUE);
    }
    
	public function index()
    {
        $data['category']=$this->select->select_table('category','cat_id','asc');
        $this->load->view('partials/header', $data);
        $data['allportfolio']=$this->select->select_table('portfolio','id','asc');
        $this->load->view('template/portfolio', $data);
        $this->load->view('partials/footer');
    }

	public function details()
    {
        $id = $this->uri->segment(3);
        $data['projects']=$this->select->select_single_data('projects','id',$id);
        $data['project_gallery']=$this->select->select_single_data('proj_gallery','proj_id',$id);
        $data['allportfolio']=$this->select->select_table('portfolio','id','asc');
        $this->load->view('template/portfolio_details', $data);
    }

}