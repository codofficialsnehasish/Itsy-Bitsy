<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-header">
      <h5 class="modal-title">Options &nbsp;(<?php echo $variation->label_names;//echo html_escape(get_variation_label($variation->label_names, $this->selected_lang->id)); ?>)</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal"
         aria-label="Close"></button>
   </div>
<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <div class="variation-options-container">
                <?php if (!empty($variation_options)): ?>
                    <table class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline">
                        <tbody>
                        <?php foreach ($variation_options as $option): ?>
                            <tr>
                                <td> <strong><?php echo $option->option_names;//html_escape(get_variation_option_name($option->option_names, $this->selected_lang->id)); ?></strong></td>
                                <td>
                                <?php if ($option->is_default != 1): ?>
                                        <span>Stock:&nbsp;<strong><?php echo $option->stock; ?></strong></span>
                                    <?php endif; ?>
                                    <?php if ($option->is_default == 1): ?>
                                        <label class="btn btn-success btn-sm">Default</label>
                                    <?php endif; ?>
                                </td>
                                <td align="right">
                                <!-- <button type="button" class="btn btn-sm btn-primary btn-variation-table" onclick='edit_product_variation_option("<?php echo $variation->id; ?>","<?php echo $option->id; ?>");'><i class="fas fa-pencil-alt"></i> Edit</button> -->
                                    <button type="button" class="btn btn-sm btn-danger btn-variation-table" onclick='delete_product_variation_option("<?php echo $variation->id; ?>","<?php echo $option->id; ?>");'><i class="fas fa-trash-alt"></i> Delete</button>
  
                                </td>
                            </tr>
                           
                        <?php endforeach; ?>
                      </tbody>
                 </table>
                <?php else: ?>
                    <p class="text-muted text-center m-t-15"> No Records Found!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row-custom">
    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
         aria-label="Close">Close</button> -->
    </div>
</div>
