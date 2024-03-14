<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form id="form_add_product_variation_option" novalidate>
   <input type="hidden" name="variation_id" value="<?php echo $variation->id; ?>">
   <div class="modal-header">
      <h5 class="modal-title">Add Option</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal"
         aria-label="Close"></button>
   </div>
   <div class="modal-body">
      <div class="row">
         <div class="col-12">
            <?php //$this->load->view('partials/_messages'); ?>
         </div>
      </div>
      <div class="row">
         <div class="col-12 box-variation-options">
            <?php if (!empty($variation->parent_id == 0)): ?>
            <div class="mb-3">
               <label class="form-label mb-3 d-flex">Default Option&nbsp;<small class="text-muted">(This option will be selected by default. It will use the default images and price)</small></label>
               <div class="form-check form-check-inline">
                  <input type="radio" id="is_default_1" name="is_default" class="form-check-input" value="1">
                  <label class="form-check-label" for="is_default_1">Yes</label>
               </div>
               <div class="form-check form-check-inline">
                  <input type="radio" id="is_default_2" name="is_default" class="form-check-input" value="0" checked>
                  <label class="form-check-label" for="is_default_2">No</label>
               </div>
            </div>
            <div class="mb-3">
               <label class="form-label">Option Name</label>
               <div>
                  <input type="text" id="input_variation_option_name" class="form-control form-input input-variation-option" name="option_name" placeholder="English" maxlength="255" required="" data-parsley-type="text">
               </div>
            </div>
            <?php endif; ?>
            <div class="form-group">
               <div class="row">
                  <div class="col-6 hide-if-default">
                     <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <div>
                           <input type="number" id="option_stock" class="form-control form-input input-variation-option" name="option_stock" placeholder="0" maxlength="255" required="" data-parsley-type="number">
                        </div>
                     </div>
                  </div>
                  <?php if ($variation->variation_type != "dropdown" && $variation->option_display_type == "color"): ?>

                  <div class="col-6">
                    
                  <div>
                    <label class="form-label">Color &nbsp;<small class="text-muted">(Optional)</small></label>
                    <input type="text" name="option_color" class="form-control" id="colorpicker-showinput-intial" value="#ff1111" readonly>
                 </div>
                 
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <?php if ($variation->use_different_price == 1): ?>
            <div class="form-group hide-if-default">
               <div class="row">
                  <div class="col-6">
                     <div class="row align-items-center">
                        <div class="col-12">
                           <label class="control-label">MRP</label>
                           <div id="price_input_container_variation">
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text input-group-text-currency" id="basic-addon-price-variation">$</span>
                                 </div>
                                 <input type="text" name="option_price" id="product_price_input_variation" aria-describedby="basic-addon-price-variation" class="form-control form-input price-input validate-price-input" placeholder="0.00" onpaste="return false;" maxlength="32" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="use_default_price" value="1" id="checkbox_price_variation">
                                <label class="form-check-label" for="checkbox_price_variation">
                                Use default price
                                </label>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="row align-items-center">
                    

                        <div class="col-12">
                           <label class="control-label">Discount Rate</label>
                           <div id="discount_input_container_variation">
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text input-group-text-currency" id="basic-addon-discount-variation">%</span>
                                 </div>
                                 <input type="number" name="option_discount_rate" id="input_discount_rate_variation" aria-describedby="basic-addon-discount-variation" class="form-control form-input" value="" min="0" max="99" placeholder="0">
                              </div>
                           </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="no_discount" value="1" id="checkbox_discount_rate_variation">
                                <label class="form-check-label" for="checkbox_discount_rate_variation">
                                No Discount
                                </label>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <div class="modal-footer">
   <?php $this->load->view('partials/_messages'); ?>
      <div class="row-custom">
         <button type="button" id="btn_add_variation_option" class="btn btn-md btn-info color-white float-right">Add Option</button>
      </div>
   </div>
</form>