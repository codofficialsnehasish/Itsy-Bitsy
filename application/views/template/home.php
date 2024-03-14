        <!-- Body Content -->
        <div id="page-content">
            <!-- Home Banner slider -->
            <?php if(!empty($slider)): ?>
            <div class="slideshow slideshow-wrapper pb-section">
               <div class="home-slideshow slideshow--large">
                    <?php foreach($slider as $slide): ?>
                    <div class="slide slide1 d-block">
                     <div class="slideimg blur-up lazyload">
                        <img class="blur-up lazyload" data-src="<?= get_image($slide->media_id); ?>" src="<?= get_image($slide->media_id); ?>" alt="Welcome to Diva" title="Welcome to Diva" />
                        <div class="slideshow__text-wrap slideshow__overlay">
                           <div class="slideshow__text-content mt-0 center">
                              <div class="container">
                                 <div class="wrap-caption center">
                                    <h2 class="h1 mega-title slideshow__title"><?= $slide->name; ?>e</h2>
                                    <h3><?= $slide->name_title; ?></h3>
                                    <span class="mega-subtitle slideshow__subtitle"><?= $slide->desc; ?></span>
                                    <a href="<?= base_url('/products/all_products'); ?>" class="btn btn--large">Shop Now</a>
                                 </div>
                                <?php //endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <!-- End Home Banner slider -->


            <!-- Category slider -->
            <?php if(!empty($allbrands)): ?>
            <div class="product-rows section">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                           <h2 class="h2">Shop By Collection</h2>
                        </div>
                        <!-- Category List -->
                        <div class="grid-products grid-products-hover-btn">
                            <div class="productSlider cat_hg">
                                <?php foreach($allbrands as $cata): ?>
                                <div class="col-12 item">
                                    <!-- Product Image -->
                                    <div class="product-image">
                                        <!-- product Image -->
                                        <a href="<?= base_url('products/'.$cata->slug); ?>">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyload" data-src="<?= get_image($cata->media_id);?>" src="<?= get_image($cata->media_id);?>" alt="image" title="<?= $cata->title ?>" />
                                            <!-- End Image -->
                                            <!-- Hover Image -->
                                            <img class="hover blur-up lazyload" data-src="<?= get_image($cata->media_id);?>" src="<?= get_image($cata->media_id);?>" alt="image" title="<?= $cata->title ?>" />
                                            <!-- End Hover Image -->
                                            <!-- Product Label -->
                                            <!-- <div class="product-labels rectangular"><span class="lbl pr-label1">new</span></div> -->
                                            <!-- End Product Label -->
                                        </a>
                                        <!-- End Product Image -->
                                        <!-- End Product Button -->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Product Details -->
                                    <div class="product-details text-center">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="<?= base_url('products/'.$cata->slug); ?>"><?= $cata->title ?></a>
                                        </div>
                                        <!-- End Product Name -->
                                    </div>
                                    <!-- End Product Details -->
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- End Category List -->
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Category slider -->

            <!-- New Arrivals -->
            <?php if(!empty($newarrivels)): ?>
            <div class="product-rows section">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                        <div class="section-header text-center new_arv">
                           <h2 class="h2">NEW ARRIVALS</h2>
                           <a href="<?= base_url('/products/new-arrivals-products') ?>" class="btn btn--large" tabindex="0">VIEW ALL PRODUCTS</a>
                        </div>
                        <div class="productList">
                            <!-- Grid Product -->
                            <div class="grid-products grid--view-items">
                                <div class="row">
                                    <?php foreach($newarrivels as $new): ?>
                                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 item">
                                        <!-- Product Image -->
                                        <div class="product-image">
                                            <!-- Product Image -->
                                            <div class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="add to wishlist">
                                                <a class="open-wishlist-popup wishlist add-to-wishlist <?= is_favorite($this->auth_check ?$this->auth_user->id : 0,$new->id) ? 'wiss_activ' : ''; ?>" tabindex="0" id="wishidlist<?= $new->id ?>" onclick="add_wishlist(<?= $new->id ?>,1)"><i class="icon an an-heart"></i></a>
                                            </div>
                                            <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$new->id.'"  novalidate '); ?>
                                            <input type="hidden" name="product_id" id="product_id" value="<?= $new->id; ?>">
                                            <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                            <?php if($new->stock > 0){ ?>
                                            <a id="<?= $new->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> ADD TO CART</a>
                                            <?php }else{ ?>
                                            <a class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> OUT OF STOCK</a>
                                            <?php } ?>
                                            <?= form_close(); ?>
                                            <a href="<?= base_url('product/'.$new->slug);?>">
                                                <!-- Image -->
                                                <img class="primary blur-up lazyloaded" data-src="<?= get_product_main_image($new); ?>" src="<?= get_product_main_image($new); ?>" alt="image" title="product">
                                                <!-- End Image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyloaded" data-src="<?= get_product_image_by_hovar($new); ?>" src="<?= get_product_image_by_hovar($new); ?>" alt="image" title="product">
                                                <!-- End Hover Image -->
                                                <!-- Product Label -->
                                                <div class="product-labels rectangular"><span class="lbl pr-label1">New</span></div>
                                                <!-- <div class="product-labels rectangular"><span class="lbl on-sale">New</span></div> -->
                                                <!-- End Product Label -->

                                            </a>
                                            <!-- End Product Image -->
                                        </div>
                                        <!-- End Product Image -->
                                        <!-- Product Details -->
                                        <div class="product-details text-left">
                                            <!-- Product Name -->
                                            <div class="product-name">
                                                <a href="<?= base_url('product/'.$new->slug);?>"><?= $new->title;?></a>
                                            </div>
                                            <!-- End Product Name -->
                                            <!-- Product Price -->
                                            <div class="product-price">
                                                <?php if($new->no_discount!=1){?>
                                                    <span class="old-price"><?= select_value_by_id('currencies','id',$new->currency_code,'hex');?> <?= $new->price;?></span>
                                                <?php }?>
                                                <span class="price"><?= select_value_by_id('currencies','id',$new->currency_code,'hex');?> <?= $new->discounted_price;?></span>
                                            </div>
                                            <!-- End Product Price -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- End Grid Product -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
           
            <!-- Offer -->
            <?php if(!empty($offeralldata)): 
            foreach($offeralldata as $data):?>
            <div class="section hero-background ad_rt">
                <div class="container">
                    <div class="row">
                        <a href="<?= !empty($data->category_id) ? base_url('products/'.get_catagory_slug_by_cata_id($data->category_id)) : base_url('products/all-products'); ?>"><img src="<?= get_image($data->media_id);?>" alt="image"></a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
            <!-- End of Offer -->


            <!-- Best Sellers -->
            <?php if(!empty($topsellingproducts)): ?>
            <div class="product-rows section">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                         <div class="section-header text-center new_arv">
                           <h2 class="h2">Best Sellers</h2>
                           <a href="<?= base_url('/products/best-selling-products') ?>" class="btn btn--large" tabindex="0">VIEW ALL PRODUCTS</a>
                        </div>
                        <!-- Product List -->
                        <div class="grid-products grid-products-hover-btn">
                            <div class="productSlider cat_hg">
                                <?php foreach($topsellingproducts as $topproducts): ?>
                                <div class="col-12 item">
                                    <!-- Product Image -->
                                    <div class="product-image">
                                        <!-- Product Image -->
                                        <div class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="add to wishlist">
                                            <a class="open-wishlist-popup wishlist add-to-wishlist <?= is_favorite($this->auth_check ?$this->auth_user->id : 0,$new->id) ? 'wiss_activ' : ''; ?>" tabindex="0" id="wishidbest<?= $topproducts->id ?>" onclick="add_wishlist(<?= $topproducts->id ?>,1)"><i class="icon an an-heart"></i></a>
                                        </div>
                                        <!-- <a href="#" class="btn cartIcon btn-addto-cart open-addtocart-popup" tabindex="0"><i class="icon an an-shopping-bag"></i> ADD TO CART</a> -->
                                        <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$topproducts->id.'"  novalidate '); ?>
                                        <input type="hidden" name="product_id" id="product_id" value="<?= $topproducts->id; ?>">
                                        <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                        <?php if($topproducts->stock > 0){ ?>
                                            <a id="<?= $topproducts->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> ADD TO CART</a>
                                        <?php }else{ ?>
                                        <a class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> OUT OF STOCK</a>
                                        <?php } ?>
                                        <?= form_close(); ?>
                                        <a href="<?= base_url('product/'.$topproducts->slug);?>">
                                            <!-- Image -->
                                            <img class="primary blur-up lazyloaded" data-src="<?= get_product_main_image($topproducts); ?>" src="<?= get_product_main_image($topproducts); ?>" alt="image" title="<?= $topproducts->title; ?>">
                                            <!-- End Image -->
                                            <!-- Hover image -->
                                            <img class="hover blur-up lazyloaded" data-src="<?= get_product_image_by_hovar($topproducts); ?>" src="<?= get_product_image_by_hovar($topproducts); ?>" alt="image" title="<?= $topproducts->title; ?>">
                                            <!-- End Hover Image -->
                                        </a>
                                        <!-- End Product Image -->
                                        </div>
                                        <!-- Product Details -->
                                        <div class="product-details text-center">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="<?= base_url('product/'.$topproducts->slug);?>"><?= $topproducts->title; ?></a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <?php if($topproducts->no_discount!=1){?>
                                                <span class="old-price"><?= select_value_by_id('currencies','id',$topproducts->currency_code,'hex');?> <?= $topproducts->price;?></span>
                                            <?php }?>
                                            <span class="price"><?= select_value_by_id('currencies','id',$topproducts->currency_code,'hex');?> <?= $topproducts->discounted_price;?></span>
                                        </div>
                                        <!-- End Product Price -->  
                                        </div>
                                    <!-- End Product Image -->
                                    
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- End Product List -->
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Best Sellers -->


            <!-- Instagram -->
            <div class="section home-instagram no-pb-section">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                           <h2 class="h2">Our Instagram is amazing </h2>
                           <h1>If you don't follow us already, please do so</h1>
                           <a href="https://www.instagram.com/itsybitsykolkata_jewellery/" target="_blank" style="text-decoration:none"><h4>@itsybitsykolkata_jewellery</h4></a>
                        </div>
                     </div>
                  </div>
                  <?php if(!empty($instagramData)){ ?>
                  <!-- Instagram Slider -->
                  <div class="instagram-section instagram-slider">
                  <?php
                        $instagramData = instagram('instagram',10);
                        foreach($instagramData as $insta){
                            $username = isset($insta->username) ? $insta->username : "";
                            $caption = isset($insta->caption) ? $insta->caption : "";
                            $media_url = isset($insta->media_url) ? $insta->media_url : "";
                            $permalink = isset($insta->permalink) ? $insta->permalink : "";
                            $media_type = isset($insta->media_type) ? $insta->media_type : "";
                    ?>
                     <div class="instagram-item">
                        <a href="<?= $permalink; ?>">
                        <img class="blur-up lazyload" src="<?= $media_url ?>" data-src="<?= $media_url ?>" alt="image" title="" />
                        <span class="inst-icon"><i class="icon an an-instagram"></i></span>
                        </a>
                     </div>
                    <?php }?>
                  </div>
                  <!-- End Instagram Slider -->
                  <?php }?>
                  <div class="followus text-center mt-3 d-none">
                     <a href="#" target="_blank" class="btn">View Gallery</a>
                  </div>
               </div>
            </div>
            <!-- End Instagram -->


            <!-- Testimonial -->
            <?php if(!empty($testimonial)): ?>
            <div class="section home-instagram no-pb-section customer_review">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                           <h2 class="h2">What Our Customers Say</h2>
                        </div>
                     </div>
                  </div>
                  <!-- Instagram Slider -->
                  <div class="instagram-section instagram-slider2">
                    <?php foreach($testimonial as $t): ?>
                     <div class="instagram-item">
                        <img src="<?= get_image($t->media_id);?>" alt="image" title="" />
                        <p><?= strip_tags($t->description) ?></p>
                        <h1><?= $t->name ?></h1>
                     </div>
                     <?php endforeach; ?>
                  </div>
                  <!-- End Instagram Slider -->
                  <div class="followus text-center mt-3 d-none">
                     <a href="#" target="_blank" class="btn">View Gallery</a>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <!-- End Testimonial -->   

        </div>
