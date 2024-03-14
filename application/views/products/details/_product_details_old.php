	<!--------------------main section-------------------->
	<section class="prorit border-t"> 
	

		<div class="container pt-5 pb-5">
			<div class="row">
                <div class="col-md-6">
                    <div class="">
                        <ul id="glasscase" class="gc-start">
						<?php foreach($product_images as $pimg):?>
							<li><img src="<?= get_product_image($pimg->media_id);?>" alt="Text"  data-gc-caption="Your caption text" /></li>
							<?php endforeach;?>

	                        <!-- <li><img src="https://source.unsplash.com/featured?technology" alt="Text" data-gc-caption="Your caption text" /></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
				<!-- <div class="row">
    <div class="col-12"><?php //$this->load->view('partials/_messages'); ?></div>
	</div>  -->
               		<div class="saree_details ">
                  		<div class="prdct-name">
                  			<h2 class="saree_name"><?= $product->title;?></h2>
                  		</div>
						<?php if($product->sku!=''):?>
                  		<div class="sku">
                  			SKU: <span id="product-sku"><?= $product->sku;?></span>
                  		</div>
						<?php else:?>
							<div class="sku">
                  			<span id="product-sku">&nbsp;</span>
                  		</div>

						<?php endif;?>
                  		<div class="row">
                  			<div class="product_price" id="product_details_price_container">
							  <?php $this->load->view("products/details/_price", ['product' => $product, 'price' => $product->price, 'discount_rate' => $product->discount_rate]); ?>
          				
                  			</div>
                  		</div>
                  		<!-- <div class="product-review-covid">
                  			<div class="product-number-review">
                  				<div class="star-number">★<div class="rating-number">5</div></div>
                  				<div class="product-review"><a href="#all_review1">0 Review</a></div>
                  			</div> 
                  		</div> -->
                  		<hr style="width: 100%; border-top: 1px solid #af01601f;">
                  		<div class="product_highlights">
                     		<?= $product->short_desc;?>
                     	</div>
						 <?= form_open(base_url('add-to-cart'), 'class="needs-validation" id="form_add_cart"  novalidate '); ?>
                     <div>
						 <div class="row">
							<div class="col-12">
								<div class="row-custom product-variations">
									<div class="row row-product-variation item-variation">
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
									</div>
								</div>
							</div>
						</div>
                     	<div class="product_quantity">
                     		<div class="clearfix my-1">
                     			<label><strong>Quantity:</strong> </label>
                     			<div class="clearfix ">
                     				
                     					<input type="hidden" name="product_id" value="<?= $product->id;?>">
                     					<div class="d-block position-relative count-input clearfix ">
                     						<a class="position-absolute border-right text-center incr-btn" data-dir="dwn">-</a>
                     						<input name="product_quantity" id="" data-quantity="" class="form-control text-center quantity" value="1" type="text"> 
                     						<a class="position-absolute border-left text-center incr-btn" data-dir="up"> +</a>
                     					</div> 
                     				
                     			</div> 
                     		</div>
                     	</div>
                     	<br>
                     	<div class="product-contact">
                     		<div class="carousel-btn">
							 <button type="submit" class=""><i class="zmdi zmdi-shopping-basket"></i>Add to Cart</button>
				        		<!-- <a href="#" >Add to cart <i class="zmdi zmdi-shopping-basket"></i></a> -->
				        	</div>
                     	</div>
						</div>
						 <?= form_close(); ?>	
                    </div>
                </div>
            </div>
        </div>






<div class="container mt-3 descri_ption border-b">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#home">Product Description</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#menu1">Product Specification</a>
    </li>
  
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>Product Description</h3>
      <?= $product->description;?>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Product Specification</h3>
	   <?= $product->product_specification;?>
    </div>
    
 
  </div>
</div>

	</section>


	<!------------------------product section------------------------->
	<section class="home-product">
		<div class="heading text-center mb-3 mt-5">
			<h2>Similar Arrivals</h2>
			<h3 class="yeseva">Similar Products</h3>
		</div>
		<div class="container">
			<div class="row">
				



        <div class="owl-carousel owl-theme">
		<?php
				if(!empty($similarproducts)):
				foreach($similarproducts as $sproduct):?>
            <div class="item">
             <div class="product-content">
						<div class="product-image">
							<img src="<?= get_product_main_image($sproduct);?>" alt="">
							<a href="<?= base_url('product/'.$sproduct->slug);?>" class="product-btn">View Details <i class="zmdi zmdi-open-in-new"></i></a>
						</div>
						<div class="product-details text-center">
							<div class="p-code"><?= $sproduct->sku;?></div>
							<div class="p-name yeseva"><?= word_limiter($sproduct->title,2);?></div>
							<div class="p-price"><?= select_value_by_id('currencies','id',$sproduct->currency_code,'hex');?> <?= $sproduct->price;?></div>
						</div>
					</div>
            </div>
			<?php endforeach;
			endif;?>	
          </div>

			</div>
		</div>
	</section>

