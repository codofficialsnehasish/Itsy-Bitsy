<!---------------------main section---------------------->
	<section class="profile-page mt-5 mb-5">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
		            <div class="card mb-4 mb-xl-0">
		                <div class="card-header">Profile Picture</div>
		                <div class="card-body text-center">
		                    <!-- Profile picture image-->
		                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
		                    <!-- Profile picture help block-->
		                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
		                    <!-- Profile picture upload button-->
		                    <button class="btn go-checkout" type="button">Upload new image</button>
		                </div>
		            </div>
		        </div>
		        <div class="col-xl-8">
		            <!-- Account details card-->
		            <div class="card mb-4">
		                <div class="card-header">Account Details</div>
		                <div class="card-body">
						<?= form_open_multipart('authentication/seller-profile-update', 'class="needs-validation" name="myform"  novalidate ');?>
		                        <!-- Form Row-->
		                        <div class="row gx-3 mb-3">
		                            <!-- Form Group (first name)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputFirstName">First name</label>
		                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?= $this->auth_user->first_name;?>">
		                            </div>
		                            <!-- Form Group (last name)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputLastName">Last name</label>
		                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?= $this->auth_user->last_name;?>">
		                            </div>
		                        </div>
		                        <!-- Form Row-->
		                        <div class="row gx-3 mb-3">
		                            <!-- Form Group (phone number)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputPhone">Phone number</label>
		                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?= $this->auth_user->phone_number;?>">
		                            </div>
		                            <!-- Form Group (birthday)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
		                            	<input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?= $this->auth_user->email;?>" disabled>
		                            </div>
		                        </div>
								<div class="row gx-3 mb-3">
		                            <!-- Form Group (phone number)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputPhone">Country</label>
										<select name="country_id" id="country_id" required class="form-control">
		                                <option value="">Select Country</option>
										<?php 
										if(!empty($countries)):
												foreach($countries as $country):
										?>
		                               			 <option value="<?= $country->id;?>" <?= $country->id==$this->auth_user->country_id?'selected':'';?>><?= $country->name;?></option>
										<?php 
												endforeach;
										endif;
										?>
		                               
		                            </select>
		                            </div>
		                            <!-- Form Group (birthday)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputEmailAddress">State</label>
										<select name="state_id" id="state_id" required class="form-control">
		                                <option value="">Select State</option>
										<?php 
										if(!empty($states)):
												foreach($states as $state):
										?>
		                               			 <option value="<?= $state->id;?>" <?= $state->id==$this->auth_user->state_id?'selected':'';?>><?= $state->name;?></option>
										<?php 
												endforeach;
										endif;
										?>
		                            </select>
		                            </div>
		                        </div>

								<div class="row gx-3 mb-3">
		                            <!-- Form Group (phone number)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputPhone">City</label>
										<select name="city_id" id="city_id" required class="form-control">
		                                <option value="">Select City</option>
										<?php 
										if(!empty($cities)):
												foreach($cities as $city):
										?>
		                               			 <option value="<?= $city->id;?>" <?= $city->id==$this->auth_user->city_id?'selected':'';?>><?= $city->name;?></option>
										<?php 
												endforeach;
										endif;
										?>
		                            </select>
		                            </div>
		                            <!-- Form Group (birthday)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputEmailAddress">Pincode</label>
		                            	<input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" value="<?= $this->auth_user->zip_code;?>" disabled>
		                            </div>
		                        </div>

		                        <!-- Form Group (email address)-->
		                        <div class="mb-4">
		                            <label class="small mb-1" for="inputLocation">Address</label>
		                            <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="<?= $this->auth_user->address;?>">
		                        </div>
		                        <!-- Save changes button-->
		                        <button class="btn go-checkout" type="submit">Save changes</button>
								<?= form_close();?>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')): ?>
        $('.toast').toast('show');
        <?php endif;?>
	});
</script>