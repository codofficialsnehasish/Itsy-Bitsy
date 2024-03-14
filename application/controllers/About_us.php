<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends Core_Controller {
	public function index()
	{
		$this->load->view('partials/header');
		$data['allitems']=$this->select->select_single_data('about','visiblity',1,'id','asc');
		$data['image']=$this->select->get_about_images_w();
		$this->load->view('template/about_us',$data);
		$this->load->view('partials/footer');
	}
}