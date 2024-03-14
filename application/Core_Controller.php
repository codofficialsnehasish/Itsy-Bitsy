<?php defined('BASEPATH') or exit('No direct script access allowed');

class Core_Controller extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        //check auth

        $this->auth_check = auth_check();
        $this->load->helper('cookie');

        if ($this->auth_check) {
            // delete_cookie('user_id');
            $this->auth_user = user();
            //update cart
            $cartdata = array('buyer_id'=>$this->auth_user->id);
            // print_r($cartdata);
            $this->edit_model->edit($cartdata,$this->input->cookie('user_id',true),'buyer_id','cart');
            delete_cookie('user_id');
            delete_cookie('user_role');
        }else{
            if(empty($this->input->cookie('user_id',true))){
                $cookie = array(
                    'name'   => 'user_id',
                    'value'  => uniqid(),
                    'expire' => '1296000',
                    'domain' => 'localhost',
                    'path'   => '/',
                    'secure' => TRUE
                );
                $this->input->set_cookie($cookie);
            }
        }

        
        $this->currentTime=current_time();

        //update last seen time

        $this->auth_model->update_last_seen();
        $this->perPage = 24;
        $this->thousands_separator = '.';
        $this->input_initial_price = '0.00';

        $this->general_settings = $this->settings_model->get_general_settings();
        $this->payment_settings = $this->settings_model->get_payment_settings();
        $this->settings = $this->settings_model->get_settings();
        //currencies
        $this->currencies = $this->get_currencies_array();

     //maintenance mode
         if ($this->general_settings->maintenance_mode_status == 1) {
            if (!is_admin() && $this->uri->segment(1)!='mdm' && $this->uri->segment(2)!='authentication' && $this->uri->segment(3)!='process') {
                $this->maintenance_mode();
            }
        }
    
    }



    public function is_not_logged_in(){
        if (!$this->auth_check) {
            // redirect(admin_url('mdm'));
            redirect('mdm');
        }
    }


    

    public function is_notLoggedIn(){
        $this->load->helper('cookie');
        if (!$this->auth_check && !get_cookie('user_id')) {

            redirect('login/');

        }
    }

    public function is_logged_in(){
        if ($this->auth_check) {
         redirect(admin_url('dashboard/'));
        }
    }


    public function isLoggedIn(){
        if ($this->auth_check) {
         redirect(base_url('my-dashboard/'));
        }
    }

    public function isActive(){
        if($this->auth_user->status==1 && $this->auth_user->email_status==1){
         return true;
        }else{
         return false;
        }
    }


    public function createSlug($str, $delimiter = '-'){

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));

		return $slug;

	}

    public function createName($str, $delimiter = '_'){

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));

		return $slug;

	}

    public function paginate($url, $total_rows, $per_page)
    {
        //initialize pagination
        if(empty($this->uri->segment(3))){
            $page = $this->security->xss_clean($this->uri->segment(2));
        }else{
            $page = $this->security->xss_clean($this->uri->segment(3));
        }
        $page = clean_number($page);
        if (empty($page) || $page <= 0) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }
        if(empty($this->uri->segment(3))){
            $config['uri_segment'] = 2;
        }else{
            $config['uri_segment'] = 3;
        }
        $config['num_links'] = 4;
        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['reuse_query_string'] = true;
        $config['use_page_numbers'] = TRUE;
      //  $config['page_query_string'] = TRUE;
        $config['cur_tag_open'] = '<a href="" class="page active">';
        $config['cur_tag_close'] = '</a>';
        $config['first_link'] = '&laquo;';
        $config['last_link'] = '&raquo;';


        $this->pagination->initialize($config);

        $per_page = clean_number($per_page);

        return array('per_page' => $per_page, 'offset' => $page * $per_page, 'current_page' => $page + 1);
    }

   //get currencies
   public function get_currencies_array()
   {
       $currencies = $this->select->get_currencies();
       $array = array();
       if (!empty($currencies)) {
           foreach ($currencies as $currency) {
               $array[$currency->code] = array('name' => $currency->name, 'symbol' => $currency->symbol, 'hex' => $currency->hex);
           }
       }
       return $array;
   }
     //maintenance mode
        public function maintenance_mode()
        {
            $this->load->view('maintenance');
        }

        public function manage_cart(){ //for buy now features
            $cartitems=$this->cart_model->get_cart_by_buyer_edit();
            if(!empty($this->input->cookie('user_id',true))){
                $buyerId=$this->input->cookie('user_id',true);;
            }else{
                $buyerId=$this->auth_user->id;
            }
            if(!empty($cartitems)){
                foreach($cartitems as $citem){
                    $con = array(
                        'id' => $citem->id,
                        'buyer_id' => $buyerId
                    );
                    $updateitem =  array(
                        'not_get' => 0
                    );
                    $this->db->where($con);
                    $this->db->update('cart', $updateitem);
                }
            }
            $this->delete_model->delete_duplicate_cart_item();
        }
}
?>