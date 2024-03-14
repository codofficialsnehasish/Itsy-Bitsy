<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
		            <div class="card mb-4 mb-xl-0">
		                <div class="card-header">Profile Picture</div>
		                <div class="card-body text-center">
		                    <!-- Profile picture image-->
								<?php
									if($this->auth_user->user_type=='facebook'){
                                    $imgUrl = $this->auth_user->fb_image;
                                    }elseif($this->auth_user->user_type=='google'){
                                    $imgUrl = $this->auth_user->google_image;
                                    }else{
                                    $imgUrl = get_image($this->auth_user->user_image);
                                    }
								?>
		                    <img class="img-account-profile rounded-circle mb-2" src="<?= $imgUrl;?>" alt="">
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
                                <li><a class="nav-link" data-bs-toggle="tab" href="#dashboard">Dashboard</a></li>
                                <li><a class="nav-link"  href="<?= base_url("orders"); ?>">Orders</a></li>
                                <li><a class="nav-link"  href="<?= base_url('my-dashboard/address')?>">Addresses</a></li>
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
			                	<span>Account Details</span>
			                	<span><a href="<?= base_url('settings')?>" class="btn btn-info text-white">Edit Profile</a></span>
			                </div>
		                </div>
			            <div class="card-body tab-content dashboard-content">
			            	<div id="dashboard" class="tab-pane fade active show">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your
                                    <a class="text-decoration-underline" href="<?= base_url('orders')?>">recent orders</a>, manage your
                                    <a class="text-decoration-underline" href="<?= base_url('my-dashboard/address')?>">shipping and billing addresses</a> and
                                    <a class="text-decoration-underline" href="<?= base_url('settings')?>">edit your account details.</a>
                                </p>
                                <div class="row user-profile mt-4">
                                    <div class="col-12 col-lg-12">
                                        <ul class="profile-order mt-3 mt-lg-0">
                                            <li>
                                                <h3 class="mb-1"><?= get_any_orders_count($this->user_id,'all');?></h3>
                                                All Orders
                                            </li>
                                            <li>
                                                <h3 class="mb-1"><?= get_any_orders_count($this->user_id,1);?></h3>
                                                Order Completed 
                                            </li>
                                            <li>
                                                <h3 class="mb-1"><?= get_any_orders_count($this->user_id,2);?></h3>
                                                Cancelled Orders
                                            </li>
                                            <li>
                                                <h3 class="mb-1"><?= get_any_orders_count($this->user_id,'pending');?></h3>
                                                Active Orders
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-------------order------------->
                            <div id="orders" class="product-order tab-pane fade">
                                <h3>Orders</h3>
                                <div class="table-responsive order-table">
                                    <!-- <table class="table table-bordered table-hover align-middle text-center mb-0">
                                        <thead class="alt-font">
                                            <tr>
                                                <th>Order</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Long Sleeve T-shirts</td>
                                                <td>March 04, 2021</td>
                                                <td class="text-success">Completed</td>
                                                <td>$165.00 for 1 item </td>
                                                <td><a class="link-underline view" href="cart-style1.html">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Floral Crop Top</td>
                                                <td>May 19, 2021</td>
                                                <td class="text-success">Completed</td>
                                                <td>$150.00 for 1 item </td>
                                                <td><a class="link-underline view" href="cart-style1.html">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Bodysuit Black</td>
                                                <td>June 24, 2021</td>
                                                <td class="text-danger">Processing</td>
                                                <td>$190.00 for 2 item </td>
                                                <td><a class="link-underline view" href="cart-style1.html">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Hoodie Sweatshirt</td>
                                                <td>July 28, 2021</td>
                                                <td class="text-danger">Processing</td>
                                                <td>$170.00 for 1 item </td>
                                                <td><a class="link-underline view" href="cart-style1.html">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                                <table class="table table-bordered table-hover align-middle text-center mb-0">
                                    <thead class="alt-font">
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Options</th>

                                    </tr>
                                    </thead>
                                        <tbody>
                                        <?php if (!empty($orders)): ?>
                                            <?php foreach ($orders as $order): ?>
                                                <tr>
                                                    <td>#<?php echo $order->order_number; ?></td>
                                                    <td><?php echo formatted_price($order->price_total, $order->price_currency,false); ?></td>
                                                    <td class="<?= $order->payment_status == 'payment_received'?'text-success':'text-danger';?>">
                                                        <?php if ($order->payment_status == 'payment_received'):
                                                            echo get_order_status("payment_received");
                                                        else:
                                                            echo get_order_status("awaiting_payment");
                                                        endif; ?>
                                                    </td>
                                                    <td class="<?= $order->payment_status == 'payment_received'?'text-success':'text-danger';?>">
                                                    
                                                            <?php if ($order->payment_status == 'awaiting_payment'):
                                                                if ($order->payment_method == 'Cash On Delivery') {
                                                                    echo get_order_status("order_processing");
                                                                } else {
                                                                    echo get_order_status("awaiting_payment");
                                                                }
                                                            else:
                                                                if ($order->status == 1):
                                                                    echo get_order_status("completed");
                                                                else:
                                                                    echo get_order_status("order_processing");
                                                                endif;
                                                            endif; ?>
                                                        
                                                    </td>
                                                    <td><?php echo formatted_date($order->created_at); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("order-details") . "/" . $order->order_number; ?>"  class="link-underline view">Details</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
							</table>
                            <?php if (empty($orders)): ?>
							<p class="text-center">
								No Records Found
							</p>
						     <?php endif; ?>
                                </div>
                            </div>
                            <!-------------address------------>
                            <div id="address" class="address tab-pane">
                                <h3>Addresses</h3>
                                <p class="xs-fon-13 margin-10px-bottom">The following addresses will be used on the checkout page by default.</p>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <h4 class="billing-address">Shipping address</h4>
                                        <a class="link-underline view btn btn-info text-white" href="#">Edit</a>
                                        <?= shipping_address();?>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <h4 class="billing-address">Billing address</h4>
                                        <a class="link-underline view btn btn-info text-white" href="#">Edit</a>
                                        <?= billing_address();?>
                               </div>
                                    <div class="accordion add-address mt-3" id="address1">
                                        <button class="collapsed btn rounded sjkgjhgk" type="button" data-bs-toggle="collapse" data-bs-target="#shipping" aria-expanded="false" aria-controls="shipping">Add Address</button>
                                        <div id="shipping" class="accordion-collapse collapse" data-bs-parent="#address">
                                            <form class="address-from mt-3" method="post" action="#">
                                                <fieldset>
                                                    <h2 class="login-title mb-3">Shipping details</h2>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-firstname1" class="d-none">First Name <span class="required-f">*</span></label>
                                                            <input name="firstname" placeholder="First Name" value="" id="input-firstname1" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-lastname1" class="d-none">Last Name <span class="required-f">*</span></label>
                                                            <input name="lastname" placeholder="Last Name" value="" id="input-lastname1" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-email1" class="d-none">Email <span class="required-f">*</span></label>
                                                            <input name="email" placeholder="Email" value="" id="input-email1" type="email" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-telephone1" class="d-none">Telephone <span class="required-f">*</span></label>
                                                            <input name="telephone" placeholder="Telephone" value="" id="input-telephone1" type="tel">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-company1" class="d-none">Company</label>
                                                            <input name="company" placeholder="Company" value="" id="input-company1" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-address-11" class="d-none">Address <span class="required-f">*</span></label>
                                                            <input name="address_1" placeholder="Address" value="" id="input-address-11" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-address-21" class="d-none">Apartment <span class="required-f">*</span></label>
                                                            <input name="address_2" placeholder="Apartment" value="" id="input-address-21" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-city1" class="d-none">City <span class="required-f">*</span></label>
                                                            <input name="city" placeholder="City" value="" id="input-city1" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-postcode1" class="d-none">Post Code <span class="required-f">*</span></label>
                                                            <input name="postcode" placeholder="Post Code" value="" id="input-postcode1" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <label for="input-country1" class="d-none">Country <span class="required-f">*</span></label>
                                                            <select name="country_id" id="input-country1">
                                                                <option value="">Select Country</option>
                                                                <option value="244">Aaland Islands</option>
                                                                <option value="1">Afghanistan</option>
                                                                <option value="2">Albania</option>
                                                                <option value="3">Algeria</option>
                                                                <option value="4">American Samoa</option>
                                                                <option value="5">Andorra</option>
                                                                <option value="6">Angola</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                            <label for="input-zone1" class="d-none">Region / State <span class="required-f">*</span></label>
                                                            <select name="zone_id" id="input-zone1">
                                                                <option value="">Select Region / State</option>
                                                                <option value="3513">Aberdeen</option>
                                                                <option value="3514">Aberdeenshire</option>
                                                                <option value="3515">Anglesey</option>
                                                                <option value="3516">Angus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn rounded mt-1 sjkgjhgk"><span>Add Address</span></button>
                                                </fieldset>
                                            </form>
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

