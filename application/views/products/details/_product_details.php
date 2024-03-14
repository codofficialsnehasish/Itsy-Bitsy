


<div id="page-content">
   <!-- Bredcrumbs -->
   <div class="bredcrumbWrap bredcrumb-style2">
      <div class="container breadcrumbs">
         <a href="<?= base_url('') ?>" title="Back to the home page">Home</a><span aria-hidden="true"><!--|</span><span class="title-bold"><= $product->title;?></span>-->
      </div>
   </div>
   <!-- End Bredcrumbs -->
   <div class="container">
      <!-- Main Content -->
      <div id="ProductSection-product-template" class="product-template__container prstyle2">
         <!-- #ProductSection product template -->
         <div class="product-single product-single-1">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="product-details-img product-single__photos bottom">
                     <?php $this->load->view('products/details/_preview');?>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <!-- Product Info -->
                  <div class="product-single__meta">
                     <h1 class="product-single__title"><?= $product->title;?></h1>
                     <!-- Product Reviews -->
                     <div class="prInfoRow d-flex flex-wrap">
                           <div class="product-review">
                              <a class="reviewLink d-flex flex-wrap align-items-center" href="#tab2">
                              <?php
                                 $averageRating = get_avg_rationg_count($product->id);
                                 $fullStars = floor($averageRating);
                                 $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
                                 for ($i = 0; $i < $fullStars; $i++) { // Print full stars ?>
                                    <img src="<?= base_url("assets/site/images/icon/full-star.png");?>" width="20px" alt="">
                                 <?php }
                                 if ($hasHalfStar) { // Print half star ?>
                                    <img src="<?= base_url("assets/site/images/icon/half-star.png");?>" width="20px" alt="">
                                 <?php }
                                 for ($i = 0; $i < (5 - ceil($averageRating)); $i++) { // Print empty stars if necessary ?>
                                    <img src="<?= base_url("assets/site/images/icon/empty-star.png");?>" width="20px" alt="">
                                 <?php }
                              ?>
                                 <!-- <i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i> -->
                                 <span class="spr-badge-caption"><?= $product->rating;?> reviews</span>
                              </a>
                           </div>
                        </div>
                        <!-- End Product Reviews -->
                     <!-- Product Price -->
                     <div class="product-single__price product-single__price-product-template">
                        <!-- <span class="visually-hidden">Regular price</span> -->
                        <!-- <s id="ComparePrice-product-template"><span class="money">$900.00</span></s>
                        <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                        <span id="ProductPrice-product-template"><span class="money">$788.00</span></span></span> -->
                        <?php $this->load->view("products/details/_price", ['product' => $product, 'price' => $product->price, 'discount_rate' => $product->discount_rate]); ?>
                     </div>
                     <!-- End Product Price -->
                     <!-- Product Description -->
                     <div class="product-single__description rte">
                        <p class="mb-2"><?= $product->short_desc;?></p>
                        <!-- <ul class="checkmark">
                           <li>Wash Care: Hand Wash Cold</li>
                           <li>Size And Fit: The specifications for the model are: Height 5 feet 8 inches, bust 34 inches, waist 28 inches. The model is wearing size S.</li>
                        </ul> -->
                     </div>
                     <!-- End Product Description -->
                     <!-- Form -->
                     <!-- <form method="post" action="/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template product-form-border hidedropdown" enctype="multipart/form-data"> -->
                     <?= form_open('/cart-controller/add-to-cart', 'class="needs-validation product-form product-form-product-template product-form-border hidedropdown"  novalidate '); ?>
                        <!-- Product Action -->
                        <input type="hidden" name="product_id" id="product_id" value="<?= $product->id;?>">

                        

                        <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                       <div class="qtyField">
                                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus" aria-hidden="true"></i></a>
                                          <input type="number" name="product_quantity" value="1" class="product-form__input qty" />
                                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus" aria-hidden="true"></i></a>
                                       </div>
                                    </div>
                              </div> 
                            <div class="product-form__item--submit">
                                <?php //$url = urlencode(base_url('product/'.$product->slug)); ?>
                                <!-- <a type="button" href="https://wa.me/+91<?= $this->settings->contact_phone; ?>?text=<?= $url; ?>" name="add" class="btn product-form__cart-submit"><span>Buy With Whatsapp</span></a> -->
                                <?php if($product->stock > 0){ ?>
                                 <button type="submit" name="button_type" value="addcart" class="add-to-cart btn btn-default payment-button__button payment-button__button--unbranded"><i class="icon an an-shopping-bag"></i> Add To Cart</button>
                                 <?php }else{ ?>
                                    <button type="button" class="add-to-cart btn btn-default payment-button__button payment-button__button--unbranded"><i class="icon an an-shopping-bag"></i> Out of Stock</button>
                                 <?php } ?>
                            </div>
                            <?php $buttton = get_product_form_data($product)->button;
                            if (!empty($buttton)):?>
                                <?php echo $buttton; ?> 
                            <?php endif; ?>
                        </div>
                        <!-- End Product Action -->
                     <!-- </form> -->
                     <?= form_close(); ?>
                     <!-- End Form -->
                     <!-- Product Intro -->
                     <div class="product-info">
                        <!-- <p class="product-stock">Availability: <span class="instock">In Stock</span><span class="outstock hide">Unavailable</span></p>
                        <p class="product-type">Product Type: <span>unique</span></p>
                        <p class="product-type">Vendor: <span>Sibel Saral</span></p>
                        <p class="product-sku">SKU: <span class="variant-sku">3435DT-1</span></p> -->
                     </div>
                     <!-- End Product Intro -->
                  </div>
                  <!-- End Product Info -->
               </div>
               <!-- End Product single -->
               <!-- Product Tabs -->
               <div class="tabs-listing tab-details mt-0 mt-md-4">
                  <!-- Tabs -->
                  <ul class="product-tabs d-none d-md-block">
                     <li class="active" rel="tab1"><a class="tablink">Product Details</a></li>
                     <li rel="tab4"><a class="tablink">Shipping &amp; Returns</a></li>
                     <li rel="tab2"><a class="tablink">Product Reviews</a></li>
                  </ul>
                  <!-- End Tabs -->
                  <!-- Tabs Container -->
                  <div class="tab-container pb-0 mb-0">
                     <!-- Tabs Content One -->
                     <h3 class="acor-ttl active d-block d-md-none" rel="tab1">Product Details</h3>
                     <div id="tab1" class="tab-content py-3 py-md-0" style="display:block;">
                        <div class="product-description rte">
                           <p><?= $product->description;?></p>
                        </div>
                     </div>
                     <!-- End Tabs Content One -->
                     <!-- Tabs Content Four -->
                     <h3 class="acor-ttl d-block d-md-none" rel="tab4">Shipping &amp; Returns</h3>
                     <div id="tab4" class="tab-content py-3 py-md-0">
                        <h4>Returns Policy</h4>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                        <h4>Shipping</h4>
                        <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                     </div>
                     <!-- End Tabs Content Four -->

                     <h3 class="acor-ttl d-block d-md-none" rel="tab2">Product Reviews</h3>
                     <div id="tab2" class="tab-content py-3 py-md-0">
                        <?php $this->load->view('products/details/_reviews');?>
                     </div>
                  </div>
                  <!-- End Tabs Container -->
               </div>
               <!-- End Product Tabs -->
               <!-- Related Product Slider -->
               <?php if(!empty($similarproducts)): ?>
               <div class="related-product grid-products">
                        <header class="section-header">
                           <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                           <!-- <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p> -->
                        </header>
                        <div class="productPageSlider">
                        <?php
                           foreach($similarproducts as $sproduct):?>
                           <div class="col-12 item">
                              <!-- Product Image -->
                              <div class="product-image">
                                 <div class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="add to wishlist">
                                    <a class="open-wishlist-popup wishlist add-to-wishlist <?= is_favorite($this->auth_check ?$this->auth_user->id : 0,$sproduct->id) ? 'wiss_activ' : ''; ?>" tabindex="0" id="wishidlist<?= $sproduct->id ?>" onclick="add_wishlist(<?= $sproduct->id ?>,1)"><i class="icon an an-heart"></i></a>
                                 </div>
                                 <!-- Product Image -->
                                 <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$sproduct->id.'"  novalidate '); ?>
                                 <input type="hidden" name="product_id" id="product_id" value="<?= $sproduct->id; ?>">
                                 <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                 <?php if($sproduct->stock > 0){ ?>
                                    <a id="<?= $sproduct->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> ADD TO CART</a>
                                 <?php }else{ ?>
                                 <a class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> OUT OF STOCK</a>
                                 <?php } ?>
                                 <?= form_close(); ?>
                                 <a href="<?= base_url('product/'.$sproduct->slug);?>">
                                    <!-- Image -->
                                    <img class="primary blur-up lazyload" data-src="<?= get_product_main_image($sproduct);?>" src="<?= get_product_main_image($sproduct);?>" alt="image" title="product" />
                                    <!-- End Image -->
                                    <!-- Hover Image -->
                                    <img class="hover blur-up lazyload" data-src="<?= get_product_image_by_hovar($sproduct);?>" src="<?= get_product_image_by_hovar($sproduct);?>" alt="image" title="product" />
                                 </a>
                                 <!-- End Product Image -->
                              </div>
                              <!-- End Product Image -->
                              <!-- Product Details -->
                              <div class="product-details text-center">
                                 <!-- Product Name -->
                                 <div class="product-name">
                                    <a href="<?= base_url('product/'.$sproduct->slug);?>"><?= $sproduct->title;?></a>
                                 </div>
                                 <!-- End Product Name -->
                                 <!-- Product Price -->
                                 <!-- <div class="product-price">
                                    <span class="old-price">$500.00</span>
                                    <span class="price">$600.00</span>
                                 </div> -->
                                 <div class="product-price">
                                    <?php if($sproduct->no_discount!=1){?>
                                       <span class="old-price"><?= select_value_by_id('currencies','id',$sproduct->currency_code,'hex');?> <?= $sproduct->price;?></span>
                                    <?php }?>
                                    <span class="price"><?= select_value_by_id('currencies','id',$sproduct->currency_code,'hex');?> <?= $sproduct->discounted_price;?></span>
                                 </div>
                                 <!-- End Product Price -->
                              </div>
                              <!-- End Product Details -->
                           </div>
                           <?php 
                           endforeach;
                           ?>	
                        </div>
                     </div>
                     <!-- End Related Product Slider -->
                  </div>
                  <!-- #ProductSection product template -->
               </div>
               <?php endif; ?>	
               <!-- End Main Content -->
            </div>
         </div>
         <!-- End Body Content -->
      </div>
   </div>
