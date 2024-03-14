
<div class="modal fade theme-modal view-modal" id="quickProductView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
               <div class="modal-header p-0">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
               </div>
               <div class="modal-body">
               <div id="responseSingleProductPreview"></div>
               </div>
            </div>
         </div>
</div>





<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#swinganimationModal">
  Swing
</button> -->

<!-- Login Modal -->
<div class="modal animate__animated animate__swing" id="loginModal" tabindex="-1" aria-labelledby="swinganimationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
         <div class="login-form">
            <form id="loginForm" method="post" class="modalfrm needs-validation"  novalidate>
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="email" class="form-control" required minlength="5" maxlength="100" placeholder="Email Id/Mobile Number">
                     <div class="invalid-feedback">This Field is Required</div>
                  </div>
                  <div class="form-group">
                     <div class="passgrp">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control passinput" required minlength="4"> 
                        <span class="viewpass"> <i class="fa fa-eye-slash vv" aria-hidden="true"></i></span>
                        <div class="invalid-feedback">This Field is Required</div>
                     </div>
                  </div>
                  <div class="form-group">
                  <button class="btn btn-animation w-100 mt-3 logbtn" type="submit">Login</button>
               </div>
            </form>
         </div>      
      </div>
      <div class="modal-footer">
         <div class="authtype">
               <ul>
               <li><a href="javascript:void(0);" class="reglink">Haven't Any Account? Click here</a></li>
               <li><a href="javascript:void(0);" class="forgotlink">Forget Password?</a></li>
               </ul>
         </div>      
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal animate__animated animate__swing" id="registerModal" tabindex="-1" aria-labelledby="swinganimationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
         <div class="login-form">
            <form id="regForm" method="post" class="modalfrm needs-validation"  novalidate>
            <div class="form-group">
               <!-- <label class="input-helper">First Name</label> -->
               <input type="text" class="form-control" name="first_name" required placeholder="First Name">
               <div class="invalid-feedback">This Field is Required</div>
            </div>
            <div class="form-group">
               <!-- <label class="input-helper">Last Name</label> -->
               <input type="text" class="form-control" name="last_name" required placeholder="Last Name">
               <div class="invalid-feedback">This Field is Required</div>
            </div>
            <div class="form-group">
               <!-- <label class="input-helper">Email ID</label> -->
               <input type="number" class="form-control" name="phone_number" minlength="10" maxlength="10" required placeholder="Phone No.">
               <div class="invalid-feedback">This Field is Required</div>
            </div>
            <div class="form-group">
               <!-- <label class="input-helper">Mobile Number</label> -->
               <input type="email" class="form-control" name="email" required placeholder="Mobile Number">
               <div class="invalid-feedback">This Field is Required</div>
            </div>
            <div class="form-group">
               <div class="passgrp">
               <!-- <label>Password</label> -->
               <input type="password" name="password" id="regpassword" class="form-control passinput" required minlength="6" placeholder="Password">
               <span class="viewpassreg"> <i class="fa fa-eye-slash rvv" aria-hidden="true"></i></span>
               <div class="invalid-feedback">This Field is Required</div>
            </div>
            </div>
            <div class="form-group">
               <button class="btn btn-animation w-100 mt-3 regbtn" type="submit">Register Now</button>
            </div>
            </form>
         </div>
      </div>
      <div class="modal-footer">

      <div class="authtype">
         <ul>
            <li><a href="javascript:void(0);" class="loglink">Login here</a></li>
            <li><a href="javascript:void(0);" class="forgotlink">Forget Password?</a></li>
         </ul>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#flipInXAnimationModal">
  FlipInX
</button> -->

<!-- Modal -->
<div class="modal animate__animated animate__flipInX" id="flipInXAnimationModal" tabindex="-1" aria-labelledby="flipInXAnimationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="mb-3 col">
            <label for="nameFlipInX" class="form-label">Name</label>
            <input type="text" id="nameFlipInX" class="form-control" placeholder="Enter Name">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col mb-0">
            <label for="emailFlipInX" class="form-label">Email</label>
            <input type="email" id="emailFlipInX" class="form-control" placeholder="xxxx@xxx.xx">
          </div>
          <div class="mb-3 col mb-0">
            <label for="dobFlipInX" class="form-label">DOB</label>
            <input type="date" id="dobFlipInX" class="form-control" >
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>