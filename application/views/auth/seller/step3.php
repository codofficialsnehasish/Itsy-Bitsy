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
		                    <h2>Step <span class="step-number">3</span></h2>
		                    <p class="step-number-content d-none">Enter your personal information to get closer to companies.</p>
		                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
		                    <p class="step-number-content active">Your Bank Details.</p>
		                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
		                </div>
		                <ul class="progress-bar">
		                    <li class="active">Personal Information</li>
		                    <li class="active">Shop Information</li>
		                    <li class="active">Bank Details</li>
		                    <li>Final Submission</li>
		                </ul>            
		            </div>
		            <div class="right-side">
					<?= form_open_multipart('authentication/seller-reg-process3', 'class="needs-validation" name="myform"  novalidate ');?>
		                <div class="main active">
		                   <!--  <small><i class="fa fa-smile-o"></i></small> -->
		                    <div class="text">
							<h2 class="yeseva alada-heading ">Your Bank Details</h2>
		                        <p class="make-p p-0">Enter your Bank Details.</p>
		                    </div>
		                    <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="bank_name" required class="form-control" value="<?= $user->bank_name!=''?$user->bank_name:old("bank_name");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Bank Name</span>
		                        </div>
		                        <div class="input-div"> 
		                            <input type="text" name="branch_name" required class="form-control" value="<?= $user->branch_name!=''?$user->branch_name:old("branch_name");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Branch Name</span>
		                        </div>
		                    </div>
		                    <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="account_holder_name" required class="form-control" value="<?= $user->account_holder_name!=''?$user->account_holder_name:old("account_holder_name");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Account Holder Name</span>
		                        </div>
		                        <div class="input-div">
		                            <input type="text" name="ifsc_code" required class="form-control" value="<?= $user->ifsc_code!=''?$user->ifsc_code:old("ifsc_code");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>IFSC Code</span>
		                        </div>
		                    </div>
		                    <div class="input-text">
		                        <div class="input-div">
		                            <input type="text" name="account_number" required class="form-control" value="<?= $user->account_number!=''?$user->account_number:old("account_number");?>">
									<div class="invalid-tooltip">Please fill out this field.</div>
		                            <span>Account Number</span>
		                        </div>			                       
		                    </div>
							<div class="input-text">
								<div class="input-group up_lod">
							 		<label for="myfile">Cancel Check</label>
                                	<input type="file" id="myfile" class="form-control" name="cancel_check" required>
                             		<div class="invalid-tooltip">Please fill out this field.</div>
								</div>
                            </div>
		                    <div class="buttons button_space">
							<a href="<?= base_url('seller/signup/step2?token='.$this->input->get('token'));?>" class="back_button ">Back</a>
		                        <button class="next_button">Next Step</button>
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