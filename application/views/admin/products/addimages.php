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
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-body">
                  <!-- Nav tabs -->
                  <?php $this->load->view('admin/products/tabmenu');?>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active p-3" id="home" role="tabpanel">
                        <div class="row">
                        <div class="mb-5">
                      <?php  $this->load->view('admin/products/_image_upload_box'); ?>

                                        <?php //echo form_open_multipart('admin/products/media-process', array('class' => 'dropzone'));?>  
                                       <!--  <input type="hidden" name="product_id" value="<?= $this->uri->segment(4)?>" />     
                                          

                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h4>Drop files here or click to upload.</h4>

                                                </div> -->
                                            <!-- </form> -->
                                            <?php //echo form_close();?>
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
                        <?php echo form_open_multipart('admin/products/product-images-save');?>  
                        <input type="hidden" name="product_id" value="<?= $this->uri->segment(4)?>" />     
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Save & Exit
                        </button>
                        <?php echo form_close();?>
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
   <!-- end row -->
</div>
<!-- container-fluid -->
</div>