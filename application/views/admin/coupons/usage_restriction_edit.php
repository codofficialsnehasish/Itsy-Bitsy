<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">coupons</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('coupons')?>">coupons</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new coupons</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('coupons/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/coupons/restriction-update-process', 'class="custom-validation"');?>
      <input type="hidden" name="product_id" value="<?= $this->uri->segment(4);?>" />
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-body">
                  <!-- Nav tabs -->
                  <?php $this->load->view('admin/coupons/tabmenuedit');?>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active p-3" id="home" role="tabpanel">
                        <div class="row">
                           <?php $this->load->view('admin/partials/_messages');?>
                           
                           <input type="hidden" name="coupons_id" value="<?= $item->id?>">
                           
                           <div class="mb-3">
                               <label class="form-label">Minimum spend</label>
                               <input data-parsley-type="text" type="text" class="form-control" required placeholder="" name="min_sp" id="product_price_input" value="<?= $item->minimum_spend;?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Maximum spend</label>
                                <input data-parsley-type="text" type="text" class="form-control" required placeholder="" name="max_sp" id="product_price_input" value="<?= $item->maximum_spend;?>">
                            </div>
                            <!-- <div class="mb-3">
                               <label class="form-label">Products</label>
                               <div>
                                  <input type="text" name="p_id" id="p_id" onkeyup="get_product(this.value)"/>
                               </div>
                            </div> -->
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
      </div>
      <!-- end col -->
      <!-- end col -->
   </div>
   <!-- <input type="hidden" name="commission_amount" id="commission_amount_txt" value=" $item->commission_amount;" /> -->
   
   <!-- end row -->
   <?= form_close();?>
</div>
<!-- container-fluid -->
</div>

<script>
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
    function get_product(val){
        $.ajax({
            url:base_url + "search_products",
            type: "get",
            data: {},
            success: function (response){

            }
        });
    }
</script>