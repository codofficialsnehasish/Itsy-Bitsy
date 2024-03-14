<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Shipping Charges</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('dashboard/')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('shipping-charges')?>">Shipping Charges</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Shipping Charges</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('shipping-charges/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/shipping-charges/process', 'class="custom-validation"');?>
      
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Add New Shipping Charges
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Payment Mode</label>
                            <div>
                                <select class="form-select" name="payment_mode" aria-label="Default select example" required>
                                    <option value="Cash On Delevary" selected>Cash On Delevary</option>
                                    <option value="Prepaid">Prepaid</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Minimum Order Amount</label>
                            <div>
                                <input data-parsley-type="number" type="number"
                                    class="form-control"
                                    placeholder="Minimum Order Amount" name="min_amount" id="name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Maximum Order Amount</label>
                            <div>
                                <input data-parsley-type="number" type="number"
                                    class="form-control"
                                    placeholder="Maximum Order Amount" name="max_amount" id="name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Shipping Charge</label>
                            <div>
                                <input data-parsley-type="number" type="number"
                                    class="form-control" required
                                    placeholder="Shipping Charge" name="shipping_charge" id="name">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-3">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div> -->

                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save & Publish
                           </button>
                           <!-- <button type="reset" class="btn btn-secondary waves-effect">
                              Cancel
                              </button> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>