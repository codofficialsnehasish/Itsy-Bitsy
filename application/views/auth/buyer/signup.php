	<div id="page-content">
                <!-- Page Title -->
                <div class="page section-header text-center mb-0">
                    <div class="page-title">
                        <div class="wrapper"><h1 class="page-width">Register</h1></div>
                    </div>
                </div>
                <!-- End Page Title -->
                <!-- Breadcrumbs -->
                <div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center">
                    <div class="container breadcrumbs">
                        <a href="<?= base_url(' '); ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">Register</span>
                    </div>
                </div>
                <!-- End Breadcrumbs -->

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 box">  
                            <div class="mb-4">
                                <h3>Personal Information</h3>
								<?= form_open_multipart('authentication/reg-process', 'class="needs-validation" name="myform"  novalidate ');?>
									<?php $this->load->view('admin/partials/_messages');?>
                                    <!-- <input type="hidden" value="buyer" name="reg_opt"> -->
                                	<!-- <form method="post" action="#" accept-charset="UTF-8" class="customer-form"> -->
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="CustomerFirstName">First Name <span class="required">*</span></label>
                                                <input id="CustomerFirstName" type="text" class="form-control validate" name="first_name" placeholder="" required>
                                                <div class="invalid-feedback">First Name Required</div> 
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="CustomerLastName">Last Name <span class="required">*</span></label>
                                                <input id="CustomerLastName" type="text" class="form-control validate" name="last_name" placeholder="" required>  
                                                <div class="invalid-feedback">Last Name Required</div>                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="CustomerEmail">Email Address <span class="required">*</span></label>
                                                <input id="CustomerEmail" type="email" class="form-control validate" name="email" placeholder="" required> 
                                                <div class="invalid-feedback">Email Address Required</div> 
                                            </div>
                                        </div>
										<div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="CustomerPhone">Phone Number <span class="required">*</span></label>
                                                <!-- <input id="CustomerEmail" type="email" name="email" placeholder="">     -->
												<input type="tel" name="phone_number" class="form-control validate" id="CustomerPhone" placeholder="" required>
                                                <div class="invalid-feedback">Phone Number Required</div> 
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-3">Login Information</h3>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">                                    
                                            <div class="form-group">
                                                <label for="CustomerPassword">Password <span class="required">*</span></label>
                                                <input id="CustomerPassword" type="password" class="form-control validate" id="pass2" name="password" placeholder="" required>
                                                <div class="invalid-feedback">Password Required</div> 
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="CustomerConfirmPassword">Confirm Password <span class="required">*</span></label>
                                                <input id="CustomerConfirmPassword" type="Password" class="form-control validate" data-parsley-equalto="#pass2" name="confirm_password" placeholder="" required>     
                                                <div class="invalid-feedback">Confirm Password Required</div>                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-left col-12 col-sm-12 col-md-6 col-lg-6">
                                            <input type="submit" class="btn mb-3" value="Submit">
                                        </div>
                                        <div class="text-right col-12 col-sm-12 col-md-6 col-lg-6">
                                            <a href="<?= base_url('/login'); ?>"><i class="icon an an-angle-double-left me-1"></i>Back To Login</a>
                                        </div>
                                    </div>
                                <!-- </form> -->
								<?= form_close();?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
