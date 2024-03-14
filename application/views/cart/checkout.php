<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<?php $check_option = true; ?>


<div id="page-content">
   <!-- Page Title -->
   <div class="page section-header text-center">
      <div class="page-title">
         <div class="wrapper"><h1 class="page-title">Checkout</h1></div>
      </div>
   </div>
   <!-- End Page Title -->

   <div class="container">
   <?php echo form_open('payment-method-post',  'class="needs-validation" id="orderform" autocomplete="off"  novalidate '); ?>
      <div class="row billing-fields">
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3 mb-md-0">
               <div class="create-ac-content">
                  <!-- <form method="post" action="#"> -->
                     <fieldset>
                        <h2 class="login-title mb-3">Billing details</h2>
                        <?php 
                        if(!empty($shipping_address)):
                           foreach($shipping_address as $addr):  
                        ?>
                        <div class="">
                           <label>
                              <input type="radio" name="addrradio" required value="2" <?= $addr->is_default==1?'checked':'';?>>
                              <p class="name"><?= $addr->billing_first_name?> <?= !empty($addr->billing_first_name)?', '.$addr->billing_phone_number:'';?>
                              <span class="addr_type"><?= address_type($addr->address_type);?></span>
                           </p>
                              <p><?= get_address_by_id($addr->id)?></p><div class="invalid-tooltip" style="width:23%;">Address is Required</div>
                           </label>
                           
                        </div>
                        <?php endforeach;endif;?>
                        <div class="">
                           <label>
                              <input type="radio" name="addrradio" required value="fornewaddr" <?php if(empty($shipping_address)) echo 'checked'; ?>>
                              <p class="name">Add New</p><div class="invalid-tooltip" style="width:23%;">Address is Required</div>
                           </label>
                        </div>
                        <div id="orderdiv" style='display:<?php if(empty($shipping_address)){ echo '';}else{ echo 'none';} ?>;'>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                    <input class="form-control validate"  name="billing_first_name" value="" id="input-firstname" type="text" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                    <input class="form-control validate"  name="billing_last_name" value="" id="input-lastname" type="text" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                    <input class="form-control validate"  name="billing_email" value="" id="input-email" type="email" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                    <input class="form-control validate"  name="billing_phone_number" value="" id="input-telephone" type="tel">
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <label for="input-company">Address</label>
                                    <input class="form-control validate"  name="billing_address_1" value="" id="input-company" type="text" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-address-1">Street <span class="required-f">*</span></label>
                                    <input class="form-control validate"  name="billing_address_2" value="" id="input-address-1" type="text" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <label for="input-address-2">Landmark <span class="required-f">*</span></label>
                                    <input class="form-control validate"  name="billing_landmark" value="" id="input-address-2" type="text" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-postcode">Pin Code <span class="required-f">*</span></label>
                                    <input class="form-control validate" name="billing_zip_code" value="" id="input-postcode" type="text" >
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="country_id">Country <span class="required-f">*</span></label>
                                    <select class="form-control form-select validate" id="country_id" name="billing_country" >
                                        <option value="">Choose....</option>
                                        <?php 
                                        if(!empty($countries)):
                                            foreach($countries as $country):?> 
                                                <option value="<?= $country->id;?>" <?= $country->id == 99?'selected':''; ?>> <?= $country->name;?> </option> 
                                                <?php 
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="states_id">Region / State <span class="required-f">*</span></label>states
                                    <select class="form-control form-select validate" name="billing_state" id="states_id">
                                    <option value="">Choose....</option>
                                        <?php 
                                          if(!empty($states)):
                                             foreach($states as $state):?> 
                                                   <option value="<?= $state->id;?>"> <?= $state->name;?> </option> 
                                                   <?php 
                                             endforeach;
                                          endif;
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <!-- <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="citys_id">City <span class="required-f">*</span></label>
                                    <select class="form-control form-select validate" name="billing_city" id="citys_id" >
                                    </select>
                                    <div class="invalid-feedback">This is Required</div>
                                </div> -->
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="citys_id">City <span class="required-f">*</span></label>
                                    <input class="form-control validate" type="text" name="billing_city" id="">
                                    <div class="invalid-feedback">This is Required</div>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="adtype">Address Type:<span class="req"> *</span></label>
                                    <select class="form-control form-select validate" name="address_type">
                                        <option value="1" selected>Home</option>
                                        <option value="2">Office</option>
                                    </select>
                                    <div class="invalid-tooltip">This field is required</div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="citys_id">City <span class="required-f">*</span></label>
                                    <select class="form-control form-select validate" name="billing_city" id="citys_id" >
                                    </select>
                                    <div class="invalid-feedback">This is Required</div>
                                </div> -->
                                <!-- <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="adtype">Address Type:<span class="req"> *</span></label>
                                    <select class="form-control form-select validate" name="address_type">
                                        <option value="1" selected>Home</option>
                                        <option value="2">Office</option>
                                    </select>
                                    <div class="invalid-tooltip">This field is required</div>
                                </div> -->
                            </div>
                           <!-- <div class="row">
                              <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                 <div class="customCheckbox cart_tearm">
                                       <input type="checkbox" class="form-check-input" id="account" value="">
                                       <label for="account"><strong>Create an account ?</strong></label>
                                 </div>
                              </div>
                           </div> -->
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-12 col-xl-12 mb-0">
                                    <label for="input-company">Order Notes</label>
                                    <textarea class=" resize-both" name="addl_info" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                     </fieldset>
                  <!-- </form> -->
               </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="your-order-payment">
                  <div class="your-order">
                     <h2 class="order-title mb-4">Your Order</h2>
                     <div class="table-responsive-sm order-table"> 
                           <table class="bg-white table table-bordered table-hover text-center">
                              <thead>
                                 <tr>
                                    <th class="text-start">Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    if(!empty($cartitems)):
                                       $total =0;
                                       $totalshippinhg= 0;			
                                       foreach($cartitems as $item):
                                       $product = $this->product_model->get_product_by_id($item->product_id);
                                       $appended_variations = $this->cart_model->get_selected_variations($product->id)->str;
                                       if(!empty($item->variations) || $item->variations!='' || $item->variations!=null){
                                          $cartvariations=explode(',',$item->variations);
                                       }else{
                                          $cartvariations[]="";
                                       }
                                       array_filter($cartvariations);
                                       //print_r(array_filter($cartvariations));
                                       $object=$this->cart_model->get_product_price_and_stock($product,$cartvariations,$item->quantity);
                                 ?>
                                 <tr>
                                       <td class="text-start">
                                          <?= $product->title;?>
                                          <?php if(!empty($item->variations)){
                                             foreach($cartvariations as $cvariation){
                                                $variations = $this->variation_model->get_variation_option($cvariation);
                                                ?>
                                             <!--<p class="mb-0">--><?= '('.select_value_by_id('variations','id',$variations->variation_id,'label_names');?>: <?= $variations->option_names.')';?><!--</p>-->
                                          <?php 
                                             }
                                          }
                                          ?>
                                       </td>
                                       <td><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $object->price_calculated;?></td>
                                       <td><?= $item->quantity;?></td>
                                       <td><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $object->price_calculated*$item->quantity;?></td>
                                 </tr>
                                 <?php 
                                    unset($cartvariations);
                                    $total += (int)$object->price_calculated * (int)$item->quantity;
                                    // $total+=$price;
                                    $currency=select_value_by_id('currencies','id',$product->currency_code,'hex');
                                    endforeach;  else:  
                                 ?>
                                 <div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
                                    <p class="text-center">No Items in Cart</p>
                                 </div>
                                 <?php endif;?>
                              </tbody>
                              <tfoot class="font-weight-600">
                                 <tr>
                                       <td colspan="3" class="text-end">Shipping </td>
                                       <td id="shiptptal"><?= $cart_total->shipping_cost != 0 ? formatted_price($cart_total->shipping_cost, $cart_total->currency) : 'Free Shipping';?></td>
                                 </tr>
                                 <tr>
                                       <td colspan="3" class="text-end">Total</td>
                                       <td id="gdtotal"><?= formatted_price($cart_total->total, $cart_total->currency);?></td>
                                 </tr>
                              </tfoot>
                           </table>
                     </div>
                  </div>

                  <hr>

                  <div class="your-payment">
                     <h2 class="payment-title mb-3">Payment Method</h2>
                     <div class="payment-method">
                        <div class="payment-accordion">
                           <?php //if ($this->payment_settings->square_enabled): ?>
                              <!-- <li style="list-style:none;">
                                 <div class="option-payment">
                                    <div class="list-left">
                                          <input type="radio" class="payment-way-input" id="option_razorpay" name="payment_option" value="square" required <?php //echo ($check_option == true) ? 'checked' : ''; ?>>
                                          <label class="ps-4" for="option_razorpay">
                                          <div class="payment-way-hd">Pay Now</div>
                                          <div class="payment-way-text">We accept all major credit and debit cards.</div>
                                          <div class="payment-way-image">
                                          <label for="option_razorpay">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/visa.png" alt="visa" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/discover.png" alt="mastercard" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/american.png" alt="amex" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/master-card.png" alt="maestro" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/giro-pay.png" alt="diners" width="50">
                                          </label>
                                          </div>
                                       </label>
                                    </div>
                                    
                                 </div>
                              </li> -->
                           <?php //$check_option = false; endif; ?>
								
							<?php if ($this->auth_check == 1 && $this->payment_settings->cash_on_delivery_enabled): ?>
								<li style="list-style:none;">
                                    <div class="option-payment">
                                        <div class="list-left">
                                            <input type="radio" id="option_cash_on_delivery" name="payment_option" value="cash_on_delivery" required <?php echo ($check_option == true) ? 'checked' : ''; ?>>
                                            <label class="ps-4" for="option_cash_on_delivery">
                                                <div class="payment-way-hd">Cash On Delivery/Pay on Delivery</div>
                                                <div class="payment-way-text">We only collect the amount printed on the invoice.</div>
                                            </label>
                                        </div>
							        </div>
						        </li>
                                <li style="list-style:none;">
                                    <div class="option-payment">    
                                        <div class="list-left">
                                            <input type="radio" id="option_qr" name="payment_option" value="q_r_code" required>
                                            <label class="ps-4" for="option_cash_on_delivery">
                                                <div class="payment-way-hd">Pay using QR Code</div>
                                                <!-- <div class="payment-way-text">We only collect the amount printed on the invoice.</div> -->
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <div id="qrdiv" style='display: none;'>
                                    <div class="flx">
                                        <div class="img">
                                            <img src="<?= base_url('assets/site/images/itsy-bitsy-qr.jpg'); ?>" alt="" style="height: 400px;">
                                        </div>
                                        <div class="text" style="font-size: 13px;padding: 10px 0;color: #000000;">
                                            Kasturi Sinha Majumder<br>
                                            State Bank Of India<br>
                                            A/C no - 30866498440<br>
                                            IFSC - SBIN0002090
                                        </div>
                                    </div>
                                </div>
						    <?php endif; ?>
                        </div>
                        
                        <div class="order-button-payment">
                           <button type="submit" class="btn">Place order</button>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      <!--End Main Content-->        
   </div>
   <?php echo form_close(); ?>
</div>


<script>
    window.onload = function() {
        var radioButtons = document.querySelectorAll('input[type=radio][name=addrradio]');
        var firstNameInput = document.getElementById('input-firstname');
        var lastNameInput = document.getElementById('input-lastname');
        var inputemail = document.getElementById('input-email');
        var inputtelephone = document.getElementById('input-telephone');

        var inputcompany = document.getElementById('input-company');
        var inputaddress1 = document.getElementById('input-address-1');
        var inputaddress2 = document.getElementById('input-address-2');
        var inputpostcode = document.getElementById('input-postcode');
        var countryid = document.getElementById('country_id');
        var statesid = document.getElementById('states_id');
        var citysid = document.getElementById('citys_id');


        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                if (radioButton.value === 'fornewaddr') {
                    firstNameInput.setAttribute('required', '');
                    lastNameInput.setAttribute('required', '');
                    inputemail.setAttribute('required', '');
                    inputtelephone.setAttribute('required', '');
                    inputcompany.setAttribute('required', '');
                    inputaddress1.setAttribute('required', '');
                    inputaddress2.setAttribute('required', '');
                    inputpostcode.setAttribute('required', '');
                    countryid.setAttribute('required', '');
                    statesid.setAttribute('required', '');
                    citysid.setAttribute('required', '');
                } else {
                    firstNameInput.removeAttribute('required');
                    lastNameInput.removeAttribute('required');
                    inputemail.removeAttribute('required');
                    inputtelephone.removeAttribute('required');
                    inputcompany.removeAttribute('required');
                    inputaddress1.removeAttribute('required');
                    inputaddress2.removeAttribute('required');
                    inputpostcode.removeAttribute('required');
                    countryid.removeAttribute('required');
                    statesid.removeAttribute('required');
                    citysid.removeAttribute('required');
                }
            });
        });
        <?php if(empty($shipping_address)): ?>
        document.querySelector('input[name="addrradio"][value="fornewaddr"]').checked = true;
        document.querySelector('input[name="addrradio"][value="fornewaddr"]').dispatchEvent(new Event('change'));
        <?php endif; ?>
    };
</script>