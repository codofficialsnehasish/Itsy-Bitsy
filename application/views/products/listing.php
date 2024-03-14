        <!-- Body Content -->
        <div id="page-content">
            <!-- Collection Banner -->
            <div class="collection-header">
               <div class="collection-hero">
                  <div class="collection-hero__image blur-up lazyload" style="background-image:url('<?= base_url('assets/site/images/parallax-banners/home4-parallax-banner.jpg'); ?>');"></div>
                  <div class="collection-hero__title-wrapper">
                     <h1 class="collection-hero__title page-width">Shop </h1>
                  </div>
               </div>
            </div>
            <!-- End Collection Banner -->
            <div class="container">
               <div class="row">
                  <!-- Sidebar -->
                  <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                     <div class="closeFilter d-block d-md-block d-lg-none"><i class="icon an an-times"></i></div>
                     <div class="sidebar_tags">
                        <!-- Categories -->
                        <div class="sidebar_widget filterBox categories filter-widget">
                           <div class="widget-title">
                              <h2>Categories</h2>
                           </div>
                           <div class="widget-content">
                            <?php if(!empty($parentcategories)): ?>
                                <ul class="sidebar_categories">
                                <?php foreach($parentcategories as $cata): ?>
                                 <!-- <li class="level1 sub-level"> -->
                                 <li class="level1 <?php if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){echo 'sub-level';}else{ echo '';} ?>">
                                    <!-- <a href="#;" class="site-nav">BAGS</a> -->
                                    <a href="<?php if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){echo 'javascript:void(0)';}else{ ?> <?= base_url('products/'.$cata->cat_slug); ?> <?php } ?>" class="site-nav"><?= $cata->cat_name ?></a>
                                    <ul class="sublinks">
                                        <?php if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){ ?>
                                            <li><a href='<?= base_url('products/'.$cata->cat_slug); ?>'><?= $cata->cat_name ?></a></li>
                                        <?php } ?>
                                        <?php 
                                            if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){ 
                                                $res = $this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu');
                                                    foreach($res as $r){
                                        ?>
                                        <li class="level2">
                                            <a href="<?php if($this->select->get_sub_categories_by_id($r->cat_id,'is_menu')){echo 'javascript:void(0)';}else{ ?> <?= base_url('products/'.$r->cat_slug); ?> <?php } ?>" class="site-nav"><?= $r->cat_name ?></a>
                                        </li>
                                       <?php } } ?>
                                    </ul>
                                 </li>
                                 <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                           </div>
                        </div>
                        <!-- End Categories -->

                        <!-- Price Filter -->
                        
                        <!-- End Price Filter -->

                        <!-- Popular Products -->
                        
                        <!-- End Popular Products -->
                     </div>
                  </div>
                  <!-- End Sidebar -->
                  <!-- Main Content -->
                  <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                     <div class="productList">
                        <!-- Toolbar -->
                        <div class="toolbar">
                           <div class="filters-toolbar-wrapper">
                              <div class="row">
                                 <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-Start align-items-center">
                                    <button type="button" class="btn-filter d-block d-md-block d-lg-none icon an an-sliders-h" data-bs-toggle="tooltip" data-bs-placement="top" title="Filters"></button>
                                    <a href="<?= base_url('products/all-products'); ?>" class="change-view change-view--active" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid View">
                                    <i class="icon an an-table"></i>
                                    </a>
                                    <!-- <a href="shop-listview.html" class="change-view" data-bs-toggle="tooltip" data-bs-placement="top" title="List View">
                                    <i class="icon an an-th-list"></i>
                                    </a> -->
                                 </div>
                                 <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Showing: <span id="shownum"></span></span>
                                 </div>
                                 <div class="col-4 col-md-4 col-lg-4 d-flex justify-content-end align-items-center text-end">
                                    <div class="filters-toolbar__item">
                                       <?= form_open('products/'. $this->uri->segment(2).'/', 'class="needs-validation"  novalidate '); ?>
                                          <label for="SortBy" class="hidden">Sort</label>
                                          <select id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort" name="sort_by" onchange="this.form.submit()">
                                             <option value="title-ascending" selected="selected">Sort</option>
                                             <!-- <option <?php if($sort_by != '' && $sort_by== "rating_high_to_low") echo "selected"; ?> >Best Selling</option> -->
                                             <!-- <option <?php if($sort_by != '' && $sort_by== "a_to_z") echo "selected"; ?> value="a_to_z">Alphabetically, A-Z</option> -->
                                             <!-- <option <?php if($sort_by != '' && $sort_by== "z_to_a") echo "selected"; ?> value="z_to_a">Alphabetically, Z-A</option> -->
                                             <option <?php if($sort_by != '' && $sort_by== "cost_low_to_high") echo "selected"; ?> value="cost_low_to_high" >Price, low to high</option>
                                             <option <?php if($sort_by != '' && $sort_by== "cost_high_to_low") echo "selected"; ?> value="cost_high_to_low" >Price, high to low</option>
                                             <!-- <option <?php if($sort_by != '' && $sort_by== "rating_high_to_low") echo "selected"; ?> >Date, new to old</option> -->
                                             <!-- <option <?php if($sort_by != '' && $sort_by== "rating_high_to_low") echo "selected"; ?> >Date, old to new</option> -->
                                          </select>
                                          <?= form_close(); ?>
                                       <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End Toolbar -->
                        <!-- Grid Product -->
                        <div class="grid-products grid--view-items product-three-load-more">
                           <div class="row">
                                <?php 
                                    if(!empty($allproducts)): 
                                    foreach($allproducts as $product):
                                ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 item checknum">
                                    <!-- Product Image -->
                                    <div class="product-image">
                                        <div class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="add to wishlist">
                                            <a class="open-wishlist-popup wishlist add-to-wishlist <?= is_favorite($this->auth_check ?$this->auth_user->id : 0,$product->id) ? 'wiss_activ' : ''; ?>" tabindex="0" id="wishidlist<?= $product->id ?>" onclick="add_wishlist(<?= $product->id ?>,1)"><i class="icon an an-heart"></i></a>
                                        </div>
                                        <!-- Product Image -->
                                        <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$product->id.'"  novalidate '); ?>
                                        <input type="hidden" name="product_id" id="product_id" value="<?= $product->id; ?>">
                                        <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                        <?php if($product->stock > 0){ ?>
                                          <a id="<?= $product->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> ADD TO CART</a>
                                        <?php }else{ ?>
                                        <a class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i> OUT OF STOCK</a>
                                        <?php } ?>
                                        <?= form_close(); ?>
                                        <a href="<?= base_url('product/'.$product->slug);?>">
                                        <!-- Image -->
                                        <img class="primary blur-up lazyload" data-src="<?= get_product_main_image($product);?>" src="<?= get_product_main_image($product);?>" alt="image" title="<?= $product->title;?>" />
                                        <!-- End Image -->
                                        <!-- Hover Image -->
                                        <img class="hover blur-up lazyload" data-src="<?= get_product_image_by_hovar($product);?>" src="<?= get_product_image_by_hovar($product);?>" alt="image" title="<?= $product->title;?>" />
                                        <!-- End Hover Image -->
                                        <!-- Product Label -->
                                        <?php if(is_bestseller($product->id)): ?><div class="product-labels rectangular"><span class="lbl on-sale">Bestseller</span></div><?php endif; ?>
                                        <!-- End Product Label -->
                                        </a>
                                        <!-- End Product Image -->
                                    </div>
                                    <!-- End Product Image -->
                                    <!-- Product Details -->
                                    <div class="product-details text-center">
                                        <!-- Product Name -->
                                        <div class="product-name">
                                            <a href="<?= base_url('product/'.$product->slug);?>"><?= $product->title;?></a>
                                        </div>
                                        <!-- End Product Name -->
                                        <!-- Product Price -->
                                        <div class="product-price">
                                            <?php if($product->no_discount!=1){?>
                                            <span class="old-price"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $product->price;?></span>
                                            <?php }?>
                                            <span class="price"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $product->discounted_price;?></span>
                                        </div>
                                        <!-- End Product Price -->
                                    </div>
                                    <!-- End Product Details -->
                                </div>
                                <?php 
                                    endforeach;
                                    else:
                                        echo '<p>No products Found!</p>';
                                    endif;
                                ?>
                           </div>
                        </div>
                        <!-- End Grid Product -->
                     </div>
                     <!-- Infinit Pagination -->
                     <div class="infinitpaginOuter">
                        <div class="infinitpagin-three">  
                           <a href="#" class="btn loadMoreThree">Load More</a>
                        </div>
                     </div>
                     <!-- End Infinit Pagination -->
                  </div>
                  <!-- End Main Content -->
               </div>
            </div>
         </div>
         <!-- End Body Content -->
         <!-- End Body Content -->


         <script>
            document.addEventListener("DOMContentLoaded", () => {
                var n = $('.checknum').length;
                $('#shownum').html(n);
                if(n <= 15){
                   $(".loadMoreThree").html('<div class="btn loadMoreThree">no more products</div>');
                }
            });
         </script>