<div id="page-content">
		<!-- Page Title -->
		<div class="page section-header text-center mb-0">
			<div class="page-title">
				<div class="wrapper"><h1 class="page-width">Forgot Password</h1></div>
			</div>
		</div>
		<!-- End Page Title -->
		<!-- Breadcrumbs -->
		<div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center">
			<div class="container breadcrumbs">
				<a href="<?= base_url(" "); ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">Forgot Password</span>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<div class="container">
			<div class="row">
				<!-- Main Content -->
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box mb-4 mb-md-0">
					<img src="<?= base_url("assets/site/images/forget-password.jpg") ?>" style="width:400px;" alt="">
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box" style="display: flex;align-items: center;">
					<div class="mb-4">
						<?= form_open('authentication/forgot_password_post', 'class="needs-validation" novalidate ', 'id="login_form"');?>					            	
							<?php $this->load->view('admin/partials/_messages');
							//echo $this->session->flashdata('error');?>
						<!-- <form method="post" action="#" id="CustomerRegisterForm" accept-charset="UTF-8" class="customer-form">   -->
							<h3>Registered Customers</h3>
							<p>If you have an account with us, then change your password.</p>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
                                        <label class="form-label" for="form1Example1" style="margin-left: 0px;">Email address</label>
                                        <input type="text" id="form1Example1" class="form-control validate" name="email" required>
										<div class="invalid-feedback">Email Required</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init="">Submit</button>
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
