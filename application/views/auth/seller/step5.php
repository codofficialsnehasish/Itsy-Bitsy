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
			<div class="col-md-8 log-sign-section nt_op">
			  <section class="signin-step-page">
		<div class="container">    

<div class="card">
		        <div class="form">
		            <div class="left-side">
		                <div class="left-heading">
		                    <h2 class="yeseva alada-heading text-white">Registration</h2>
		                </div>
		                <div class="steps-content">
		                    <h2>Finished <span class="step-number"></span></h2>
		                    <!-- <p class="step-number-content active">Enter your personal information to get closer to companies.</p> -->
		                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
		                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
		                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
		                </div>
		                <ul class="progress-bar">
		                    <li class="active">Personal Information</li>
		                    <li class="active">Shop Information</li>
		                    <li class="active">Bank Details</li>
		                    <li class="active">Final Submission</li>
		                </ul>            
		            </div>
		            <div class="right-side">
                        <form method="get">
		                 <div class="main active">
		                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
		                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle>
		                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
		                    </svg>
		                     
		                    <div class="text congrats">
		                        <h2>Congratulations!</h2>
		                        <p>Thanks Mr./Mrs. <span class="shown_name"><?= $user->full_name;?></span> your information have been submitted successfully for the future reference we will contact you soon.</p>
								<p>Click <a href="<?= base_url('my-dashboard');?>">here</a> to view your dashboard.</p>
		                    </div>
		                </div>  
                        </form
		            </div>
		        </div>
		    </div>

</div></section>


			</div>
			<div class="col-md-4 w-100vh text-center login-bg-s align-center">
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