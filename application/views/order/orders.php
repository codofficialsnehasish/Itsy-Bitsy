<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
		            <!-- Profile picture card-->
					<?php $this->load->view("order/_order_tabs"); ?>
		        </div>
		         <div class="col-xl-8">
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
                               
                                <div class="table-responsive order-table">
                          
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
                                                        <a href="<?php echo base_url("order-detailss") . "/" . $order->order_number; ?>"  class="link-underline view">Details</a>
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
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
</section>

