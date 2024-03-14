<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
	// $(window).bind("load", function () {
	// 	$("#payment-button-container").css("visibility", "visible");
	// });
</script>
<section class="cart-page">
		<div class="container py-5">
		    <div class="row d-flex justify-content-center my-4">
		      	<div class="col-md-8">
		        	<div class=" mb-4">
		          		
		          		<div class="card-body">
                           
						  <div class="row">
										<div class="col-12">
											<?php
											$data = array('total_amount' => $total_amount, 'currency' => $currency, 'cart_total' => $cart_total);

											if ($cart_payment_method->payment_option == "paypal") {
												$this->load->view("cart/payment_methods/_paypal", $data);
											} if ($cart_payment_method->payment_option == "square") {
												$this->load->view("cart/payment_methods/_square", $data);
											}elseif ($cart_payment_method->payment_option == "stripe") {
												$this->load->view("cart/payment_methods/_stripe", $data);
											} elseif ($cart_payment_method->payment_option == "paystack") {
												$this->load->view("cart/payment_methods/_paystack", $data);
											} elseif ($cart_payment_method->payment_option == "razorpay") {
												$this->load->view("cart/payment_methods/_razorpay", $data);
											} elseif ($cart_payment_method->payment_option == "iyzico") {
												$this->load->view("cart/payment_methods/_iyzico", $data);
											} elseif ($cart_payment_method->payment_option == "pagseguro") {
												$this->load->view("cart/payment_methods/_pagseguro", $data);
											} elseif ($cart_payment_method->payment_option == "bank_transfer") {
												$this->load->view("cart/payment_methods/_bank_transfer", $data);
											} elseif ($this->auth_check && $cart_payment_method->payment_option == "cash_on_delivery") {
												$this->load->view("cart/payment_methods/_cash_on_delivery", $data);
											} ?>
										</div>
									</div>
		            		
		          		</div>
		        	</div>
		      	</div>
		      	
		    </div>
		</div>
	</section>
									