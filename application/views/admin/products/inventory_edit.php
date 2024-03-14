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
                  <li class="breadcrumb-item active" aria-current="page">Add new Inventory</li>
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
      <?= form_open_multipart('admin/products/inventory_update_process', 'class="custom-validation"');?>
      <input type="hidden" name="product_id" value="<?= $this->uri->segment(4);?>" />
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
                            <?php $this->load->view('admin/partials/_messages');?>
                            <div class="mb-3">
                                <label class="form-label">SKU</label>
                                <div>
                                    <input data-parsley-type="text" type="text" class="form-control" required value="<?= $item->sku ?>" name="sku">
                                </div>
                            </div> 
                            <div class="col-12 mb-3">
                                <label class="form-label">Stock management</label>
                                <div class="form-check">
                                    <input type="checkbox" id="check123" name="is_stock_manage" value="<?= $item->is_stock_manage;?>" <?= check_uncheck($item->is_stock_manage,1);?>>
                                    <label class="form-check-label" for="check123">Track stock quantity for this product</label>
                                </div>
                            </div>
                            <div class="mb-3" id="oprnclosed" style="<?php if($item->is_stock_manage == 1){ echo 'display:block;';}else{ echo 'display:none;';} ?>">
                                <label class="form-label">Quantity</label>
                                <div>
                                    <input type="number" class="form-control" value="<?= $item->stock;?>" required name="qty" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock Status</label>
                                <div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="stockstatus" value="1" style="margin-right: 15px;" <?= check_uncheck($item->stock_status,1);?>>In stock
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="stockstatus" value="0" style="margin-right: 15px;" <?= check_uncheck($item->stock_status,0);?>>Out of stock
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<script>
    // Get references to the button and the panel
    var toggleButton = document.getElementById('check123');
    var fiendPanel = document.getElementById('oprnclosed');

    // Add a click event listener to the button
    toggleButton.addEventListener('click', function() {
      // Toggle the display property of the panel
      if (fiendPanel.style.display === 'none') {
        toggleButton.value = 1;
        fiendPanel.style.display = 'block';
      } else {
        toggleButton.value = 0;
        fiendPanel.style.display = 'none';
      }
    });
  </script>


                                            
