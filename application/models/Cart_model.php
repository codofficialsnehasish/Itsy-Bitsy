<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->cart_product_ids = array();
    }


    //add to cart
    public function add_to_cart($product)
    {
        $deliveryCharge = null;
        $quantity = $this->input->post('product_quantity', true);
    	$deliveryCharge = $quantity*$this->input->post('delivery_charge');
        if ($product->product_type == "digital") {
            $quantity = 1;
        }
        $appended_variations = $this->get_selected_variations($product->id)->str;
        $options_array = $this->get_selected_variations($product->id)->options_array;

        // if(!empty($this->input->post('user_id', true))){
        //     $buyerId=$this->input->post('user_id', true);
        // }else{
        //     $buyerId=$this->auth_user->id ? $this->auth_user->id : get_cookie('user_id');
        //     return $buyer_id;
        // }

        // if(!empty($this->input->cookie('user_id',true))){
        //     $buyerId=$this->input->cookie('user_id',true);
        // }else{
        //     $buyerId=$this->auth_user->id;
        // }

        // if($auth_check){
        //     $buyerId=$this->auth_user->id;
        // }else{
        //     $buyerId=$this->input->cookie('user_id',true);
        // }

        if($this->auth_check){
            $buyerId=$this->auth_user->id;
        }else{
            $buyerId=$this->input->cookie('user_id',true);
        }
        $item =  array(
            'product_id' => $product->id,
            'product_type' => $product->product_type,
            'product_title' => $product->title . " " . $appended_variations,
            'variations' => implode(',',$options_array),
            'quantity' => $quantity,
        	//'delivery_charge' => 0,
        	//'total_delevery_charge' => 0,
            'delivery_charge' => $this->input->post('delivery_charge'),
        	'total_delevery_charge' => $deliveryCharge,
            'buyer_id' => $buyerId
        );

        // $object=$this->get_product_price_and_stock($product,$options_array,$quantity);
        // echo '<pre>'; print_r($object);
        // echo $object->price_calculated;die;
        if( $this->input->post('button_type') == 'buynow'){
            // if( $this->check_cart_exists($product->id,$buyerId)==false){
                if ($this->db->insert('cart', $item)) {
                    $last_id = $this->db->insert_id();
                }
                // return $product->title . " " . $appended_variations.' has been added to cart successfully';
            // }
        }else{
        if( $this->check_cart_exists($product->id,$buyerId)==false){
            if ($this->db->insert('cart', $item)) {
                $last_id = $this->db->insert_id();
            }
            return $product->title . " " . $appended_variations.' has been added to cart successfully';
        }else{
            $cartExists=$this->check_cart_exists($product->id,$buyerId);
            $con = array(
                'product_id' => $product->id,
                'variations' => implode(',',$options_array),
                'buyer_id' => $buyerId
            );
            $updateitem =  array(
                'quantity' => $quantity + $cartExists['quantity']
            );
            $this->db->where($con);
            $this->db->update('cart', $updateitem);
            return $product->title . " " . $appended_variations.' has been updated successfully';
        }
        }
    }
 
 

    public function check_cart_exists($product_id,$buyerId){
        $options_array = $this->get_selected_variations($product_id)->options_array;
        $con = array(
            'product_id' => $product_id,
            'variations' => implode(',',$options_array),
            'buyer_id' => $buyerId
        );
        $this->db->select('*');
        $this->db->from('cart');    
        $this->db->where($con);
        $query = $this->db->get();
        $check = $query->num_rows();
        if($check > 0){
            return $query->row_array();
        }else{
            return false;
        }
    }

    // public function get_cart_by_buyer(){
    //     if ($this->auth_check) {
    //         $con = array(
    //             'buyer_id' => $this->auth_user->id
    //         );
    //         $this->db->select('*');
    //         $this->db->from('cart');    
    //         $this->db->where($con);
    //         $query = $this->db->get();
    //         $check = $query->num_rows();
    //         if($check > 0){
    //             return $query->result();
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         if($this->input->cookie('user_id',true)){
    //             $con = array(
    //                 'buyer_id' => $this->input->cookie('user_id',true)
    //             );
    //             $this->db->select('*');
    //             $this->db->from('cart');    
    //             $this->db->where($con);
    //             $query = $this->db->get();
    //             $check = $query->num_rows();
    //             if($check > 0){
    //                 return $query->result();
    //             }else{
    //                 return false;
    //             }
    //         }else{
    //             return false;
    //         }
    //     }
    // }

    public function get_applied_coupon_code_by_buyer(){
        if ($this->auth_check) {
            $con = array(
                'buyer_id' => $this->auth_user->id
            );
        }else{
            if(!empty($this->input->cookie('user_id',true))){
                $con = array(
                    'buyer_id' => $this->input->cookie('user_id',true)
                ); 
            }
            else{ return false; }
        }
        $this->db->select('coupon_code');
        $this->db->from('applied_coupons');    
        $this->db->where($con);
        $query = $this->db->get();
        $check = $query->num_rows();
        if($check > 0){
            $res = $query->result();
            return $res[0]->coupon_code;
        }else{
            return '';
        }
    }

    public function get_cart_by_buyer(){
        if ($this->auth_check) {
            $con = array(
                'buyer_id' => $this->auth_user->id,
                'not_get' => 0 //for buy now features
            );
        }else{
            if(!empty($this->input->cookie('user_id',true))){
                $con = array(
                    'buyer_id' => $this->input->cookie('user_id',true),
                    'not_get' => 0 //for buy now features
                ); 
            }
            else{
                return false;
            }
        }
        $this->db->select('*');
        $this->db->from('cart');    
        $this->db->where($con);
        $query = $this->db->get();
        $check = $query->num_rows();
        if($check > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_cart_by_buyer_edit(){
        if ($this->auth_check) {
            $con = array(
                'buyer_id' => $this->auth_user->id,
                //'not_get' => 0 //for buy now features
            );
        }else{
            if(!empty($this->input->cookie('user_id',true))){
                $con = array(
                    'buyer_id' => $this->input->cookie('user_id',true),
                    //'not_get' => 0 //for buy now features
                ); 
            }
            else{
                return false;
            }
        }
        $this->db->select('*');
        $this->db->from('cart');    
        $this->db->where($con);
        $query = $this->db->get();
        $check = $query->num_rows();
        if($check > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    //remove from cart
    public function remove_from_cart($cart_item_id)
    {
		$this->delete_model->delete('cart','id',$cart_item_id);
    }

    //get selected variations
    public function get_selected_variations($product_id)
    {
        $object = new stdClass();
        $object->str = "";
        $object->options_array = array();

        $variations = $this->variation_model->get_product_variations($product_id);
        $str = "";
        if (!empty($variations)) {
            foreach ($variations as $variation) {
                $append_text = "";
                if (!empty($variation) && $variation->is_visible == 1) {
                    $variation_val = $this->input->post('variation' . $variation->id, true);
                    if (!empty($variation_val)) {

                        if ($variation->variation_type == "text" || $variation->variation_type == "number") {
                            $append_text = $variation_val;
                        } else {
                            //check multiselect
                            if (is_array($variation_val)) {
                                $i = 0;
                                foreach ($variation_val as $item) {
                                    $option = $this->variation_model->get_variation_option($item);
                                    if (!empty($option)) {
                                        if ($i == 0) {
                                            $append_text .= $option->option_names;
                                        } else {
                                            $append_text .= " - " . $option->option_names;
                                        }
                                        $i++;
                                        array_push($object->options_array, $option->id);
                                    }
                                }
                            } else {
                                $option = $this->variation_model->get_variation_option($variation_val);
                                if (!empty($option)) {
                                    $append_text .= $option->option_names;
                                    array_push($object->options_array, $option->id);
                                }
                            }
                        }

                        if (empty($str)) {
                            $str .= "(" . $variation->label_names . ": " . $append_text;
                        } else {
                            $str .= ", " . $variation->label_names . ": " . $append_text;
                        }
                    }
                }
            }
            if (!empty($str)) {
                $str = $str . ")";
            }
        }
        $object->str = $str;

        return $object;
    }

    //get product price and stock
    public function get_product_price_and_stock($product,$options_array,$quantity)
    {
        $object = new stdClass();
        $object->price = 0;
        $object->discount_rate = 0;
        $object->price_calculated = 0;
        $object->is_stock_available = 0;

        if (!empty($product)) {
            //quantity in cart
             $quantity_in_cart = $quantity;
            // if (!empty($this->session->userdata('mds_shopping_cart'))) {
            //     foreach ($this->session->userdata('mds_shopping_cart') as $item) {
            //         if ($item->product_id == $product->id && $item->product_title == $cart_product_title) {
            //             $quantity_in_cart += $item->quantity;
            //         }
            //     }
            // }

            $stock = $product->stock;
            $object->price = $this->auth_check && $this->auth_user->role == 'dristributor' ? $product->dis_price : $product->price;
            $object->discount_rate = $this->auth_check && $this->auth_user->role == 'dristributor' ? $product->dis_discount_rate : $product->discount_rate;
            if (!empty($options_array)) {
                foreach ($options_array as $option_id) {
                    $option = $this->variation_model->get_variation_option($option_id);
                    if (!empty($option)) {
                        $variation = $this->variation_model->get_variation($option->variation_id);
                        if ($variation->use_different_price == 1) {
                            if (isset($option->price)) {
                                $object->price = $option->price;
                            }
                            if (isset($option->discount_rate)) {
                                $object->discount_rate = $option->discount_rate;
                            }
                        }
                        if ($option->is_default != 1) {
                            $stock = $option->stock;
                        }
                    }
                }
            }

            if (empty($object->price)) {
                $object->price = $this->auth_user->role == 'dristributor' ? $product->dis_price : $product->price;
                $object->discount_rate = $this->auth_user->role == 'dristributor' ? $product->dis_discount_rate : $product->discount_rate;
            }
            $object->price_calculated = calculate_product_price($object->price, $object->discount_rate);

            if ($stock >= $quantity_in_cart) {
                $object->is_stock_available = 1;
            }
            if ($product->stock_unlimited == 1) {
                $object->is_stock_available = 1;
            }
        }
        return $object;
    }

    //get product shipping cost
    public function get_product_shipping_cost($product, $quantity)
    {
        if (in_array($product->id, $this->cart_product_ids)) {
            return $product->shipping_cost_additional * $quantity;
        } else {
            array_push($this->cart_product_ids, $product->id);
            if ($quantity > 1) {
                return $product->shipping_cost + ($product->shipping_cost_additional * ($quantity - 1));
            } else {
                return $product->shipping_cost * $quantity;
            }
        }
    }

    //update cart product quantity
    public function update_cart_product_quantity($product_id, $cart_item_id, $quantity)
    {
    	$result = $this->select->select_single_data('cart','id',$cart_item_id);
    	$deliveryCharge = $result[0]->delivery_charge * $quantity;
        $update=$this->edit_model->edit(array('quantity'=>$quantity,'total_delevery_charge'=>$deliveryCharge),$cart_item_id,'id','cart');
        return true;// 'Ok';
    }

  
    //calculate total gst
    public function calculate_total_gst($price_calculated, $gst_rate, $quantity)
    {
        if (!empty($price_calculated)) {
            $price = $price_calculated / 100;
            $gst = calculate_gst($price, $gst_rate) * $quantity;
            if (!is_int($gst)) {
                $gst = round($gst, 2);
            }
            return $gst * 100;
        }
        return 0;
    }

    //calculate cart total
    public function calculate_cart_total($mode='Cash On Delevary'){
        $cartitems = $this->get_cart_by_buyer();
        // $coupon_code = $this->get_applied_coupon_code_by_buyer();
        $coupon_code = get_coupon_data($this->cart_model->get_applied_coupon_code_by_buyer());
        // $coupon_data = $coupon_code != '' ? get_coupon_data($coupon_code) : Array();
        $coupone_discount_amount = $coupon_code->amount;
        $cart_total = new stdClass();
        $cart_total->coupone_discount = 0;
        $cart_total->coupone_code = '';
        $cart_total->subtotal = 0;
        $cart_total->gst = 0;
        $cart_total->shipping_cost = 0;
        $cart_total->total = 0;
        $cart_total->no_of_items = !empty($cartitems)?count($cartitems):0;
        $cart_total->currency_code = $this->payment_settings->default_product_currency;
        $cart_total->currency ='';
         
        if(!empty($cartitems)){
            $total =0;
            foreach($cartitems as $item){
                $product = $this->product_model->get_product_by_id($item->product_id);
                if(!empty($product->id)){
                    $appended_variations = $this->get_selected_variations($product->id)->str;
                    if(!empty($item->variations) || $item->variations!='' || $item->variations!=null){
                        $cartvariations=explode(',',$item->variations);
                    }else{
                        $cartvariations[]="";
                    }
                    array_filter($cartvariations);
                }
                //print_r(array_filter($cartvariations));
                $object=$this->get_product_price_and_stock($product,$cartvariations,$item->quantity);
                // echo $object->price_calculated;die;
                unset($cartvariations);
                $cart_total->subtotal += (int)$object->price_calculated * (int)$item->quantity;
                //  $cart_total->gst += (int)calculate_product_gst($product) * (int)$item->quantity;
                // $cart_total->shipping_cost += $item->shipping_cost;
                // $total+=$price;
                $currency=select_value_by_id('currencies','id',$product->currency_code,'hex');
            }
            $cart_total->currency=$currency;  
        }
        // $cart_total->gst=($cart_total->subtotal*12)/100;
        
        $cart_total->shipping_cost+= get_shipping_cost($cart_total->subtotal,$mode);
        $cart_total->total = $cart_total->subtotal + $cart_total->gst + $cart_total->shipping_cost;
        if($coupon_code->amount != 0){
            $exp = DateTime::createFromFormat('d M, Y', $coupon_code->expiry_date)->format('Y-m-d');
            if($cart_total->total >= $coupon_code->minimum_spend && $cart_total->total <= $coupon_code->maximum_spend && $exp <= date("Y-m-d")){
                $cart_total->total -= $coupone_discount_amount;
                $cart_total->coupone_discount = $coupone_discount_amount;
                $cart_total->coupone_code = $coupon_code->amount != 0 ?$coupon_code->coupons_code : '';
            }else{
                $cart_total->coupone_discount = 0;
            }
        }
        return $cart_total;
    }
 
    //get cart shipping address session
    public function get_cart_shipping_address()
    {
        
        $std = new stdClass();
        $row = null;

        if ($this->auth_check) {
        $std->shipping_first_name = $this->auth_user->shipping_first_name;
        $std->shipping_last_name = $this->auth_user->shipping_last_name;
        $std->shipping_email = $this->auth_user->shipping_email;
        $std->shipping_phone_number = $this->auth_user->shipping_phone_number;
        $std->shipping_address_1 = $this->auth_user->shipping_address_1;
        $std->shipping_address_2 = $this->auth_user->shipping_address_2;
        $std->shipping_country = $this->auth_user->shipping_country;
        $std->shipping_state = $this->auth_user->shipping_state;
        $std->shipping_city = $this->auth_user->shipping_city;
        $std->shipping_zip_code = $this->auth_user->shipping_zip_code;
        $std->billing_first_name = $this->auth_user->shipping_first_name;
        $std->billing_last_name = $this->auth_user->shipping_last_name;
        $std->billing_email = $this->auth_user->shipping_email;
        $std->billing_phone_number = $this->auth_user->shipping_phone_number;
        $std->billing_address_1 = $this->auth_user->shipping_address_1;
        $std->billing_address_2 = $this->auth_user->shipping_address_2;
        $std->billing_country = $this->auth_user->shipping_country;
        $std->billing_state = $this->auth_user->shipping_state;
        $std->billing_city = $this->auth_user->shipping_city;
        $std->billing_zip_code = $this->auth_user->shipping_zip_code;
        $std->use_same_address_for_billing = 1;
        return $std;
    } 
    }
     //set cart payment method option session
     public function set_sess_cart_payment_method()
     {
         $std = new stdClass();
         $std->payment_option = $this->input->post('payment_option', true);
       //  $std->terms_conditions = $this->input->post('terms_conditions', true);
         $this->session->set_userdata('mds_cart_payment_method', $std);
     }

     //get cart payment method option session
    public function get_sess_cart_payment_method()
    {
        if (!empty($this->session->userdata('mds_cart_payment_method'))) {
            return $this->session->userdata('mds_cart_payment_method');
        }
    }


//set cart payment method option session
        public function set_cart_payment_method()
        {
            $std = new stdClass();
            $std->payment_option = $this->input->post('payment_option', true);
          //  $std->terms_conditions = $this->input->post('terms_conditions', true);
           return $std;
        }
     //clear cart
    public function clear_cart($userId="")
    {
        if($userId!=''){
            $buyer_id = $userId;
            }
            else{
            $buyer_id = $this->auth_user->id;
        }
        // $this->delete_model->delete('cart','buyer_id',$buyer_id);
        $this->delete_model->delete_multiple_clause('cart','buyer_id',$buyer_id,'not_get',0);
    }


    public function clear_coupon_data($userId="")
    {
        if($userId!=''){
            $buyer_id = $userId;
        }else{
            $buyer_id = $this->auth_user->id;
        }
        $this->delete_model->delete('applied_coupons','buyer_id',$buyer_id);
    }


     /////////////////////05/08/22
      //calculate cart total
      public function calculate_plan_cart_total()
      {
          $cartitems = $this->select->select_single_data('plan_cart','user_id',$this->auth_user->id);
          $cart_total = new stdClass();
          $cart_total->subtotal = 0;
          $cart_total->gst = 0;
          $cart_total->shipping_cost = 0;
          $cart_total->total = 0;
          $cart_total->no_of_items = !empty($cartitems)?count($cartitems):0;
          $cart_total->currency_code = $this->payment_settings->default_product_currency;
          $cart_total->currency ='';
          $cart_total->plan_id=0;
          if(!empty($cartitems)){
            $plan=$this->select->select_single_data('membership_plan','id',$cartitems[0]->plan_id);
            $cart_total = new stdClass();
            $cart_total->subtotal = $plan[0]->subscription_amount;
            $cart_total->total = $plan[0]->subscription_amount;
            $cart_total->no_of_items = !empty($cartitems)?count($cartitems):0;
            $cart_total->currency_code = $this->payment_settings->default_product_currency;
            $cart_total->plan_id=$cartitems[0]->plan_id;
            $cart_total->currency = select_value_by_id('currencies','id',$plan[0]->currency_code,'hex');
          return $cart_total;
      }
  
}

//clear cart
public function clear_plan_cart()
{
    $this->delete_model->delete('plan_cart','user_id',$this->auth_user->id);
}



//////////////////////////////////////////////////////////
////api user get cart
public function get_cart_by_buyer_api($buyerId){
    if (!(empty($buyerId))) {
    $con = array(
        'buyer_id' => $buyerId
    );
    $this->db->select('*');
    $this->db->from('cart');    
    $this->db->where($con);
    $query = $this->db->get();
    $check = $query->num_rows();
    if($check > 0){
        return $query->result();
    }else{
        return false;
    }
}else{
    return false;
}
}



    //calculate cart total api
    public function calculate_cart_total_api($buyerId)
    {
        $cartitems = $this->get_cart_by_buyer_api($buyerId);
        $cart_total = new stdClass();
        $cart_total->subtotal = 0;
        $cart_total->gst = 0;
        $cart_total->shipping_cost = 0;
        $cart_total->total = 0;
        $cart_total->no_of_items = !empty($cartitems)?count($cartitems):0;
        $cart_total->currency_code = 'INR';
        $cart_total->currency ='';
        if(!empty($cartitems)){
           $total =0;
           foreach($cartitems as $item){
           $product = $this->product_model->get_product_by_id($item->product_id);
           $appended_variations = $this->get_selected_variations($product->id)->str;
           if(!empty($item->variations) || $item->variations!='' || $item->variations!=null){
               $cartvariations=explode(',',$item->variations);
           }else{
               $cartvariations[]="";
           }
           array_filter($cartvariations);
           //print_r(array_filter($cartvariations));
           $object=$this->get_product_price_and_stock($product,$cartvariations,$item->quantity);
          // echo $object->price_calculated;die;
           unset($cartvariations);
           $cart_total->subtotal += (int)$object->price_calculated * (int)$item->quantity;
          // $cart_total->gst += $item->product_gst;
         // $cart_total->shipping_cost += $item->shipping_cost;
          // $total+=$price;
          $currency=select_value_by_id('currencies','id',$product->currency_code,'hex');

        }
          $cart_total->currency=$currency;  
        }
        $cart_total->gst=($cart_total->subtotal*12)/100;
      
        $cart_total->total = $cart_total->subtotal + $cart_total->gst + $cart_total->shipping_cost;
        return $cart_total;
    }

    /////////a

    //add to cart api
    public function add_to_cart_api($product,$quantity,$userid)
    {
       // $quantity = $this->post('product_quantity');
        if ($product->product_type == "digital") {
            $quantity = 1;
        }
        $appended_variations = $this->get_selected_variations($product->id)->str;
        $options_array = $this->get_selected_variations($product->id)->options_array;

        if(!empty($userid)){
            $buyerId=$userid;
        }else{
            $buyerId=$this->auth_user->id;
        }

        $item =  array(
            'product_id' => $product->id,
            'product_type' => $product->product_type,
            'product_title' => $product->title . " " . $appended_variations,
            'variations' => implode(',',$options_array),
            'quantity' => $quantity,
            'buyer_id' => $buyerId
        );

        // $object=$this->get_product_price_and_stock($product,$options_array,$quantity);
        // echo '<pre>'; print_r($object);
        // echo $object->price_calculated;die;
       if($this->check_cart_exists($product->id,$buyerId)==false){
        if ($this->db->insert('cart', $item)) {
            $last_id = $this->db->insert_id();
         }
         return $product->title . " " . $appended_variations.' has been added to cart successfully';
       }else{
        $cartExists=$this->check_cart_exists($product->id,$buyerId);
       $con = array(
        'product_id' => $product->id,
        'variations' => implode(',',$options_array),
        'buyer_id' => $buyerId
        );
        $updateitem =  array(
            'quantity' => $quantity + $cartExists['quantity']
        );
        $this->db->where($con);
        $this->db->update('cart', $updateitem);
        return $product->title . " " . $appended_variations.' has been updated successfully';
       }
    }


  //get selected variations api
    public function get_selected_variations_api($product_id)
    {
        $object = new stdClass();
        $object->str = "";
        $object->options_array = array();

        $variations = $this->variation_model->get_product_variations($product_id);
        $str = "";
        if (!empty($variations)) {
            foreach ($variations as $variation) {
                $append_text = "";
                if (!empty($variation) && $variation->is_visible == 1) {
                    $variation_val = $this->post('variation' . $variation->id);
                    if (!empty($variation_val)) {

                        if ($variation->variation_type == "text" || $variation->variation_type == "number") {
                            $append_text = $variation_val;
                        } else {
                            //check multiselect
                            if (is_array($variation_val)) {
                                $i = 0;
                                foreach ($variation_val as $item) {
                                    $option = $this->variation_model->get_variation_option($item);
                                    if (!empty($option)) {
                                        if ($i == 0) {
                                            $append_text .= $option->option_names;
                                        } else {
                                            $append_text .= " - " . $option->option_names;
                                        }
                                        $i++;
                                        array_push($object->options_array, $option->id);
                                    }
                                }
                            } else {
                                $option = $this->variation_model->get_variation_option($variation_val);
                                if (!empty($option)) {
                                    $append_text .= $option->option_names;
                                    array_push($object->options_array, $option->id);
                                }
                            }
                        }

                        if (empty($str)) {
                            $str .= "(" . $variation->label_names . ": " . $append_text;
                        } else {
                            $str .= ", " . $variation->label_names . ": " . $append_text;
                        }
                    }
                }
            }
            if (!empty($str)) {
                $str = $str . ")";
            }
        }
        $object->str = $str;

        return $object;
    }
}