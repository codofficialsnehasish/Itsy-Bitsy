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
      <?= form_open_multipart('admin/products/update-process', 'class="custom-validation"');?>
      <input type="hidden" name="hdn_id" value="<?= $item->id;?>" />
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
                                                    <?php //$this->load->view('admin/partials/_messages');?>
                                              <div class="mb-3">
                                                   <label class="form-label">Parent Category</label>
                                                      <div>
                                                         <select class="form-select" name="cat_id" id="cat_id" aria-label="Default select example" required>
                                                               <option value="">None</option>
                                                               <?php foreach($categories as $category):?>
                                                            <option value="<?= $category->cat_id?>" <?= $item->category_id==$category->cat_id?'selected':'';?>><?= $category->cat_name;?></option>
                                                            <?php endforeach;?>
                                                         </select>
                                                      </div>
                                              </div>

                                              <div class="mb-3">
                        <label class="form-label">Category</label>
                        <div>
                           <select class="form-select" name="subcat_id" id="subcat_id" aria-label="Default select example">
                                 <option value="">None</option>
                                 <?php foreach($subcategories as $subcat):?>
                                    <option value="<?= $subcat->cat_id;?>" <?= $item->subcategory_id==$subcat->cat_id?'selected':'';?>><?= $subcat->cat_name;?></option>
                                 <?php endforeach;?>
                                 </select>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <div>
                        <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Title" name="name" value="<?= $item->title;?>">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Choose Collection</label>
                        <div>
                           <select class="form-select" name="product_brand_id" id="product_brand_id" aria-label="Default select example" required>
                              <option value="">None</option>
                              <?php foreach($brands as $brand):?>
                                 <option value="<?= $brand->id?>" <?= $item->product_brand_id==$brand->id?'selected':'';?>><?= $brand->title;?></option>
                              <?php endforeach;?>
                           </select>
                        </div>
                     </div>
                     <!-- <div class="mb-3">
                        <label class="form-label">SKU</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="" name="sku">
                        </div>
                     </div>  -->
                      
                     <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <div>
                           <textarea name="short_desc"  class="form-control editor" rows="5"><?= $item->short_desc;?></textarea>
                        </div>
                     </div>
                                            
                          <div class="mb-3">
                        <label class="form-label"> Description</label>
                        <div>
                           <textarea name="description"  class="form-control editor" rows="5"><?= $item->description;?></textarea>
                        </div>
                     </div>
                      <div class="mb-3">
                        <label class="form-label"> Specification</label>
                        <div>
                           <textarea name="product_specification"  class="form-control editor" rows="5"><?= $item->product_specification;?></textarea>
                        </div>
                     </div> 
                           
                           
                           </div>
                                             
                                            </div>
                                    </div>
                                </div>

               

               <!-- <div class="card">
                  <div class="card-header bg-primary text-light">
                     Meta Options
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Title (Meta Tag)</label>
                        <div>
                           <input data-parsley-type="alphanum" type="text"
                              class="form-control" 
                              placeholder="Title (Meta Tag)" name="meta_title_tag">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Keywords (Meta Tag)</label>
                        <div>
                           <input data-parsley-type="alphanum" type="text"
                              class="form-control" 
                              placeholder="Keywords (Meta Tag)" name="meta_keywords">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Description (Meta Tag)</label>
                        <div>
                           <input data-parsley-type="alphanum" type="text"
                              class="form-control" 
                              placeholder="Description (Meta Tag)" name="meta_description">
                        </div>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
            <!-- end col -->
            <div class="col-lg-3">
                   <?php //$this->load->view('admin/products/_edit-input-image');?>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                     <?php if($this->auth_user->role=='admin'){?>
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div>
                     <?php }else{?>
                        <input type="hidden" name="is_visible" value="0" />
                        <?php }?>
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Show on Home Page</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline11" name="is_home" class="form-check-input" value="1">
                           <label class="form-check-label" for="customRadioInline11">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline22" name="is_home" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="customRadioInline22">No</label>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Popular products</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcy" name="is_popular" class="form-check-input" value="1">
                           <label class="form-check-label" for="pcy">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcn" name="is_popular" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="pcn">No</label>
                        </div>
                     </div> -->
                            <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Is Bestseller?</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcy" name="is_featured" class="form-check-input" value="1" <?= check_uncheck($item->is_featured,1);?>>
                           <label class="form-check-label" for="pcy">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcn" name="is_featured" class="form-check-input" value="0"  <?= check_uncheck($item->is_featured,0);?>>
                           <label class="form-check-label" for="pcn">No</label>
                        </div>
                     </div> 
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save & Next
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


                                            
