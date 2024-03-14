<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends Core_Controller {
    
    function __construct() {
        parent::__construct();
    	// $this->output->enable_profiler(TRUE);
    }
    
	// 	public function index()
    // {
    //     $data['cagtegories']=$this->select->select_table('categories','cat_id','asc');
    //     $this->load->view('partials/header', $data);
    //     $this->load->view('services/list', $data);
    //     $this->load->view('partials/footer');
    // }


    public function serviceCategory()
    {
        $slug=$this->uri->segment(2);
        $cat_id="";
        $data = array();
		if($slug!=''){
			$cat_id=get_id_by_name('service_category','cat_slug',$slug,'cat_id');	
		}
		if($cat_id!=''){
			$conditions['filter']['cat_id'] = $cat_id;
            $conditions1['filter']['cat_id'] = $cat_id;
		}
    	//echo $cat_id;die;
        $data['title'] = select_value_by_id('service_category','cat_id',$cat_id,'cat_name');
		$conditions['returnType'] = 'count';
		$conditions['tblName'] = 'services';
        // print_r($conditions1);
		$totalRec = $this->select->getServices($conditions);
		$link = base_url("services/".$slug.'/');
        $pagination = $this->paginate($link, $totalRec, $this->perPage);
		$conditions1['start'] = $pagination['offset'];
		$conditions1['limit'] = $pagination['per_page'];

        if($this->input->get('sort_by')!=''){
            if($this->input->get('sort_by')=='low_to_high'){
                $conditions1['order_by'] = 'price';
                $conditions1['order'] = 'ASC';
            }
            if($this->input->get('sort_by')=='high_to_low'){
                $conditions1['order_by'] = 'price';
                $conditions1['order'] = 'DESC';
            }
            if($this->input->get('sort_by')=='latest'){
                $conditions1['order_by'] = 'id';
                $conditions1['order'] = 'DESC';
            }

        }else{
            $conditions1['order_by'] = 'id';
            $conditions1['order'] = 'ASC';
        }

		$conditions1['tblName'] = 'services';
		// print_r($conditions1);
       // print_r($pagination);
        $data['allservices'] = $this->select->getServices($conditions1);
        $data['cagtegories']=$this->select->select_table('service_category','cat_id','asc');
        $this->load->view('partials/header', $data);
        $this->load->view('services/list', $data);
        $this->load->view('partials/footer');
    }


    public function details()
    {
        $slug=$this->uri->segment(2);
       $service_id="";
        $data = array();
		if($slug!=''){
			$service_id=get_id_by_name('services','slug',$slug,'id');	
		}

         $data['title'] = "services";

        $conditions=array(
            'tblName' => 'services',
            'where'   => array(
                'id' => $service_id,
                'is_visible' => 1
            )
            );
        $allservices = $this->select->getResult($conditions);
        $data['service']= $allservices[0];

        $this->load->view('partials/header', $data);
        $this->load->view('services/details', $data);
        $this->load->view('partials/footer');
    }
}