<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title">Main</li> -->
                <?php if($this->auth_user->role=='admin'){?>
               
                <li>
                    <a href="<?= base_url('admin/dashboard/')?>" class="waves-effect <?= active_link('dashboard');?>">
                         <i class="ti-home"></i><!--<span class="badge rounded-pill bg-primary float-end">2</span> -->
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/orders/')?>" class="waves-effect <?= active_link('dashboard');?>">
                         <i class="ti-shopping-cart-full"></i><!--<span class="badge rounded-pill bg-primary float-end">2</span> -->
                        <span>Orders</span>
                    </a>
                </li>
                <?php
                    $segment='';
                    if($this->uri->segment(2)=='settings'){$segment='settings';}
                    if($this->uri->segment(2)=='email-settings'){$segment='email-settings';}
                    if($this->uri->segment(2)=='social-login-settings'){$segment='social-login-settings';}
                    if($this->uri->segment(2)=='custom-fields'){$segment='custom-fields';}
                    // if($this->uri->segment(2)=='category'){$segment='category';}
                    if($this->uri->segment(2)=='currencies'){$segment='currencies';}
                    if($this->uri->segment(2)=='shipping-charges'){$segment='shipping-charges';}
                ?>   
                <li class="<?= active_menu('pages');?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu('pages');?>">
                        <i class="ti-book"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= tab_active('add-new');?>"><a href="<?= base_url('admin/pages/add-new/')?>" class="<?= tab_active('add-new');?>">Add New</a></li>
                        <li class="<?= tab_active('');?>"><a href="<?= base_url('admin/pages')?>" class="<?= tab_active('');?>">All Pages</a></li>
                    </ul>
                </li>

                <li class="<?= active_menu($segment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                        <i class="ti-settings"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= tab_active('settings');?>"><a href="<?= base_url('admin/settings/')?>" class="<?= active_link('settings');?>">General Settings</a></li>
                        <!-- <li class="<?= tab_active('email-settings');?>"><a href="<?= base_url('admin/email-settings/')?>" class="<?= active_link('email-settings');?>">eMail Settings</a></li> -->
                        <!-- <li class="<?= tab_active('social-login-settings');?>"><a href="<?= base_url('admin/social-login-settings/')?>" class="<?= active_link('social-login-settings');?>">Social Login Settings</a></li> -->
                        <!-- <li class="<?= tab_active('custom-fields');?>"><a href="<?= base_url('admin/custom-fields/')?>" class="<?= active_link('custom-fields');?>">Custom Fields</a></li> -->
                        <!-- <li class="<?= tab_active('currencies');?>"><a href="<?= base_url('admin/currencies/')?>" class="<?= active_link('currencies');?>">Currencies</a></li> -->
                        <li class="<?= tab_active('shipping-charges');?>"><a href="<?= base_url('admin/shipping-charges/')?>" class="<?= active_link('shipping-charges');?>">Shipping Charges</a></li>
                    </ul>
                </li>

                <!-- <li class="<?= active_menu('media');?>">
                    <a href="<?= base_url('admin/media/')?>" class="waves-effect <?= active_link('media');?>">
                         <i class="ti-image"></i>
                        
                        <span>Media</span>
                    </a>
                </li> -->

                <li class="<?= active_menu('category');?>">
                    <a href="<?= base_url('admin/category/')?>" class="waves-effect <?= active_link('category');?>">
                        <i class="ti-support"></i>
                        <span>Categories</span> 
                    </a>
                </li>

                <li class="<?= active_menu('collection');?>">
                    <a href="<?= base_url('admin/collection/')?>" class="waves-effect <?= active_link('collection');?>">
                         <i class="mdi mdi-vector-combine"></i>
                        <span>Collection</span> 
                    </a>
                </li>

                <li class="<?= active_menu('products');?>">
                    <a href="<?= base_url('admin/products/')?>" class="waves-effect <?= active_link('products');?>">
                         <i class="fas fa-cubes"></i>
                        
                        <span>Manage Products</span>
                    </a>
                </li>
                <!-- <li class="<?= active_menu('stocks');?>">
                    <a href="<?= base_url('admin/stocks/')?>" class="waves-effect <?= active_link('stocks');?>">
                         <i class="fas fa-sort-amount-up-alt"></i>
                        <span>Manage Stocks</span>
                    </a>
                </li> -->
                <li class="<?= active_menu('offer');?>">
                    <a href="<?= base_url('admin/offer/')?>" class="waves-effect <?= active_link('offer');?>">
                         <i class="mdi mdi-av-timer"></i>
                        <span>Offer</span>
                    </a>
                </li>
                <?php 
                    $usegment='';
                    if($this->uri->segment(2)=='buyer'){$usegment='buyer';}
                    //if($this->uri->segment(2)=='dristributor'){$usegment='dristributor';}
                    //if($this->uri->segment(2)=='team-lead'){$usegment='team-lead';}
                ?>
                <li class="<?= active_menu($usegment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($usegment);?>">
                        <i class="ti-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= tab_active('buyer');?>"><a href="<?= base_url('admin/buyer/')?>" class="<?= active_link('buyer');?>">Buyer</a></li>
                    </ul>
                </li>

                <?php 
               $usegment='';
               if($this->uri->segment(2)=='sales-target'){$usegment='sales-target';}
               if($this->uri->segment(2)=='gift'){$usegment='gift';}
               if($this->uri->segment(2)=='sales-report'){$usegment='sales-report';}

               ?>
                <!-- <li class="<?= active_menu($usegment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($usegment);?>">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Sales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= tab_active('sales-target');?>"><a href="<?= base_url('admin/sales-target/')?>" class="<?= active_link('sales-target');?>">Target</a></li>                  
                        <li class="<?= tab_active('gift');?>"><a href="<?= base_url('admin/gift/')?>" class="<?= active_link('gift');?>">Gifts</a></li>                  
                        <li class="<?= tab_active('sales-report');?>"><a href="<?= base_url('admin/sales-report/')?>" class="<?= active_link('sales-report');?>">Sales Report</a></li>                  
                    </ul>
                </li> -->

                
                
                <!-- <li class="<?= active_menu('testimonial');?>">
                    <a href="<?= base_url('admin/coupons/')?>" class="has-arrow waves-effect <?= active_link('testimonial');?>">
                        <i class="fas fa-bullhorn"></i>
                        <span>Marketing / Coupons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= tab_active('coupons');?>"><a href="<?= base_url('admin/coupons/')?>" class="<?= active_link('coupons');?>">Coupons</a></li>                   
                    </ul>
                </li> -->
                
                <li class="<?= active_menu('about');?>">
                    <a href="<?= base_url('admin/about/')?>" class="waves-effect <?= active_link('about');?>">
                         <i class="fas fa-snowman"></i>
                        
                        <span>About Us</span>
                    </a>
                </li>

                <li class="<?= active_menu('contact');?>">
                    <a href="<?= base_url('admin/contact/')?>" class="waves-effect <?= active_link('contact');?>">
                         <i class="ti-email"></i>
                        <span>Contact Us</span>
                    </a>
                </li>

                <li class="<?= active_menu('slider');?>">
                    <a href="<?= base_url('admin/slider/')?>" class="waves-effect <?= active_link('slider');?>">
                        <i class="ti-image"></i>
                        <span>Slider</span>
                    </a>
                </li> 

                <li class="<?= active_menu('testimonial');?>">
                    <a href="<?= base_url('admin/testimonial/')?>" class="waves-effect <?= active_link('testimonial');?>">
                        <i class="fas fa-comment-alt"></i>
                        <span>Testimonial</span>
                    </a>
                </li>

                <!-- <li class="<?= active_menu('video_slider');?>">
                    <a href="<?= base_url('admin/video_slider/')?>" class="waves-effect <?= active_link('video_slider');?>">
                         <i class="fas fa-photo-video"></i>
                        <span>Video Slider</span>
                    </a>
                </li> -->
               
                <?php } ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->