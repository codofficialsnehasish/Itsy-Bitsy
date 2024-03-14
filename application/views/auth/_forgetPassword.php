<div  id="forgetpasswordForm" style="display:none;">
    <?= form_open('authentication/login-process', 'class="needs-validation" novalidate ');?>					            	
    <?php $this->load->view('admin/partials/_messages');?>
    <div class="form-floating mb-4">
        <input type="email" class="form-control" id="forgetEmail" name="email" placeholder="name@example.com">
        <label for="forgetEmail">Email address</label>
    </div>
    <div class="row m-0">
        
        <div class="col-6 text-end">
            <a href="javascript:;" id="backtoLogin">Back to Login</a>
        </div> 
        <div class="text-center mt-5 mb-4 col-6 mx-auto">
        <button class="w-100 btn btn-lg btn-primary btn-login fw-bold text-uppercase forgetPass" type="button">
            Get Password
        </button>
        <div id="forgetpasswordresponse"></div>
    </div>
    </div>
    
    <?= form_close();?>
</div>
