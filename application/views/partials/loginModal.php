<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog justify-content-center" role="document">
      <div class="modal-content">
         <div class="modal-header" align="center">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-1" id="ex1" role="tablist">
               <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-login" data-mdb-toggle="pill" href="javascript:;" role="tab"
                     aria-controls="pills-login" data-mdb-target="#pills-login" aria-selected="true">Login</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link " id="pills-register" data-mdb-toggle="pill" href="javascript:;" role="tab"
                     aria-controls="pills-register" aria-selected="false">Register</a>
               </li>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </ul>
            <!-- Pills navs -->     
         </div>
         <div class="modal-body">
            <!-- Pills content -->
            <div class="tab-content">
               <!-- Login Form -->
               <div class="tab-pane fade show active" id="tab-login" role="tabpanel" aria-labelledby="tab-login">
                  <div class="form-check form-check-inline mb-3 ml-5">
                     <input class="form-check-input loginFormCheck" type="radio" name="loginoption" id="inlineRadio1" value="email" checked>
                     <label class="form-check-label" for="inlineRadio1">EMAIL</label>
                  </div>
                  <div class="form-check form-check-inline mb-3 ml-4">
                     <p class="text-center">Or</p>
                  </div>
                  <div class="form-check form-check-inline  mb-3 ml-4">
                     <input class="form-check-input loginFormCheck" type="radio" name="loginoption" id="inlineRadio2" value="mobile">
                     <label class="form-check-label" for="inlineRadio2">MOBILE</label>
                  </div>
                  <div id="emailLogin">
                     <?= form_open('authentication/login-process', 'class="needs-validation loginForm"  novalidate ');?>
                     <input type="hidden" name="login_type" id="login_type" value="normal">
                     <div class="form-outline mb-3">
                        <input type="email" id="email" class="form-control"  placeholder="Username" />
                     </div>
                     <div class="form-outline mb-3">
                        <input type="password" id="password" class="form-control" placeholder="Password" />
                     </div>
                     <div class="row mb-2">
                        <div class="col-md-6 d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary btn-sm mb-3" id="subBtn">Sign in</button> 
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                           <a href="javascript:;" id="getPassword">Forgot password?</a>
                        </div>
                        <div id="response"></div>
                     </div>
                     <?= form_close();?>	  
                  </div>
                  <!-- Forgot Password -->
                  <div id="forgotpass" style="display:none;">
                     <div class="form-outline mb-3">
                        <input type="email" id="forgetEmail" class="form-control"  placeholder="Enter Your Register Email Id" />
                     </div>
                     <div class="row mb-2">
                        <div class="col-md-6 d-flex justify-content-center">
                           <button type="button" class="btn btn-primary btn-sm mb-3" id="forGotBtn">Get Password</button> 
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                           <a href="javascript:;" id="getLogindetails">Back to Login</a>
                        </div>
                        <div id="forgotresponse"></div>
                     </div>
                     <!-- Forgot Password -->
                     <div id="mobileLogin" style="display:none;">
                        <div class="form-outline mb-3 mobileNo">
                           <input type="number" id="mobile" class="form-control"  placeholder="Mobile" />
                        </div>
                        <div class="form-outline mb-3 otp"  style="display:none;">
                           <input type="text" id="otp_mobile" class="form-control" placeholder="Enter OTP" />
                        </div>
                        <div class="row mb-2">
                           <div class="col-md-6 d-flex justify-content-center">
                              <button type="button" class="btn btn-primary btn-sm mb-3 get-txt-outr" id="getMobileOtp">Get Otp</button> 
                              <button type="button" class="btn btn-primary btn-sm mb-3 get-txt-outr" id="verifyMobileOtp" style="display:none;">Verify Otp</button> 
                           </div>
                        </div>
                        <div id="responseOtpLogin"></div>
                     </div>
                  </div>
               </div>
                                 <!-- Registration Form -->
                                 <div class="tab-pane fade" id="tab-register" role="tabpanel" aria-labelledby="tab-register">
                     <div class="form-check form-check-inline mb-3 ml-5">
                        <input class="form-check-input registerFormCheck" type="radio" name="registeroption" id="emailreg" value="email" checked>
                        <label class="form-check-label" for="emailreg">EMAIL</label>
                     </div>
                     <div class="form-check form-check-inline mb-3 ml-4">
                        <p class="text-center">Or</p>
                     </div>
                     <div class="form-check form-check-inline  mb-3 ml-4">
                        <input class="form-check-input registerFormCheck" type="radio" name="registeroption" id="mobilereg" value="mobile">
                        <label class="form-check-label" for="mobilereg">MOBILE</label>
                     </div>
                     <!-- Email Register -->
                     <div id="emailRegister">
                        <?= form_open('authentication/register-process', 'class="needs-validation registerForm"  novalidate ');?>
                        <input type="hidden" name="register_type" id="register_type" value="normal">
                        <div id="regfrm">
                           <div class="form-outline mb-3">
                              <input type="email" id="regemail" class="form-control"  placeholder="eMail" />
                           </div>
                           <div class="form-outline mb-3">
                              <input type="password" id="regpassword" class="form-control" placeholder="Password" />
                           </div>
                           <!-- <div class="row mb-2"> -->
                           <div class="col-md-6 d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary btn-sm mb-3" id="subBtn">Register</button> 
                           </div>
                           <!-- <div class="col-md-6 d-flex justify-content-center">
                              <a href="#">Forgot password?</a>
                              </div>  -->
                        </div>
                        <div id="otpeMail" style="display:none;">
                           <div class="form-outline mb-3 otp">
                              <input type="text" id="otp_email" class="form-control" placeholder="Enter OTP" />
                              <input type="hidden" id="hidden_email" value="">
                           </div>
                           <div class="col-md-6 d-flex justify-content-center">
                              <button type="button" class="btn btn-primary btn-sm mb-3 emailOtpBtn" id="subBtn">Verify Email</button> 
                           </div>
                           <!-- <div class="col-md-6 d-flex justify-content-center">
                              <a href="#">Resend</a>
                              </div>  -->
                        </div>
                         <div id="responseReg"></div>
                        <?= form_close();?>	  
                     </div>
                    <!-- Email Register -->
                     <!-- Mobile Register -->
                    <div id="mobileRegister" style="display:none;">
                        <div class="form-outline mb-3 mobileNoReg">
                            <input type="number" id="mobileReg" class="form-control"  placeholder="Mobile" />
                        </div>
                        <div class="form-outline mb-3 otpReg"  style="display:none;">
                            <input type="text" id="otp_mobileReg" class="form-control" placeholder="Enter OTP" />
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex justify-content-center">
                              <button type="button" class="btn btn-primary btn-sm mb-3 get-txt-outr" id="getMobileOtpReg">Get Otp</button> 
                              <button type="button" class="btn btn-primary btn-sm mb-3 get-txt-outr" id="verifyMobileOtpReg" style="display:none;">Verify Otp</button> 
                            </div>
                        </div>
                        <div id="responseOtpReg"></div>
                    </div>
                    <!-- Mobile Register -->
                  </div>

            </div>
            <!-- Pills content --> 
         </div>
      </div>
   </div>
</div>
<!-- Modal End -->