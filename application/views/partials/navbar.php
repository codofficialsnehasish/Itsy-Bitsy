<?php 
    $categoriesMenu=$this->select->get_parent_categories();
    $menucon['where']['is_visible'] = 1;
    $menucon['where']['is_in_dropdown'] = 1;
    $menucon['where']['parent_id'] = 0;
    $menucon['tblName'] = 'categories';
    $menucategories = $this->select->getResult($menucon);

    $menucons['where']['is_visible'] = 1;
    $menucons['where']['is_home'] = 1;
    $menucons['where']['parent_id'] = 0;
    $menucons['tblName'] = 'categories';
    $menucate = $this->select->getResult($menucons);
?>

<?php $this->load->view('partials/search'); ?>

    <!-- Main Header -->
    <div class="header-section clearfix animated hdr-sticky">
        <!-- Desktop Header -->
        <div class="header-1">
            <!-- Top Header -->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                    <div class="col-10 col-sm-8 col-md-7 col-lg-3">
                        <p class="phone-no float-start"><i class="icon an an-phone me-1"></i><a href="tel:+91<?= $this->settings->contact_phone; ?>">+91 <?= $this->settings->contact_phone; ?></a></p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-7 d-none d-md-none d-lg-block">
                        <div class="text-center">
                            <marquee width="100%" direction="right">For prepaid shipping is only ₹ 50 and shipping is free Above ₹ 1299</marquee>
                        </div>
                    </div>
                    <!-- <div class="col-sm-4 col-md-4 col-lg-4 d-none d-md-none d-lg-block">
                        <div class="text-center">
                             <p class="top-header_middle-text">Free express shipping & import fees included</p>
                        </div>
                    </div> -->
                    <div class="col-2 col-sm-4 col-md-5 col-lg-2 text-end d-none d-sm-block d-md-block d-lg-block">
                        <div class="header-social">
                            <ul class="justify-content-end list--inline social-icons">
                            <?php if(!empty($this->settings->facebook_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->facebook_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="icon an an-facebook"></i> <span class="icon__fallback-text">Facebook</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->twitter_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->twitter_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->pinterest_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->pinterest_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pinterest"><i class="icon an an-pinterest-p"></i> <span class="icon__fallback-text">Pinterest</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->instagram_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->instagram_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->youtube_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->youtube_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="YouTube"><i class="icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->linkedin_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->linkedin_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin"><i class="icon an an-linkedin"></i> <span class="icon__fallback-text">Linkedin</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->whatsapp_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->whatsapp_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Whatsapp"><i class="icon an an-whatsapp"></i> <span class="icon__fallback-text">Whatsapp</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->vimeo_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->vimeo_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Vimeo"><i class="icon an an-vimeo"></i> <span class="icon__fallback-text">Vimeo</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->flickr_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->flickr_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Flickr"><i class="icon an an-flickr"></i> <span class="icon__fallback-text">Flickr</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->tumblr_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->tumblr_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tumblr"><i class="icon an an-tumblr"></i> <span class="icon__fallback-text">Tumblr</span></a></li> <?php } ?>
                              <?php if(!empty($this->settings->vk_url)){ ?> <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->vk_url ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="V Kontakte"><i class="icon an an-vk"></i> <span class="icon__fallback-text">V Kontakte</span></a></li> <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-block d-sm-none d-md-none d-lg-none">
                        <!-- Mobile User Links -->
                        <div class="user-menu-dropdown">
                            <span class="user-menu"><i class="an an-user-alt"></i></span>
                            <ul class="customer-links list-inline" style="display:none;">
                                <?php if($this->auth_check){ ?>
                                    <li class="item"><a href="<?= base_url('/my-dashboard'); ?>">Profile</a></li>
                                    <li class="item"><a href="<?= base_url('/orders'); ?>">Orders</a></li>
                                    <li class="item"><a href="<?= base_url('/logout'); ?>">Logout</a></li>
                                <?php }else{ ?>
                                    <li class="item"><a href="<?= base_url('/login'); ?>">Login</a></li>
                                    <li class="item"><a href="<?= base_url('/signup'); ?>">Register</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- End Mobile User Links -->
                    </div>
                    </div>
                </div>
            </div>
            <!-- End Top Header -->
            <!-- Header -->
            <div class="header-wrap d-flex">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-4 col-md-4 col-lg-8 d-block d-lg-none">
                                <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Menu" aria-label="Menu"><i class="icon an an-times"></i><i class="icon an an-bars"></i></button>
                                <!-- Mobile Search -->
                                <div class="site-header__search d-block d-lg-none mobile-search-icon">
                                    <button type="button" class="search-trigger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Search" aria-label="Search"><i class="icon an an-search"></i></button>
                                </div>
                                <!-- End Mobile Search -->
                            </div>
                            <!-- Desktop Logo -->
                            <div class="logo col-4 col-sm-4 col-md-4 col-lg-2 align-self-center">
                                <a href="<?= base_url(''); ?>"><img src="<?= get_logo(); ?>" alt="<?= $this->settings->application_name; ?>" title="<?= $this->settings->application_name; ?>"></a>
                            </div>
                            <!-- End Desktop Logo -->
                            <!-- Desktop Navigation -->
                            <div class="col-2 col-sm-3 col-md-3 col-lg-8 d-none d-lg-block">
                                <!-- Desktop Menu -->
                                <nav class="grid__item" id="AccessibleNav">
                                    <ul id="siteNav" class="d-flex flex-wrap site-nav medium left ms-0 hidearrow">
                                        <li class="lvl1 parent dropdown">
                                            <a href="<?= base_url(''); ?>">Home</a>
                                        </li>
                                        <li class="lvl1 parent dropdown">
                                            <a href="javascript:void(0)" class="site-nav">Products <i class="an an-angle-down"></i></a>
                                                <ul class="dropdown">
                                                <li>
                                                    <a href="<?= base_url('products/all-products'); ?>">All Products</a>
                                                </li>
                                                <?php if($menucategories){ foreach ($menucategories as $catagory) { ?>
                                                <li>
                                                    <?php $sub_catagory = $this->select->get_sub_categories_by_id($catagory->cat_id,"is_in_dropdown") ?>
                                                    <a href="<?= base_url('products/'.$catagory->cat_slug); ?>" class="site-nav"><?= $catagory->cat_name ?> <?php if($sub_catagory){ ?><i class="an an-angle-down"></i><?php }else{echo '';} ?></a>
                                                    <?php if($sub_catagory){ ?>
                                                    <ul class="dropdown">
                                                        <?php foreach($sub_catagory as $sub){ ?>
                                                        <li><a href="<?= base_url('products/'.$sub->cat_slug); ?>" class="site-nav"><?= $sub->cat_name; ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                                <?php } }?>
                                            </ul>
                                        </li>
                                        <?php if($menucate){ foreach ($menucate as $mcatagory) { ?>
                                        <li class="lvl1 parent dropdown">
                                            <a href="<?= base_url('products/'.$mcatagory->cat_slug); ?>"><?= $mcatagory->cat_name ?></a>
                                        </li>
                                        <?php } }?>
                                        <!-- <?php  //if($menucategories){ foreach($menucategories as $cata){ ?>
                                        <li class="lvl1 parent <?php //if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_home')){echo 'megamenu';}else{ echo 'dropdown';} ?>">
                                            <a href="<= base_url('products/'.$cata->cat_slug); ?>"><= $cata->cat_name ?></a>
                                            <?php //if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_home')){ ?>
                                            <div class="megamenu style2">
                                            <ul class="row mmWrapper">
                                                <?php 
                                                // $inc = 1;
                                                //     $res = $this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_home');
                                                //     foreach($res as $r){
                                                //         if($inc >= 6){break;}

                                                ?>
                                                <li class="lvl-1 col-md-2 col-lg-2">
                                                    <a href="<= base_url('products/'.$r->cat_slug); ?>" class="site-nav lvl-1 menu-title"><= $r->cat_name; ?></a>
                                                    <?php //if($this->select->get_sub_categories_by_id($r->cat_id,'is_home')){ ?>
                                                    <ul class="subLinks">
                                                        <?php 
                                                        // $res_sub = $this->select->get_sub_categories_by_id($r->cat_id,'is_home');
                                                        // foreach($res_sub as $sup){
                                                        ?>
                                                        <li class="lvl-2"><a href="<= base_url('products/'.$sup->cat_slug); ?>" class="site-nav"><= $sup->cat_name; ?></a></li>
                                                        <?php //} ?>
                                                    </ul>
                                                    <?php //} ?>
                                                </li>
                                                <?php //$inc++; } ?>
                                                <li class="lvl-1 col-md-2 col-lg-2 text-center">
                                                    <a href="#"><img src="<= get_image($cata->media_id) ?>" width="190" alt="image"/></a>
                                                </li>
                                            </ul>
                                            </div>
                                            <?php //} ?>
                                        </li>
                                        <?php //} }?> -->
                                        <!-- <li class="lvl1 parent megamenu">
                                            <a href="<?= base_url('products/all_products/'); ?>">Products</a>
                                        </li> -->
                                        <!-- <li class="lvl1 parent megamenu">
                                            <a href="#">Raw Materials</a>
                                        </li> -->
                                        <!-- <li class="lvl1 parent megamenu">
                                            <a href="<?= base_url('/products/offers')?>">Gifting</a>
                                        </li> -->
                                        <li class="lvl1 parent megamenu">
                                            <a href="<?= base_url('/about-us'); ?>">About Us</a>
                                        </li>  
                                        <li class="lvl1 parent megamenu">
                                            <a href="<?= base_url('/contact-us'); ?>">Contact Us</a>
                                        </li>                                      
                                    </ul>
                                </nav>
                                <!-- End Desktop Menu -->
                            </div>
                            <!-- End Desktop Navigation -->
                            <!-- Right Side -->
                            <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                <div class="right-action d-flex-align-center justify-content-end">
                                    <!-- Search -->
                                    <div class="item site-header__search d-none d-lg-block">
                                        <button type="button" class="search-trigger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Search" aria-label="Search"><i class="icon an an-search"></i></button>
                                    </div>
                                    <!-- End Search -->
                                    
                                    <!-- Wishlist -->
                                    <div class="item site-header-wishlist">
                                        <a href="<?= base_url('/products/favorite-products') ?>" class="wishlist-trigger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Wishlist">
                                            <i class="icon an an-heart"></i>
                                        </a>
                                    </div>
                                    <!-- End Wishlist -->
                                    <!-- Minicart -->
                                    <!-- <div class="item site-cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Cart">
                                        <a href="<?= base_url('/cart'); ?>" class="site-header__cart btn-minicart">
                                            <i class="icon an an-shopping-bag"></i><span id="CartCount" class="site-header__cart-count"></span>
                                        </a>  
                                    </div> -->
                                    <!-- End Minicart -->
                                    <!-- Minicart -->
                                    <div class="item site-cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart">
                                        <a href="#" class="site-header__cart btn-minicart" data-bs-toggle="modal" data-bs-target="#minicart-drawer" onclick="cart_popup_data()"><!-- fetchCart -->
                                            <i class="icon an an-shopping-bag"></i><?php  //if(cart_count() > 0){ ?><span id="CartCount" style="display:none;" class="site-header__cart-count .cartcount"></span> <?php //} ?>
                                        </a>  
                                    </div>
                                    <!-- End Minicart -->

                                    <!-- User Links -->
                                    <div class="item user-menu-dropdown d-none d-sm-block d-md-block d-lg-block">
                                        <span class="user-menu" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Account" aria-label="Account"><i class="icon an an-user-alt"></i></span>
                                        <ul class="customer-links list-inline" style="display:none;">
                                            <?php if($this->auth_check){ ?>
                                                <li class="item"><a href="<?= base_url('/my-dashboard'); ?>">Profile</a></li>
                                                <li class="item"><a href="<?= base_url('/orders'); ?>">Orders</a></li>
                                                <li class="item"><a href="<?= base_url('/logout'); ?>">Logout</a></li>
                                            <?php }else{ ?>
                                                <li class="item"><a href="<?= base_url('/login'); ?>">Login</a></li>
                                                <li class="item"><a href="<?= base_url('/signup'); ?>">Register</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <!-- End User Links -->
                                </div>
                            </div>
                            <!-- End Right Side -->
                        </div>
                    </div>
                </div>
            <!-- End Header -->
        </div>
        <!-- End Desktop Header -->
        </div>
        <!-- End Main Header -->
        <!-- Mobile Menu -->
        <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon an an-times-circle closemenu"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
              <li class="lvl1 parent megamenu">
                <a href="<?= base_url(''); ?>">Home</a>
            </li>
            <li class="lvl1 parent dropdown">
                <a href="javascript:void(0)" class="site-nav">Products <i class="an an-angle-down"></i></a>
                    <ul class="dropdown">
                    <li>
                        <a href="<?= base_url('products/all-products'); ?>">All Products</a>
                    </li>
                    <?php if($menucategories){ foreach ($menucategories as $catagory) { ?>
                    <li>
                        <?php $sub_catagory = $this->select->get_sub_categories_by_id($catagory->cat_id,"is_in_dropdown") ?>
                        <a href="<?= base_url('products/'.$catagory->cat_slug); ?>" class="site-nav"><?= $catagory->cat_name ?> <?php if($sub_catagory){ ?><i class="an an-angle-down"></i><?php }else{echo '';} ?></a>
                        <?php if($sub_catagory){ ?>
                        <ul class="dropdown">
                            <?php foreach($sub_catagory as $sub){ ?>
                            <li><a href="<?= base_url('products/'.$sub->cat_slug); ?>" class="site-nav"><?= $sub->cat_name; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php } }?>
                </ul>
            </li>
            <!-- <?php  //if($menucategories){ foreach($menucategories as $cata){ ?>
            <li>
                <a href="<?php //if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){echo 'javascript:void(0)';}else{ ?> <= base_url('products/'.$cata->cat_slug); ?> <?php //} ?>" class="site-nav"><= $cata->cat_name ?><?php// if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){echo '<i class="an an-plus"></i>';}else{ echo ''; } ?></a>
                <ul>
                    <?php //if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){ ?>
                    <li><a href='<= base_url('products/'.$cata->cat_slug); ?>'><= $cata->cat_name ?></a></li>
                    <?php //} ?>
                    <?php 
                        // if($this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu')){ 
                        //     $res = $this->select->get_sub_parent_categories_by_id($cata->cat_id,'is_menu');
                        //         foreach($res as $r){
                    ?>
                    <li><a href="<= base_url('products/'.$r->cat_slug); ?>" class="site-nav"><= $r->cat_name ?></a></li>
                    <?php //} } ?>
                </ul>
            </li>
            <?php //} }?> -->
            <li class="lvl1 parent megamenu">
                <a href="<?= base_url('/about-us'); ?>">About Us</a>
            </li>  
            <li class="lvl1 parent megamenu">
                <a href="<?= base_url('/contact-us'); ?>">Contact Us</a>
            </li>  
        </ul>
        </div>
        <!-- End Mobile Menu -->