<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-3">
		            <!-- Profile picture card-->
                    <?php $this->load->view("order/_order_tabs"); ?>
		           
		        </div>
		         <div class="col-xl-9">
		            <!-- Account details card-->
		            <div class="card mb-4 ">
		                <div class="card-header">
		                	<div class="d-flex justify-content-between align-items-center">
			                	<span><?= $title;?></span>
			                </div>
		                </div>
			            <div class="card-body tab-content dashboard-content">
			            
                            <!-------------order------------->
                            <div id="orders" class="product-order">
                            <div class="order-details-container">
                    <div class="order-head">
                        <h2 class="title">Order Number:&nbsp;#<?= $order->order_number; ?></h2>
                    </div>
                    <div class="order-body">
                        <div class="row">
                            <div class="col-12 card p-3 mb-4">
                                <div class="row order-row-item">
                                    <div class="col-6">
                                        Status
                                    </div>
                                    <div class="col-6">
                                        <?php if ($order->status == 1): ?>
                                            <strong>Completed</strong>
                                        <?php else: ?>
                                            <strong>Processing</strong>
                                        <?php endif; ?>

                                        <!-- <a href="<?php //base_url(); ?>invoice/<?php //$order->order_number; ?>" target="_blank" class="btn btn-sm btn-info btn-sale-options text-white btn-view-invoice"><i class="icon-text-o"></i>&nbsp;View Invoice</a> -->
                                    </div>
                                </div>
                                <div class="row order-row-item">
                                    <div class="col-6">
                                        Payment Status
                                    </div>
                                    <div class="col-6">
                                        <?= get_order_status($order->payment_status); ?>

                                        <?php if ($order->payment_method == "Bank Transfer" && $order->payment_status == "awaiting_payment"):

                                            if (isset($last_bank_transfer)):?>
                                                <?php if ($last_bank_transfer->status == "pending"): ?>
                                                    <span class="text-info">(Pending)</span>
                                                <?php elseif ($last_bank_transfer->status == "declined"): ?>
                                                    <span class="text-danger">(Declined)</span>
                                                    <button type="button" class="btn btn-sm btn-secondary color-white m-l-15" data-toggle="modal" data-target="#reportPaymentModal">Report Bank Transfer</button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-secondary color-white m-l-15" data-toggle="modal" data-target="#reportPaymentModal">Report Bank Transfer</button>
                                            <?php endif; ?>


                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row order-row-item">
                                    <div class="col-6">
                                    Payment Method
                                    </div>
                                    <div class="col-6">
                                        <?php
                                        if ($order->payment_method == "Bank Transfer") {
                                            echo 'Bank Transfer';
                                        } elseif ($order->payment_method == "Cash On Delivery") {
                                            echo 'Cash on Delivery';
                                        } else {
                                            echo $order->payment_method;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row order-row-item">
                                    <div class="col-6">
                                    Date
                                    </div>
                                    <div class="col-6">
                                        <?= formatted_date($order->created_at); ?>
                                    </div>
                                </div>
                                <div class="row order-row-item">
                                    <div class="col-6">
                                    Updated
                                    </div>
                                    <div class="col-6">
                                        <?= time_ago($order->updated_at); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $shipping = get_order_shipping($order->id);
                        if (!empty($shipping)):?>
                            <div class="row shipping-container">
                                <div class="col-md-12 col-lg-6 m-b-sm-15">
                                    <h3 class="block-title">Shipping Address</h3>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            First Name
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_first_name; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                           Last Name
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_last_name; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Email
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_email; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Phone Number
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_phone_number; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Address&nbsp;1
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_address_1; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Address&nbsp;2
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_address_2; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Country
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_country; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                           State
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_state; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            City
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_city; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Pincode
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->shipping_zip_code; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <h3 class="block-title"><?= trans("billing_address"); ?></h3>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            First Name
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_first_name; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                        Last Name
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_last_name; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Email
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_email; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                           Phone Number
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_phone_number; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                           Address&nbsp;1
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_address_1; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                        Address&nbsp;2
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_address_2; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Country
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_country; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            State
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_state; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            City
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_city; ?>
                                        </div>
                                    </div>
                                    <div class="row shipping-row-item">
                                        <div class="col-5">
                                            Pincode
                                        </div>
                                        <div class="col-7">
                                            <?= $shipping->billing_zip_code; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php $is_order_has_physical_product = false; ?>
                        <div class="row table-orders-container">
                            <div class="col-6 col-table-orders">
                                <h3 class="block-title">Products</h3>
                            </div>
                            <div class="col-12 card p-3 mb-4">
                                <div class="table-responsive">
                                    <table class="table table-orders table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Updated</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($order_products as $item):
                                            if ($item->product_type == 'physical') {
                                                $is_order_has_physical_product = true;
                                            } ?>
                                            <tr>
                                                <td style="width: 40%">
                                                    <div class="table-item-product">
                                            			<div style="display: inline-flex;">            
                                            				<div class="left">
                                                            	<div class="img-table">
                                                                	<a href="<?= base_url('product/'.$item->product_slug); ?>" target="_blank">
                                                                    	<img src="<?= get_product_image_by_id($item->product_id); ?>" data-src="" alt="" class="lazyload img-responsive post-image" style="width:80px;"/>
                                                                	</a>
                                                            	</div>
                                                        	</div>
                                                        	<div class="right p-2">
                                                            	<small>
                                            					<a href="<?= base_url('product/'.$item->product_slug); ?>" target="_blank" class="table-product-title">
                                                                	<?= html_escape($item->product_title); ?>
                                                            	</a>
                                            					</small>
                                                        	</div>
                                            			</div>
                                            			<div class="right">
                                                            <p class="m-b-10 row ">
                                                                <span class="w-50">Seller:</span>
                                                                <?php $seller = get_user($item->seller_id); ?>
                                                                <?php if (!empty($seller)): ?>
                                                                    <a href="<?= base_url($seller->slug); ?>" target="_blank" class="table-product-title w-50 text-end">
                                                                        <strong class="font-600"><?= $this->settings->application_name?><?php //get_shop_name($seller); ?></strong>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </p>
                                                            <p class="m-b-10 row ">
                                                                <span class="span-product-dtl-table w-50">Unit Price:</span>
                                                                <span class="w-50 text-end"><?= price_formatted($item->product_unit_price, $item->product_currency,0); ?></span>
                                                            </p>
                                                            <p class="m-b-10 row ">
                                                                <span class="span-product-dtl-table w-50">Quantity:</span>
                                                                <span class="w-50 text-end"><?= $item->product_quantity; ?></span>
                                                            </p>
                                                            <?php if ($item->product_type == 'physical'): ?>
                                                                <p class="m-b-10 row ">
                                                            		<span class="span-product-dtl-table w-50">Shipping:</span>
                                                                    <span class="w-50 text-end"><?= price_formatted($item->product_shipping_cost, $item->product_currency,0); ?></span>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item->product_vat)): ?>
                                                                <p class="m-b-10 row ">
                                                            		<span class="span-product-dtl-table w-50">GST&nbsp;(<?= $item->product_vat_rate; ?>%):</span>
                                                                    <span class="w-50 text-end"><?= price_formatted($item->product_vat, $item->product_currency,0); ?></span>
                                                                </p>
                                                                <p class="m-b-10 row ">
                                                                    <span class="span-product-dtl-table w-50">Total:</span>
                                                                    <span class="w-50 text-end"><?= price_formatted($item->product_total_price, $item->product_currency,0); ?></span>
                                                                </p>
                                                            <?php else: ?>
                                                                <p class="m-b-10 row ">
                                                            		<span class="span-product-dtl-table w-50">Total:</span>
                                                                    <span class="w-50 text-end"><?= price_formatted($item->product_total_price, $item->product_currency,0); ?></span>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 20%">
                                                    <strong class="no-wrap"><?= get_order_status($item->order_status); ?></strong>
                                                </td>
                                                <td style="width: 15%;">
                                                    <?php if ($item->product_type == 'physical') {
                                                        echo time_ago($item->updated_at);
                                                    } ?>
                                                </td>
                                                <td style="width: 25%;">
                                                   
                                                    <?php if ($item->order_status != "completed" && $item->order_status != "cancelled"): ?>
                                                    <a href="javascript:void(0);"  class="btn btn-sm btn-danger  text-white btn-view-invoice" onclick="cancelOrder(<?= $item->id;?>,<?= $order->order_number; ?>,'order-detailss');"><i class="icon-text-o"></i>&nbsp;Cancel</a>
                                                   <?php endif; ?>
                                                     <?php if ($item->order_status == "shipped"): ?>
                                                      <!--  <button type="submit" class="btn btn-sm btn-custom" onclick="approve_order_product('<?= $item->id; ?>','<?= "Are you sure you want to confirm this order?"; ?>');"><i class="icon-check"></i>Confirm Order Received</button>
                                                        <small class="text-confirm-order-table">Confirm if you have received your order.</small> -->
                                                    <?php elseif ($item->order_status == "completed"): ?>
                                                   <!-- <a href="<?= base_url(); ?>invoice/<?= $order->order_number.'/'.$item->order_id.'/'. $item->product_id.'/'. $item->buyer_id; ?>" target="_blank" class="btn btn-sm btn-info btn-sale-options text-white btn-view-invoice"><i class="icon-text-o"></i>&nbsp;View Invoice</a> -->
                                                   <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= base_url(); ?>invoice/<?= $order->order_number.'/'.$item->order_id.'/'. $item->product_id.'/'. $item->buyer_id; ?>', title: 'Invoise', w: 1000, h: 600});"  class="btn btn-sm btn-info btn-sale-options text-white btn-view-invoice"><i class="fa fa-file-invoice"></i>&nbsp;View Invoice</a>
                                                        <?php if ($item->product_type == 'digital'):
                                                            $digital_sale = get_digital_sale_by_order_id($item->buyer_id, $item->product_id, $item->order_id);
                                                            if (!empty($digital_sale)):?>
                                                                <div class="row-custom">
                                                                    <?= form_open('download-purchased-digital-file-post'); ?>
                                                                    <input type="hidden" name="sale_id" value="<?= $digital_sale->id; ?>">
                                                                    <div class="btn-group btn-group-download m-b-15">
                                                                        <button type="button" class="btn btn-md btn-custom dropdown-toggle" data-toggle="dropdown">
                                                                            <i class="icon-download-solid"></i><?= trans("download"); ?>&nbsp;&nbsp;<i class="icon-arrow-down m-0"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <button name="submit" value="main_files" class="dropdown-item"><?= trans("main_files"); ?></button>
                                                                            <button name="submit" value="license_certificate" class="dropdown-item"><?= trans("license_certificate"); ?></button>
                                                                        </div>
                                                                    </div>
                                                                    <?= form_close(); ?>
                                                                </div>
                                                            <?php endif;
                                                        endif; ?>

                                                        <?php if ($this->general_settings->reviews == 1 && $item->seller_id != $item->buyer_id): ?>
                                                            <div class="row-custom">
                                                                <div class="rate-product">
                                                                    <p class="p-rate-product"><?= trans("rate_this_product"); ?></p>
                                                                    <div class="rating-stars">
                                                                        <?php $review = get_review($item->product_id, $this->auth_user->id); ?>
                                                                        <label class="label-star label-star-open-modal" data-star="5" data-product-id="<?= $item->product_id; ?>" data-toggle="modal" data-target="#rateProductModal"><i class="<?= (!empty($review) && $review->rating >= 5) ? 'icon-star' : 'icon-star-o'; ?>"></i></label>
                                                                        <label class="label-star label-star-open-modal" data-star="4" data-product-id="<?= $item->product_id; ?>" data-toggle="modal" data-target="#rateProductModal"><i class="<?= (!empty($review) && $review->rating >= 4) ? 'icon-star' : 'icon-star-o'; ?>"></i></label>
                                                                        <label class="label-star label-star-open-modal" data-star="3" data-product-id="<?= $item->product_id; ?>" data-toggle="modal" data-target="#rateProductModal"><i class="<?= (!empty($review) && $review->rating >= 3) ? 'icon-star' : 'icon-star-o'; ?>"></i></label>
                                                                        <label class="label-star label-star-open-modal" data-star="2" data-product-id="<?= $item->product_id; ?>" data-toggle="modal" data-target="#rateProductModal"><i class="<?= (!empty($review) && $review->rating >= 2) ? 'icon-star' : 'icon-star-o'; ?>"></i></label>
                                                                        <label class="label-star label-star-open-modal" data-star="1" data-product-id="<?= $item->product_id; ?>" data-toggle="modal" data-target="#rateProductModal"><i class="<?= (!empty($review) && $review->rating >= 1) ? 'icon-star' : 'icon-star-o'; ?>"></i></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php if (!empty($item->shipping_tracking_number)): ?>
                                            <tr class="tr-shipping">
                                                <td colspan="4">
                                                    <div class="order-shipping-tracking-number">
                                                        <p><strong>Shipping</strong></p>
                                                        <p>Tracking Number:&nbsp;<?= html_escape($item->shipping_tracking_number); ?></p>
                                                        <p>Url: <a href="<?= html_escape($item->shipping_tracking_url); ?>" target="_blank" class="link-underlined"><?= html_escape($item->shipping_tracking_url); ?></a></p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tr-shipping-seperator">
                                                <td colspan="4"></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 card p-3">
                                <div class="order-total">
                                    <div class="row">
                                        <div class="col-6 col-left ps-3">
                                            Subtotal
                                        </div>
                                        <div class="col-6 col-right text-end pe-3">
                                            <strong class="font-600"><?= formatted_price($order->price_subtotal, $order->price_currency,0); ?></strong>
                                        </div>
                                    </div>
                                    <?php if (!empty($order->price_gst)): ?>
                                        <div class="row">
                                            <div class="col-6 col-left ps-3">
                                               GST
                                            </div>
                                            <div class="col-6 col-right text-end pe-3">
                                                <strong class="font-600"><?= formatted_price($order->price_gst, $order->price_currency,0); ?></strong>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($is_order_has_physical_product): ?>
                                        <div class="row">
                                            <div class="col-6 col-left ps-3">
                                               Shipping
                                            </div>
                                            <div class="col-6 col-right text-end pe-3">
                                                <strong class="font-600"><?= formatted_price($order->price_shipping, $order->price_currency,0); ?></strong>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row-seperator"></div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-6 col-left ps-3">
                                          Total
                                        </div>
                                        <div class="col-6 col-right text-end pe-3">
                                            <strong class="font-600"><?= formatted_price($order->price_total, $order->price_currency,0); ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($shipping)): ?>
                    <p class="text-confirm-order">*When you receive your order, please check the products you have purchased. If there is not any problem, click 'Confirm Order Received' button. After confirming your order, the money will be transferred to the seller.</p>
                <?php endif; ?>
                              
                            </div>
                            <!-------------address------------>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
</section>


<script>
	const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;
    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )
    if (window.focus) newWindow.focus();
    newWindow.print();
}
</script>
