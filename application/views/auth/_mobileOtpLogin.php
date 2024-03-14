<h3 class="mb-4 text-center"><a href="javascript:;" id="login_with_otp">Login with OTP</a></h3>
<div class="loginForm pb-0" style="display:none;" id="otpLoginForm">
<!-- <h3 class="mb-4 text-center">Enter Mobile Number</h3> -->
    <div class="form-floating mb-3">
        <input type="tel" class="form-control otp-field" id="mobile" name="" placeholder="123456789" required>
        <input type="tel" class="form-control otp-field" id="otp" name="" placeholder="123456789" style="display:none;" required>
        <input type="hidden" class="form-control otp-field" id="hdn_mobile" name="" placeholder="123456789" required>
        <label for="" id="mobileotptxt">Phone Number</label>
        <div class="text-center mt-4 col-6 mx-auto">
        <button class="w-100 btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="button" id="getOtp"> Get Otp </button>
        <button class="w-100 btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="button" id="verify_otp" style="display:none;"> Verify Otp </button>
        <h3 class="mb-4 text-center">
            <a href="javascript:;" id="backtoLogin">Back to Login</a>
        </h3>
        </div>  
        <div id="resendCountDown2" style="display: none">  
        <span style="color:#F00;" id="generateCount2"></span>&nbsp;seconds.  
        </div> 
        <div id="resendCountDown" style="display: none">  
        <span style="color:#F00;" id="generateCount"></span>&nbsp;seconds.  
        </div> 
        <a href="javascript:;" id="resendOtp" style="display:none;">Resend Otp</a>  
        <div id="otpresponse"></div>
</div>
</div>
