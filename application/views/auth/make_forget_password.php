    <div id="page-content">
		<!-- Page Title -->
		<div class="page section-header text-center mb-0">
			<div class="page-title">
				<div class="wrapper"><h1 class="page-width">Change Password</h1></div>
			</div>
		</div>
		<!-- End Page Title -->
		<!-- Breadcrumbs -->
		<div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center">
			<div class="container breadcrumbs">
				<a href="<?= base_url(" "); ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">Change Password</span>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<div class="container">
			<div class="row">
				<!-- Main Content -->
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box mb-4 mb-md-0">
					<img src="<?= base_url("assets/site/images/change-password.jpg") ?>" style="width:400px;" alt="">
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box" style="display: flex;align-items: center;">
					<div class="mb-4">
						<?= form_open('authentication/reset_password_post', 'class="needs-validation" novalidate ', 'id="login_form"');?>					            	
							<?php $this->load->view('admin/partials/_messages');
							//echo $this->session->flashdata('error');?>
						    <!-- <form method="post" action="#" id="CustomerRegisterForm" accept-charset="UTF-8" class="customer-form">   -->
						    <input type="hidden" name="token" value="<?= $user->token; ?>">	
                            <h3>Hi <?= $user->first_name ?>,</h3>
							<p>Now you can change your password.</p>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
                                        <label class="form-label" for="form1Example1" style="margin-left: 0px;">Please Enter New Password</label>
                                        <input type="password" id="form1Example1" class="form-control validate" name="password" required>
                                        <div class="invalid-feedback">Password Required</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                    <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init="">Forget Password</button>
									<p class="mb-4 mt-4">
										<a href="<?= base_url('login') ?>">Back to Login</a> &nbsp; | &nbsp;
										<a href="<?= base_url('/signup') ?>" id="customer_register_link">Create account</a>
									</p>
								</div>
							</div>
						<!-- </form> -->
						<?= form_close();?>
					</div>
				</div>
				<!-- End Main Content -->
			</div>
		</div>
	</div>