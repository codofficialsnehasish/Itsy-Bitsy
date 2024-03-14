<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($product->listing_type != 'bidding'): ?>
    <?php if ($product->is_free_product == 1): ?>
        <strong class="lbl-free"><?php //echo trans("free"); ?></strong>
    <?php else:
        if (!empty($price)):
          echo  price_formatted($price, $product->currency_code,$discount_rate);
        endif;
    endif;
endif; ?>