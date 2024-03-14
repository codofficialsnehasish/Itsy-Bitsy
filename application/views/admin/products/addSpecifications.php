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
                  <?php $this->load->view('admin/products/tabmenuedit');?>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active p-3" id="home" role="tabpanel">
                      
                        <div class="row">
                            <div class="mb-5">
                            <?= form_open_multipart('admin/products/specifications-process', 'class="repeater custom-validation"');?>
                            <input type="hidden" name="product_id" value="<?= $this->uri->segment(4);?>" />    
                              <div data-repeater-list="group-a">
                                 <div data-repeater-item class="row">
                                          <div  class="mb-4 col-lg-5">
                                             <label class="form-label" for="no_of_users">Title</label>
                                             <input type="text" name="option_title" id="option_title" class="form-control" required/>
                                          </div>
                                          <div  class="mb-6 col-lg-5">
                                             <label class="form-label" for="amount">Value</label>
                                             <input type="text" name="option_value" id="option_value" name="untyped-input" class="form-control" required/>
                                          </div>
                                       <div class="col-lg-2 col-sm-4 align-self-center">
                                             <a data-repeater-delete class="btn btn-danger btn-sm edit"  data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Row"> <i class="fas fa-trash-alt"></i>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                              <button data-repeater-create type="button" class="btn btn-success  btn-sm mt-2 mt-sm-0"><i class="fas fa-plus me-2"></i> Add New</button>      
                           </div>
                           </div>
                           <div class="row">
                           <div class="mb-5 col-lg-12">
                              <?php if(!empty($allspecifications)):?>
                              <table class="table table-striped table-bordered dt-responsive nowrap">
                                 <thead>
                                    <tr>
                                     <th>Title</th>
                                     <th>Value</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       foreach($allspecifications as $spec):   
                                    ?>
                                    <tr>
                                       <td><?= $spec->option_title;?></td>
                                       <td><?= $spec->option_value;?></td>
                                    </tr>
                                    <?php 
                                       endforeach;
                                    ?>
                                 </tbody>
                              </table>
                              <?php endif;?>
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
                        Save & Next
                        </button>
                        <?php echo form_close();?>
                        
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