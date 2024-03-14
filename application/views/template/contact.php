<div id="page-content">
    <!-- Page Title -->
    <div class="page section-header text-center mb-0">
    <div class="page-title">
        <div class="wrapper">
            <h1 class="page-width">Contact Us</h1>
        </div>
    </div>
    </div>
    <!-- End Page Title -->
    <!-- Breadcrumbs -->
    <div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center mb-0">
    <div class="container breadcrumbs">
        <a href="<?= base_url(' ') ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">Contact Us</span>
    </div>
    </div>
    <!-- End Breadcrumbs -->
    <div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
            <div class="map-section map">
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3685.21026282452!2d88.3836701!3d22.533795!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0276c1d1944a59%3A0x41dc48c8e0794de2!2z8J2QkfCdkIog8J2QjvCdkJXwnZCE8J2QkfCdkJLwnZCE8J2QgPCdkJIgKCDwnZCF8J2QmvCdkJzwnZCt8J2QqPCdkKvwnZCyICk!5e0!3m2!1sen!2sin!4v1702370793569!5m2!1sen!2sin" allowfullscreen="" height="650"></iframe> -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.4136143980813!2d88.37363827434939!3d22.45108613741486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0271e51920a8a7%3A0x9c03bbd63ad87f5d!2sItsy%20Bitsy%20Kolkata%20(%20Jewellery%20Wholesaler)!5e0!3m2!1sen!2sin!4v1709290630797!5m2!1sen!2sin"  height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 justify-content-center align-items-center flex-wrap px-3 px-sm-5 pt-4 pb-2 mb-md-5 mb-lg-0 mb-sm-5 mb-5">
            <h2 class="text-center">DROP US A LINE</h2>
            <p class="text-center">For inquiries as radiant as our jewels, drop us a line. We're here to adorn your world. </p>
            <!-- Contact Form -->
            <?php $this->load->view('admin/partials/_messages');?>
            <div class="formFeilds contact-form form-vertical">
            <?= form_open_multipart('contact-us/process', 'class="custom-validation contact-form"');?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                        <input type="text" id="ContactFormName" name="c_name" class="form-control" placeholder="Name">
                        <span class="error_msg" id="name_error"></span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                        <input type="email" id="ContactFormEmail" name="c_email" class="form-control" placeholder="Email">
                        <span class="error_msg" id="email_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                        <input class="form-control" type="tel" id="ContactFormPhone" name="c_phone" pattern="[0-9\-]*" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                        <input type="text" id="ContactSubject" name="c_subj" class="form-control" placeholder="Subject">
                        <span class="error_msg" id="subject_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                        <textarea id="ContactFormMessage" name="c_msg" class="form-control" rows="4" placeholder="Your Message..."></textarea>
                        <span class="error_msg" id="message_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group mailsendbtn mb-0">
                        <input class="btn btn-primary" type="submit" name="contactus" value="Send Message">
                        <div class="loading"><img class="img-fluid" src="assets/images/ajax-loader.gif" alt="loading"></div>
                        </div>
                    </div>
                </div>
            <?= form_close();?>
            <div class="response-msg"></div>
            </div>
            <!-- End Contact Form -->
            <div class="contact-details">
            <hr>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <ul class="addressFooter">
                        <li>
                        <i class="icon an an-map-marker"></i>
                        <p><?= $this->settings->contact_address; ?></p>
                        </li>
                        <li class="phone">
                        <i class="icon an an-phone"></i>
                        <p><?= $this->settings->contact_phone; ?></p>
                        </li>
                        <li class="email">
                        <i class="icon an an-envelope"></i>
                        <p><?= $this->settings->contact_email; ?> <?php if(!empty($this->settings->contact_email_opt)){ echo "/".$this->settings->contact_email_opt;}else{ echo""; }; ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="list--inline site-footer__social-icons social-icons mt-lg-0 mt-md-0 mt-3">
                <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->twitter_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->linkedin_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin"><i class="icon an an-linkedin"></i> <span class="icon__fallback-text">Linkedin</span></a></li>
                <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->instagram_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->youtube_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="YouTube"><i class="icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End Body Content -->