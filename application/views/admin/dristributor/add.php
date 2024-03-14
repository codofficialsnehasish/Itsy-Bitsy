<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Dristributor</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('seller')?>">Dristributor</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Dristributor</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('dristributor/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/dristributor/add_new_process', 'class="custom-validation"');?>

         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Personal Details
                  </div>
                  <div class="card-body row">
                     <div class="mb-3 col-md-6">
                        <label class="form-label">First Name</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter First Name" name="first_name" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Last Name</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Last Name" name="last_name" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-4">
                        <label class="form-label">eMail</label>
                        <div>
                           <input data-parsley-type="email" type="email" class="form-control" placeholder="Enter eMail" name="email">
                        </div>
                     </div>
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Phone Number</label>
                        <div>
                           <input data-parsley-type="number" type="number" class="form-control" placeholder="Enter Phone Number" name="phone_number" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-4">
                        <label class="form-label">Optional Phone Number</label>
                        <div>
                           <input data-parsley-type="number" type="number" class="form-control" placeholder="Enter Optional Phone Number" name="alt_phone_number" required>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Full Address</label>
                        <div>
                           <textarea class="form-control" rows="3" name="address" required></textarea>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Pin Code</label>
                        <div>
                           <input data-parsley-type="number" type="number" class="form-control" placeholder="Enter pin code" name="zip_code" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Police Station</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control"  placeholder="Enter Police Station" name="police_station" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Business Details
                  </div>
                  <div class="card-body row">
                     <div class="mb-3">
                        <label class="form-label">Business Name</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Business Name" name="shop_name" required>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Business Address</label>
                        <div>
                           <textarea class="form-control" rows="3" name="shop_address" required></textarea>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Business Pin Code</label>
                        <div>
                           <input data-parsley-type="number" type="number" class="form-control" placeholder="Enter Business Pin Code" name="shop_pin_code" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Police Station</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Police Station" name="shop_police_station" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Pan Card Number</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="EnterPan Number" name="pan_no" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Pan Card Document Proof</label>
                        <div>
                           <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="pan_proof" required>
                        </div>
                     </div>

                     <div class="mb-3 col-md-6">
                        <label class="form-label">GST Number</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter GST Number" name="gst_no">
                        </div>
                     </div>

                     <div class="mb-3 col-md-6">
                        <label class="form-label">GST Document Proof</label>
                        <div>
                           <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="gst_proof" >
                        </div>
                     </div>

                     <div class="mb-3 col-md-6">
                        <label class="form-label">Trade License</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Trade License" name="trade_license">
                        </div>
                     </div>

                     <div class="mb-3 col-md-6">
                        <label class="form-label">Trade License Proof</label>
                        <div>
                           <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="trade_license_proof" >
                        </div>
                     </div>
                  </div>
               </div>

               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Work Details
                  </div>
                  <div class="card-body row">
                     <div class="mb-3">
                        <label class="form-label">Preferable Pin Code <b style="color: red;">Coma(,) Separated</b></label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" placeholder="Ex. 700003,582365,712406" name="prefer_pin" required>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Login Details
                  </div>
                  <div class="card-body row">
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Password</label>
                        <div>
                           <input data-parsley-type="password" type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                     </div>
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <div>
                           <input data-parsley-type="password" type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <!-- end col -->
            <div class="col-lg-3">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                        Profile Image
                  </div>
                  <div class="card-body text-center">
                        <div class="mb-0">
                           <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                        </div>
                        <div class="mb-0">
                           <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                           <input type="hidden" name="media_id" id="media_id" />
                           <!-- <a href="javascript:;" id="openLibrary">or Choose From Library</a> -->
                        </div> 
                  </div>
               </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Status</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Inactive</label>
                        </div>
                     </div>
                    
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


                                            
