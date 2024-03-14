<div id="page-content">
	<!-- Page Title -->
	<div class="page section-header text-center">
		<div class="page-title">
			<div class="wrapper"><h1 class="page-title">Cart</h1></div>
		</div>
	</div>
	<!-- End Page Title -->

	<div class="container">
		<div class="row">
			<!-- Main Content -->
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
				<!-- <div class="alert alert-success text-uppercase" role="alert">
					<i class="icon an an-truck icon-large"></i> &nbsp;<strong>Congratulations!</strong> You've got free shipping!
				</div> -->
				<form action="#" method="post" class="cart style2">
					<table>
						<thead class="cart__row cart__header">
							<tr>
								<th colspan="2" class="text-center">Product</th>
								<th class="text-center">Price</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Total</th>
								<th class="action">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if(!empty($cartitems)):
									$total = 0;
									$totalshippinhg = 0;			
									foreach($cartitems as $item):
									$product = $this->product_model->get_product_by_id($item->product_id);
									// echo "product_id = ".$product->id;
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
							<tr class="cart__row border-bottom line1 cart-flex border-top">
								<td class="cart__image-wrapper cart-flex-item">
									<a href="<?= base_url('product/'.$product->slug);?>"><img class="cart__image blur-up lazyloaded" data-src="<?= get_product_main_image($product);?>" src="<?= get_product_main_image($product);?>"></a>
								</td>
								<td class="cart__meta small--text-left cart-flex-item">
									<div class="list-view-item__title">
										<a href="<?= base_url('product/'.$product->slug);?>"><?= $product->title;?></a>
										<?php if(!empty($item->variations)){
											foreach($cartvariations as $cvariation){
												$variations = $this->variation_model->get_variation_option($cvariation);
												?>
											<p class="mb-0"><?= select_value_by_id('variations','id',$variations->variation_id,'label_names');?>: <?= $variations->option_names;?></p>
										<?php 
											}
										}
										?>
									</div>
									<!-- <div class="cart__meta-text">
										Color: Navy<br>Size: Small<br>
									</div> -->
								</td>
								<td class="cart__price-wrapper cart-flex-item text-center">
									<span class="money"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $object->price_calculated;?></span>
								</td>
								<td class="cart__update-wrapper cart-flex-item text-center">
									<div class="cart__qty text-center">
										<div class="qtyField">
											<a class="qtyBtn minus" href="javascript:void(0);" onclick="updateCartfromcart(<?= $item->id;?>,<?= $item->product_id;?>,<?= $item->quantity;?>,'-')"><i class="icon an an-minus"></i></a>
											<input class="cart__qty-input qty" type="text" id="updatescartquantity<?= $item->id ?>" name="product_quantity" id="cart<?= $item->id;?>" value="<?= $item->quantity;?>" pattern="[0-9]*">
											<a class="qtyBtn plus" href="javascript:void(0);" onclick="updateCartfromcart(<?= $item->id;?>,<?= $item->product_id;?>,<?= $item->quantity;?>,'+')"><i class="icon an an-plus"></i></a>
										</div>
									</div>
								</td>
								<td class="small--hide cart-price text-center">
									<span class="money"><?= $object->price_calculated*$item->quantity;?></span>
								</td>
								<td class="text-center small--hide"><a href="#" class="btn btn--secondary cart__remove" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Remove item" aria-label="Remove item" onclick="remove_from_cart('<?= $item->id; ?>','cart');"><i class="icon an an-times"></i></a></td>
							</tr>
							<?php 
								unset($cartvariations);
								$total += (int)$object->price_calculated * (int)$item->quantity;
								// $total+=$price;
								$currency=select_value_by_id('currencies','id',$product->currency_code,'hex');
								endforeach;  else:  
							?>
							<div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
								<p class="text-center">No Items in Cart</p>
							</div>
							<?php endif;?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" class="text-start"><a href="<?= base_url('/products/all-products'); ?>" class="btn btn--link btn--small cart-continue"><i class="icon an an-chevron-circle-left"></i> Continue shopping</a></td>
								<td colspan="3" class="text-end">
									<?php if($this->auth_check): ?><a href="<?= base_url('cart_controller/clear_cart/'); ?><?= $this->auth_user->id; ?>" name="clear" class="btn btn--link btn--small small--hide"><i class="icon an an-times"></i> Clear Shoping Cart</button><?php endif; ?>
									<a class="btn btn--link btn--small cart-continue ml-2" onclick="window.location.reload();"><i class="icon an an-sync"></i> Update Cart</a>
								</td>
							</tr>
						</tfoot>
					</table> 
				</form>                   
			</div>
			<?php if(!empty($cartitems)): ?>
			<div class="container mt-4">
				<div class="row d-flex justify-content-center">
					<div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
						<!-- <h5>Discount Codes</h5>
						<form action="#" method="post">
							<div class="form-group">
								<label for="address_zip">Enter your coupon code if you have one.</label>
								<input type="text" name="coupon">
							</div>
							<div class="actionRow">
								<div><input type="button" class="btn btn-secondary btn--small" value="Apply Coupon"></div>
							</div>
						</form> -->
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 cart__footer">
						<div class="solid-border">  
							<div class="row border-bottom pb-2">
								<span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
								<span class="col-12 col-sm-6 text-right"><span class="money"><?= formatted_price($cart_total->subtotal, $cart_total->currency);?></span></span>
							</div>
							<div class="row border-bottom pb-2 pt-2">
								<span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
								<span class="col-12 col-sm-6 text-right">₹ 0.00</span>
							</div>
							<div class="row border-bottom pb-2 pt-2">
								<span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
								<span class="col-12 col-sm-6 text-right <?= $cart_total->shipping_cost == 0? 'text-success':'';?>" ><?= $cart_total->shipping_cost != 0 ? formatted_price($cart_total->shipping_cost, $cart_total->currency) : 'Free Shipping';?></span>
							</div>
							<div class="row border-bottom pb-2 pt-2">
								<span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
								<span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money"><?= formatted_price($cart_total->total, $cart_total->currency);?></span></span>
							</div>
							<div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
							<!-- <div class="customCheckbox cart_tearm">
								<input type="checkbox" value="allen-vela" id="1532947863384-0">
								<label for="1532947863384-0">I agree with the terms and conditions</label>
							</div> -->
							<a href="#" id="cartCheckout" class="btn btn--small-wide checkout goCheckout">Proceed To Checkout</a>
							<!-- <div class="paymnet-img"><img src="<= base_url('assets/site/images/payment-img.jpg') ?>" alt="Payment"></div>
							<p class="mt-2"><a href="#">Checkout with Multiple Addresses</a></p> -->
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!-- End Main Content -->
		</div>
	</div>
</div>