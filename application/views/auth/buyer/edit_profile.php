<!---------------------main section---------------------->
<?= form_open_multipart('authentication/seller-profile-update', 'class="needs-validation" name="myform"  novalidate ');?>
	<section class="profile-page mt-5 mb-5">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
					<?php $this->load->view('auth/buyer/_editProfileImage');?>
		        </div>
		        <div class="col-xl-8">
		            <!-- Account details card-->
		            <div class="card mb-4">
					<div class="card-header">
		                	<div class="d-flex justify-content-between align-items-center">
			                	<span>Account Details</span>
			                	<span><a href="<?= base_url('/my-dashboard')?>" class="btn btn-info text-white">Back to Profile</a></span>
			                </div>
		                </div>
		                <div class="card-body">
						
		                        <!-- Form Row-->
		                        <div class="row gx-3 mb-3">
		                            <!-- Form Group (first name)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputFirstName">First name</label>
		                                <input class="form-control" id="inputFirstName" type="text" name="first_name" placeholder="Enter your first name" value="<?= $this->auth_user->first_name;?>">
		                            </div>
		                            <!-- Form Group (last name)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputLastName">Last name</label>
		                                <input class="form-control" id="inputLastName" type="text" name="last_name" placeholder="Enter your last name" value="<?= $this->auth_user->last_name;?>">
		                            </div>
		                        </div>
		                        <!-- Form Row-->
		                        <div class="row gx-3 mb-3">
		                            <!-- Form Group (phone number)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputPhone">Phone number</label>
		                                <input class="form-control" id="inputPhone" type="tel" name="phone_number" placeholder="Enter your phone number" value="<?= $this->auth_user->phone_number;?>">
		                            </div>
		                            <!-- Form Group (birthday)-->
		                            <div class="col-md-6">
		                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
		                            	<input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter your email address" value="<?= $this->auth_user->email;?>" readonly>
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
										<select name="state_id" id="states_id" required class="form-control">
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
										<select name="city_id" id="citys_id" required class="form-control">
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
		                            	<input class="form-control" id="inputEmailAddress" name="zip_code" type="text" placeholder="Pincode" value="<?= $this->auth_user->zip_code;?>">
		                            </div>
		                        </div>

		                        <!-- Form Group (email address)-->
		                        <div class="mb-4">
		                            <label class="small mb-1" for="inputLocation">Address</label>
		                            <input class="form-control" id="inputLocation" type="text" name="address" placeholder="Enter your location" value="<?= $this->auth_user->address;?>">
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