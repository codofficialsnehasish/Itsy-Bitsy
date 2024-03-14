<?php $this->load->view('partials/main');?>
<head>
<head>
 <?php $this->load->view('partials/title-meta');?>
    <!-- ====================== Css file ================== -->
<?php $this->load->view('partials/head');?>
</head>
</head>

<?php $this->load->view('partials/body');?>

	<section class="new-login-page">
		<div class="row align-center text-center w-100vh m-0">
			<div class="col-md-8 log-sign-section">
				<h2 class="yeseva alada-heading">Reset Password</h2>
				
	            <div class="wid400 card mt-5">
					<div>
					<?= form_open('reset-password-post', 'class="needs-validation" novalidate ');?>					            	
						
						<?php //$this->load->view('partials/_messages'); 
						if($this->session->flashdata('success')){ ?>
                            <?php $this->load->view('admin/partials/_messages');?> 
						     <p>Please <a href="<?= base_url('login');?>">Login</a> to Access Your Account</p>
				    	<?php
					        }
						?>
						<?php if (!empty($user)): ?>
							<input type="hidden" name="token" value="<?php echo $user->token; ?>">
						<?php endif; ?>
						<?php if (!empty($success)): ?>
							<div class="form-group m-t-30">
							<a href="<?= base_url('');?>" class="backtohome1">Back to home <i class="zmdi zmdi-home"></i></a>
							</div>
						<?php else: ?>
						<div class="form-floating mb-4">
			                <input type="password" class="form-control  <?= $this->session->flashdata('passerror')?' is-invalid':'';?>" name="password" id="floatingPassword1" placeholder="Password">
			                <div class="invalid-feedback"><?= $this->session->flashdata('passerror')?$this->session->flashdata('passerror'):'Please fill out this field.';?></div>
							<label for="floatingPassword1">New Password</label>
			            </div>
			            <div class="form-floating mb-4">
			                <input type="password" class="form-control <?= $this->session->flashdata('cpasserror')?' is-invalid':'';?>" name="password_confirm" id="floatingPassword" placeholder="Password">
							<div class="invalid-feedback"><?= $this->session->flashdata('cpasserror')?$this->session->flashdata('cpasserror'):'Please fill out this field.';?></div>
			                <label for="floatingPassword">Confirm New Password</label>
			            </div>
			            
			            <div class="text-center mt-5 col-6 mx-auto">
			                <button class="w-100 btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">
							Submit
			                </button>
			            </div>
						<?php endif; ?>
						<?= form_close();?>
                   </div>
                    
	            </div>
			</div>
            
            <div class="col-md-4 w-100vh text-center login-bg-s align-center">
				<div class="form-target">
					<h2 class="yeseva alada-heading text-white">New Here!</h2>
					<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kjhgjfkk">
					  	Sign up
					</button>
				</div>
			</div>

		</div>
	</section>


	<div class="jkghdgz">
		<div class="modal fade" id="kjhgjfkk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered">
		    	<div class="modal-content">
		      		<div class="modal-body position-relative">
		      			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      			<h2 class="yeseva alada-heading text-center"><small>Sign Up </small></h2>
		        		<div class="row mt-5 mb-5 " style="justify-content: center;">
		            		<div class="gitn">
						        <input class="form-check-input" type="radio" name="user_type" id="gridRadios1" value="buyer" checked="">
						        <label class="form-check-label" for="gridRadios1">
						          As a Buyer
						        </label>
						    </div>
						    <div class="gitn">
						        <input class="form-check-input" type="radio" name="user_type" id="gridRadios2" value="seller">
						        <label class="form-check-label" for="gridRadios2">
						          As a Seller
						        </label>
						    </div>
		            	</div>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn-ef4036" id="log_nxt">Next</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>

<!------ all scripts link ------>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');?>"></script> -->
	<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
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