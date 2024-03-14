<div class="row g-sm-4 g-2">
        <div class="col-lg-6">
        <div class="slider-image"><img src="<?= get_product_main_image($product);?>" class="img-fluid blur-up lazyload" alt="<?= $product->title;?>"></div>
        </div>
        <div class="col-lg-6">
        <div class="right-sidebar-modal">
            <h4 class="title-name"><?= $product->title;?></h4>
            <h4 class="price">
                <div class="product_price" id="product_details_price_container">
                    <?php $this->load->view("products/details/_price", ['product' => $product, 'price' => $product->price, 'discount_rate' => $product->discount_rate]); ?>
                </div>
            </h4>
            <div class="product-rating">
                <div class="product-review-covid mt-3">
                    <div class="product-number-review">
                        <div class="star-number">★<div class="rating-number"><?= get_avg_rationg_count($product->id);?></div></div>
                        <div class="product-review"><a href="#menu2" id="rr"><?= $product->rating;?> Review</a></div>
                    </div> 
                </div> 

            </div>
            <div class="product-detail">
                <h4>Product Details :</h4>
                <?= $product->short_desc;?>
            </div>
            <?= form_open('', 'class="needs-validation" id="form_add_cart"  novalidate '); ?>
					 <input type="hidden" name="product_id" id="product_id" value="<?= $product->id;?>">
            <?php if (!empty($full_width_product_variations)):
                        foreach ($full_width_product_variations as $variation):
                            $this->load->view('products/details/_product_variations', ['variation' => $variation]);
                        endforeach;
                  endif;
                if (!empty($half_width_product_variations)):
                    foreach ($half_width_product_variations as $variation):
                        $this->load->view('products/details/_product_variations', ['variation' => $variation]);
                    endforeach;
                endif; ?>
            <div class="modal-button">
            <div class="cart_qty qty-box product-qty" id="text_product_stock_status">
		<?php if (check_product_stock($product)): ?>
			<div class="input-group" >
					<button type="button" class="qty-left-minus minusbtn" data-type="minus" data-field=""><i class="fa fa-minus" aria-hidden="true"></i>
					</button>
					<input class="form-control input-number qty-input qtytxt" name="product_quantity" value="1">
					<button type="button" class="qty-right-plus plusbtn" data-type="plus" data-field=""><i class="fa fa-plus" aria-hidden="true"></i>
					</button>
			</div>
			<?php else: ?>
				<div class="input-group" >
					<span class="status-in-stock text-danger">Out of Stock</span>
				</div>
			<?php endif; ?>

	</div>
    <?php $buttton = get_product_form_data($product)->button;
			if (!empty($buttton)):?>
					<?php echo $buttton; ?> 
		<?php endif; ?>
                <!-- <button onclick="location.href=''" class="btn btn-md add-cart-button icon">Add To Cart</button> -->
                <button type="button" onclick="location.href='<?= base_url('product/'.$product->slug);?>'" class="btn theme-bg-color view-button icon text-white fw-bold btn-md">View More Details</button>
            </div>
            <?= form_close(); ?>	

        </div>
        </div>
</div>
