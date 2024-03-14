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
		                    <h2>Step <span class="step-number">1</span></h2>
		                    <p class="step-number-content active">Enter your personal information to get closer to companies.</p>
		                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
		                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
		                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
		                </div>
		                <ul class="progress-bar">
		                    <li class="active">Personal Information</li>
		                    <li >Shop Information</li>
		                    <li >Bank Details</li>
		                    <li>Final Submission</li>
		                </ul>            
		            </div>
		            <div class="right-side">
					<?= form_open_multipart('authentication/seller-reg-process1', 'class="needs-validation" name="myform"  novalidate ');?>
					<input type="hidden" name="token" value="<?= $user->token!=''?$user->token:'';?>" />
		                <div class="main active">
		                  <!--   <small><i class="fa fa-smile-o"></i></small> -->
		                    <div class="text">
		                        <h2 class="yeseva alada-heading ">Your Personal Information</h2>
		                        <p class="make-p p-0">Enter your personal information to get closer to companies.</p>
		                    </div>								
		                    <div class="input-text">
								<div class="input-div"  style="width:290px;">
									<select name="appellation" id="appellation" required class="form-control">
		                                <option value="">Apellation</option>
										<option value="Dr">Dr</option>
										<option value="Janab">Janab</option>
										<option value="Mr">Mr</option>
										<option value="Mrs">Mrs</option>
										<option value="Ms">Ms</option>
										<option value="Shri">Shri</option>
										<option value="Shrimati">Shrimati</option>
		                            </select>
									<div class="invalid-tooltip">Please fill out this field.</div>
		                        </div>
		                        <div class="input-div">
		                            <input type="text" name="first_name" required class="form-control" id="first_name" value="<?= $user->first_name!=''?$user->first_name:old("first_name"); ?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>First Name</span>
		                        </div>
								<div class="input-div"> 
		                            <input type="text" name="middle_name" class="form-control" value="<?= $user->middle_name!=''?$user->middle_name:old("middle_name"); ?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Middle Name</span>
		                        </div>
		                        <div class="input-div"> 
		                            <input type="text" name="last_name" required class="form-control" value="<?= $user->last_name!=''?$user->last_name:old("last_name"); ?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Last Name</span>
		                        </div>
		                    </div>
		                    <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="phone_number" required class="form-control <?= $this->session->flashdata('phone_error')?' is-invalid':'';?>"  value="<?= $user->phone_number!=''?$user->phone_number:old("phone_number"); ?>">
									<div class="invalid-tooltip"><?= $this->session->flashdata('phone_error')?$this->session->flashdata('phone_error'):'Please fill out this field.';?></div>
		                            <span>Phone number</span>
		                        </div>
								<div class="input-div">
		                            <input type="text" name="alt_phone_number" class="form-control"  value="<?= $user->alt_phone_number!=''?$user->alt_phone_number:old("alt_phone_number"); ?>">
		                            <span>Alternative Phone number</span>
		                        </div>								
		                        <div class="input-div">
		                            <input type="email" name="email" required class="form-control <?= $this->session->flashdata('email_error')?' is-invalid':'';?>" value="<?= $user->email!=''?$user->email:old("email"); ?>">
									<div class="invalid-tooltip"><?= $this->session->flashdata('email_error')?$this->session->flashdata('email_error'):'Please fill out this field.';?></div>
		                            <span>E-mail Address</span>
		                        </div>
		                    </div>
							<div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="address" required class="form-control" value="<?= $user->address!=''?$user->address:old("address"); ?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Address</span>
		                        </div>
								<div class="input-div">
		                            <input type="text" name="zip_code" required class="form-control" id="pincode" value="<?= $user->zip_code!=''?$user->zip_code:old("zip_code"); ?>">
									<div class="invalid-tooltip" id="pincoderesponse">Please fill out this field.</div>
		                            <span>Pincode</span>
		                        </div>		                       
		                    </div>
		                    <div class="input-text">
								<div class="input-div">
		                            <select name="country_id" id="country_id" required class="form-control">
		                                <option value="">Select Country</option>
										<?php 
										if(!empty($countries)):
											foreach($countries as $country):
											?>
		                               			<option value="<?= $country->id;?>"><?= $country->name;?></option>
											<?php 
											endforeach;
										endif;
										?>		                               
		                            </select>
									<div class="invalid-tooltip">Please fill out this field.</div>		                        
		                        </div>
		                        <div class="input-div">
								<select name="state_id" id="state_id" required class="form-control">
		                                <option value="">Select State</option>
		                            </select>
									<div class="invalid-tooltip">Please fill out this field.</div>
		                        </div>
		                        <div class="input-div">		                            
		                            <select name="city_id" id="city_id" required class="form-control">
		                                <option value="">Select City</option>
		                            </select>
									<div class="invalid-tooltip">Please fill out this field.</div>
		                        </div>								
		                    </div>
                            <div class="input-text">
								<div class="input-group up_lod">
							 		<label for="myfile">User Image:</label>
                                	<input type="file" id="myfile" class="form-control" name="user_image" required>
									<div class="invalid-tooltip">Please fill out this field.</div>
								</div> 
							</div>
							<div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="pan_no" class="form-control" value="<?= $user->pan_no!=''?$user->pan_no:old("pan_no");?>" required>
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Pan Card Number</span>
		                        </div>
                                <div class="input-group up_lod">
							 		<label for="myfile">Pan Card Proof</label>
                                	<input type="file" id="myfile" class="form-control" name="pan_proof" required>
									<div class="invalid-tooltip">Please fill out this field.</div>
								</div>
		                    </div>							 
							<div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="aadhar_no"  class="form-control" value="<?= $user->gst_no!=''?$user->gst_no:old("gst_no");?>" required>
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Aadhar No.</span>
		                        </div>
                                <div class="input-group up_lod">
							 		<label for="myfile">Aadhar Proof</label>
                                	<input type="file" id="myfile" class="form-control" name="aadhar_proof" required>
								</div> 
		                    </div>
                            <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="voter_no"  class="form-control" value="<?= $user->gst_no!=''?$user->gst_no:old("gst_no");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Voter Id No.</span>
		                        </div>
								<div class="input-group up_lod">
							 		<label for="myfile">Voter Id Proof</label>
                                	<input type="file" id="myfile" class="form-control" name="voter_proof">
								</div> 
		                    </div>
                            <div class="input-text">
		                        <div class="input-div">
		                            <input type="password" name="password" required class="form-control" id="user_name">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Password</span>
		                        </div>
		                        <div class="input-div"> 
		                            <input type="password" required class="form-control">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Confirm Password</span>
		                        </div>
		                    </div>
		                    <div class="buttons">
		                        <button class="next_button" type="submit">Next Step</button>
		                    </div>
		                </div>
						<?= form_close();?>
		            </div>
		        </div>
		    </div>

</div></section>


			</div>
			<div class="col-md-3 w-100vh text-center login-bg-s align-center d-none">
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