<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Enquiry extends Core_Controller {

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
		$this->is_notLoggedIn();
		//$this->output->enable_profiler(TRUE);
		
	}
	public function index()
	{
		$this->load->view('partials/header');
		$conditions = array(
			'tblName' =>'service_category',
			'where' => array('is_visible'=>1),
			'order_by'=>'id',
			'order' => 'asc'
		);
		$data['category']=$this->select->getResult($conditions);
		//$data['category']=$this->select->select_table('service_category','id','asc');
		$this->load->view('template/enquiry',$data);
		$this->load->view('partials/footer');
	}

	public function enquiry_process()
	{
		$response=array();
			// $udata = array(
			// 	'full_name' => $this->input->post('name'),
			// 	'address' => $this->input->post('addr'),
			// 	'email' => $this->input->post('email'),
			// 	'zip_code' => $this->input->post('pincode'),
			// 	'modified_at' => date('Y-m-d H:i:s'),
			// 	'status' => 0
			// );

			// $user = $this->auth_model->get_user_by_mobile($this->input->post('mobile'));
			// $insert =$this->edit_model->edit($udata,$user->id,'id','users');
		//	$user = $this->auth_model->get_user_by_id($this->auth_user->id);
			
			$enquiry = array(
					'user_id'=>$this->auth_user->id,
					'user_role' => $this->auth_user->role,
					'cat_id' => $this->input->post('cat_id'),
					'msg' => $this->input->post('msg'),
					'created_at' => date('Y-m-d H:i:s'),
					'status' => 0
			);

				$insert = $this->insert_model->insert_data($enquiry,'enquiry');
				if($insert){
				//	send_mail('Thanks To Signup',$udata['email'],'thankyou',$udata);
				$msg = 'Dear Customer, We would like to thank you for contacting AITS Technicians. Our technicians get back to you very soon. Anandu Trader (AITS)';
    			send_sms($this->auth_user->phone_number,$msg);
    			
    			$technicianArray = $this->select->custom_qry("SELECT distinct user_id FROM `serving_area_pincode` where pincode='".$this->auth_user->zip_code."'");
			    foreach($technicianArray as $tech){
			        $user = $this->auth_model->get_user_by_id($tech->user_id); 
			      	$msgtxt = 'Dear User, We have an enquiry in your pin area. Login and get details to connect with the customer. Anandu Trader (AITS)';
    		    	send_sms($user->phone_number,$msgtxt);

			    }
			
				$status=1; 
				$msg= 'Enquired Successfully.';
				$this->session->set_flashdata('message', 'Enquired Successfully.');
				//redirect('my-dashboard');
				redirect($this->agent->referrer());
				}else{
				$status=0;
				$msg= 'Error! Form Submission.';
				$this->session->set_flashdata('message', 'Error!');
				redirect($this->agent->referrer());
				}
				//$response['status']=$status;
				//$response['message']=$msg;
				//echo json_encode($response);
	}


}
