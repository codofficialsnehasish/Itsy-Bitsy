<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Products</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('products')?>">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Product</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('products/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-5">
         <?php $this->load->view('admin/partials/_messages');?>
      </div>
      <!-- end page title --> 
      <?= form_open_multipart('admin/products/price-update-process', 'class="custom-validation"');?>
      <input type="hidden" name="product_id" value="<?= $this->uri->segment(4);?>" />
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-body">
                  <!-- Nav tabs -->
                  <?php $this->load->view('admin/products/tabmenuedit');?>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active p-3" id="home" role="tabpanel">
                        <div class="row">
                           <?php //$this->load->view('admin/partials/_messages');?>
                           <!-- <div class="mb-3">
                              <div class="col-md-12">
                                 <label class="form-label mb-3 d-flex">Commission (<= get_commission_rate($item->user_id);?>%)</label>
									<input type="hidden" id="commissionRate" value="<= get_commission_rate($item->user_id);?>" />
                                 <div class="form-check form-check-inline">
                                    <input type="radio" id="spci" name="commission_type" class="form-check-input commissionType" value="1"  <?= $item->commission_type==1?'checked':'';?> required>
                                    <label class="form-check-label" for="spci">Include &nbsp;<code class="highlighter-rouge text-primary">(This option will be selected by default commission included with the price)</code></label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input type="radio" id="spce" name="commission_type" class="form-check-input commissionType" value="0"  <?= $item->commission_type==0?'checked':'';?> required>
                                    <label class="form-check-label" for="spce">Exclude &nbsp;<code class="highlighter-rouge text-primary">(This option will be included commission with the price)</code></label>
                                 </div>
                              </div>
                           </div> -->

                           <div class="mb-3 col-md-2">
                              <label class="form-label">Currency</label>
                              <div>
                                 <select class="form-select" name="currency_code" aria-label="Default select example">
                                    <!-- <option value="">None</option> -->
                                    <?php foreach($currencies as $currency):?>
                                    <option value="<?= $currency->id?>" <?= $item->currency_code==$currency->id?'selected':'';?>><?= $currency->symbol?></option>
                                    <?php endforeach;?>
                                 </select>
                              </div>
                           </div>
                           <div class="mb-3 col-md-3">
                              <label class="form-label">Price</label>
                              <input data-parsley-type="text" type="text"
                                 class="form-control" required
                                 placeholder="" name="" id="product_price_input" value="<?= $item->price;?>">
                           </div>
                           <div class="mb-3 col-md-3">
                              <label class="form-label">Discount Rate</label>
                              <div id="discount_input_container" <?= $item->discount_rate==0?'style="display:none;"':'';?>>
                              <div class="input-group">
                              <div class="input-group-prepend">
                              <span class="input-group-text input-group-text-currency" id="basic-addon-discount-variation">%</span>
                              </div>
                              <input type="number" name="discount_rate" id="input_discount_rate" aria-describedby="basic-addon-discount-variation" class="form-control form-input" value="<?= $item->discount_rate;?>" min="0" max="99" placeholder="0">
                              </div>
                              </div>
                              <div class="col-12 mt-3">
                              <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="no_discount" value="1" id="checkbox_discount_rate" <?= $item->discount_rate==0?'checked':'';?>>
                              <label class="form-check-label" for="checkbox_discount_rate">
                              No Discount
                              </label>
                              </div>
                              </div>
                           </div>
                              
                           <?php if ($this->general_settings->gst_status == 1): ?>
                           <div class="mb-3 col-md-3">
                              <label class="form-label">GST<small>&nbsp;(Goods & Services Tax)</small></label>
                              <div id="gst_input_container" <?= $item->gst_rate==0?'style="display:none;"':'';?>>
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text input-group-text-currency" id="basic-addon-gst">%</span>
                                    </div>
                                    <input type="number" name="gst_rate" id="input_gst_rate" aria-describedby="basic-addon-gst" class="form-control form-input" value="<?= $item->gst_rate;?>" min="0" max="99" placeholder="0">
                                 </div>
                              </div>
                              <div class="col-12 mt-3">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gst_included" value="1" id="checkbox_gst_included" <?= $item->gst_rate==0?'checked':'';?>>
                                    <label class="form-check-label" for="checkbox_gst_included">
                                    GST Included
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <?php endif; ?>

                           <div class="row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Reflected Price (<?= get_currency($this->payment_settings->default_product_currency); ?>):</label>
                              <div class="col-sm-9 mt-2 fw-bold" id="calculated_amount">
                              <?= $item->discounted_price;?>
                              </div>
                           </div>

                           <div class="row calculated_gst_container" style="display:<?= $item->gst_rate == 0 ? 'none' : ''; ?>">
                              <label for="example-text-input" class="col-sm-3 col-form-label">GST Amount (<?= get_currency($this->payment_settings->default_product_currency); ?>):</label>
                              <div class="col-sm-9 mt-2 fw-bold" id="gst_amount">
                              <?= $item->gst_amount;?>
                              </div>
                           </div>

                           <div class="row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Product Price(<?= get_currency($this->payment_settings->default_product_currency); ?>):</label>
                              <div class="col-sm-9 mt-2 fw-bold" id="price_amount">
                              <?= number_format($item->price,2);?>
                              </div>
                           </div>

                           <!-- <div class="row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Commission Amount(<?= get_currency($this->payment_settings->default_product_currency); ?>):</label>
                              <div class="col-sm-9 mt-2 fw-bold" id="commission_amount">
                              <= $item->commission_amount;?>
                              </div>
                           </div> -->
                           
                           <div class="row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">You Will Earn (<?= get_currency($this->payment_settings->default_product_currency); ?>):</label>
                              <div class="col-sm-9 mt-2 fw-bold" id="earned_amount">
                              <?= $item->earned_amount;?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3">
            <?php //$this->load->view('admin/partials/_input-image');?>
            <div class="card">
               <div class="card-header bg-primary text-light">
                  Publish
               </div>
               <div class="card-body">
                  <div class="mb-0">
                     <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Save & Next
                        </button>
                        <!-- <button type="reset" class="btn btn-secondary waves-effect">
                           Cancel
                           </button> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end col -->
      <!-- end col -->
   </div>
   <input type="hidden" name="discounted_price" id="calculated_amount_txt" value="<?= $item->discounted_price;?>" />
   <input type="hidden" name="gst_amount" id="gst_amount_txt" value="<?= $item->gst_amount;?>" />
   <input type="hidden" name="earned_amount" id="earned_amount_txt" value="<?= $item->earned_amount;?>" />
   <input type="hidden" name="price" id="price_amount_txt" value="<?= $item->price;?>" />
   <!-- <input type="hidden" name="commission_amount" id="commission_amount_txt" value="<= $item->commission_amount;?>" /> -->
   

   <!-- <input type="hidden" name="dis_discounted_price" id="calculated_amount_tx" value="<= $item->dis_discounted_price;?>" />
   <input type="hidden" name="dis_gst_amount" id="gst_amount_tx" value="<= $item->dis_gst_amount;?>" />
   <input type="hidden" name="dis_earned_amount" id="earned_amount_tx" value="<= $item->dis_earend_amount;?>" />
   <input type="hidden" name="dis_price" id="price_amount_tx" value="<= $item->dis_price;?>" /> -->
   <!-- <input type="hidden" name="dis_commission_amount" id="commission_amount_txt" value="<= $item->commission_amount;?>" /> -->

   <!-- end row -->
   <?= form_close();?>
</div>
<!-- container-fluid -->
</div>