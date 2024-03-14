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
			<div class="col-md-12 log-sign-section nt_op">
			  <section class="signin-step-page">
		<div class="container">    

<div class="card">
		        <div class="form">
		            <div class="left-side">
		                <div class="left-heading">
		                    <h2 class="yeseva alada-heading text-white">Register</h2>
		                </div>
		                <div class="steps-content">
		                    <h2>Step <span class="step-number">4</span></h2>
		                    <p class="step-number-content d-none">Enter your personal information to get closer to companies.</p>
		                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
		                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
		                    <p class="step-number-content active">Add your profile piccture and let companies find youy fast.</p>
		                </div>
		                <ul class="progress-bar">
		                    <li class="active">Personal Information</li>
		                    <li class="active" >Shop Information</li>
		                    <li class="active">Bank Details</li>
		                    <li class="active">Final Submission</li>
		                </ul>            
		            </div>
		            <div class="right-side">
					<?= form_open_multipart('authentication/seller-reg-process4', 'class="needs-validation" name="myform"  novalidate ');?>
		         
		                <div class="main active">
		                    <!-- <small><i class="fa fa-smile-o"></i></small> -->
		                    <div class="text">
		                        <h2 class="yeseva alada-heading ">Your Personal Information</h2>
		                        <p class="make-p p-0">Enter your personal information to get closer to copanies.</p>
		                    </div>
		                    <div class="user_card">
		                        <span></span>
		                        <div class="circle">
		                            <span><img src="<?= get_image($user->user_image)?>"></span>
		                            
		                        </div>
		                        <div class="user_name">
		                            <h3 class="text-start"><?= $user->full_name;?></h3>
		                            <div class="detail">
		                                <p><a href="#"><?= select_value_by_id('location_cities','id',$user->city_id,'name');?>,<?= select_value_by_id('location_states','id',$user->state_id,'name');?></a>,<a href="#"><?= select_value_by_id('location_countries','id',$user->country_id,'name');?></a></p>
		                                <p><?= $user->shop_name;?></p>
		                            </div>
		                        </div>
                                
		                    </div>
                            	<div class="form-check text-start mb-3">
                            		<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            		<label class="form-check-label" for="invalidCheck">
                                		I Agree to <a href="<?= base_url('terms-and-conditions')?>" target="_blank">terms and conditions</a>
                            		</label>
                            		<div class="invalid-feedback">
                                		You must agree our terms & conditions before submitting.
                            		</div>
								</div>
		                    <div class="buttons button_space">
							<a href="<?= base_url('seller/signup/step3?token='.$this->input->get('token'));?>" class="back_button">Back</a>
		                      	
                               <button class="submit_button">Confirm Submit</button>
		                    </div>
		                </div>
						<?= form_close();?>
		            </div>
		        </div>
		    </div>

</div></section>


			</div>
			<div class="col-md-4 w-100vh text-center login-bg-s align-center d-none">
				<div class="form-target">
					<!-- <h2 class="yeseva alada-heading text-white">New Here!</h2>
					<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#kjhgjfkk">
					  	Sign up
					</button> -->
				</div>
			</div>
		</div>
	</section>
	<?php $this->load->view('auth/seller/script');?>