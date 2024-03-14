<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart_controller extends Core_Controller
{
    /*
     * Payment Types
     *
     * 1. sale: Product purchases
     * 2. promote: Promote purchases
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->is_notLoggedIn();
        // $this->output->enable_profiler(TRUE);
       // $this->session_cart_items = $this->cart_model->get_sess_cart_items();
       // $this->cart_model->calculate_cart_total();
    }

    /**
     * Cart
     */
    public function cart()
    {
        // $data['title'] = trans("shopping_cart");
        // $data['description'] = trans("shopping_cart") . " - " . $this->app_name;
        // $data['keywords'] = trans("shopping_cart") . "," . $this->app_name;
        $this->manage_cart();
        $data['cart_total'] = $this->cart_model->calculate_cart_total();
        // $data['cart_total'] = $this->cart_model->get_sess_cart_total();
        // $data['cart_has_physical_product'] = $this->cart_model->check_cart_has_physical_product();
        // $data['cart_current_user'] = get_current_user_session();
        $data['cartitems']=$this->cart_model->get_cart_by_buyer();
        $this->load->view('partials/header', $data);
        $this->load->view('cart/cart', $data);
        $this->load->view('partials/footer');
    }

    public function showCartPopupData(){
        $this->manage_cart();
        $cartitems=$this->cart_model->get_cart_by_buyer();
        $html = '';
        $chdjc = "'cart'";
        $pp = "'+'"; $mm = "'-'";
        if(!empty($cartitems)){
            foreach($cartitems as $cart){
                $product = $this->product_model->get_product_by_id($cart->product_id);
                $appended_variations = $this->cart_model->get_selected_variations($product->id)->str;
                if(!empty($cart->variations) || $cart->variations!='' || $cart->variations!=null){
                    $cartvariations=explode(',',$cart->variations);
                }else{
                    $cartvariations[]="";
                }
                array_filter($cartvariations);
                $object=$this->cart_model->get_product_price_and_stock($product,$cartvariations,$cart->quantity);
                $html .= '<li class="item">';
                $html .= '<a class="product-image" href='. base_url("/cart") .'><img src='. get_product_main_image($product).' alt='. $product->title.' title=""></a>';
                $html .= '<div class="product-details">';
                $html .= '<a href="#" class="remove" data-id="1"  onclick="removefrompopupcart('. $cart->id.');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="an an-times" aria-hidden="true"></i></a>';
                // $html .= '<a href="#" class="edit-i remove" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="an an-edit" aria-hidden="true"></i></a>';
                $html .= '<a class="pName" href='. base_url("/cart").'>'. $product->title .'</a>';
                if(!empty($cart->variations)){
                    foreach($cartvariations as $cvariation){
                        $variations = $this->variation_model->get_variation_option($cvariation);
                        $html .= '<p class="mb-0">'. select_value_by_id("variations","id",$variations->variation_id,"label_names").':'.$variations->option_names.'</p>';
                    }
                }
                $html .= '<div class="d-flex justify-content-between">';
                $html .= '<div class="wrapQtyBtn clearfix">';
                $html .= '<span class="label">Qty:</span>';
                $html .= '<div class="qtyField clearfix">';
                $html .= '<a class="qtyBtn minus" href="javascript:void(0);" onclick="updateCart('. $cart->id.','. $cart->product_id.','. $cart->quantity.','.$mm.')"><i class="an an-minus" aria-hidden="true"></i></a>';
                $html .= '<input type="text" name="quantity" id="updatescartquantity'.$cart->id.'" value="'. $cart->quantity.'" class="product-form__input qty">';
                $html .= '<a class="qtyBtn plus" href="javascript:void(0);" onclick="updateCart('. $cart->id.','. $cart->product_id.','. $cart->quantity.','.$pp.');"><i class="an an-plus" aria-hidden="true"></i></a>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '<div class="priceRow clearfix">';
                $html .= '<div class="product-price">';
                $html .= '<span class="money">'. select_value_by_id("currencies","id",$product->currency_code,"hex").' '. $object->price_calculated.'</span>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</li>';
            }
        }
        echo $html;
    }
    
    public function getAndShowProduct(){
        $product_id = $this->input->post('product_id', true);
        $product = $this->product_model->get_product_by_id($product_id);
        echo json_encode($product); 
    }

    
    public function fetchCartCount()
    {
        $cartitems=!empty($this->cart_model->get_cart_by_buyer())?count($this->cart_model->get_cart_by_buyer()):0;
        $cart_total = $this->cart_model->calculate_cart_total();
        $subtotal   =   !empty($cart_total)?formatted_price($cart_total->subtotal, $cart_total->currency):'';
        if($cartitems > 0){
            if(!empty($cart_total) && $cart_total->shipping_cost == 0){
                $shipping   =   !empty($cart_total)? 'Free' : '';
            }else{
                $shipping   =   !empty($cart_total)?formatted_price($cart_total->shipping_cost, $cart_total->currency):'';
            }
            $grandtotal   =   !empty($cart_total)?formatted_price($cart_total->total, $cart_total->currency):'';
        }else{
            $shipping = '0.00';
            $grandtotal = '0.00';
        }
        $resultArray = array('qty'=>$cartitems,'cartTotal'=>$subtotal,'shipping'=>$shipping,'grandtotal'=>$grandtotal,'status' => 1);
        
        echo json_encode($resultArray); 
    }

    public function fetchPrepaidShipping()
    {
        $cartitems=!empty($this->cart_model->get_cart_by_buyer())?count($this->cart_model->get_cart_by_buyer()):0;
        $cart_total = $this->cart_model->calculate_cart_total('Prepaid');
        $subtotal   =   !empty($cart_total)?formatted_price($cart_total->subtotal, $cart_total->currency):'';
        if(!empty($cart_total) && $cart_total->shipping_cost == 0){
            $shipping   =   !empty($cart_total)? 'Free' : '';
        }else{
            $shipping   =   !empty($cart_total)?formatted_price($cart_total->shipping_cost, $cart_total->currency):'';
        }
        $grandtotal   =   !empty($cart_total)?formatted_price($cart_total->total, $cart_total->currency):'';
        $resultArray = array('qty'=>$cartitems,'cartTotal'=>$subtotal,'shipping'=>$shipping,'grandtotal'=>$grandtotal,'status' => 1);
        
        echo json_encode($resultArray); 
    }
    /**
     * Add to Cart
     */
    public function add_to_cart()
    {
        // print_r($this->input->post());
        if($this->input->post('button_type') == 'addcart'){
            $product_id = $this->input->post('product_id', true);
            $product = $this->product_model->get_product_by_id($product_id);
            $status = 0;
            $msg = '';
            if (!empty($product)) {
                if ($product->is_visible != 1) {
                    $this->session->set_flashdata('product_details_error', "msg_error_cart_unapproved_products");
                    $msg='Error!';
                    $status=0;
                } else {
                    $result=$this->cart_model->add_to_cart($product);
                    $this->session->set_flashdata('success', $result);   
                    $status=1;
                    $msg=$result;
                   // redirect("cart");
                }
            }
            // reset_flash_data();
            echo json_encode(array('status'=>$status,'msg'=>$msg));
        }else if($this->input->post('button_type') == 'buynow'){
            $cartitems=$this->cart_model->get_cart_by_buyer();
            // if(!empty($this->input->cookie('user_id',true))){
            //     $buyerId=$this->input->cookie('user_id',true);;
            // }else{
            //     $buyerId=$this->auth_user->id;
            // }

            if($this->auth_check){
                $buyerId=$this->auth_user->id;
            }else{
                $buyerId=$this->input->cookie('user_id',true);
            }
            foreach($cartitems as $citem){
                $con = array(
                    'id' => $citem->id,
                    'buyer_id' => $buyerId
                );
                $updateitem =  array(
                    'not_get' => 1
                );
                $this->db->where($con);
                $this->db->update('cart', $updateitem);
            }
            $product_id = $this->input->post('product_id', true);
            $product = $this->product_model->get_product_by_id($product_id);
            $status = 0;
            $msg = '';
            if (!empty($product)) {
                if ($product->is_visible != 1) {
                    $this->session->set_flashdata('product_details_error', "msg_error_cart_unapproved_products");
                    $msg='Error!';
                    $status=0;
                } else {
                    $result=$this->cart_model->add_to_cart($product);
                    $this->session->set_flashdata('success', $result);   
                    $status=1;
                    $msg=$result;
                   // redirect("cart");
                }
            }
            // reset_flash_data();
            // echo json_encode(array('status'=>$status,'msg'=>$msg));
            redirect('/checkout');
        }
        redirect($this->agent->referrer());
    }

    public function add_to_cart_single()
    {
        $product_id = $this->input->post('product_id', true);
        $product = $this->product_model->get_product_by_id($product_id);
        $status = 0;
        $msg = '';
        if (!empty($product)) {
            if ($product->is_visible != 1) {
                $this->session->set_flashdata('product_details_error', "msg_error_cart_unapproved_products");
                $msg='Error!';
				$status=0;
            } else {
                $result=$this->cart_model->add_to_cart($product);
                $this->session->set_flashdata('success', $result);   
                $status=1;
				$msg=$result;
               // redirect("cart");
            }
        }
        // reset_flash_data();
		echo json_encode(array('status'=>$status,'msg'=>$msg));
        // redirect('/checkout');
    }

        /**
     * Shipping
     */
    public function checkout()
    {
        // $data['title'] = trans("shopping_cart");
        // $data['description'] = trans("shopping_cart") . " - " . $this->app_name;
        // $data['keywords'] = trans("shopping_cart") . "," . $this->app_name;
        // $data['cart_items'] = $this->cart_model->get_sess_cart_items();
        // $data['mds_payment_type'] = 'sale';
        // $data['cart_current_user'] = get_current_user_session();

        // if ($data['cart_items'] == null) {
        //     redirect(generate_url("cart"));
        // }
        // //check shipping status
        // if ($this->form_settings->shipping != 1) {
        //     redirect(generate_url("cart"));
        //     exit();
        // }
        // //check guest checkout
        // if (empty($this->auth_check) && $this->general_settings->guest_checkout != 1) {
        //     redirect(generate_url("cart"));
        //     exit();
        // }
        // //check physical products
        // if ($this->cart_model->check_cart_has_physical_product() == false) {
        //     redirect(generate_url("cart"));
        //     exit();
        // }
        if(!$this->auth_user->id){
            redirect('/login');
        }
        if(empty($this->cart_model->get_cart_by_buyer())){
            echo json_encode(array('status'=>'error','msg'=>'No Items In Cart'));
            redirect($this->agent->referrer());
        }
        $con=array(
            'tblName' => 'address_book',
            'where' => array(
                'user_id' =>$this->auth_user->id
            )
        );
        $result=$this->select->getResult($con);
        if(!empty($result)){
            $billing = $result;
        }else{
            $billing="";
        }

        $data['cart_total'] = $this->cart_model->calculate_cart_total();
        $data['cartitems']=$this->cart_model->get_cart_by_buyer();

        $data["shipping_address"] = $billing;
        // $data['cart_total'] = $this->cart_model->calculate_cart_total();
        // $data["shipping_address"] = $this->cart_model->get_sess_cart_shipping_address();
        $data['countries']=$this->select->select_single_data('location_countries','is_visible',1,'name','asc');

        $conditions['tblName'] = 'location_states';
        $conditions['where'] = array('country_id'=>99);
        $conditions['is_visible'] = 1;
        $data['states'] = $this->select->select->getResult($conditions);

        $this->load->view('partials/header');
        $this->load->view('cart/checkout', $data);
        $this->load->view('partials/footer');

    }


    /**
     * Remove from Cart
     */
    public function remove_from_cart()
    {
        $cart_item_id = $this->input->post('cart_item_id', true);
        $this->cart_model->remove_from_cart($cart_item_id);
        $cart_total=$this->cart_model->calculate_cart_total();
        $cartitems=$this->cart_model->get_cart_by_buyer();
        $data=array(
            'cart_count' => !empty($cartitems)?count($cartitems):0,
            'cart_total' => formatted_price($cart_total->subtotal, $cart_total->currency)
        );

        echo json_encode($data);
    }

    /**
     * Update Cart Product Quantity
     */
    public function update_cart_product_quantity()
    {
        $product_id = $this->input->post('product_id', true);
        $cart_item_id = $this->input->post('cart_item_id', true);
        $quantity = $this->input->post('quantity', true);
        $status = $this->input->post('status', true);
        $checkval = $status == 1 ? $quantity + 1 : $quantity - 1;
        if(get_product_stock($product_id) >= $checkval){
            if($status == 1){
                $res = $this->cart_model->update_cart_product_quantity($product_id, $cart_item_id, $quantity + 1);
            }else{
                if($quantity == 1){
                    $res = $this->cart_model->update_cart_product_quantity($product_id, $cart_item_id, $quantity);
                }else{
                    $res = $this->cart_model->update_cart_product_quantity($product_id, $cart_item_id, $quantity - 1);
                }
            }
            if($res){
                if($status == 1){
                    $resultArray = array('qty'=>$quantity+1,'status'=>1);
                }else{
                    if($quantity == 1){
                        $resultArray = array('qty'=>$quantity,'status'=>1);
                    }else{
                        $resultArray = array('qty'=>$quantity-1,'status'=>1);
                    }
                }
            }else{
                $resultArray = array('qty'=>$quantity,'status'=>0);
            }
            echo json_encode($resultArray); 
        }else{
            $resultArray = array('qty'=>$quantity,'status'=>0);
            echo json_encode($resultArray); 
        }
    }

    /**
     * Shipping
     */
    public function shipping()
    {
        $data['title'] = trans("shopping_cart");
        $data['description'] = trans("shopping_cart") . " - " . $this->app_name;
        $data['keywords'] = trans("shopping_cart") . "," . $this->app_name;
        $data['cart_items'] = $this->cart_model->get_sess_cart_items();
        $data['mds_payment_type'] = 'sale';
        $data['cart_current_user'] = get_current_user_session();

        if ($data['cart_items'] == null) {
            redirect(generate_url("cart"));
        }
        //check shipping status
        if ($this->form_settings->shipping != 1) {
            redirect(generate_url("cart"));
            exit();
        }
        //check guest checkout
        if (empty($this->auth_check) && $this->general_settings->guest_checkout != 1) {
            redirect(generate_url("cart"));
            exit();
        }
        //check physical products
        if ($this->cart_model->check_cart_has_physical_product() == false) {
            redirect(generate_url("cart"));
            exit();
        }

        $data['cart_total'] = $this->cart_model->get_sess_cart_total();
        $data["shipping_address"] = $this->cart_model->get_sess_cart_shipping_address();

        $this->load->view('partials/_header', $data);
        $this->load->view('cart/shipping', $data);
        $this->load->view('partials/_footer');

    }

    /**
     * Shipping Post
     */
    public function shipping_post()
    {
        $this->cart_model->set_sess_cart_shipping_address();
        redirect(generate_url("cart", "payment_method") . "?payment_type=sale");
    }

    /**
     * Payment Method
     */
    public function payment_method()
    {
        $data['title'] = trans("shopping_cart");
        $data['description'] = trans("shopping_cart") . " - " . $this->app_name;
        $data['keywords'] = trans("shopping_cart") . "," . $this->app_name;
        $data['mds_payment_type'] = 'sale';
        $data['cart_current_user'] = get_current_user_session();
           
           

        $payment_type = $this->input->get('payment_type', true);

            $data['cart_items'] = $this->cart_model->get_sess_cart_items();
            if ($data['cart_items'] == null) {
                redirect(generate_url("cart"));
            }
            //check auth for digital products
            if (!$this->auth_check && $this->cart_model->check_cart_has_digital_product() == true) {
                $this->session->set_flashdata('error', trans("msg_digital_product_register_error"));
                redirect(generate_url("register"));
                exit();
            }

            $data['cart_total'] = $this->cart_model->get_sess_cart_total();
            $user_id = null;
            if ($this->auth_check) {
                $user_id = $this->auth_user->id;
            }

            $data['cart_has_physical_product'] = $this->cart_model->check_cart_has_physical_product();
            $data['cart_has_digital_product'] = $this->cart_model->check_cart_has_digital_product();
            $this->cart_model->unset_sess_cart_payment_method();
        

        $this->load->view('partials/_header', $data);
        $this->load->view('cart/payment_method', $data);
        $this->load->view('partials/_footer');
    }

    /**
     * Payment Method Post
     */
    public function payment_method_post(){
        $this->cart_model->set_sess_cart_payment_method();
        if($this->input->post('addrradio')=='fornewaddr'){
            $this->saveaddress();
        }
        
       
        $mds_payment_type = $this->input->post('payment_option', true);
        if (!empty($mds_payment_type) && $mds_payment_type == 'cash_on_delivery') {
            $this->cash_on_delivery_payment_post();
        }elseif(!empty($mds_payment_type) && $mds_payment_type == 'q_r_code'){
            $this->q_r_code_payment_post();
        } else {
            redirect("payment");
        }
    }

    /**
     * Payment
     */
    public function payment(){
        //check is set cart payment method
        $data['cart_payment_method'] =$this->cart_model->get_sess_cart_payment_method();
        if (empty($data['cart_payment_method'])) {
            redirect(("checkout"));
        }
        $data['cart_total'] = $this->cart_model->calculate_cart_total();
        $data['cart_items']=$this->cart_model->get_cart_by_buyer();
        if ($data['cart_items'] == null) {
            redirect("cart");
        }
        $data["shipping_address"] = $this->cart_model->get_cart_shipping_address();
      //  $data['total_amount'] = (int)$data['cart_total']->total*100;
        $data['total_amount'] = (int)$data['cart_total']->total;
       // $data['total_amount'] = 100;
        $data['mds_payment_type'] = 'product';
        $data['currency'] = $this->payment_settings->default_product_currency;
        $this->load->view('partials/header', $data);
        $this->load->view('cart/payment', $data);
        $this->load->view('partials/footer');
    }
    

    /**
     * Payment with Razorpay
     */
    public function square_payment_post(){
        $this->load->library('squarepayment');

        $input = json_decode(file_get_contents('php://input'), true);

        $cart_total = $this->cart_model->calculate_cart_total();

        $array = array(
            'amount' => $cart_total->total,
            'sourceId' => $input['sourceId'] ,
            'cust_id' => $this->auth_user->id,
            'desc' => 'online products',
        );
       $result = $this->squarepayment->create_order($array);
        //    echo $result['amount'].'<br>';
        //    echo $result['created_at'].'<br>';
        //    echo $result['currency'].'<br>';
        //    echo $result['receipt_number'].'<br>';
        //    echo $result['receipt_url'].'<br>';
        //    echo $result['status'].'<br>';
        //    echo $result['receipt_url'].'<br>';
        //echo $result['txn_id'].'<br>';
        // print_r($result);die;
        $data_transaction = array(
            'payment_method' => "Square",
            'payment_id' => $result['txn_id'],
            'currency' => $result['currency'],
            'payment_amount' => $result['amount'],
            'payment_status' => $result['status'],
            'created_at' => $result['created_at'],
            'receipt_number' => $result['receipt_number'],
            'receipt_url' => $result['receipt_url']
        );

       

        // $mds_payment_type = $this->input->post('mds_payment_type', true);
        //  if ($mds_payment_type == 'product') {
            //execute sale payment
            $this->execute_sale_payment($data_transaction, 'json_encode');
        // }
        
    }


    /**
     * Payment with Razorpay
     */
    public function razorpay_payment_post(){
        $this->load->library('razorpay');

        $data_transaction = array(
            'payment_method' => "Razorpay",
            'payment_id' => $this->input->post('payment_id', true),
            'razorpay_order_id' => $this->input->post('razorpay_order_id', true),
            'razorpay_signature' => $this->input->post('razorpay_signature', true),
            'currency' => $this->input->post('currency', true),
            'payment_amount' => get_price($this->input->post('payment_amount', true), 'decimal'),
            'payment_status' => 'succeeded',
        );

        if (empty($this->razorpay->verify_payment_signature($data_transaction))) {
            $this->session->set_flashdata('error', 'Invalid signature passed!');
            $data = array(
                'status' => 0,
                'redirect' => generate_url("cart", "payment")
            );
            echo json_encode($data);
            exit();
        }

        $mds_payment_type = $this->input->post('mds_payment_type', true);
         if ($mds_payment_type == 'product') {
            //execute sale payment
            $this->execute_sale_payment($data_transaction, 'json_encode');
         }
         if ($mds_payment_type == 'plan') {
        //     //execute promote payment
            $this->execute_plan_purchase($data_transaction, 'json_encode');
        }
    }

    /**
     * Payment with Iyzico
     */
   

    /**
     * Cash on Delivery
     */
    public function cash_on_delivery_payment_post(){
        $order_id = $this->order_model->add_order_offline_payment("Cash On Delivery");
        //add order
        $this->manage_cart();
        $order = $this->order_model->get_order($order_id);
        // print_r($order);
        if (!empty($order)) {
            //decrease product quantity after sale
            $this->order_model->decrease_product_stock_after_sale($order->id);
            //send email
            // if ($this->general_settings->send_email_buyer_purchase == 1) {
            //     $email_data = array(
            //         'email_type' => 'new_order',
            //         'order_id' => $order_id
            //     );
            //     $this->session->set_userdata('mds_send_email_data', json_encode($email_data));
            // }

            if ($order->buyer_id == 0) {
                // $this->session->set_userdata('mds_show_order_completed_page', 1);
                // redirect(generate_url("order_completed") . "/" . $order->order_number);
                $this->session->set_flashdata('success', "Order Placed Successfully");
                redirect("order-details".'/'. $order->order_number);
            } else {
                $this->session->set_flashdata('success', "Order Placed Successfully");
                redirect("order-details".'/'. $order->order_number);

            }
        }

        $this->session->set_flashdata('error', trans("msg_error"));
        redirect(generate_url("cart", "payment"));
    }

    public function q_r_code_payment_post(){
        $order_id = $this->order_model->add_order_offline_payment("QR Code");
        //add order
        $order = $this->order_model->get_order($order_id);
        print_r($order);
        if (!empty($order)) {
            //decrease product quantity after sale
            $this->order_model->decrease_product_stock_after_sale($order->id);
            //send email
            // if ($this->general_settings->send_email_buyer_purchase == 1) {
            //     $email_data = array(
            //         'email_type' => 'new_order',
            //         'order_id' => $order_id
            //     );
            //     $this->session->set_userdata('mds_send_email_data', json_encode($email_data));
            // }

            if ($order->buyer_id == 0) {
                // $this->session->set_userdata('mds_show_order_completed_page', 1);
                // redirect(generate_url("order_completed") . "/" . $order->order_number);
                $this->session->set_flashdata('success', "Order Placed Successfully");
                redirect("order-details".'/'. $order->order_number);
            } else {
                $this->session->set_flashdata('success', "Order Placed Successfully");
                redirect("order-details".'/'. $order->order_number);

            }
        }

        $this->session->set_flashdata('error', trans("msg_error"));
        redirect(generate_url("cart", "payment"));
    }

    /**
     * Execute Sale Payment
     */
    public function execute_sale_payment($data_transaction, $redirect_type = 'json_encode'){
        //add order
       
        $order_id = $this->order_model->add_order($data_transaction);
        $order = $this->order_model->get_order($order_id);
        if (!empty($order)) {
            //decrease product quantity after sale
            $this->order_model->decrease_product_stock_after_sale($order->id);
            //send email
            // if ($this->general_settings->send_email_buyer_purchase == 1) {
            //     $email_data = array(
            //         'email_type' => 'new_order',
            //         'order_id' => $order_id
            //     );
            //     $this->session->set_userdata('mds_send_email_data', json_encode($email_data));
            // }
            //return json encode response
            if ($redirect_type == 'json_encode') {
                $data = array(
                    'result' => 1,
                    'redirect' => base_url("order-details") . "/" . $order->order_number
                );
                if ($order->buyer_id == 0) {
                    $this->session->set_userdata('mds_show_order_completed_page', 1);
                    $data["redirect"] = base_url("order_completed") . "/" . $order->order_number;
                } else {
                    $this->session->set_flashdata('success', "Order Placed Successfully");
                }
                echo json_encode($data);
            } else {
                //return direct
                if ($order->buyer_id == 0) {
                    $this->session->set_userdata('mds_show_order_completed_page', 1);
                    redirect($lang_base_url . get_route("order_completed", true) . $order->order_number);
                } else {
                    $this->session->set_flashdata('success', "Order Placed Successfully");
                    redirect("order-details". $order->order_number);
                }
            }
        } else {
            $this->session->set_flashdata('error', "Payment Error!");
            //return json encode response
            if ($redirect_type == 'json_encode') {
                $data = array(
                    'status' => 0,
                    'redirect' => generate_url("cart", "payment")
                );
                echo json_encode($data);
            } else {
                //return direct
                redirect("payment");
            }
        }
    }

    /**
     * Execute Promote Payment
     */
    public function execute_promote_payment($data_transaction, $redirect_type = 'json_encode'){
        $promoted_plan = $this->session->userdata('modesy_selected_promoted_plan');
        if (!empty($promoted_plan)) {
            //execute payment
            $this->promote_model->execute_promote_payment($data_transaction);
            //add to promoted products
            $this->promote_model->add_to_promoted_products($promoted_plan);

            //reset cache
            reset_cache_data_on_change();
            reset_user_cache_data($this->auth_user->id);

            //return json encode response
            if ($redirect_type == 'json_encode') {
                $data = array(
                    'result' => 1,
                    'redirect' => generate_url("promote_payment_completed") . "?method=gtw&product_id=" . $promoted_plan->product_id
                );
                echo json_encode($data);
            } else {
                redirect($lang_base_url . get_route("promote_payment_completed") . "?method=gtw&product_id=" . $promoted_plan->product_id);
            }
        } else {
            $this->session->set_flashdata('error', "Payment Error!");
            //return json encode response
            if ($redirect_type == 'json_encode') {
                $data = array(
                    'status' => 0,
                    'redirect' => generate_url("cart", "payment") . "?payment_type=promote"
                );
                echo json_encode($data);
            } else {
                $this->session->set_flashdata('error', trans("msg_error"));
                redirect($lang_base_url . get_route("cart", true) . get_route("payment") . "?payment_type=promote");
            }
        }
    }

    /**
     * Order Completed
     */
    public function order_completed($order_number)
    {
        $data['title'] = "Order Placed Successfully";
        $data['description'] = "Order Placed Successfully" . " - " . $this->app_name;
        $data['keywords'] = "Order Placed Successfully" . "," . $this->app_name;

        $data['order'] = $this->order_model->get_order_by_order_number($order_number);

        if (empty($data['order'])) {
            redirect(lang_base_url());
        }

        if (empty($this->session->userdata('mds_show_order_completed_page'))) {
            redirect(lang_base_url());
        }

        $this->load->view('partials/_header', $data);
        $this->load->view('cart/order_completed', $data);
        $this->load->view('partials/_footer');
    }

    /**
     * Promote Payment Completed
     */
    public function promote_payment_completed(){
        $data['title'] = trans("msg_payment_completed");
        $data['description'] = trans("msg_payment_completed") . " - " . $this->app_name;
        $data['keywords'] = trans("payment") . "," . $this->app_name;
        $data['promoted_plan'] = $this->session->userdata('modesy_selected_promoted_plan');
        if (empty($data['promoted_plan'])) {
            redirect(lang_base_url());
        }

        $data["method"] = $this->input->get('method');
        $data["transaction_number"] = $this->input->get('transaction_number');

        $this->load->view('partials/_header', $data);
        $this->load->view('cart/promote_payment_completed', $data);
        $this->load->view('partials/_footer');
    }

    ///////save address


    public function subscription_payment_method(){
        $plan_id=$this->input->post('plan_id');
        $token=$this->input->post('token');
        if($plan_id=='' && $token==''){
            redirect($this->agent->referrer());
        }
        $plan=$this->select->select_single_data('membership_plan','id',$plan_id);
        $total_amount=$plan[0]->subscription_amount;
        $currency= select_value_by_id('currencies','id',$plan[0]->currency_code,'hex');
        $cart_total=$plan[0]->subscription_amount;
        $data = array(
            'total_amount' => $total_amount,
            'currency' => $currency,
            'cart_total' => $cart_total,
            'plan_id' => $plan_id,
            'token' => $token
        );
        $insertArray=array(
            'plan_id' => $plan_id,
            'user_id' => $this->auth_user->id
        );
        $this->delete_model->delete('plan_cart','user_id',$this->auth_user->id);
        $this->insert_model->insert_data($insertArray,'plan_cart');
        $this->load->view('partials/header', $data);
        $this->load->view('auth/payment', $data);
        $this->load->view('partials/footer');
    }
    

    public function subscription_payment_processing(){
        $plan_id=$this->input->post('plan_id');
        $token=$this->input->post('token');
        if($plan_id=='' && $token==''){
            redirect($this->agent->referrer());
        }
        $plan=$this->select->select_single_data('membership_plan','id',$plan_id);
        $total_amount=$plan[0]->subscription_amount;
        // $currency= select_value_by_id('currencies','id',$plan[0]->currency_code,'hex');
        $cart_total=$plan[0]->subscription_amount;
        $data = array(
            'cart_total' => $cart_total,
            'plan_id' => $plan_id,
            'token' => $token
        );
        //  $data['cart_payment_method']=$this->input->post('payment_option', true);
        //  $data['payment_option']=$this->input->post('payment_option', true);
        
        $data['total_amount'] = (int)$plan[0]->subscription_amount*100;
        // $data['total_amount'] = 100;
        $data['cart_payment_method'] =$this->cart_model->set_cart_payment_method();
        // print_r($this->cart_model->set_cart_payment_method());die;
        $data['currency'] = $this->payment_settings->default_product_currency;
        $data['mds_payment_type'] = 'plan';
        $this->load->view('partials/header', $data);
        $this->load->view('cart/payment', $data);
        $this->load->view('partials/footer');
    }



    public function execute_plan_purchase($data_transaction, $redirect_type = 'json_encode'){
        $order_id = $this->order_model->add_membership_plan_order($data_transaction); 
        $order = $this->order_model->get_order($order_id);
        if ($redirect_type == 'json_encode') {
            $data = array(
                'result' => 1,
                'redirect' => base_url("seller/profile/complete")
            );
            if ($order->buyer_id == 0) {
                $this->session->set_userdata('mds_show_order_completed_page', 1);
                $data["redirect"] = base_url("order_completed") . "/" . $order->order_number;
            } else {
                $this->session->set_flashdata('success', "Order Placed Successfully");
            }
            echo json_encode($data);
        } else {
            //return direct
            if ($order->buyer_id == 0) {
                $this->session->set_userdata('mds_show_order_completed_page', 1);
               // redirect($lang_base_url . get_route("order_completed", true) . $order->order_number);
            } else {
                $this->session->set_flashdata('success', "Order Placed Successfully");
                redirect("seller/profile/complete");
            }
        }
    }

     
    public function saveaddress(){
        $this->form_validation->set_rules('billing_first_name', 'First Name', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('billing_last_name', 'Last Name', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('billing_phone_number', 'Phone Number', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('billing_address_1', 'Address', 'required|xss_clean|max_length[200]');
        // $this->form_validation->set_rules('billing_country', 'Country', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('billing_state', 'State', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('billing_city', 'City', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('billing_zip_code', 'Pin Code', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		}else{
            $billingdata=array(
                'user_id ' => $this->auth_user->id,
                'billing_first_name' => $this->input->post('billing_first_name',true),
                'address_type' => $this->input->post('address_type',true),
                'billing_last_name' => $this->input->post('billing_last_name',true),
                'billing_email' => $this->input->post('billing_email',true),
                'billing_phone_number' => $this->input->post('billing_phone_number',true),
                'billing_address_1' => $this->input->post('billing_address_1',true),
                'billing_address_2' => $this->input->post('billing_address_2',true),
                'billing_landmark' => $this->input->post('billing_landmark',true),
                // 'billing_country' => $this->input->post('billing_country',true),
                'billing_country' => 99,
                'billing_state' => $this->input->post('billing_state',true),
                'billing_city' => $this->input->post('billing_city',true),
                'billing_zip_code' => $this->input->post('billing_zip_code',true),
                'shipping_first_name' => $this->input->post('billing_first_name',true),
                'shipping_last_name' => $this->input->post('billing_last_name',true),
                'shipping_email' => $this->input->post('billing_email',true),
                'shipping_phone_number' => $this->input->post('billing_email',true),
                'shipping_address_1' => $this->input->post('billing_address_1',true),
                'shipping_address_2' => $this->input->post('billing_address_2',true),
                'shipping_landmark' => $this->input->post('billing_landmark',true),
                // 'shipping_country' => $this->input->post('billing_country',true),
                'shipping_country' => 99,
                'shipping_state' => $this->input->post('billing_state',true),
                'shipping_city' => $this->input->post('billing_city',true),
                'shipping_zip_code' => $this->input->post('billing_zip_code',true),
                'addl_info' => $this->input->post('addl_info',true),
                'is_default'=> 1
            );
    
            $shippingdata=array(
                'shipping_first_name' => $this->input->post('billing_first_name',true),
                'shipping_last_name' => $this->input->post('billing_last_name',true),
                'shipping_email' => $this->input->post('billing_email',true),
                'shipping_phone_number' => $this->input->post('billing_email',true),
                'shipping_address_1' => $this->input->post('billing_address_1',true),
                'shipping_address_2' => $this->input->post('billing_address_2',true),
                'shipping_landmark' => $this->input->post('billing_landmark',true),
                // 'shipping_country' => $this->input->post('billing_country',true),
                'shipping_country' => 99,
                'shipping_state' => $this->input->post('billing_state',true),
                'shipping_city' => $this->input->post('billing_city',true),
                'shipping_zip_code' => $this->input->post('billing_zip_code',true),
            );
    
            $this->clearDefaultAddress();
            $insert= $this->insert_model->insert_data($billingdata,'address_book');
            if($insert){
                $this->edit_model->edit($shippingdata,$this->auth_user->id,'id','users'); 
                // $this->session->set_flashdata('success', 'Address has been inserted successfully');
                // redirect($this->agent->referrer());
                return true;
            }
        }  
    }

    public function clearDefaultAddress(){
        $result=$this->select->select_single_data('address_book','user_id', $this->auth_user->id);
        if(!empty($result)){
        $this->edit_model->edit(array('is_default'=>0),$this->auth_user->id,'user_id','address_book'); 
           return true; 
        }else{
            return false;
        }
    }


    public function clear_cart(){
        $userid=$this->uri->segment(3);
        $res = $this->delete_model->delete('cart','buyer_id',$userid);
        // echo $res;
        redirect($this->agent->referrer());
    }

    public function apply_coupon_code(){
        $cart_total = $this->cart_model->calculate_cart_total();
        $coupon =  $this->input->post('coupone_code',true);
        $coupon_code = get_coupon_data($coupon);
        if($coupon_code->amount != 0 && $coupon_code->amount < $cart_total->subtotal){
            $insertArray=array(
                'buyer_id' => $this->auth_user->id,
                'coupon_code' => $this->input->post('coupone_code',true)
            );
            $insert = $this->insert_model->insert_data($insertArray,'applied_coupons');
            $this->session->set_flashdata('success', "Coupon Applied Successfully");
            redirect($this->agent->referrer());
        }else{
            $this->session->set_flashdata('error', "Coupon Not Applied");
            redirect($this->agent->referrer());
        }
        
    }
}
