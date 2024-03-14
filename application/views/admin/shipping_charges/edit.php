<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Shipping Charges</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('shipping-charges')?>">Shipping Charges</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Shipping Charges</li>
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
      <?= form_open_multipart('admin/shipping-charges/update-process/'.$item->id, 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Edit Shipping Charges
                  </div>
                  <div class="card-body">

                  <div class="mb-3">
                            <label class="form-label">Payment Mode</label>
                            <div>
                                <select class="form-select" name="payment_mode" aria-label="Default select example" required>
                                    <option <?= $item->payment_mode == "Cash On Delevary" ? 'selected' : '';  ?> value="Cash On Delevary">Cash On Delevary</option>
                                    <option <?= $item->payment_mode == "Prepaid" ? 'selected' : '';  ?> value="Prepaid">Prepaid</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Minimum Order Amount</label>
                            <div>
                                <input data-parsley-type="number" type="number"
                                    class="form-control"
                                    placeholder="Minimum Order Amount" value="<?= $item->min_order_amount; ?>" name="min_amount" id="name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Maximum Order Amount</label>
                            <div>
                                <input data-parsley-type="number" type="number"
                                    class="form-control"
                                    placeholder="Maximum Order Amount" value="<?= $item->max_order_amount; ?>" name="max_amount" id="name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Shipping Charge</label>
                            <div>
                                <input data-parsley-type="number" type="number"
                                    class="form-control" required
                                    placeholder="Shipping Charge" value="<?= $item->shipping_charge; ?>" name="shipping_charge" id="name">
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
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save Changes
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