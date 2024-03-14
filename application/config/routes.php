<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['mdm']='admin/authentication/index';
$route['admin/dashboard']='admin/dashboard/index';
$route['buyer/dashboard']='my_dashboard/buyer_dashboard';
$route['distributer/dashboard']='my_dashboard/distributer_dashboard';
$route['my-dashboard']='my_dashboard/index';
$route['login']='authentication/login';
$route['signup']='authentication/signup';
$route['forgot-password']='authentication/forgot_password';
$route['login-distributer']='authentication/login_distributor';

////services

$route['add-variation-post']='admin/field_controller/add_variation_post';
$route['delete-variation-post']='admin/field_controller/delete_variation_post';
$route['add-variation-option']='admin/field_controller/add_variation_option';
$route['add-variation-option-post']='admin/field_controller/add_variation_option_post';
$route['view-variation-options']='admin/field_controller/view_variation_options';
$route['delete-variation-option-post']='admin/field_controller/delete_variation_option_post';
$route['get-product-temp-images']='admin/products/get_product_temp_images';
$route['delete-product-images']='admin/products/delete_product_images';
$route['set-main-product-image']='admin/products/set_main_product_image';
$route['select-variation-option']='ajax/select_product_variation_option';

$route['add-to-cart']='cart_controller/add_to_cart';
$route['buy-now']='cart_controller/buy_now';
$route['cart']='cart_controller/cart';
$route['fetchCartCount']='cart_controller/fetchCartCount';
$route['fetchPrepaidShipping']='cart_controller/fetchPrepaidShipping';
$route['showCartPopupData']='cart_controller/showCartPopupData';
$route['getAndShowProduct']='cart_controller/getAndShowProduct';

$route['update-cart-product-quantity']='cart_controller/update_cart_product_quantity';
$route['checkout']='cart_controller/checkout';
$route['buy-now-checkout']='cart_controller/buy_now_checkout';

$route['payment-method-post']='cart_controller/payment_method_post';
// $route['razorpay-payment-post']='cart_controller/razorpay_payment_post';
// $route['payment']='cart_controller/payment';

// $route['paymentmethod']='cart_controller/subscription_payment_method';
// $route['payment-processing']='cart_controller/subscription_payment_processing';

$route['auth-process'] = 'authentication/ajax_login_process';
$route['registration'] = 'authentication/reg_process';
$route['saveReview'] = 'ajax/saveReview';

$route['change-password']='authentication/change_password';

//$route['forgot-password']='authentication/forgot_password_post';
$route['reset-password']='authentication/reset_password';
$route['reset-password-post']='authentication/reset_password_post';


$route['get-state-list']='authentication/get_state_list';
$route['get-city-list']='authentication/get_city_list';

$route['logout']='admin/dashboard/logout';


require_once(BASEPATH . 'database/DB.php');
$db =& DB();
$db->select('*');
$db->from('pages');
$query = $db->get(); 
$result=$query->result();

foreach($result as $r){
  // if($this->uri->segment(1)!='cart' && $this->uri->segment(1)!='productQuickView'){
  if($this->uri->segment(1)==$r->page_slug){
    $route['(:any)'] = 'page/pages/$1'; 
}
}


/*
*products page
*/
$route['products/favorite-products'] = 'products/favorite-products';
$route['products/featured-products'] = 'products/featured-products';
$route['products/new-arrivals-best-selling-products'] = 'products/new_arrivals_best_selling_products';
$route['products/offers'] = 'products/offer-products';
$route['products/best-selling-products'] = 'products/best-selling-products';
$route['products/new-arrivals-products'] = 'products/new-arrivals-products';
if($this->uri->segment(2)=='all-products'){
  $route['all-product']='products/all_products';
}else{
    $route['products/(:any)']='products/products/$1';
}
// if($this->uri->segment(3)==''){
//   // $route['products/(:any)']='products/products/$1';
// }else{
//   $route['products/(:any)/(:any)']='products/products/$1';
// }
$route['product/(:any)']='products/details/$1';
$route['search']='products/search';
/*
*/

$route['add-to-cart']='cart_controller/add_to_cart';
$route['add-to-cart-single']='cart_controller/add_to_cart_single';
$route['cart']='cart_controller/cart';

$route['update-cart-product-quantity']='cart_controller/update_cart_product_quantity';
$route['checkout']='cart_controller/checkout';
$route['productQuickView']='ajax/productQuickView';

$route['payment-method-post']='cart_controller/payment_method_post';

$route['order-details/(:num)'] = 'order_controller/order/$1';
$route['order-detailss/(:num)'] = 'order_controller/order_d/$1';
$route['order/completed-orders'] = 'order_controller/completed_orders';

$route['orders'] = 'order_controller/orders';
$route['invoice/(:any)/(:any)/(:any)/(:any)'] = 'order_controller/invoice/$1/$2/$3/$4';
$route['invoice/(:any)/(:any)/(:any)'] = 'order_controller/order_invoise/$1/$2/$3';

$route['square-payment-post']='cart_controller/square_payment_post';
$route['payment']='cart_controller/payment';

//$route['paymentmethod']='cart_controller/subscription_payment_method';
//$route['payment-processing']='cart_controller/subscription_payment_processing';