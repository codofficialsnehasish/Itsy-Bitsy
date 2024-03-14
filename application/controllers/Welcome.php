<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Core_Controller {
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
public function __construct()
    {
        parent::__construct();
		$this->manage_cart();
		//$this->output->enable_profiler(TRUE);
		
	}
	public function index()
	{
		$data = array(
			'ip_address'=> $_SERVER['REMOTE_ADDR'],
			'user_agent'=> $_SERVER['HTTP_USER_AGENT']
		);
		$insert=$this->insert_model->insert_data($data,'visitors');
		
		// $ip = $_SERVER['REMOTE_ADDR'];
		//     // $timestamp = date('Y-m-d H:i:s');
		//     $user_agent = $_SERVER['HTTP_USER_AGENT'];

		$this->load->view('partials/header');
		
    	$sliderconditions = array(
			'tblName' =>'slider',
			'where' => array('is_visible'=>1)
		);
		$data['slider'] = $this->select->getResult($sliderconditions);
    
		$conditions = array(
			'tblName' =>'categories',
			'where' => array('is_visible'=>1,'is_home'=>1),
        	'start' => 0,
			'limit' => 2
		);
		$data['categories1'] = $this->select->getResult($conditions);
    
    	$conditionssss = array(
			'tblName' =>'categories',
			'where' => array('is_visible'=>1,'is_home'=>1),
        	'start' => 2,
			'limit' => 2
		);
		$data['categories2'] = $this->select->getResult($conditionssss);
		// // echo '<pre>';
		// // print_r($data['categories']);
		$conditions = array(
			'tblName' =>'categories',
			'where' => array('is_visible'=>1,'is_home'=>1),
		);
		$data['allcategories'] = $this->select->getResult($conditions);

		$brandconditions = array(
			'tblName' =>'brands',
			'where' => array('is_visible'=>1,'is_home'=>1),
		);
		$data['allbrands'] = $this->select->getResult($brandconditions);

		$conditions1 = array(
			'tblName' =>'categories',
			'where' => array('is_visible'=>1,'is_popular'=>1)
		);
		$data['popularcategories'] = $this->select->getResult($conditions1);

		$offer1 = array(
			'tblName' =>'offer',
			'where' => array('is_visiable'=>1)
		);
		$data['offeralldata'] = $this->select->getResult($offer1);
		
		$testimonial = array(
			'tblName' =>'testimonial',
			'where' => array('is_visible'=>1)
		);
		$data['testimonial'] = $this->select->getResult($testimonial);

		$videoslider = array(
			'tblName' =>'video_slider',
			'where' => array('is_visible'=>1)
		);
		$data['videoslider'] = $this->select->getResult($videoslider);

		// /////////////////////////new products/////////////////////////
		$pconditions['start'] = 0;
		$pconditions['limit'] = 8;
		$pconditions['order_by'] = 'id';
		$pconditions['order'] = 'DESC';
		$pconditions['filter']['is_visible'] = 1;
        $pconditions['filter']['is_draft'] = 0;
		$pconditions['tblName'] = 'products';
        $data['newproducts'] = $this->select->getProducts($pconditions);

		// print_r($data['newproducts']);

		// /////////////////////////////////////////////////
		$fconditions['start'] = 0;
		$fconditions['limit'] = 6;
		$fconditions['filter']['is_visible'] = 1;
        $fconditions['filter']['is_draft'] = 0;
		$fconditions['filter']['is_featured'] = 1;
		$fconditions['tblName'] = 'products';
        $data['featuredproducts'] = $this->select->getProducts($fconditions);
		// //////////////////////////////////////////////////////////////////////////
		// /////////////////////////////////////////////////
		$nconditions['filter']['is_visible'] = 1;
		$nconditions['filter']['is_draft'] = 0;
		$nconditions['order_by'] = 'id';
		$nconditions['order'] = 'desc';
		$nconditions['tblName'] = 'products';
		// $nconditions['start'] = 0;
		// $nconditions['limit'] = 4;
		$data['newproducts'] = $this->select->getProducts($nconditions);
		// /////////////////////////////////////////////////
		$tconditions['filter']['is_visible'] = 1;
		$tconditions['filter']['is_draft'] = 0;
		$tconditions['order_by'] = 'id';
		$tconditions['order'] = 'asc';
		$tconditions['tblName'] = 'products';
		$tconditions['start'] = 0;
		$tconditions['limit'] = 4;
		$data['trendingproducts'] = $this->select->getProducts($tconditions);
        // /////////////////////////////////////////////////////////////////////////
		// //print_r(get_top_selling_product_id());
	    // /////////////////////////////////////////////////
		$topconditions['filter']['is_visible'] = 1;
		$topconditions['filter']['is_draft'] = 0;
		$topconditions['filter']['productid'] = get_top_selling_product_id();
		$topconditions['order_by'] = 'id';
		$topconditions['order'] = 'asc';
		$topconditions['tblName'] = 'products';
		$data['topsellingproducts'] = $this->select->getProducts($topconditions);

		// /////////////////////////////////////////////////
		$newconditions['filter']['is_visible'] = 1;
		$newconditions['filter']['is_draft'] = 0;
		$newconditions['order_by'] = 'id';
		$newconditions['order'] = 'desc';
		$newconditions['tblName'] = 'products';
		$newconditions['start'] = 0;
		$newconditions['limit'] = 8;
		$data['newarrivels'] = $this->select->getProducts($newconditions);
		
    	$specialconditions1 = array(
			'tblName' =>'categories',
			'where' => array('is_visible'=>1,'is_special'=>1)
		);
		$data['specialcategories'] = $this->select->getResult($specialconditions1);

		// print_r($this->auth_user);
		$this->load->helper('cookie');
		$this->load->view('template/home',$data);
		$this->load->view('partials/footer');
	}
}
