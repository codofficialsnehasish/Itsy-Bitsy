<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">About</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('about')?>">About</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new About Image</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('about/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/about/image_process', 'class="custom-validation"');?>
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
                <div class="tab-content">
                      <div class="row">
                          <div class="mb-5">
                          <div class="card">
                              <div class="card-header bg-primary text-light">
                                  About Image
                              </div>
                              <div class="card-body text-center">
                                  <div class="mb-3">
                                      <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" >
                                      <img class="img-thumbnail rounded me-2" id="blah" alt="" width="800" src="" data-holder-rendered="true" style="display: none;">
                                  </div>
                                  <div class="mb-0" data-buttonname="btn-secondary">
                                      <input type="hidden" name="media_id" id="media_id" />
                                      <!-- <a href="javascript:;" id="openLibrary">or Choose From Library</a> -->
                                  </div> 
                              </div>
                          </div>
                          </div>
                      </div>
                </div>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="card">
               <div class="card-header bg-primary text-light">
                    Publish
               </div>
               <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Image Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="img_is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="img_is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                        <p style="color:red;font-weight:700;">** Only one image can visible. If you choose show then rest of the image will be hide **</p>
                     </div>
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
      </div>
      <?= form_close();?>
      <!-- end col -->
      <!-- end col -->
   </div>
   <!-- end row -->
</div>
<!-- container-fluid -->
</div>