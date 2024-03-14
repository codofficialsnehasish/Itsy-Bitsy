	<!--------------------main section-------------------->
	<section class="prorit border-t"> 
	

		<div class="container pt-5 pb-5">
			<div class="row">
                <div class="col-md-6 position-relative">
   				<span class="favorite"> <a href="javascript:void(0);" class="btn-lg fav" id="<?= $product->id;?>">
				<?php if(auth_check()):
					echo is_favorite($this->auth_user->id,$product->id);
				?>
				<?php else:?>
				<i class="zmdi zmdi-favorite-outline"></i>
				<?php endif;?>
			</a></span>
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
                  		 <div class="product-review-covid">
                  			<div class="product-number-review">
                  				<div class="star-number">★<div class="rating-number"><?= get_avg_rationg_count($product->id);?></div></div>
                  				<div class="product-review"><a href="#menu2" id="rr"><?= $product->rating;?> Review</a></div>
                  			</div> 
                        
                  		</div> 
                  		<hr style="width: 100%; border-top: 1px solid #af01601f;">
                  		<div class="product_highlights">
                     		<?= $product->short_desc;?>
                     	</div>
						 <?= form_open(base_url('add-to-cart'), 'class="needs-validation" id="form_add_cart"  novalidate '); ?>
						 <input type="hidden" name="product_id" id="product_id" value="<?= $product->id;?>">
						 <div>
						 <div class="row">
							<div class="col-12">
                              <?php if($product->size_chart!=0):?>
                            <div class="sizechartpopup">
                            	<!-- Button trigger modal -->
								<button type="button" class="btn pull-right mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Size Chart</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  									<div class="modal-dialog">
    									<div class="modal-content">
                            				<div class="modal-body">
                            					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       			 								<img src="<?= get_image($product->size_chart);?>" class="img-fluid" alt="Size chart" \>
      										</div>
    									</div>
  									</div>
								</div>
                            </div>
                             <?php endif;?>
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
                     	<div class="product_quantity" id="text_product_stock_status" >
						 <?php if (check_product_stock($product)): ?>
							<div class="clearfix my-1" id="html_content_stock">
                     			<label><strong>Quantity:</strong> </label>
                     			<div class="clearfix ">
                     					
                     					<div class="d-block position-relative count-input clearfix ">
                     						<a class="position-absolute border-right text-center incr-btn" data-dir="dwn">-</a>
                     						<input name="product_quantity" id="" data-quantity="" class="form-control text-center quantity" value="1" type="text"> 
                     						<a class="position-absolute border-left text-center incr-btn" data-dir="up"> +</a>
                     					</div>
                                  		 
                     			</div> 
                     		</div>
                                
                        <?php else: ?>
							<div class="clearfix my-1" id="html_content_stock">
                            <span class="status-in-stock text-danger">Out of Stock</span>
							</div>
                        <?php endif; ?>
                     	
                     	</div>

                     	<div class="row">
                       		 <div class="pin_check"><i class="zmdi zmdi-pin zmdi-hc-fw"></i> 
                                			<input type="text" class="form-control" id="pinCode" placeholder="Delivery Pincode" required/>
                       						 <div class="invalid-feedback">Please enter delivery pincode</div>
                                			<a href="javascript:void(0);" id="checkPin">Check</a>
                                			<div id="pinresponse"></div>
                       			 			<input type="hidden" name="delivery_charge" id="deliveryCharge"  />
                        	</div>
                         </div>
                        <br>
                     	<div class="product-contact">
                        
                        
						 <?php $buttton = get_product_form_data($product)->button;
								if (!empty($buttton)):?>
									<div class="carousel-btn">
										<?php echo $buttton; ?> <!---comming Soon Comming Soon-->
									</div>
								<?php endif; ?>
                                
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
      <a class="nav-link active" id="pd" data-bs-toggle="tab" href="#home">Product Description</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="ps" data-bs-toggle="tab" href="#menu1">Product Specification</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pr" data-bs-toggle="tab" href="#menu2">Product Review</a>
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
    <div id="menu2" class="container tab-pane fade"><br>
	   	<section id="review_section">
       		<form class="SFueOp" method="post" action="">
       			<div class="row _14YOVU">       				
       				<div class="col-md-6 O5at2W form-group">
						<div class="_2sxtk-">
                    		<span>Rate this product</span>
                    	</div>
       					
                    		<div class="row" id="reviewForm">
       							<div class="rating-star">
                                    <input type="hidden" name="rating" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-primary" data-fractions="2"/>
                                </div>
    							 <div class="_2sxtk-">
       								<textarea placeholder="Comments...(optional)" id="review" class="form-control _3kRe7w"></textarea>
                    			</div>
                       		</div>
                    		
       
       					<div class="col-md-12"><button type="button" class="btn btn-info text-white mt-2" id="review-submit-button">Submit</button></div>
       					<div id="reviewResponse"></div>
                	</div>
                   
       				
                </div>               
                
            </form>  
       		<div class="SFueOp">
			</div>
        </section>
       
       <hr/>
      	<h3>Product Feedback</h3>
       <?php if(!empty($productReview)):
			
			foreach($productReview as $review):
			$reviewUser = get_user_by_id($review->user_id);
		?>
       <div class="_reviewbg">
       		<div class="product-number-review">
            	<div class="star-number">★<div class="rating-number"><?= $review->rating;?></div></div>
            </div>
       		<div class="rew-text">
       			<p> <?= $review->comment;?></p>
       		</div>
       		<div class="rew-denewala">
       			<div class="row">
       				<p class="_2sc7ZR"><i class="zmdi zmdi-account"></i><span> <?= $reviewUser->full_name; ?> </span></p>
       				<p class="_2sc7ZR">On <?= formatted_date($review->created_at);?></p>
       			</div>
       		</div>
       </div>
       <?php 
        endforeach;
        else:?>
       <p>No Review Yet!</p>
       <?php endif;?>
             

    </div>
       
       
 
  </div>
</div>

	</section>


	<!------------------------product section------------------------->
	<section class="home-product">
		
		<div class="container">
       		<div class="heading text-center mb-3 mt-5">

            	<h3 class="yeseva">Similar Products</h3>
        	</div>
			<div class="row w-100 m-0">
       <div class="col-lg-12 p-0">
        <div class="owl-carousel owl-theme" id="relatedproducts">
		<?php
				if(!empty($similarproducts)):
				foreach($similarproducts as $sproduct):?>
            <div class="item">
             <div class="product-content">
				<a href="<?= base_url('product/'.$sproduct->slug);?>" target="_blank">
                	<div class="product-image">
							<img src="<?= get_product_main_image($sproduct);?>" alt="">
						</div>
						<div class="product-details text-center">
							<!-- <div class="p-code"><?= $sproduct->sku;?></div> -->
							<div class="p-name yeseva"><?= word_limiter($sproduct->title,2);?></div>
							<div class="row m-0">
                                <div class="col-6 p-0"><div class="p-price"><?= select_value_by_id('currencies','id',$sproduct->currency_code,'hex');?> <?= $sproduct->price;?></div></div>
								<div class="col-6 p-0"><div class="product-btn">View Details <i class="zmdi zmdi-open-in-new"></i></div></div>
                            </div>
						</div>
					</div>
                 </a>
            </div>
			<?php endforeach;
			endif;?>	
          </div>
			</div>
            </div>
		</div>
	</section>

<!-- ////////////////////////////////Login Modal   -->
<?php //$this->load->view('products/details/_login_modal');?> 