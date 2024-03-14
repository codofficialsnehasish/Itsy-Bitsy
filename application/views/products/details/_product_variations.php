<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$option_stock = $product->stock;
if (!empty($variation)):
   // $variation_label = get_variation_label($variation->label_names, $this->selected_lang->id);
    if ($variation->variation_type == 'radio_button'): ?>
        <div class="col-12 col-product-variation">
            <label class="label-product-variation"><?php echo $variation->label_names; ?></label>
        </div>
        <div class="col-12 col-product-variation swatch">
            <?php $variation_options = get_product_variation_options($variation->id);
            if (!empty($variation_options)):
                $numItems = count($variation_options);
                $i = 0;
                foreach ($variation_options as $option):
                    if ($option->is_default != 1):
                        $option_stock = $option->stock;
                    endif;
                    // $option->option_names = get_variation_option_name($option->option_names, $this->selected_lang->id); ?>
                    <div class="custom-control custom-control-variation custom-control-validate-input swatch-element">
                        <input type="radio" name="variation<?php echo $variation->id; ?>" data-name="variation<?php echo $variation->id; ?>" value="<?php echo $option->id; ?>" id="radio<?php echo $option->id; ?>" class="custom-control-input swatchInput form-check-input" <?php echo ($option->is_default == 1) ? 'checked' : ''; ?> onchange="select_product_variation_option('<?php echo $variation->id; ?>', 'radio_button', $(this).val());" required>
                        <?php if ($variation->option_display_type == 'image'):
                            $option_image = get_variation_main_option_image_url($option, $product_images); ?>
                            <label for="radio<?php echo $option->id; ?>" data-input-name="variation<?php echo $variation->id; ?>" class="checkbox-inline custom-control-label custom-control-label-image label-variation-color label-variation<?php echo $variation->id; ?> <?php echo ($option_stock < 1) ? 'option-out-of-stock' : ''; ?>">
                                <img src="<?php echo $option_image; ?>" class="img-variation-option" data-toggle="tooltip" data-placement="top" title="<?php echo html_escape($option->option_names); ?>" alt="<?php echo html_escape($option->option_names); ?>">
                            </label>
                            <?php
                                if(++$i === $numItems) {
                                    echo '<div class="invalid-tooltip" style="capitalize !important">Please Select One '. ucfirst($variation->label_names) .' Option</div>';
                                }
                            ?>
                        <?php elseif ($variation->option_display_type == 'color'): ?>
                            <label for="radio<?php echo $option->id; ?>" data-input-name="variation<?php echo $variation->id; ?>" class="custom-control-label label-variation-color label-variation<?php echo $variation->id; ?> <?php echo ($option_stock < 1) ? 'option-out-of-stock' : ''; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo html_escape($option->option_names); ?>">
                                <span class="variation-color-box" style="background-color: <?php echo $option->color; ?>"></span>
                            </label>
                            <?php
                                if(++$i === $numItems) {
                                    echo '<div class="invalid-tooltip" style="capitalize !important">Please Select One '. ucfirst($variation->label_names) .' Option</div>';
                                }
                            ?>
                        <?php else: ?>
                            <label for="radio<?php echo $option->id; ?>" data-input-name="variation<?php echo $variation->id; ?>" class="custom-control-label swatchLbl label-variation-size label-variation-color label-variation<?php echo $variation->id; ?> <?php echo ($option_stock < 1) ? 'option-out-of-stock' : ''; ?>">
                                <?php echo html_escape($option->option_names); ?>
                            </label>
                            <?php
                                if(++$i === $numItems) {
                                    echo '<div class="invalid-tooltip" style="capitalize !important">Please Select One '. ucfirst($variation->label_names) .' Option</div>';
                                }
                            ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>