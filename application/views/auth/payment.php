<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<!---------------------main section---------------------->
<?php $check_option = true; ?>
<section class="checkout-page mt-5 mb-5">
		<div class="container">
        <?php echo form_open('payment-processing',  'class="needs-validation"  novalidate '); ?>
        <input type="hidden" name="plan_id" value="<?= $plan_id;?>" />
        <input type="hidden" name="token" value="<?= $token;?>" />

		  	<div class="row g-5">
		      	<div class="col-md-5 col-lg-4 order-md-last">
		      		<div class="card mb-4">
		          		<div class="card-header py-3">
		            		<h5 class="mb-0">Summary</h5>
		          		</div>
				        <div class="card-body">
				            <ul class="list-group list-group-flush">
				              	<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
				                Products
				                	<span><?= $currency.' '.$total_amount;?></span>
				              	</li>
				              	<!-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
				                Shipping
				                	<span>Gratis</span>
				              	</li> -->
				              	<!-- <li class="list-group-item d-flex justify-content-between bg-light mb-3">
						            <div class="text-success">
						              	<h6 class="my-0">Promo code</h6>
						              	<small>EXAMPLECODE</small>
						            </div>
						            <span class="text-success">−$5</span>
						        </li> -->
				              	<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
					                <div>
					                  	<strong>Total amount</strong>
					                  	<!-- <strong>
					                    	<p class="mb-0">(including VAT)</p>
					                  	</strong> -->
					                </div>
					                <span><strong><?= $currency.' '.$cart_total;?></strong></span>
				              	</li>
				            </ul>
		          		</div>
		          		<div class="p-2"><button class="w-100 btn go-checkout" type="submit">Continue to checkout</button></div>
		          	</div>

		      		<!-- <div class="card mb-4">
				        <form class="p-3">
				          	<div class="input-group">
					            <input type="text" class="form-control" placeholder="Promo code">
					            <button type="submit" class="btn btn-secondary">Redeem</button>
				          	</div>
				        </form>
				    </div> -->

      			</div>
		      	<div class="col-md-7 col-lg-8">
		      	
                  <div class="card mb-4">
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
                                    
                                    </ul>
                      </div>                                   
                 </div>
	      		</div>
	    	</div>
            <?php echo form_close(); ?>
	  	</div>
	</section>