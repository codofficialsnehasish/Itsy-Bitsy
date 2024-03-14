	<div id="page-content">
		<!-- Page Title -->
		<div class="page section-header text-center mb-0">
			<div class="page-title">
				<div class="wrapper"><h1 class="page-width">Login</h1></div>
			</div>
		</div>
		<!-- End Page Title -->
		<!-- Breadcrumbs -->
		<div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center">
			<div class="container breadcrumbs">
				<a href="<?= base_url(" "); ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">Login</span>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<div class="container">
			<div class="row">
				<!-- Main Content -->
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box mb-4 mb-md-0">
					<h3>New Customers</h3>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="<?= base_url('/signup'); ?>" class="btn">Create an account</a>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box">
					<div class="mb-4">
						<?= form_open('authentication/login-process', 'class="needs-validation" novalidate ', 'id="login_form"');?>					            	
							<?php $this->load->view('admin/partials/_messages');
							//echo $this->session->flashdata('error');?>
						<!-- <form method="post" action="#" id="CustomerRegisterForm" accept-charset="UTF-8" class="customer-form">   -->
							<h3>Registered Customers</h3>
							<p>If you have an account with us, please log in.</p>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
										<label for="CustomerEmail">Email <span class="required">*</span></label>
										<input type="text" name="email" placeholder="" class="form-control validate" id="CustomerEmail" autofocus="" required>
										<div class="invalid-feedback">Email Required</div>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
										<label for="CustomerPassword">Password <span class="required">*</span></label>
										<input type="password" value="" class="form-control validate" name="password" placeholder="" id="CustomerPassword" class="" required>  
										<div class="invalid-feedback">Password Required</div>                          
									</div>
								</div>
							</div>
							<div class="row">
								<div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
									<input type="submit" class="btn mb-3" value="Sign In">
									<p class="mb-4">
										<a href="<?= base_url('forgot-password') ?>">Forgot your password?</a> &nbsp; | &nbsp;
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


<!------ all scripts link ------>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');?>"></script> -->
	<script src="<?= base_url('assets/site/js/jquery-3.6.0.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap5.1/js/bootstrap.bundle.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/produce-zoom/js/my-zoom.js');?>"></script>
	<script src="<?= base_url('assets/js/nav.jquery.min.js');?>"></script>
		

	<script type="text/javascript" src="<?= base_url('assets/vendor/slick-slider/slick/slick.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/acmeticker/assets/js/acmeticker.min.js');?>"></script>
	<script>
     $("#log_nxt").click(function() {
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" ;
        const val = $("input[name='user_type']:checked").val();
        if (val == 'buyer') {
            window.location.href = baseUrl+"signup";
        } else {
            window.location.href = baseUrl+"seller/signup/step1";
        }

    })

    </script>
<?php $this->load->view('partials/ajax');?>

</body>
</html>  




































