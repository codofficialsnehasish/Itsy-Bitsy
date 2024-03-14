<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
		           <?php $this->load->view('auth/buyer/_profileImage');?>

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
                                <li><a class="nav-link" href="<?= base_url('my-dashboard/address')?>">Addresses</a></li>
								<li><a class="nav-link active" >Wishlist</a></li>
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
			                	<span>Wishlist Item</span>
			                	<!-- <span><a href="edit-profile.html" class="btn btn-info text-white">Edit Profile</a></span> -->
			                </div>
		                </div>
			            <div class="card-body tab-content dashboard-content">
			            	
                            <!-------------address------------>
                            <div id="address" class="address tab-pane active show">
                                <!-- <h3>wISHLIST</h3> -->
                                <div class="row">
				
								<div class="col-lg-12">
                           		 	<?php 
										if(!empty($allproducts)): 
										foreach($allproducts as $product):						
									?>
									<div class="product-content">
										<div class="row align-items-center" style="margin-bottom: 20px;">
                    						<div class="col-sm-2">
                    							<div class="product-image">
                            						<a href="<?= base_url('product/'.$product->slug);?>"><img src="<?= get_product_main_image($product);?>" alt=""></a>
                                				</div>
                            				</div>
                        					<div class="col-sm-6">
                    							<div class="product-details text-center">
                            						<div class="p-code"><?= $product->sku;?></div>
                            						<div class="p-name yeseva"><?= $product->title;?></div> <!-- word_limiter($product->title,2) -->
                            						<div class="p-price"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $product->price;?></div>
                        						</div>
                    						</div>
                            				<div class="col-sm-4">
                            					<a href="<?= base_url('product/'.$product->slug);?>" class="product-btn">View Details <i class="zmdi zmdi-open-in-new"></i></a>                                   
												<button type="button" class="btn btn-danger btn-lg " data-mdb-toggle="tooltip" title="Remove item" onclick="add_wishlist(<?= $product->id ?>)">
							    					<i class="fa fa-trash"></i>
							    				</button>
                            				</div>
                    					</div>
									</div>
									<?php 
										endforeach;
										endif;
									?>
								</div>
							</div>
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

