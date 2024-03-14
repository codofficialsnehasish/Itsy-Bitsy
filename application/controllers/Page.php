<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Core_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function pages($slug)
	{
		$conditions = array(
			'tblName' =>'pages',
			'where' => array('is_visible'=>1,'page_slug'=>$slug)
		);
		$result=$this->select->getResult($conditions);
		
		$this->load->view('partials/header');
		if(!empty($result)){
			$data['page'] = $result[0];
			$this->load->view('template/'.$result[0]->page_template,$data);
		}else{
			$this->load->view('template/notFound');
		}
		$this->load->view('partials/footer');

	}
}
