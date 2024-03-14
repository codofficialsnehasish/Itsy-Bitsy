
 <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
   aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-lg">
   <form id="form_add_product_variation" novalidate>
     <input type="hidden" name="product_id" value="<?= $this->uri->segment(4);?>">

      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Variation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-12 tab-variation">
               <div class="mb-3">
                        <label class="form-label">Label</label>
                        <div>
                        <input type="text" id="input_variation_label" class="form-control form-input input-variation-label" name="label_name" placeholder="English" maxlength="255" required="" data-parsley-type="text">
                        </div>
               </div>

                  <div class="mb-3">
                     <label class="form-label">Variation Type</label>
                     <div class="">
                        <select name="variation_type" class="form-control" onchange="show_hide_form_option_images(this.value);" required="">
                           <option value="radio_button">Radio Button (Single Selection)</option>
                           <option value="dropdown">Dropdown (Single Selection)</option>
                           <option value="checkbox">Checkbox (Multiple Selection)</option>
                           <option value="text" checked="">Text</option>
                           <option value="number">Number</option>
                        </select>
                     </div>
                  </div>

                  <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Option Display Type</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="odt1" name="option_display_type" class="form-check-input" value="text">
                           <label class="form-check-label" for="odt1">Text</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="odt2" name="option_display_type" class="form-check-input" value="image" checked>
                           <label class="form-check-label" for="odt2">Image</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="odt3" name="option_display_type" class="form-check-input" value="color" checked>
                           <label class="form-check-label" for="odt3">Color</label>
                        </div>
                  </div>

                  <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Show Option Images on Slider When an Option is Selected</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="spios" name="show_images_on_slider" class="form-check-input" value="1">
                           <label class="form-check-label" for="spios">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="spios1" name="show_images_on_slider" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="spios1">No</label>
                        </div>
                  </div> -->
                  <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Use Different Price for Options</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="udpo" name="use_different_price" class="form-check-input" value="1">
                           <label class="form-check-label" for="udpo">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="udpo1" name="use_different_price" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="udpo1">No</label>
                         </div>
                  </div>
                  <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="visible1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="visible1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="visible2" name="is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="visible2">No</label>
                        </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary waves-effect waves-light">Add Varition
         </button>
      </div>
   </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="addVariationOptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-custom modal-variation" role="document">
        <div class="modal-content">
            <div id="response_product_add_variation_option"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewVariationOptionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-custom modal-variation modal-variation-options" role="document">
        <div class="modal-content">
            <div id="response_product_variation_options_edit"></div>
        </div>
    </div>
</div>