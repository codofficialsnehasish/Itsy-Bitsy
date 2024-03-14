<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!---------------------main section---------------------->
<section class="cart-page">
		<div class="container py-5">
		    <div class="row d-flex justify-content-center my-4">
		      	<div class="col-md-8">
		        	<div class="card mb-4">
		          		<div class="card-header py-3">
		           			<h5 class="mb-0"><?= !empty($cartitems)?count($cartitems):0;?> Cart item(s)</h5>
		          		</div>
		          		<div class="card-body">
                            <?php 
                            if(!empty($cartitems)):
								$total =0;
								$totalshippinhg= 0;			
                                foreach($cartitems as $item):
                                $product = $this->product_model->get_product_by_id($item->product_id);
                                $appended_variations = $this->cart_model->get_selected_variations($product->id)->str;
                                if(!empty($item->variations) || $item->variations!='' || $item->variations!=null){
                                    $cartvariations=explode(',',$item->variations);
                                }else{
									$cartvariations[]="";
								}
								array_filter($cartvariations);
								//print_r(array_filter($cartvariations));
                                $object=$this->cart_model->get_product_price_and_stock($product,$cartvariations,$item->quantity);
                            ?>
                            <div class="card p-2 mb-3">
		            		<!-- Single item -->
		            		<div class="row align-items-center">
		              			<div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
		                			<!-- Image -->
		                			<div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
		                  				<img src="<?= get_product_main_image($product);?>" class="w-100 cart-p-img" alt="Blue Jeans Jacket" />
		                  				<a href="<?= base_url('product/'.$product->slug);?>">
		                    				<div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
		                  				</a>
		                			</div>
		                			<!-- Image -->
		              			</div>
		              			<div class="col-lg-5 col-md-5 mb-4 mb-lg-0 pd-des-incart">
		                			<!-- Data -->
					                <p class="mb-0"><a href="<?= base_url('product/'.$product->slug);?>"><strong><?= $product->title;?></strong></a></p>
                                    <?php if(!empty($item->variations)){
                                    
                                        foreach($cartvariations as $cvariation){
                                           $variations = $this->variation_model->get_variation_option($cvariation);
                                            ?>
					                <p class="mb-0"><?= select_value_by_id('variations','id',$variations->variation_id,'label_names');?>: <?= $variations->option_names;?></p>
                                    <?php 
                                        }
                                    }
                                    ?>
					                <!-- Price -->
					                <p class="text-start mb-0">
					                  	<strong><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $object->price_calculated;?></strong>
					                </p>
                                    
                                    <p class="text-start mb-0">
                                    <?php $totalshippinhg+= round($item->total_delevery_charge);?>
					                  	<strong>Shipping Cost: <?= select_value_by_id('currencies','id',62,'hex').' '.$item->total_delevery_charge;?></strong>
					                </p>
					                <!-- Price -->
		              			</div>
								<!-- Quantity -->
								  <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
		                			<div class="d-flex mb-4 " style="max-width: 300px;justify-content: space-between;">
									<div class="d-block position-relative count-input cartQuantity clearfix ">
                     						<a class="position-absolute border-right text-center incr-btn minus" data-dir="dwn" data-cart-item-id="<?= $item->id;?>" data-product-id="<?= $item->product_id;?>">-</a>
                     						<input name="product_quantity" id="cart<?= $item->id;?>" data-cart-item-id="<?= $item->id;?>" data-product-id="<?= $item->product_id;?>" class="form-control text-center quantity" value="<?= $item->quantity;?>" type="text"> 
                     						<a class="position-absolute border-left text-center incr-btn plus" data-dir="up" data-cart-item-id="<?= $item->id;?>" data-product-id="<?= $item->product_id;?>"> +</a>
                     				</div> 
					                  	<!-- <div class="d-flex mb-4">
					                  		<button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
						                    	<i class="fa fa-minus"></i>
						                  	</button>
						                  	<div class="form-outline position-relative">
							                    <label class="form-label" for="form1">Quantity</label>
							                    <input id="cartQuantity" min="0" name="quantity" value="<?= $item->quantity;?>" data-product-id="<?= $item->product_id;?>" data-cart-item-id="<?= $item->id;?>" type="number" class="form-control cartQuantity" />
						                  	</div>
						                  	<button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
						                    	<i class="fa fa-plus"></i>
						                  	</button>
					                  	</div> -->
					                  	<div>					                  		
							                <button type="button" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item" onclick="remove_from_cart('<?= $item->id; ?>','cart');">
							                  	<i class="fa fa-trash"></i>
							                </button>
					                  	</div>
					                </div>
					                <!-- Quantity --> 
		              			</div>
		           	 		</div>
		            		<!-- Single item -->
							</div>
                             <?php 
							 unset($cartvariations);
							 $total += (int)$object->price_calculated * (int)$item->quantity;
							// $total+=$price;
							$currency=select_value_by_id('currencies','id',$product->currency_code,'hex');
                              endforeach;  else:  
                              ?>
                                <div class="row">
		              			<div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
					                <p class="text-center">No Items in Cart</p>
		              			</div>
		           	 		</div>
                            <?php endif;?>
		            		
		            		
		          		</div>
		        	</div>
		      	</div>
		      	<div class="col-md-4">
		        	<div class="card mb-4">
		          		<div class="card-header py-3">
		            		<h5 class="mb-0">Summary</h5>
		          		</div>
				        <div class="card-body">
				            <ul class="list-group list-group-flush">
				              	<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
				                Price <?= !empty($cartitems)?count($cartitems):0;?> Item(s)
				                	<span><?= formatted_price($cart_total->subtotal, $cart_total->currency);?></span>
				              	</li>
				              	<li class="list-group-item d-flex justify-content-between align-items-center px-0">
				                Shipping
				                	<span><?= !empty($totalshippinhg)?formatted_price($totalshippinhg, $cart_total->currency):0;?></span>
                                    <!-- <span><?= $cart_total->shipping_cost!=0?$cart_total->currency.' ':'';?><?= $cart_total->shipping_cost==0?'Free':formatted_price($cart_total->shipping_cost, $cart_total->currency);?></span> -->
				              	</li>
									 <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
					              <!--  <div>
					                  	<strong>GST</strong>
					                </div>
					                <span><strong>
									<?php //echo formatted_price($cart_total->gst, $cart_total->currency);?>

									</strong></span>
                                    -->
				              	</li>
				              	<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
					                <div>
					                  	<strong>Total Amount </strong>
					                  	
					                </div>
					                <span><strong>
									<?= formatted_price($cart_total->total, $cart_total->currency);?>
									</strong></span>
				              	</li>
				            </ul>
				            <button type="button" class="btn w-100 go-checkout goCheckout">
				              	Checkout
				            </button>
		          		</div>
		        	</div>

			        <div class="card mb-4">
			          	<div class="card-body">
				            <p><strong>Expected shipping delivery</strong></p>
				            <p class="mb-0">4-5 working days</p>
			          	</div>
			        </div>
		      	</div>
		    </div>
		</div>
	</section>
