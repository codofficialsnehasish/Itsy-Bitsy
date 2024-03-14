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
		                    <h2>Step <span class="step-number">2</span></h2>
		                    <p class="step-number-content d-none">Enter your personal information to get closer to companies.</p>
		                    <p class="step-number-content active">Get to know better by adding your diploma,certificate and education life.</p>
		                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
		                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
		                </div>
		                <ul class="progress-bar">
		                    <li class="active">Personal Information</li>
		                    <li class="active">Shop Information</li>
		                    <li >Bank Details</li>
		                    <li>Final Submission</li>
		                </ul>            
		            </div>
		            <div class="right-side">
					<?= form_open_multipart('authentication/seller-reg-process2', 'class="needs-validation" name="myform"  novalidate ');?>
					<input type="hidden" name="token" value="<?= $user->token!=''?$user->token:'';?>" />
		                <div class="main active">
		                    <!-- <small><i class="fa fa-smile-o"></i></small> -->
		                    <div class="text">
		                    	<h2 class="yeseva alada-heading ">Your Shop Information</h2>
		                        <p class="make-p p-0">Enter your shop information to get closer to copanies.</p>
		                    </div>
		                   
		                    <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="shop_name" required class="form-control" value="<?= $user->shop_name!=''?$user->shop_name:old("shop_name");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Shop Name</span>
		                        </div>	
		                    </div>
							<div class="input-text">							
		                        <div class="input-div">
		                            <input type="text" name="trade_licence_no"  class="form-control" value="<?= $user->trade_licence_no!=''?$user->pan_no:old("trade_licence_no");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Trade license Number</span>
		                        </div>
								<div class="input-group up_lod">
							 		<label for="myfile">Trade license Proof</label>
                                	<input type="file" id="myfile" name="trade_licence_proof" class="form-control" >
								</div> 
		                    </div>
                            <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="gst_no"  class="form-control" value="<?= $user->gst_no!=''?$user->gst_no:old("gst_no");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>GST Number</span>
		                        </div>
                                <div class="input-group up_lod">
							 		<label for="myfile">GST Document Proof</label>
                                	<input type="file" id="myfile" name="gst_proof" class="form-control">
								</div> 
		                    </div>							
							<div class="input-text">
								<div class="input-group up_lod">
							 		<label for="myfile">MOA & AOA Proof</label>
                                	<input type="file" id="myfile" name="moa_aoa_proof">
								</div> 
                            </div>

                           <!-- <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" required="" require="">
		                            <span>TDS</span>
		                        </div>
		                    </div> -->

		                    <div class="buttons button_space">
		                        <!-- <a href="<?= base_url('seller/signup/step1?token='.$this->input->get('token'));?>" class="back_button">Back</a> -->
		                        <button class="next_button">Save & Next</button>
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