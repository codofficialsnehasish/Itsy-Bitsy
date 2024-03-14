<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (!empty($product_variations)): ?>
<table class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Label</th>
        <th scope="col">Variation Type</th>
        <th scope="col"></th>
        <th scope="col">Visible</th>
        <th scope="col" style="width: 250px;">Options</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($product_variations as $variation): ?>
        <tr>
            <td><?php echo $variation->id; ?></td>
            <td style="width: 20%;"><?php echo $variation->label_names; ?></td>
            <td><?php echo $variation->variation_type; ?></td>
            <td style="width: 35%;">
                <?php if ($variation->variation_type != 'text' && $variation->variation_type != 'number'): ?>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-variation-table" onclick="add_product_variation_option('<?php echo $variation->id; ?>');">
                        <span id="btn-variation-text-add-<?php echo $variation->id; ?>"><i class="fas fa-plus me-2"></i>Add Option</span>
                        <div id="sp-options-add-<?php echo $variation->id; ?>" class="spinner spinner-btn-variation" style="display:none;">
                        <!-- <i class="mdi mdi-spin mdi-loading"></i>   -->Loding...
                        <!-- <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div> -->
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-variation-table" onclick="view_product_variation_options('<?php echo $variation->id; ?>');">
                        <span id="btn-variation-text-options-<?php echo $variation->id; ?>"><i class="fas fa-bars"></i> View Options</span>
                        <div id="sp-options-<?php echo $variation->id; ?>" class="spinner spinner-btn-variation" style="display:none;">
                        Loding...
                            <!-- <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div> -->
                        </div>
                    </a>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($variation->is_visible == 1):
                    echo"Yes";
                else:
                    echo "No";
                endif; ?>
            </td>
            <td>
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-dark btn-variation-table" onclick="edit_product_variation('<?php echo $variation->id; ?>');">
                    <span id="btn-variation-edit-<?php echo $variation->id; ?>"><i class="icon-edit"></i>Edit</span>
                    <div id="sp-edit-<?php echo $variation->id; ?>" class="spinner spinner-btn-variation">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </a> -->
                <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-variation-table" onclick="delete_product_variation(<?php echo $variation->id; ?>);"><i class="fas fa-trash-alt"></i>Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
<?php endif; ?>