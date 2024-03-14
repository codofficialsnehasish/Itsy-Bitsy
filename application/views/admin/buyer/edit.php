<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Buyer</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('buyer')?>">Buyer</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Buyer</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('buyer/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/buyer/updateProcess', 'class="custom-validation"');?>
      <input type="hidden" name="id" value="<?= $item->id?>" />
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Edit buyer
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Name" name="first_name" value="<?= $item->first_name;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Name" name="last_name" value="<?= $item->last_name;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">eMail</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter eMail" name="email" value="<?= $item->email;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter Phone Number" name="phone_number" value="<?= $item->phone_number;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Address</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Enter Address" name="address" value="<?= $item->address;?>">
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
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" <?= check_uncheck($item->status,1);?>>
                           <label class="form-check-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" <?= check_uncheck($item->status,0);?>>
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


                                            
