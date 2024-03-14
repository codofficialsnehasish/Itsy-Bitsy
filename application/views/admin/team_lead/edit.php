<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Team Lead</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('team-lead')?>">Team Lead</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Team Lead</li>
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
      <?= form_open_multipart('admin/team-lead/updateProcess', 'class="custom-validation"');?>
      <input type="hidden" name="id" value="<?= $item->id?>" />
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Edit Team Lead Details
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
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Edit Shop Details
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Shop Name" name="shop_name" value="<?= $item->shop_name;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Pan Card</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" 
                              placeholder="Pan" name="pan_no" value="<?= $item->pan_no;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Pan Card Document Proof</label>
                        <div class="mb-3">
                           <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->pan_proof);?>" data-holder-rendered="true" style="display:<?= $item->pan_proof!=0?'block':'none';?>">
                        </div>
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
                              placeholder="Enter Aadhar" name="aadhar_no" value="<?= $item->aadhar_no;?>">
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Aadhar Card Proof</label>
                        <div class="mb-3">
                           <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->aadhar_proof);?>" data-holder-rendered="true" style="display:<?= $item->aadhar_proof!=0?'block':'none';?>">
                        </div>
                        <div>
                           <input data-parsley-type="file" type="file"
                              class="form-control" required
                              placeholder="Aadhar" name="aadhar_proof" >
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <!-- end col -->
            <div class="col-lg-3">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                        Image
                  </div>
                  <div class="card-body text-center">
                        <div class="mb-0">
                           <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="<?= get_image($item->user_image);?>" data-holder-rendered="true" style="display:<?= $item->user_image!=0?'block':'none';?>">
                        </div>
                        <div class="mb-0">
                           <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                           <input type="hidden" name="media_id" id="media_id" />
                           <input type="hidden" name="hdn_media_id" id="media_id" value="<?= $item->user_image;?>" />
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


                                            
