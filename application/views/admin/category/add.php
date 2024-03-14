<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Category</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('category')?>">Categories</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Category</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('category/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/category/process', 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add New Category
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Title</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Title" name="cat_name">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Parent Category</label>
                        <div>
                           <select class="form-select" name="parent_id" aria-label="Default select example">
                              <option value="">None</option>
                              <?php foreach($categories as $category):?>
                              <option value="<?= $category->cat_id?>"><?= $category->cat_name;?></option>
                              <?php endforeach;?>
                           </select>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div>
                           <textarea name="cat_desc"  class="form-control editor" rows="5"></textarea>
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
            <!-- end col -->
            <div class="col-lg-3">
               <?php $this->load->view('admin/partials/_input-image');?>
               <!-- <div class="card">
                  <div class="card-header bg-primary text-light">
                     Catagory Banner
                  </div>
                  <div class="card-body text-center">
                        <div class="mb-0">
                           <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                        </div>
                        <div class="mb-0">
                           <input type="file" name="catagory_image" class="filestyle" data-input="false" data-buttonname="btn-secondary">
                           <input type="hidden" name="media_id" id="media_id" />
                           <a href="javascript:;" id="openLibrary">or Choose From Library</a>
                        </div> 
                  </div>
               </div> -->
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
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
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Show on Header Menu</label>
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
                        <label class="form-label mb-3 d-flex">Show on Header Dropdown</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcy" name="is_in_dropdown" class="form-check-input" value="1">
                           <label class="form-check-label" for="pcy">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcn" name="is_in_dropdown" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="pcn">No</label>
                        </div>
                     </div>
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Popular Category</label>
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
                        <label class="form-label mb-3 d-flex">Show on Listing Menu</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="ismenu" name="is_menu" class="form-check-input" value="1">
                           <label class="form-check-label" for="ismenu">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="ismenu1" name="is_menu" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="ismenu1">No</label>
                        </div>
                     </div>
                         
                      <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Special Category</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="isspecial" name="is_special" class="form-check-input" value="1">
                           <label class="form-check-label" for="isspecial">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="isspecial1" name="is_special" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="isspecial1">No</label>
                        </div>
                     </div> -->
                           
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
            <!-- end col -->
         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>


                                            
