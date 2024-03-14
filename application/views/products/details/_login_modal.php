<!-- Modal -->
<div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel"> -->
			<h2 class="yeseva alada-heading">Login To Your Account</h2> 
		<!-- </h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <?php $this->load->view('auth/sociallogin');?> 
	  <?= form_open('authentication/login-process', 'class="needs-validation loginForm"  novalidate ');?>
	   <?php //$this->load->view('admin/partials/_messages');?> <div class="form-floating mb-4">
                  <input type="email" class="form-control" id="floatingInputEmail" name="email" placeholder="name@example.com" required>
                  <label for="floatingInputEmail">Email address</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="row m-0">
                  <div class="col-6 text-start">
                    <label>
                      <input type="checkbox" name="" class="check-input"> Remember Me </label>
                  </div>
                  <div class="col-6 text-end">
                    <a href="#">Forgot password?</a>
                  </div>
                </div>
                <div class="text-center mt-5 col-6 mx-auto">
				<div id="response"></div>
                  <button class="w-100 btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" id="subBtn"> Login </button>
                </div> 
			<?= form_close();?>	  
      </div>
      <div class="modal-footer">
	  <div class="col-6 text-end">
	  Don't have account yet?<a href="#">Signip here</a>
         </div>
	   </div>
    </div>
  </div>
</div>