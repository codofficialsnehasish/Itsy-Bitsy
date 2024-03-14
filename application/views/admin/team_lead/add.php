<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Dristributor</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('team-lead')?>">Team Lead</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Team Lead</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('team-lead/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/team-lead/team-lead-process', 'class="custom-validation"');?>

         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Team Lead Details
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Name" name="first_name">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Last Name" name="last_name">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">eMail</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter eMail" name="email">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter Phone Number" name="phone_number">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Address</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter Address" name="address">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Pin Code</label>
                        <div>
                           <input data-parsley-type="number" type="number"
                              class="form-control" 
                              placeholder="Enter pin code" name="zip_code">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Identity & Citizenship Proof
                  </div>
                  <div class="card-body">
                     <!-- <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Shop Name" name="shop_name">
                        </div>
                     </div> -->
                     <div class="mb-3">
                        <label class="form-label">Pan Card Number</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Pan" name="pan_no">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Pan Card Document Proof</label>
                        <div>
                           <input data-parsley-type="file" type="file"
                              class="form-control" 
                              placeholder="Pan" name="pan_proof">
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Aadhar Card Number</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter Aadhar" name="aadhar_no">
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Aadhar Card Proof</label>
                        <div>
                           <input data-parsley-type="file" type="file"
                              class="form-control" required
                              placeholder="Aadhar" name="aadhar_proof" >
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add Login Details
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div>
                           <input data-parsley-type="password" type="password"
                              class="form-control" required
                              placeholder="Password" name="password">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div>
                           <input data-parsley-type="password" type="password"
                              class="form-control" 
                              placeholder="Confirm Password" name="confirm_password">
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <!-- end col -->
            <div class="col-lg-3">
            <?php $this->load->view('admin/partials/_input-image');?>
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


                                            
