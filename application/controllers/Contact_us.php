<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends Core_Controller {

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
	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('template/contact');
		$this->load->view('partials/footer');

	}


	public function process()
	{
		$this->form_validation->set_rules('c_name', 'Name', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('c_phone', 'Phone', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('c_msg', 'Message', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
		//	$this->session->set_flashdata('errors', validation_errors());
			$status = 0;
			$msg = validation_errors();

			//redirect($this->agent->referrer().'#footer');
		}else{
			$data=array(
				'c_name'=>$this->input->post('c_name', true),
				'c_email'=>$this->input->post('c_email', true),
				//'c_subj'=>$this->input->post('c_subj', true),
				'c_phone'=>$this->input->post('c_phone', true),
				'c_msg'=>$this->input->post('c_msg', true),
				'created_at'=>$this->currentTime
			);
			$insert=$this->insert_model->insert_data($data,'contact');
			if($insert){
				$this->session->set_flashdata('success', 'Message has been sent successfully');
				redirect($this->agent->referrer());
				// $status = 1;
				// $msg = 'Message has been sent successfully';
				// $this->email_template->contact($data);
				// $this->email_template->thankyou($this->input->post('c_name', true),$this->input->post('c_email', true));
			}else{
				$status = 0;
				$msg = 'Something went wrong :(';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	public function newsletter(){
		$email = $this->input->post('email', true);
		if(!empty($email)){
			if($this->isValidEmail($email)){
				$insert=$this->insert_model->insert_data(array('email_id'=>$email,'created_at'=>$this->currentTime),'newsletter');
				if($insert){
					echo json_encode(array('msg'=>'Successfully subscribed','status'=>1));
					// echo '<span style="color:#ffffff">Successfully subscribed</span>';
				}else{
					// echo '<span style="color:#ffffff">Error!</span>';
					echo json_encode(array('msg'=>'Error!','status'=>0));
				}
			}else{
				echo json_encode(array('msg'=>'Please enter a valid Email','status'=>0));
			}
		}else{
			// echo '<span style="color:#ffffff">Email field can not be blank</span>';
			echo json_encode(array('msg'=>'Email field can not be blank','status'=>0));
		}
	}

	public function isValidEmail($email) {
		// Define the regular expression pattern for email validation
		$pattern = '/^\S+@\S+\.\S+$/';
		
		// Use preg_match function to check if the email matches the pattern
		if (preg_match($pattern, $email)) {
			return true; // Email is valid
		} else {
			return false; // Email is not valid
		}
	}

	public function getQuote()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'service_id' => $this->input->post('service_id', true),
				'name'=>$this->input->post('name', true),
				'email'=>$this->input->post('email', true),
				'phone'=>$this->input->post('phone', true),
				'msg'=>$this->input->post('msg', true),
				'created_at'=>$this->currentTime
			);
			$insert=$this->insert_model->insert_data($data,'get_quote');
			if($insert){
				$message='Message has been sent successfully';
				$status=1;
			}else{
				$message='Query error';
				$status=0;
			}
		}

		echo json_encode(array('status'=>$status,'msg'=>$message));
	}

}
