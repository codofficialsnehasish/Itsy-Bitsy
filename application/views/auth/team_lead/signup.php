<html>
<head>
<head>
 <?php $this->load->view('partials/title-meta');?>
    <!-- ====================== Css file ================== -->
<?php $this->load->view('partials/head');?>
</head>
</head>

<?php $this->load->view('partials/body');?>

<div id="page-content">
    <!-- Page Title -->
    <div class="page section-header text-center mb-0">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Team Lead Register</h1></div>
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
                        <input type="hidden" value="teamlead" name="reg_opt">
                        <!-- <form method="post" action="#" accept-charset="UTF-8" class="customer-form"> -->
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerFirstName">First Name <span class="required">*</span></label>
                                    <input id="CustomerFirstName" type="text" name="first_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerLastName">Last Name <span class="required">*</span></label>
                                    <input id="CustomerLastName" type="text" name="last_name" placeholder="">                         
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerFirstName">Address <span class="required">*</span></label>
                                    <input id="CustomerFirstName" type="text" name="address" placeholder="City / Village, Post, District, State, Country">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="CustomerLastName">Pin Code <span class="required">*</span></label>
                                    <input id="CustomerLastName" type="text" name="pin_number" placeholder="--- ---" required>                         
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="CustomerLastName">Prefarable Pin Code <span class="required">*</span></label>
                                    <input id="CustomerLastName" type="text" name="pref_pin_number" placeholder="--- ---">                         
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email Address <span class="required">*</span></label>
                                    <input id="CustomerEmail" type="email" name="email" placeholder="" required>                           
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerPhone">Phone Number <span class="required">*</span></label>
                                    <input type="tel" name="phone_number" id="CustomerPhone" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerPhone">Pan Card Number <span class="required">*</span></label>
                                    <input type="text" name="pan_no" id="CustomerPhone" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="Aadhar"> <!-- style="display:none;" -->
                                <div class="form-group">
                                    <label for="Customeraadhar">Aadhar Card Number <span class="required">*</span></label>
                                    <input type="text" name="aadhar_no" id="Customeraadhar" placeholder="---- ---- ---- ----" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="customCheckbox clearfix">
                                    <input id="aadhar" name="cardcheck" type="radio" onclick="document.getElementById('Aadhar').style.display = 'block'; document.getElementById('Voter').style.display = 'none';">
                                    <label for="aadhar" style="margin-bottom: 0;padding: 0 20px;">Aadhar</label>

                                    <input id="voter" name="cardcheck" type="radio" onclick="document.getElementById('Voter').style.display = 'block'; document.getElementById('Aadhar').style.display = 'none';">
                                    <label for="voter" style="margin-bottom: 0;padding: 0 20px;">Voter</label>
                                </div>
                            </div>
                        </div> -->
                        <h3 class="mt-3">Login Information</h3>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">                                    
                                <div class="form-group">
                                    <label for="CustomerPassword">Password <span class="required">*</span></label>
                                    <input id="CustomerPassword" type="password" name="password" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerConfirmPassword">Confirm Password <span class="required">*</span></label>
                                    <input id="CustomerConfirmPassword" type="Password" name="confirm_password" placeholder="">                            
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





<!------ all scripts link ------>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');?>"></script> -->
	<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap5.1/js/bootstrap.bundle.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/produce-zoom/js/my-zoom.js');?>"></script>
	<script src="<?= base_url('assets/js/nav.jquery.min.js');?>"></script>
		
	<script type="text/javascript" src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/slick-slider/slick/slick.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/acmeticker/assets/js/acmeticker.min.js');?>"></script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{
           // $(".animate-container").addClass("animation-added");
            setInterval(function() { 
          //  $('#stepForm1').submit();
        }, 4000);  
        }
        
        form.classList.add('was-validated')
        
      }, false)
    })
   
})()
</script>

</body>
</html>