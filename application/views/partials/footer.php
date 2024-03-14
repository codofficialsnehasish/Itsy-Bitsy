
        <!-- End Body Content -->
         <!-- Footer -->
         <footer id="footer">
            <div class="site-footer">
               <div class="footer-top">
                  <div class="container">
                     <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 contact-box">
                           <img src="<?= get_logo(); ?>" alt="<?= $this->settings->application_name?>" title="<?= $this->settings->application_name?>" width="130">
                           <p><?= !empty(get_main_about()) ? strip_tags(get_main_about()[0]->about_content) : ''; ?></p>
                           <p><b><?= $this->settings->copyright ?></b></p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 footer-links">
                           <h4 class="h4">QUICK LINKS</h4>
                           <ul>
                              <li><a href="<?= base_url('')?>">Home</a></li>
                              <!-- <li><a href="#">Store</a></li>
                              <li><a href="#">Raw Materials</a></li> -->
                              <a href="<?= base_url('products/all-products'); ?>">All Products</a>
                              <?php if(!empty($this->settings->whatsapp_url)){ ?><li><a href="<?= $this->settings->whatsapp_url; ?> " target="_blank">Whatsapp</a></li> <?php } ?>
                              <?php if(!empty($this->settings->instagram_url)){ ?><li><a href="<?= $this->settings->instagram_url; ?>" target="_blank">Inatagram</a></li> <?php } ?>
                           </ul>
                        </div>
                        <?php $parentcategories=$this->select->get_parent_categories(); ?>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 footer-links">
                           <h4 class="h4">Categorys</h4>
                           <?php if(!empty($parentcategories)): ?>
                           <ul>
                              <?php foreach($parentcategories as $cata): $inc = 1;if($inc >= 8){break;}?>
                              <li><a href="<?= base_url('products/'.$cata->cat_slug); ?>"><?= $cata->cat_name ?></a></li>
                              <?php endforeach; ?>
                           </ul>
                           <?php endif; ?>
                        </div>

                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                           <h4 class="h4">About The Shop</h4>
                           <p><b>Address</b></p>
                           <p><?= $this->settings->contact_address; ?></p>
                           <p><b>Email : </b><?= $this->settings->contact_email; ?><?php if(!empty($this->settings->contact_email_opt)){ echo "/".$this->settings->contact_email_opt;}else{ echo""; }; ?></p>
                           <p><b>Contact : </b><?= $this->settings->contact_phone; ?></p>
                           <ul class="list--inline site-footer__social-icons social-icons">
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

                        <!-- <div class="col-12 col-sm-12 col-md-3 col-lg-3 newsletter">
                           <div class="display-table">
                              <div class="display-table-cell footer-newsletter">
                                 <form action="#" method="post">
                                    <label class="h4">Newsletter</label>
                                    <p>sign up for newsletter to know our latest news and offers.</p>
                                    <div class="input-group">
                                       <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" id="news_email" placeholder="Email address" required="">
                                       <span class="input-group__btn">
                                          <button type="button" class="btn newsletter__submit newsEmail" id="Subscribe"><span class="newsletter__submit-text--large">SUBSCRIBE</span></button>
                                       </span>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- End Footer -->
         <!-- Scoll Top -->
         <div id="site-scroll"><i class="icon an an-angle-up"></i></div>
         <!-- End Scoll Top -->

         <!-- Minicart Drawer -->
         <div class="minicart-right-drawer right modal fade" id="minicart-drawer" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="minicart-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="an an-times" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
                            <?php 
                                // $crtitm = $this->cart_model->get_cart_by_buyer();
                                // if(!empty($crtitm)):
                                //     $total =0;
                                //     $totalshippinhg= 0;			
							?>
                            <h4 class="modal-title" id="myModalLabel2">Shopping Cart items</h4>
                        </div>
                        <div class="minicart-body">
                            <div id="drawer-minicart" class="block block-cart">
                                <ul class="mini-products-list" id="listproduicttoggle"></ul>
                            </div>
                            <?php //else: ?>
                            <div class="empty-cart">
                                <p>You have no items in your shopping cart.</p>
                            </div>
                            <?php //endif; ?>
                        </div>
                        <div class="minicart-footer minicart-action">
                            <div class="total-in">
                                <p class="label"><b>Subtotal:</b><span class="item product-price"><span class="money" id="subtol"></span></span></p>
                                <p class="label"><b>Shipping:</b><span class="item product-price"><span class="shipping" id="shippingcost">0.00</span></span></p>
                                <p class="label"><b>Tax:</b><span class="item product-price"><span class="tax" id="taxable">0.00</span></span></p>
                                <p class="label"><b>Total:</b><span class="item product-price"><span class="totals" id="tot"></span></span></p>
                            </div>
                            <div class="buttonSet d-flex flex-row align-items-center text-center">
                                <a href="<?= base_url('/cart'); ?>" class="btn btn-secondary w-50 me-3">View Cart</a>
                                <a href="#" class="btn btn-secondary goCheckout w-50">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!-- Including Javascript -->

        <script src="<?= base_url('assets/site/js/plugins.js'); ?>"></script>
         <!-- Main JS -->
         <script src="<?= base_url('assets/site/js/main.js'); ?>"></script>

        <!-- ================================================================================= -->

        <!-- toast message -->
        <script src="<?= base_url('assets/admin/libs/toast/toastr.js');?>"></script>
        <script src="<?= base_url('assets/admin/js/pages/toastr.init.js');?>"></script>
        <!-- toast message -->

        <!-- My-zoom.js -->
        <script src="<?= base_url('assets/admin/libs/zoom/js/my-zoom.js');?>"></script> 
        <!-- My-zoom.js -->

        <!-- Bootstrap rating js -->
        <script src="<?= base_url('assets/admin/libs/bootstrap-rating/bootstrap-rating.min.js');?>"></script>
                                    
        <script src="<?= base_url('assets/admin/js/pages/rating-init.js');?>"></script>
                                    
        <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>
                                    
        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>
        <!-- end -->
        
        <?php $this->load->view('partials/ajax');?>
        <?php $this->load->view('partials/_messages');?>
        <?php //$this->load->view('partials/modal');?>
    </div>
    <!-- End Page Wrapper -->
   <script>
      (function () {
         'use strict'
         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.querySelectorAll('.needs-validation')
         // Loop over them and prevent submission
         Array.prototype.slice.call(forms)
            .forEach(function (form) {
               form.addEventListener('submit', function (event) {
               if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
               }else{
                  // $(".animate-container").addClass("animation-added");
                     setInterval(function() { 
                  //  $('#stepForm1').submit();
               }, 4000);  
               }
               
               form.classList.add('was-validated')
               
               }, false)
            })

         })()
   </script>
</body>
</html>