<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
		           <?php $this->load->view('auth/seller/_profileImage');?>
		            <div class="card mt-4 mb-4 mb-xl-0">
		                <div class="card-header">Profile </div>
		                <div class="card-body">
							<ul class="nav flex-column bg-light h-100 dashboard-list" role="tablist">
                                <li><a class="nav-link" data-bs-toggle="tab" href="#dashboard">Dashboard</a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#products">Products</a></li>
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
                                <!--  <h3>Dashboard </h3>
                              <p>From your account dashboard. you can easily check &amp; view your
                                    <a class="text-decoration-underline" href="#">recent orders</a>, manage your
                                    <a class="text-decoration-underline" href="#">shipping and billing addresses</a> and
                                    <a class="text-decoration-underline" href="#">edit your password and account details.</a>
                                </p> -->
                                <div class="table-responsive order-table">                                	
                                	<h3>Shop Details</h3>
                                	<table class="table table-bordered table-hover align-middle text-center mb-3">
                                        <thead class="alt-font">
                                            <tr>
                                                <!-- <th>Shop nameName</th> -->
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <td><= $this->auth_user->shop_name;?></td> -->
                                                <td><?= $this->auth_user->address;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                	<h3>Your Documents</h3>
                                	<table class="table table-bordered table-hover align-middle text-center mb-3">
                                        <thead class="alt-font">
                                            <tr>
                                                <th>Id Name</th>
                                                <th>Id Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>GST</td>
                                                <td><?= $this->auth_user->gst_no;?></td>
                                            </tr>
                                            <tr>
                                                <td>Pan Card</td>
                                                <td><?= $this->auth_user->pan_no;?></td>
                                            </tr>
                                             <tr>
                                                <td>Aadhar Card Number</td>
                                                <td><?= $this->auth_user->aadhar_no;?></td>
                                            </tr>
                                            <tr>
                                                <td>Voter Id Number</td>
                                                <td><?= $this->auth_user->voter_no;?></td>
                                            </tr>
                                             <tr>
                                                <td>Trade Licence Number</td>
                                                <td><?= $this->auth_user->trade_licence_no;?></td>
                                            </tr>
                                             
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row user-profile mt-4">
                                    <div class="col-12 col-lg-12">
                                        <ul class="profile-order mt-3 mt-lg-0">
                                            <li>
                                                <h3 class="mb-1"><?= !empty($allproducts)?count($allproducts):0;?></h3>
                                                All Products
                                            </li>
                                            <li>
                                                <h3 class="mb-1"><?= !empty($livedproducts)?count($livedproducts):0;?></h3>
                                                Listing products
                                            </li>
                                            <li>
                                                <h3 class="mb-1">0</h3>
                                                Out of Stock
                                            </li>
                                            <li>
                                                <h3 class="mb-1">0</h3>
                                                Ongoing Orders
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-------------order------------->
                            <div id="products" class="product-order tab-pane fade address">
                                <h3>Orders</h3>
                                <div class="table-responsive order-table">
                                    <table class="table table-bordered table-hover align-middle text-center mb-0">
                                        <thead class="alt-font">
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($allproducts)):
                                            $sl=1;
                                                foreach($allproducts as $product):
                                                 $product_images=$this->select->select_single_data('product_images','product_id',$product->id);
                                                ?>
                                            <tr>
                                                <td><?= $sl++;?></td>
                                                <td><?= $product->title?></td>
                                                <td class="seller-p-img">
                                                	<div class="row m-0">
                                                    <?php
                                                        if(!empty($product_images)){ 
                                                            foreach($product_images as $pimg):?>
                                                            <img src="<?= get_product_image($pimg->media_id);?>" alt="Text" />
                                                            <?php endforeach;
                                                        }
                                                    ?>
	                                                </div>
	                                            </td>
                                                <td class="text-success"> <?= check_visibility($product->is_visible);?></td>
                                                <td><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?><?= $product->price?> for 1 item </td>
                                                <td><a target="_blank" class="link-underline view" href="<?= base_url('admin/products/edit/'.$product->id);?>">View</a></td>
                                            </tr>
                                          <?php 
                                            endforeach;
                                        endif;?>
                                        </tbody>
                                    </table>
                                    <div class="accordion add-address mt-3" >
                                    <a  href="<?= admin_url('products/add-new')?>" class="btn rounded mt-1 sjkgjhgk" target="_blank"><span>Add Product</span></a>
                                        <!-- <div id="addproducts" class="accordion-collapse collapse" data-bs-parent="#products">
                                            <form class="address-from mt-3" method="post" action="#">
                                                <fieldset>
                                                    <h2 class="login-title mb-3">Product details</h2>
                                                    <div class="row m-0">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <input name="firstname" placeholder="Product Name" value="" id="input-firstname1" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <input name="skucode" placeholder="SKU Code" value="" id="input-lastname1" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="row m-0">
                                                        <div class="form-group col-md-12">
                                                            <textarea placeholder="Product Description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <input name="address_2" placeholder="Total Price" value="" id="input-address-21" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <input name="city" placeholder="Stock Count" value="" id="input-city1" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="row m-0">
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                            <select name="country_id" id="input-country1">
                                                                <option value="">Select Category</option>
                                                                <option value="244">Aaland Islands</option>
                                                                <option value="1">Afghanistan</option>
                                                                <option value="2">Albania</option>
                                                                <option value="3">Algeria</option>
                                                                <option value="4">American Samoa</option>
                                                                <option value="5">Andorra</option>
                                                                <option value="6">Angola</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                        	<input name="city" placeholder="Upload Images" value="" id="input-city1" type="file" class=" pt-2">
                                                        </div>
                                                    </div>
													<div class="row m-0">
														<div class="form-group col-md-6 col-lg-6 col-xl-6">
															<label class="container">
																<input type="radio" name="radio">
																Lorem ipsome dummy text2
															</label>
														</div>
														<div class="form-group col-md-6 col-lg-6 col-xl-6">
															<label class="container">
																<input type="radio" name="radio" >
																Lorem ipsome dummy text1
															</label>
														</div>
													</div>
                                                    <a  href="<?= admin_url('products/add-new')?>" class="btn rounded mt-1 sjkgjhgk"><span>Add Product</span></a>
                                                </fieldset>
                                            </form>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>

