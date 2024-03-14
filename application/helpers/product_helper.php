<?php defined('BASEPATH') or exit('No direct script access allowed');

//get parent categories
if (!function_exists('get_parent_categories')) {
    function get_parent_categories($categories)
    {
        if (!empty($categories)) {
            return array_filter($categories, function ($item) {
                return $item->parent_id == 0;
            });
        }
        return null;
    }
}

//get subcategories
if (!function_exists('get_subcategories')) {
    function get_subcategories($categories, $parent_id)
    {
        if (!empty($categories)) {
            return array_filter($categories, function ($item) use ($parent_id) {
                return $item->parent_id == $parent_id;
            });
        }
        return null;
    }
}

//get navigation categories
if (!function_exists('get_navigation_categories')) {
    function get_navigation_categories($categories)
    {
        if (!empty($categories)) {
            return array_filter($categories, function ($item) {
                return $item->show_image_on_navigation == 1;
            });
        }
        return null;
    }
}

//get category
if (!function_exists('get_category')) {
    function get_category($categories, $id)
    {
        if (!empty($categories)) {
            return array_filter($categories, function ($item) use ($id) {
                return $item->id == $id;
            });
        }
        return null;
    }
}

if (!function_exists('get_category_by_id')) {
    function get_category_by_id($id)
    {
        $ci =& get_instance();
        return $ci->category_model->get_category($id);
    }
}

if (!function_exists('get_category_by_id')) {
    function get_category_by_id($id)
    {
        $ci =& get_instance();
        return $ci->category_model->get_category($id);
    }
}
//get category
if (!function_exists('get_category_by_id')) {
    function get_category_by_id($id)
    {
        $ci =& get_instance();
        return $ci->category_model->get_category($id);
    }
}

if (!function_exists('get_category_by_slug')) {
    function get_category_by_slug($slug)
    {
        $ci =& get_instance();
        $result = $ci->select->custom_qry("SELECT * FROM categories WHERE cat_slug='$slug'");
        // $result = $ci->select->custom_qry("SELECT * FROM categories WHERE cat_slug='cats'");
        if(!empty($result)){
            return $result[0];
        }else{
            return Array();
        }
    }
}

//get category name
if (!function_exists('category_name')) {
    function category_name($category)
    {
        if (!empty($category)) {
            if (!empty($category->name)) {
                return html_escape($category->name);
            } else {
                if (!empty($category->second_name)) {
                    return html_escape($category->second_name);
                }
            }
        }
        return "";
    }
}

//get category image url
if (!function_exists('get_category_image_url')) {
    function get_category_image_url($category)
    {
        if ($category->storage == "aws_s3") {
            $ci =& get_instance();
            return $ci->aws_base_url . $category->image;
        } else {
            return base_url() . $category->image;
        }
    }
}

//generate ids string
if (!function_exists('generate_ids_string')) {
    function generate_ids_string($array)
    {
        if (empty($array)) {
            return "0";
        } else {
            $array_new = array();
            foreach ($array as $item) {
                if (!empty(clean_number($item))) {
                    array_push($array_new, clean_number($item));
                }
            }
            return implode(',', $array_new);
        }
    }
}


//product form data
if (!function_exists('get_product_form_data')) {
    function get_product_form_data($product)
    {
        $ci =& get_instance();
        $data = new stdClass();
        $data->add_to_cart_url = "";
        $data->button = "";

        if (!empty($product)) {
            $disabled = "";
             $display  ="";
             
            if (!check_product_stock($product)) {
                $disabled = " disabled";
                $display = " style=\"display:none;\"";
            }
            // else{
            //     $disabled = " ";
            //     $display = " style=\"display:block;\"";
            // }
            
            // if(!auth_check()){
            //     $data->button = '<button type="button" class="btn btn-md bg-dark cart-button text-white w-50 btn-product-cart adcartbtn"'. $display . '  data-bs-toggle="modal" data-bs-target="#loginModal"><i class="zmdi zmdi-shopping-basket"></i>Add to Cart</button>';
            // }else{
                if ($product->listing_type == 'sell_on_site') {
                    if ($product->is_free_product != 1) {
                        $data->add_to_cart_url = base_url() . 'add-to-cart';
                        $data->button .= '<div class="payment-button" data-shopify="payment-button">';
                        $data->button .= '<button type="submit" name="button_type" value="buynow" class="add-to-cart btn btn-default payment-button__button payment-button__button--unbranded"' . $disabled .$display. '><i class="icon an an-shopping-bag"></i> Buy Now</button>';
                        $data->button .= '</div>';
                        // <button type="submit" class="btn product-form__cart-submit"><span>Add to cart</span></button>
                                // <button type="button" class="payment-button__button payment-button__button--unbranded"><i class="icon an an-shopping-bag"></i> Buy Now</button>
                            

                    }
                }
            // }

            // } elseif ($product->listing_type == 'bidding') {
            //     $data->add_to_cart_url = base_url() . 'request-quote';
            //     $data->button = '<button class="btn btn-md btn-block btn-product-cart"' . $disabled . '>' . trans("request_a_quote") . '</button>';
            //     if (!$ci->auth_check && $product->listing_type == 'bidding') {
            //         $data->button = '<button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-md btn-block btn-product-cart"' . $disabled . '>' . trans("request_a_quote") . '</button>';
            //     }
            // } else {
            //     if (!empty($product->external_link)) {
            //         $data->button = '<a href="' . $product->external_link . '" class="btn btn-md btn-block" target="_blank">' . trans("buy_now") . '</a>';
            //     }
            // }
        }
        return $data;
    }
}

//get product item image
if (!function_exists('get_product_main_image')) {
    function get_product_main_image($product)
    {
		// echo '<pre>';
		// 		print_r($product);
         $ci =& get_instance();
         $conditions=array(
                'tblName'=>'product_images',
                'where'=>array(
                    'product_id'=>$product->id,
                    'status'=>1,
                    'is_main'=>1
                )
        );
            $result=$ci->select->getResult($conditions);

         if (!empty($result)) {
            return base_url($result[0]->file_path.$result[0]->file_name);
         }else{
            return base_url('assets/admin/images/no-image.jpg');
         }
    }
}

//get product item image
if (!function_exists('get_product_image_by_id')) {
    function get_product_image_by_id($product_id)
    {
		// echo '<pre>';
		// 		print_r($product);
         $ci =& get_instance();
         $conditions=array(
                'tblName'=>'product_images',
                'where'=>array(
                    'product_id'=>$product_id,
                    'status'=>1,
                    'is_main'=>1
                )
        );
            $result=$ci->select->getResult($conditions);

         if (!empty($result)) {
            return base_url($result[0]->file_path.$result[0]->file_name);
         }else{
            return base_url('assets/images/no-image.jpg');
         }
    }
}


//get product item image
if (!function_exists('get_product_image')) {
    function get_product_image($media_id)
    {
		// echo '<pre>';
		// 		print_r($product);
         $ci =& get_instance();
         $conditions=array(
                'tblName'=>'product_images',
                'where'=>array(
                    'media_id'=>$media_id,
                    'status'=>1
                )
        );
            $result=$ci->select->getResult($conditions);

         if (!empty($result)) {
            return base_url($result[0]->file_path.$result[0]->file_name);
         }else{
            return base_url('assets/images/no-image.jpg');
         }
    }
}


//get latest products
if (!function_exists('get_latest_products')) {
    function get_latest_products($limit)
    {
        $ci =& get_instance();
        $key = "latest_products";
        if ($ci->default_location_id != 0) {
            $key = "latest_products_location_" . $ci->default_location_id;
        }
        $latest_products = get_cached_data($key);
        if (empty($latest_products)) {
            $latest_products = $ci->product_model->get_products_limited($limit);
            set_cache_data($key, $latest_products);
        }
        return $latest_products;
    }
}

//get promoted products
if (!function_exists('get_promoted_products')) {
    function get_promoted_products($offset, $per_page)
    {
        $ci =& get_instance();
        $key = "promoted_products_" . $offset . "_" . $per_page;
        if ($ci->default_location_id != 0) {
            $key = "promoted_products_location_" . $ci->default_location_id . "_" . $offset . "_" . $per_page;
        }
        $promoted_products = get_cached_data($key);
        if (empty($promoted_products)) {
            $promoted_products = $ci->product_model->get_promoted_products_limited($offset, $per_page);
            set_cache_data($key, $promoted_products);
        }
        return $promoted_products;
    }
}

//get promoted products count
if (!function_exists('get_promoted_products_count')) {
    function get_promoted_products_count()
    {
        $ci =& get_instance();
        $key = "promoted_products_count";
        if ($ci->default_location_id != 0) {
            $key = "promoted_products_count_location_" . $ci->default_location_id;
        }
        $count = get_cached_data($key);
        if (empty($count)) {
            $count = $ci->product_model->get_promoted_products_count();
            set_cache_data($key, $count);
        }
        return $count;
    }
}

//get route settings
if (!function_exists('get_route_settings')) {
    function get_route_settings()
    {
        if (@SITE_MDS_KEY != @sha1(gt_sys_suffx() . gt_dmn_cd())) {
            @mem_usg_sys();
        }
    }
}

//is product in wishlist
if (!function_exists('is_product_in_wishlist')) {
    function is_product_in_wishlist($product)
    {
        $ci =& get_instance();
        if ($ci->auth_check) {
            if (!empty($product->is_in_wishlist)) {
                return true;
            }
        } else {
            $wishlist = $ci->session->userdata('mds_guest_wishlist');
            if (!empty($wishlist)) {
                if (in_array($product->id, $wishlist)) {
                    return true;
                }
            }
        }
        return false;
    }
}

//get currency
if (!function_exists('get_currency')) {
    function get_currency($currency_key)
    {
        $ci =& get_instance();
        if (!empty($ci->currencies)) {
            if (isset($ci->currencies[$currency_key])) {
                return $ci->currencies[$currency_key]["hex"];
            }
        }
        return "";
    }
}

//calculate product price
if (!function_exists('calculate_product_price')) {
    function calculate_product_price($price, $discount_rate)
    {
        if (!empty($price)) {
            if (!empty($discount_rate)) {
                $price = $price - (($price * $discount_rate) / 100);
            }
            return $price;
        }
        return 0;
    }
}

//calculate gst
if (!function_exists('calculate_gst')) {
    function calculate_gst($price_calculated, $gst_rate)
    {
        return ($price_calculated * $gst_rate) / 100;
    }
}

//calculate product gst
if (!function_exists('calculate_product_gst')) {
    function calculate_product_gst($product)
    {
     $ci =& get_instance();
        if (!empty($product)) {
            if (!empty($product->gst_rate)) {
           	    $commissionRate = get_commission_rate($product->user_id);
                $price = calculate_product_price($product->price, $product->discount_rate);
                $price = $price - (($price * $commissionRate) / 100);
                return ($price * $product->gst_rate) / 100;
            }
        }
        return 0;
    }
}

//calculate earned amount
if (!function_exists('calculate_earned_amount')) {
    function calculate_earned_amount($product)
    {
        $ci =& get_instance();
        if (!empty($product)) {
           $commissionRate = get_commission_rate($product->user_id);
            $price = calculate_product_price($product->price, $product->discount_rate) + calculate_product_gst($product);
            return $price - (($price *  $commissionRate) / 100);
        }
        return 0;
    }
}

//price formatted
if (!function_exists('price_formatted')) {
    function price_formatted($price, $currency, $discount_rate)
    {
    $priceHtml="";
    if($discount_rate>0){
        $original_price = calculate_product_price($price, $discount_rate);
        // $priceHtml.=select_value_by_id('currencies','id',$currency,'hex').number_format($original_price,2);
        // $priceHtml.='&nbsp;<del class="text-content">'.select_value_by_id('currencies','id',$currency,'hex').' '.number_format($price,2).'</del>';
        // $priceHtml.='&nbsp;<span class="offer theme-color">('.$discount_rate.'% off)</span>';

        $priceHtml.='<s id="ComparePrice-product-template"><span class="money">'.select_value_by_id('currencies','id',$currency,'hex').' '.number_format($price,2).'</span></s>';
        $priceHtml.='<span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">';
        $priceHtml.='<span id="ProductPrice-product-template"><span class="money">'.select_value_by_id('currencies','id',$currency,'hex').number_format($original_price,2).'</span></span></span>';
        $priceHtml.='&nbsp;<span class="offer theme-color">('.$discount_rate.'% off)</span>';
    }else{
        $original_price = calculate_product_price($price, $discount_rate);
        // $priceHtml.=select_value_by_id('currencies','id',$currency,'hex').number_format($original_price,2);
        $priceHtml.='<span id="ProductPrice-product-template"><span class="money">'.select_value_by_id('currencies','id',$currency,'hex').number_format($original_price,2).'</span></span></span>';
     
    }
    return $priceHtml;
    }
}

//price formatted
if (!function_exists('formatted_price')) {
    function formatted_price($price, $currency, $format = null)
    {
        $ci =& get_instance();
        $dec_point = '.';
        $thousands_sep = ',';
        if ($ci->thousands_separator != '.') {
            $dec_point = ',';
            $thousands_sep = '.';
        }

        if (is_int($price)) {
            $price = number_format($price, 2, $dec_point, $thousands_sep);
        } else {
            $price = number_format($price, 2, $dec_point, $thousands_sep);
        }
        $price = price_currency_format($price, $currency);
        return $price;
    }
}



//price currency format
if (!function_exists('price_currency_format')) {
    function price_currency_format($price, $currency)
    {
        $ci =& get_instance();
       // $currency = select_value_by_id('currencies','id',$currency,'hex');
        $space = " ";
        if ($ci->payment_settings->space_between_money_currency == 1) {
            $space = " ";
        }
        if ($ci->payment_settings->currency_symbol_format == "left") {
            $price =  $currency . $space . $price;
         } else {
             $price = $price . $space . $currency;
         }
        return $price;
    }
}


//get price
if (!function_exists('get_price')) {
    function get_price($price, $format_type)
    {
        $ci =& get_instance();

        if ($format_type == "input") {
            $price = $price / 100;
            if (is_int($price)) {
                $price = number_format($price, 0, ".", "");
            } else {
                $price = number_format($price, 2, ".", "");
            }
            if ($ci->thousands_separator == ',') {
                $price = str_replace('.', ',', $price);
            }
            return $price;
        } elseif ($format_type == "decimal") {
            $price = $price / 100;
            return number_format($price, 2, ".", "");
        } elseif ($format_type == "database") {
            $price = str_replace(',', '.', $price);
            $price = floatval($price);
            $price = number_format($price, 2, '.', '');
            //$price = number_format($price, 2, '.', '') * 100;
            return $price;
        } elseif ($format_type == "separator_format") {
            $price = $price / 100;
            $dec_point = '.';
            $thousands_sep = ',';
            if ($ci->thousands_separator != '.') {
                $dec_point = ',';
                $thousands_sep = '.';
            }
            return number_format($price, 2, $dec_point, $thousands_sep);
        }
    }
}

//get variation label
if (!function_exists('get_variation_label')) {
    function get_variation_label($label_array, $lang_id="")
    {
        $ci =& get_instance();
        $label = "";
        if (!empty($label_array)) {
            $label_array = unserialize($label_array);
            foreach ($label_array as $item) {
                if ($lang_id == $item['lang_id']) {
                    $label = $item['label'];
                    break;
                }
            }
            if (empty($label)) {
                foreach ($label_array as $item) {
                    if ($ci->general_settings->site_lang == $item['lang_id']) {
                        $label = $item['label'];
                        break;
                    }
                }
            }
        }
        return $label;
    }
}

//get variation option name
if (!function_exists('get_variation_option_name')) {
    function get_variation_option_name($names_array, $lang_id)
    {
        $ci =& get_instance();
        $name = "";
        if (!empty($names_array)) {
            $names_array = unserialize($names_array);
            foreach ($names_array as $item) {
                if ($lang_id == $item['lang_id']) {
                    $name = $item['option_name'];
                    break;
                }
            }
            if (empty($name)) {
                foreach ($names_array as $item) {
                    if ($ci->general_settings->site_lang == $item['lang_id']) {
                        $name = $item['option_name'];
                        break;
                    }
                }
            }
        }
        return $name;
    }
}

//get variation default option
if (!function_exists('get_variation_default_option')) {
    function get_variation_default_option($variation_id)
    {
        $ci =& get_instance();
        return $ci->variation_model->get_variation_default_option($variation_id);
    }
}

//get variation sub options
if (!function_exists('get_variation_sub_options')) {
    function get_variation_sub_options($parent_id)
    {
        $ci =& get_instance();
        return $ci->variation_model->get_variation_sub_options($parent_id);
    }
}

//is there variation uses different price
if (!function_exists('is_there_variation_uses_different_price')) {
    function is_there_variation_uses_different_price($product_id, $except_id = null)
    {
        $ci =& get_instance();
        return $ci->variation_model->is_there_variation_uses_different_price($product_id, $except_id);
    }
}

//discount rate format
if (!function_exists('discount_rate_format')) {
    function discount_rate_format($discount_rate)
    {
        return $discount_rate . "%";
    }
}

//get available product
if (!function_exists('get_available_product')) {
    function get_available_product($id)
    {
        $ci =& get_instance();
        return $ci->product_model->get_available_product($id);
    }
}

//check product stock
if (!function_exists('check_product_stock')) {
    function check_product_stock($product)
    {
        if (!empty($product)) {
            if ($product->stock_unlimited == 1) {
                return true;
            }
            if ($product->stock > 0) {
                return true;
            }
        }
        return false;
    }
}


//get product variation options
if (!function_exists('get_product_variation_options')) {
    function get_product_variation_options($variation_id)
    {
        $ci =& get_instance();
        return $ci->variation_model->get_variation_options($variation_id);
    }
}

//get orders count
if (!function_exists('get_any_orders_count')) {
    function get_any_orders_count($user_id,$status=false)
    {
        $ci =& get_instance();
        $count=$ci->order_model->get_any_orders_count($user_id,$status);
        if(!empty($count)){
            return $count;
        }else{
            return 0;
        }
    }
}

////avg rating count
if (!function_exists('get_avg_rationg_count')) {
    function get_avg_rationg_count($product_id)
    {
        $ci =& get_instance();
        $count=$ci->select->custom_qry("SELECT AVG(`rating`) avg_rate FROM `product_review` where product_id = ".$product_id);
        // $count=$ci->select->custom_qry("SELECT ROUND(AVG(`rating`),1) avg_rate FROM `product_review` where product_id = ".$product_id);
        if(!empty($count) && $count[0]->avg_rate!=NULL){
            return $count[0]->avg_rate;
        }else{
            return 0;
        }
    }
}

/////rating star
if (!function_exists('get_avg_rationg_star')) {
    function get_avg_rationg_star($product_id)
    {
       $rating =  get_avg_rationg_count($product_id);
       switch ($rating){
        case "5":
            $ll =  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            return $ll;
            break;
        case "4":
            $ll =  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            return $ll;
            break;
        case "3":
            $ll =  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            return $ll;
            break;
        case "3":
            $ll =  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            return $ll;
            break;
        case "3":
            $ll =  '<li><i data-feather="star" class="fill"></i></li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            return $ll;
            break;
        default:
            $ll =  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            $ll.=  '<li><i data-feather="star"></i></li><li>';
            return $ll;
        }
    }
}



////avg rating count
if (!function_exists('get_commission_rate')) {
    function get_commission_rate($user_id)
    {
        $ci =& get_instance();
        $result=$ci->select->custom_qry("SELECT commission_rate FROM `users` where id = ".$user_id);
        if(!empty($result)){
            return $result[0]->commission_rate;
        }else{
            return 0;
        }
    }
}

////get parent category by cat id
if (!function_exists('get_parentCategory_by_cat_id')) {
    function get_parentCategory_by_cat_id($cat_id)
    {
        $ci =& get_instance();
        $result=$ci->select->custom_qry("SELECT * FROM `categories` WHERE `cat_id` = ".$cat_id);
        if(!empty($result)){
            return $result[0]->parent_id;
        }else{
            return 0;
        }
    }
}

////////01/03.2023
if (!function_exists('get_shipping_cost_by_product_id')) {
    function get_shipping_cost_by_product_id($product,$destinationpin){
        $ci =& get_instance();
   		$seller = $ci->auth_model->get_user_by_id($product->user_id);
    if(!empty($seller->zip_code)){
        $sellerpincode = $seller->zip_code;
    }else{
    	$sellerpincode = '700016';
    }
    	return $ci->ecom->rateCalculator($sellerpincode,$destinationpin,$product->weight);
    }
}


//12/08/2023

if (!function_exists('get_top_selling_product_id')) {
    function get_top_selling_product_id(){
        $ci =& get_instance();
        $productids = array();
   		$result = $ci->select->custom_qry("select product_id from order_products group by product_id order by sum(product_unit_price) desc limit 30");
    if(!empty($result)){
        foreach($result as $pp){
            $productids[] = $pp->product_id;
        }
    }else{
    	$productids[] = null;
    }
    	return $productids;
    }
}


if (!function_exists('get_default_currency')) {
    function get_default_currency(){
        $ci =& get_instance();
        return select_value_by_id('currencies','code',$ci->payment_settings->default_product_currency,'hex');
    }
}


if (!function_exists('get_product_by_catagory')) {
    function get_product_by_catagory($cata_id)
    {
        $ci =& get_instance();
        return $ci->select->select_single_data('products','category_id',$cata_id);
    }
}


if (!function_exists('get_catagory_slug_by_cata_id')) {
    function get_catagory_slug_by_cata_id($cata_id)
    {
        $ci =& get_instance();
        $res = $ci->select->custom_qry('SELECT cat_slug FROM `categories` WHERE cat_id = '.$cata_id);
        if(!empty($res)){
            return $res[0]->cat_slug;
        }else{
            return '';
        }
    }
}

if (!function_exists('is_bestseller')) {
    function is_bestseller($id){
        $ci =& get_instance();
        $ci->db->where('id', $id);
        $ci->db->where('is_featured', 1);
		$query = $ci->db->get('products');
		if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
    }
}

if (!function_exists('cart_count')) {
    function cart_count(){
        $ci =& get_instance();
        $cartitems = $ci->cart_model->get_cart_by_buyer(); 
        return !empty($cartitems)?count($cartitems):0;
    }
}

if (!function_exists('get_shipping_cost')) {
    function get_shipping_cost($subtotal,$mode='Cash On Delevary')
    {
        $ci =& get_instance();
        $res = $ci->select->custom_qry("SELECT shipping_charge FROM shipping_charges WHERE (min_order_amount IS NULL OR min_order_amount <= ".$subtotal.") AND (max_order_amount IS NULL OR max_order_amount >= ".$subtotal.") AND payment_mode = '$mode'");
        if(!empty($res)){
            return $res[0]->shipping_charge;
        }else{
            return 0;
        }
    }
}


?>