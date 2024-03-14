<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<?php $check_option = true; ?>
<section class="checkout-page mt-5 mb-5">
   <div class="container">
      <div class="row g-5">
         <div class="col-md-5 col-lg-4 order-md-last">
            <div class="card mb-4">
               <div class="card-header py-3">
                  <h5 class="mb-0">Summary</h5>
               </div>
               <div class="card-body">
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0"> Price <?= $cart_total->no_of_items?> Item(s) <span> <?= formatted_price($cart_total->subtotal, $cart_total->currency);?> </span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center px-0"> Shipping <span> <?= $cart_total->shipping_cost!=0?$cart_total->currency.' ':'';?> <?= $cart_total->shipping_cost==0?'Free':formatted_price($cart_total->shipping_cost, $cart_total->currency);?> </span>
                     </li>
                     <!-- <li class="list-group-item d-flex justify-content-between bg-light mb-3"><div class="text-success"><h6 class="my-0">Promo code Appllied</h6><small>EXAMPLECODE</small></div><span class="text-success">−
							<?= $cart_total->currency?>5</span></li> -->
                    <!-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                           <strong>GST</strong>
                        </div>
                        <span>
                           <strong> <?php //echo formatted_price($cart_total->gst, $cart_total->currency);?> </strong>
                        </span>
                     </li> -->
                     <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                           <strong>Total amount</strong>
                           <strong>
                              <p class="mb-0">(including GST)</p>
                           </strong>
                        </div>
                        <span>
                           <strong> <?= formatted_price($cart_total->total, $cart_total->currency);?> </strong>
                        </span>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="card mb-4">
               <form class="p-3">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Promo code">
                     <button type="submit" class="btn btn-secondary">Redeem</button>
                  </div>
               </form>
            </div>
            <div class="card mb-4">
                           <?php echo form_open('payment-method-post',  'class="needs-validation"  novalidate '); ?>
                                 <div class="form-group">
												<ul class="payment-options-list">
													<?php if ($this->payment_settings->razorpay_enabled): ?>
														<li>
															<div class="option-payment">
																<div class="list-left">
																	<!-- <div class="custom-control custom-radio"> -->
																		<input type="radio" class="payment-way-input" id="option_razorpay" name="payment_option" value="razorpay" required <?php echo ($check_option == true) ? 'checked' : ''; ?>>
																		<!-- <label class="custom-control-label label-payment-option" for="option_razorpay">Razorpay</label> -->
                                                      <label class="ps-5">
                                                      <div class="payment-way-hd">Razorpay</div>
                                                      <div class="payment-way-text">You can save your cards as per new RBI guidelines.</div>
                                                      <div class="payment-way-image">
                                                      <label for="option_razorpay">
																		<img src="<?php echo base_url(); ?>assets/images/payment/visa.svg" alt="visa" width="50">
																		<img src="<?php echo base_url(); ?>assets/images/payment/mastercard.svg" alt="mastercard" width="50">
																		<img src="<?php echo base_url(); ?>assets/images/payment/amex.svg" alt="amex" width="50">
																		<img src="<?php echo base_url(); ?>assets/images/payment/maestro.svg" alt="maestro" width="50">
																		<img src="<?php echo base_url(); ?>assets/images/payment/diners.svg" alt="diners" width="50">
																		<img src="<?php echo base_url(); ?>assets/images/payment/rupay.svg" alt="rupay" style="padding: 1px 0;" width="50">
																		<img src="<?php echo base_url(); ?>assets/images/payment/razorpay.svg" alt="razorpay" width="50">
																	</label>
                                                      </div>
                                                   </label>
																	<!-- </div> -->
																</div>
																
															</div>
														</li>
														<?php $check_option = false;
													endif; ?>
												
													
												
													<?php if ($this->auth_check == 1 && $this->payment_settings->cash_on_delivery_enabled && empty($cart_has_digital_product) && $mds_payment_type != 'promote'): ?>
														<!-- <li>
															<div class="option-payment">
																<div class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" id="option_cash_on_delivery" name="payment_option" value="cash_on_delivery" required <?php echo ($check_option == true) ? 'checked' : ''; ?>>
																	<label class="custom-control-label label-payment-option" for="option_cash_on_delivery"><?php echo trans("cash_on_delivery"); ?><br><small><?php echo trans("cash_on_delivery_exp"); ?></small></label>
																</div>
															</div>
														</li> -->
													<?php endif; ?>
												</ul>
											</div>
                                 <div class="p-2">
                                    <button class="w-100 btn go-checkout" type="submit">Proceed to Pay</button>
                                  </div>
                                  <?php echo form_close(); ?>
                                    <!-- <form class="needs-validation" novalidate>
                                             <div class="a-box-inner">
                                                <div class="box-inner-pos">
                                                   <input type="radio" name="pp" class="payment-way-input" required>
                                                   <label class="ps-5">
                                                      <div class="payment-way-hd">Add Debit/Credit/ATM Card</div>
                                                      <div class="payment-way-text">You can save your cards as per new RBI guidelines.</div>
                                                      <div class="payment-way-image">
                                                         <img src="<?= base_url('assets/images/payway.png');?>">
                                                      </div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="p-2">
                                                <button class="w-100 btn go-checkout" type="submit">Proceed to Pay</button>
                                             </div>
                                    </form> -->
            </div>
         </div>
         <!-- Billing Address -->
         <div class="col-md-7 col-lg-8">
            <div class="card mb-4">
               <div class="card-header py-3">
                  <h5 class="mb-0">Delivery Address
                     <!-- <a class=" view  float-end" href="#">Change Address</a> -->
                  </h5>
               </div>
               <div class="p-3"><div class="row">
                  <div class="col-12 col-lg-6">
                     <div class="card p-2 mb-2"><h4 class="billing-address ps-4 mb-0 mt-2">Shipping address</h4> <?= shipping_address();?></div>
                  </div>
                  <div class="col-12 col-lg-6">
                     <div class="card p-2"><h4 class="billing-address ps-4 mb-0 mt-2">Billing address</h4> <?= billing_address();?></div>
                  </div>
                  <div class="accordion add-address mt-3" id="address1">
                     <button class="collapsed btn btn-info text-white rounded sjkgjhgk" type="button" data-bs-toggle="collapse" data-bs-target="#billing" aria-expanded="false" aria-controls="billing">Add New Address</button>
                  </div>
               </div></div>
			</div>


               <div id="billing" class="card mb-4 accordion-collapse collapse" data-bs-parent="#address"> <?= form_open_multipart('cart-controller/saveaddress', 'class="needs-validation p-3" name="myform"  novalidate ');?> <div class="row g-3">
			   <div class="card-header py-3">
                        <h5 class="mb-0">Billing address</h5>
               </div>      
			   <div class="col-sm-6">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" name="billing_first_name" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback"> Valid first name is required. </div>
                     </div>
                     <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" name="billing_last_name" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback"> Valid last name is required. </div>
                     </div>
                     <div class="col-6">
                        <label for="lastName" class="form-label">Phone Number</label>
                        <input type="tel" name="billing_phone_number" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback"> Valid phone number is required. </div>
                     </div>
                     <div class="col-6">
                        <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span>
                        </label>
                        <input type="email" name="billing_email" class="form-control" id="email" placeholder="you@example.com" >
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                     </div>
                     <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="billing_address_1" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                     </div>
                     <div class="col-12">
                        <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span>
                        </label>
                        <input type="text" name="billing_address_2" class="form-control" id="address2" placeholder="Apartment or suite">
                     </div>
                     <div class="col-md-3">
                        <label for="zip" class="form-label">Pincode</label>
                        <input type="text" name="billing_zip_code" class="form-control" id="pincode" placeholder="" required>
                        <div class="invalid-feedback" id="pincoderesponse"> Zip code required. </div>
                     </div>
                     <div class="col-sm-9">
                        <label for="billinglandMark" class="form-label">Landmark(Optional)</label>
                        <input type="text" name="billing_landmark" class="form-control" id="billinglandMark" placeholder="" value="">
                        <div class="invalid-feedback"> Valid Landmark is required. </div>
                     </div>
                     <div class="col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" name="billing_country" id="country_id" required>
                           <option value="">Select Country</option> 
						   		<?php 
									if(!empty($countries)):
										foreach($countries as $country):?> 
											<option value="<?= $country->id;?>"> <?= $country->name;?> </option> 
											<?php 
										endforeach;
									endif;
								?>
                        </select>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                     </div>
                     <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" name="billing_state" id="state_id" required>
                           <option value="">Choose...</option>
                        </select>
                        <div class="invalid-feedback"> Please provide a valid state. </div>
                     </div>
                     <div class="col-md-4">
                        <label for="state" class="form-label">City</label>
                        <select class="form-select" name="billing_city" id="city_id" required>
                           <option value="">Choose...</option>
                        </select>
                        <div class="invalid-feedback"> Please provide a valid city. </div>
                     </div>
                  </div>
                  <hr class="my-4">
                  <div class="form-check">
                     <input type="checkbox" id="differentShipping" class="form-check-input" id="same-address" checked>
                     <label class="form-check-label" for="differentShipping">Shipping address is the same as my billing address</label>
                  </div>
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" id="save-info">
                     <label class="form-check-label" for="save-info">Save this information for next time</label>
                  </div>
                  <!-- <hr class="my-4"> -->
                  <button type="submit" class="btn go-checkout mt-1 billingButton">
                     <span>Add Address</span>
                  </button>
                  <!-- Shipping Address -->
               </div>

                   <div class="card mb-4 shippingAddress" style="display:none;">
                     <div class="card-header py-3">
                        <h5 class="mb-0">Shipping address</h5>
                     </div>
                     <div class="row g-3">
                        <div class="col-sm-6">
                           <label for="firstName" class="form-label">First name</label>
                           <input type="text" name="shipping_first_name" class="form-control shippinField" id="firstName" placeholder="" value="">
                           <div class="invalid-feedback"> Valid first name is required. </div>
                        </div>
                        <div class="col-sm-6">
                           <label for="lastName" class="form-label">Last name</label>
                           <input type="text" name="shipping_last_name" class="form-control shippinField" id="lastName" placeholder="" value="">
                           <div class="invalid-feedback"> Valid last name is required. </div>
                        </div>
                        <div class="col-6">
                           <label for="lastName" class="form-label">Phone Number</label>
                           <input type="tel" name="shipping_phone_number" class="form-control shippinField" id="lastName" placeholder="" value="">
                           <div class="invalid-feedback"> Valid phone number is required. </div>
                        </div>
                        <div class="col-6">
                           <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span>
                           </label>
                           <input type="email" name="shipping_email" class="form-control shippinField" id="email" placeholder="you@example.com">
                           <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                        </div>
                        <div class="col-12">
                           <label for="address" class="form-label">Address</label>
                           <input type="text" name="shipping_address_1" class="form-control shippinField" id="address" placeholder="1234 Main St">
                           <div class="invalid-feedback"> Please enter your shipping address. </div>
                        </div>
                        <div class="col-12">
                           <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span>
                           </label>
                           <input type="text" name="shipping_address_2" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>
                        <div class="col-md-3">
                           <label for="zip" class="form-label">Pincode</label>
                           <input type="text" name="shipping_zip_code" class="form-control shippinField" id="pincode" placeholder="">
                           <div class="invalid-feedback" id="pincoderesponse"> Zip code required. </div>
                        </div>
                        <div class="col-sm-9">
                           <label for="shippingLandmark" class="form-label">Landmark(Optional)</label>
                           <input type="text" name="shipping_landmark" class="form-control shippinField" id="shippingLandmark" placeholder="" value="">
                           <div class="invalid-feedback"> Valid Landmark is required. </div>
                        </div>
                        <div class="col-md-4">
                           <label for="country" class="form-label">Country</label>
                           <select class="form-select shippinField" name="shipping_country" id="scountry_id">
                              <option value="">Select Country</option> 
							  <?php 
								if(!empty($countries)):
									foreach($countries as $country):?> 
									<option value="<?= $country->id;?>"> <?= $country->name;?> </option> <?php 
									endforeach;
								endif;
								?>
                           </select>
                           <div class="invalid-feedback"> Please select a valid country. </div>
                        </div>
                        <div class="col-md-4">
                           <label for="state" class="form-label">State</label>
                           <select class="form-select shippinField" name="shipping_state" id="sstate_id">
                              <option value="">Choose...</option>
                           </select>
                           <div class="invalid-feedback"> Please provide a valid state. </div>
                        </div>
                        <div class="col-md-4">
                           <label for="state" class="form-label">City</label>
                           <select class="form-select shippinField" name="shipping_city" id="scity_id">
                              <option value="">Choose...</option>
                           </select>
                           <div class="invalid-feedback"> Please provide a valid city. </div>
                        </div>
                     </div>
                     <hr class="my-4">
                     <button type="submit" class="btn go-checkout mt-1 sjkgjhgk">
                        <span>Add Address</span>
                     </button> 
					 <?= form_close();?>
                   </div>

         </div>
      </div>
   </div>
</section>