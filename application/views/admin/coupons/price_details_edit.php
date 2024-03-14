<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">coupons</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('coupons')?>">coupons</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new coupons</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('coupons/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/coupons/price-update-process', 'class="custom-validation"');?>
      <input type="hidden" name="product_id" value="<?= $this->uri->segment(4);?>" />
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-body">
                  <!-- Nav tabs -->
                  <?php $this->load->view('admin/coupons/tabmenuedit');?>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active p-3" id="home" role="tabpanel">
                        <div class="row">
                           <?php $this->load->view('admin/partials/_messages');?>
                           
                           <input type="hidden" name="coupons_id" value="<?= $item->id?>">
                           <div class="mb-3">
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
                           <label class="form-label">Coupon expiry date</label>
                           <div class="mb-3 input-group" id="datepicker1">
                              <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" name="expiry_date" data-date-container="#datepicker1" data-provide="datepicker" value="<?= $item->expiry_date;?>">
                              <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              <!-- <input data-parsley-type="text" type="text" class="form-control" required placeholder="" name="expiry_date" id="product_price_input" value="<?= $item->expiry_date;?>"> -->
                           </div>
                           <!-- <div class="mb-3">
                              <label class="form-label">Discount Type</label>
                              <div>
                                 <select class="form-select" name="discount" aria-label="Default select example">
                                    <option value="">None</option>
                                    <option value="percent" <?= $item->discount_type=='percent'?'selected':'';?>>Percentage discount</option>
                                    <option value="fixed_product" <?= $item->discount_type=='fixed_product'?'selected':'';?>>Fixed product discount</option>
                                 </select>
                              </div>
                           </div> -->
                           <div class="mb-3">
                              <label class="form-label">Coupon Amount</label>
                              <input data-parsley-type="text" type="text" class="form-control" required placeholder="" name="amount" id="product_price_input" value="<?= $item->amount;?>">
                           </div>
                           <!-- <div class="">
                              <label class="form-label">Allow free shipping</label>
                              <div class="form-check">
                                 <input class="form-check-input" <?php if($item->free_shipping == 1) echo 'checked'; ?> type="checkbox" value="" id="invalidCheck1" required="" namne="freesipp">
                                 <label class="form-check-label" for="invalidCheck1">
                                    Allow free shipping
                                 </label>
                              </div>
                           </div> -->
                           <!-- <div class="input-group" id="datepicker1">
                              <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" name="expiry_date" data-date-container="#datepicker1" data-provide="datepicker" value="<?= $item->expiry_date;?>">
                              <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                           </div> -->
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
   <!-- <input type="hidden" name="commission_amount" id="commission_amount_txt" value=" $item->commission_amount;" /> -->
   
   <!-- end row -->
   <?= form_close();?>
</div>
<!-- container-fluid -->
</div>