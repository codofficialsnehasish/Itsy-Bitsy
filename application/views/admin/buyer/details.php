<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Buyer</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('buyer/')?>">Buyer</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Buyer</li>
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
      <?= form_open_multipart('admin/buyer/update-process', 'class="custom-validation"');?>
            <input type="hidden" name="user_id" value="<?= $item->id?>" />
         <div class="row">
           
            <!-- end col -->
            <div class="col-lg-8">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Buyer Details
                    
                  </div>
                  <div class="card-body">
                  <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        <?= check_visibility($item->status);?>
                        </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Registered Through</label>
                     <div  class="col-sm-9">
                        <?php $registeredType=explode('_',$item->user_type);?>
                        <?= ucfirst($registeredType[0]);?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Full Name</label>
                     <div  class="col-sm-9">
                     <?= $item->full_name;?>
                     </div>
                  </div> 
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Address</label>
                     <div  class="col-sm-9">
                     <?= $item->address;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">Contact No.</label>
                     <div  class="col-sm-9">
                     <?= $item->phone_number;?>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label  for="example-text-input" class="col-sm-3 col-form-label">eMail</label>
                     <div  class="col-sm-9">
                     <?= $item->email;?>
                     </div>
                  </div>
                 
                  <div class="row row mb-3">
                        <label  for="example-text-input" for="excol-sm-3 col-form-labelch-input" class="col-sm-3 col-form-label">Created on</label>
                        <div class="col-sm-9">
                        <?= formatted_date($item->created_at);?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
                         <div class="col-lg-4">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                  Status
                     
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

         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>


                                                   
                                            
