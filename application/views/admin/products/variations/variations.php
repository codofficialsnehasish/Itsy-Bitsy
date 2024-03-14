<!-- <div id="" class="col-12">
 </div> -->
    <div class="row">
    <div class="col-12">
                <div class="table-responsive" id="response_product_variations"> 
            <?php   
             $dd['product_variations'] = $this->variation_model->get_product_variations($this->uri->segment(4));
             ?>
          <?php $this->load->view("admin/products/variations/_response_variations", $dd); ?>

                </div>
    </div>              
    <div class="col-12">
        <button type="button" class="btn btn-primary waves-effect waves-light me-1  btn-variation" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                Add Variation                                                            </button>
        <!-- <button type="button" class="btn btn-info waves-effect waves-light me-1 btn-variation" data-toggle="modal" data-target="#variationModalSelect">
                Select an Existing Variation                                                            </button> -->

            
    </div>               
    </div>


 <?php $this->load->view('admin/products/variations/_form_variations');?>