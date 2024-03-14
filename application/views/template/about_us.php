<div id="page-content">
            <!-- Breadcrumbs -->
            <div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center mb-0">
               <div class="container breadcrumbs">
                  <a href="<?= base_url(' ') ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">About Us</span>
               </div>
            </div>
            <!-- End Breadcrumbs -->
            <div class="container">
               <?php if(!empty($image[0])): ?>
               <div class="row">
                  <div class="col-12 text-center mt-3 mb-3">
                     <img class="blur-up lazyloaded" data-src="<?= get_image($image[0]->media_id);?>" src="<?= get_image($image[0]->media_id);?>" alt="About Us">
                  </div>
               </div>
               <?php endif; ?>
               <?php if(!empty($allitems)): foreach($allitems as $it){ ?>
               <div class="row mt-3">
                  <div class="col-4 col-sm-3 col-md-3 col-lg-3 text-center">
                     <h3><b><?= $it->about_header; ?></b></h3>
                  </div>
                  <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                     <p><?= $it->about_content; ?></p>
                  </div>
               </div>
               <?php } endif?>
               <div class="row mt-4">
                  <div class="col-4 col-sm-3 col-md-3 col-lg-3 text-center">
                     <h3><b>Contact Us</b></h3>
                  </div>
                  <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                     <p><strong><?= $this->settings->contact_address; ?></strong></p>
                     <p><strong>Phone</strong> : <?= $this->settings->contact_phone; ?> <br><strong>Email</strong>: <?= $this->settings->contact_email; ?> <?php if(!empty($this->settings->contact_email_opt)) echo'/'.$this->settings->contact_email_opt; ?></p>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Body Content -->