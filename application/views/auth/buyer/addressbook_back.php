<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
		            <div class="card mb-4 mb-xl-0">
		                <div class="card-header">Profile Picture</div>
		                <div class="card-body text-center">
		                    <!-- Profile picture image-->
		                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
		                    <h2 class="mt-3 mb-0"><?= $this->auth_user->full_name;?></h2>
		                    <!-- <div class="small font-italic text-muted mb-4"><?= select_value_by_id('location_cities','id',$this->auth_user->city_id,'name');?>,<?= select_value_by_id('location_states','id',$this->auth_user->state_id,'name');?></a>,<?= select_value_by_id('location_countries','id',$this->auth_user->country_id,'name');?></div>		                     -->
		                </div>
		            </div>
		            <div class="card mt-4 mb-4 mb-xl-0">
		                <div class="card-header">Profile Picture</div>
		                <div class="card-body">
		                	<!-- <nav id="sidebarMenu" class="d-md-block bg-og-light sidebar collapse">
							    <div class="position-sticky pt-3">
							        <ul class="nav flex-column">
							          	<li class="nav-item">
							            	<a class="nav-link active" aria-current="page" href="#">
							              		<span data-feather="home"></span>
							              		Dashboard
							            	</a>
							          	</li>
							          	<li class="nav-item">
							            	<a class="nav-link" href="#">
							              		<span data-feather="file"></span>
							             	 	Orders
							            	</a>
							          	</li>
							          	<li class="nav-item">
							            	<a class="nav-link" href="#">
							              		<span data-feather="shopping-cart"></span>
							              		Logout
							            	</a>
							         	</li>
							        </ul>
							    </div>
							</nav> -->
							<ul class="nav flex-column bg-light h-100 dashboard-list" role="tablist">
                                <li><a class="nav-link"  href="<?= base_url('my-dashboard')?>">Dashboard</a></li>
                                <li><a class="nav-link"  href="<?= base_url("orders"); ?>">Orders</a></li>
                                <li><a class="nav-link active" >Addresses</a></li>
								<li><a class="nav-link" href="<?= base_url("wishlist"); ?>">Wishlist</a></li>
                                <li><a class="nav-link" href="<?= admin_url('dashboard/logout')?>">logout</a></li>
                            </ul>

		                </div>
		            </div>
		        </div>
		         <div class="col-xl-8">
		            <!-- Account details card-->
		            <div class="card mb-4 ">
		                <div class="card-header">
		                	<div class="d-flex justify-content-between align-items-center">
			                	<span>Address Details</span>
			                	<!-- <span><a href="edit-profile.html" class="btn btn-info text-white">Edit Profile</a></span> -->
			                </div>
		                </div>
			            <div class="card-body tab-content dashboard-content">
			            	
                            <!-------------address------------>
                            <div id="address" class="address tab-pane active show">
                                <h3>Addresses</h3>
                                <p class="xs-fon-13 margin-10px-bottom">The following addresses will be used on the checkout page by default.</p>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <h4 class="billing-address">Shipping address</h4>
                                      <!--    <a class="link-underline view btn btn-info text-white" href="#">Edit</a> -->
                                        <?= shipping_address();?>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <h4 class="billing-address">Billing address</h4>
                                     <!--   <a class="link-underline view btn btn-info text-white" href="#">Edit</a> -->
                                        <?= billing_address();?>
                               </div>
                                    <div class="accordion add-address mt-3" id="address1">
                                        <button class="collapsed btn rounded sjkgjhgk" type="button" data-bs-toggle="collapse" data-bs-target="#billing" aria-expanded="false" aria-controls="shipping">Add Address</button>
                                        <div id="billing" class="card mb-4  mt-5 accordion-collapse collapse" data-bs-parent="#address">
							<?= form_open_multipart('cart-controller/saveaddress', 'class="needs-validation p-3 addressbook" name="myform"  novalidate ');?>
								<div class="row g-3">
									<div class="card-header py-3">
										<h5 class="mb-0">Add New Address</h5> </div>
									<div class="col-sm-6">
										<label for="firstName" class="form-label">First name</label>
										<input type="text" name="billing_first_name" class="form-control" id="firstName" placeholder="" value="" required>
										<div class="invalid-feedback"> Valid first name is required. </div>
									</div>
									<div class="col-sm-6">
										<label for="lastName" class="form-label">Last name</label>
										<input type="text" name="billing_last_name" class="form-control" id="lastName" placeholder="" value="" required>
										<div class="invalid-feedback"> Valid last name is required. </div>
									</div>
									<div class="col-6">
										<label for="lastName" class="form-label">Phone Number</label>
										<input type="tel" name="billing_phone_number" class="form-control" id="lastName" placeholder="" value="" required>
										<div class="invalid-feedback"> Valid phone number is required. </div>
									</div>
									<div class="col-6">
										<label for="email" class="form-label">Email <span class="text-muted">(Optional)</span> </label>
										<input type="email" name="billing_email" class="form-control" id="email" placeholder="you@example.com">
										<!-- <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div> -->
									</div>
									<div class="col-12">
										<label for="address" class="form-label">Address</label>
										<input type="text" name="billing_address_1" class="form-control" id="address" placeholder="1234 Main St" required>
										<div class="invalid-feedback"> Please enter your shipping address. </div>
									</div>
									<div class="col-12">
										<label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span> </label>
										<input type="text" name="billing_address_2" class="form-control" id="address2" placeholder="Apartment or suite"> </div>
									<div class="col-md-3">
										<label for="zip" class="form-label">Pincode</label>
										<input type="text" name="billing_zip_code" class="form-control" id="zip" placeholder="" required>
										<div class="invalid-feedback"> Zip code required. </div>
									</div>
									<div class="col-sm-9">
										<label for="billinglandMark" class="form-label">Landmark(Optional)</label>
										<input type="text" name="billing_landmark" class="form-control" id="billinglandMark" placeholder="" value="" >
										<div class="invalid-feedback"> Valid Landmark is required. </div>
									</div>
									<div class="col-md-4">
										<label for="country" class="form-label">Country</label>
										<select class="form-select" name="billing_country" id="country_id" required>
											<option value="">Select Country</option>
											<?php 
									if(!empty($countries)):
										foreach($countries as $country):?>
												<option value="<?= $country->id;?>">
													<?= $country->name;?>
												</option>
												<?php 
										endforeach;
									endif;
								?>
										</select>
										<div class="invalid-feedback"> Please select a valid country. </div>
									</div>
									<div class="col-md-4">
										<label for="state" class="form-label">State</label>
										<select class="form-select" name="billing_state" id="state_id" required>
											<option value="">Choose...</option>
										</select>
										<div class="invalid-feedback"> Please provide a valid state. </div>
									</div>
									<div class="col-md-4">
										<label for="state" class="form-label">City</label>
										<select class="form-select" name="billing_city" id="city_id" required>
											<option value="">Choose...</option>
										</select>
										<div class="invalid-feedback"> Please provide a valid city. </div>
									</div>
								</div>
								<hr class="my-4">

								<!-- <hr class="my-4"> -->
								<button type="submit" class="btn go-checkout mt-1 billingButton"> <span>Add Address</span> </button>
								<!-- Shipping Address -->
						</div>
                                    </div>
                                </div>
                            </div>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>

