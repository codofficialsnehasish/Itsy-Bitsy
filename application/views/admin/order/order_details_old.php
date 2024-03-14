<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Order Details</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h4 class="sec-title">Oreder#<?php echo $order->order_number; ?></h4>
                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Status</strong>
                            </div>
                            <div class="col-sm-8">
                                <?php if ($order->status == 1): ?>
                                    <label class="label label-success">Completed</label>
                                <?php else: ?>
                                    <label class="label label-default">Processing</label>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Order Id</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right"><?php echo $order->id; ?></strong>
                            </div>
                        </div>
                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Order Number</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right"><?php echo $order->order_number; ?></strong>
                            </div>
                        </div>

                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Payment Method</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right">
                                    <?php
                                    if ($order->payment_method == "Bank Transfer") {
                                        echo "bank_transfer";
                                    } else {
                                        echo $order->payment_method;
                                    } ?>
                                </strong>
                            </div>
                        </div>
                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Currency</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right"><?php echo $order->price_currency; ?></strong>
                            </div>
                        </div>
                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Payment Status</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right"><?php echo $order->payment_status; ?></strong>
                            </div>
                        </div>

                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Updated</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right"><?php echo formatted_date($order->updated_at); ?>&nbsp;(<?php echo time_ago($order->updated_at); ?>)</strong>
                            </div>
                        </div>
                        <div class="row row-details">
                            <div class="col-xs-12 col-sm-4 col-right">
                                <strong> Date</strong>
                            </div>
                            <div class="col-sm-8">
                                <strong class="font-right"><?php echo formatted_date($order->created_at); ?>&nbsp;(<?php echo time_ago($order->created_at); ?>)</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h4 class="sec-title">Buyer</h4>
                        <?php if ($order->buyer_id == 0): ?>
                            <div class="row row-details">
                                <div class="col-xs-12">
                                    
                                </div>
                            </div>
                            <?php $shipping = get_order_shipping($order->id);
                            if (!empty($shipping)): ?>
                                <div class="row row-details">
                                    <div class="col-xs-12 col-sm-4 col-right">
                                        <strong> Buyer</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong class="font-right"><?php echo $shipping->shipping_first_name . " " . $shipping->shipping_last_name; ?> <label class="label bg-olive">Guest</label></strong>
                                    </div>
                                </div>
                                <div class="row row-details">
                                    <div class="col-xs-12 col-sm-4 col-right">
                                        <strong> Phone Number</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong class="font-right"><?php echo $shipping->shipping_phone_number; ?></strong>
                                    </div>
                                </div>
                                <div class="row row-details">
                                    <div class="col-xs-12 col-sm-4 col-right">
                                        <strong> Email</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong class="font-right"><?php echo $shipping->shipping_email; ?></strong>
                                    </div>
                                </div>
                            <?php endif; ?>


                        <?php else: ?>
                            <?php $buyer = get_user($order->buyer_id);
                            if (!empty($buyer)):?>
                                
                                <div class="row row-details">
                                    <div class="col-xs-12 col-sm-4 col-right">
                                        <strong> User Name</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong class="font-right">
                                            <a href="#" target="_blank">
                                                <?php echo html_escape($buyer->username); ?>
                                            </a>
                                        </strong>
                                    </div>
                                </div>

                                <div class="row row-details">
                                    <div class="col-xs-12 col-sm-4 col-right">
                                        <strong> Phone Number</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong class="font-right"><?php echo $buyer->phone_number; ?></strong>
                                    </div>
                                </div>

                                <div class="row row-details">
                                    <div class="col-xs-12 col-sm-4 col-right">
                                        <strong> Email</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong class="font-right"><?php echo $buyer->email; ?></strong>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $shipping = get_order_shipping($order->id);
                if (!empty($shipping)):?>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <h4 class="sec-title">Billing Address</h4>

                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> First Name</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_first_name; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Last Name</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_last_name; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Email</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_email; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Phone Number</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_phone_number; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Address 1</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_address_1; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Address 2</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_address_2; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Country</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_country; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> State</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_state; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> City</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_city; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Pincode</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->billing_zip_code; ?></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <h4 class="sec-title">Shipping Address</h4>

                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> First Name</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_first_name; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Last Name</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_last_name; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Email</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_email; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Phone Number</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_phone_number; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Address 1</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_address_1; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Address 2</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_address_2; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> Country</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_country; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> State</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_state; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> City</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_city; ?></strong>
                                </div>
                            </div>
                            <div class="row row-details">
                                <div class="col-xs-12 col-sm-4 col-right">
                                    <strong> pincode</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="font-right"><?php echo $shipping->shipping_zip_code; ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            </div><!-- /.box-body -->
        </div>
    </div>
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Products</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <!-- include message block -->
                    <div class="col-sm-12">
                        <?php $this->load->view('admin/partials/_messages'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive" id="t_product">
                            <table class="table table-bordered table-striped" role="grid">
                                <thead>
                                <tr role="row">
                                    <th>Product Id</th>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Gst</th>
                                    <th>Shipping Cost</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>updated</th>
                                    <th class="max-width-120">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $is_order_has_physical_product = false; ?>
                                <?php foreach ($order_products as $item):
                                    if ($item->product_type == 'physical') {
                                        $is_order_has_physical_product = true;
                                    } ?>
                                    <tr>
                                        <td style="width: 80px;">
                                            <?php echo html_escape($item->product_id); ?>
                                        </td>
                                        <td>
                                            <div class="img-table" style="height: 67px;">
                                                <a href="<?php echo $item->product_slug; ?>" target="_blank">
                                                    <img src="<?php echo get_product_image_by_id($item->product_id); ?>" data-src="" alt="" width="50"/>
                                                </a>
                                            </div>
                                            <p>
                                                <?php if ($item->product_type == 'digital'): ?>
                                                    <label class="label bg-black"><i class="icon-cloud-download"></i><?php echo "instant_download"; ?></label>
                                                <?php endif; ?>
                                            </p>
                                            <a href="<?php echo $item->product_slug; ?>" target="_blank" class="table-product-title">
                                                <?php echo html_escape($item->product_title); ?>
                                            </a>
                                            <p>
                                                <span>by</span>
                                                <?php $seller = get_user($item->seller_id); ?>
                                                <?php if (!empty($seller)): ?>
                                                    <a href="#" target="_blank" class="table-product-title">
                                                        <strong><?php echo html_escape($seller->shop_name); ?></strong>
                                                    </a>
                                                <?php endif; ?>
                                            </p>
                                        </td>
                                        <td><?php echo price_formatted($item->product_unit_price, $item->product_currency,false); ?></td>
                                        <td><?php echo $item->product_quantity; ?></td>
                                        <td>
                                            <?php if ($item->product_gst):
                                                echo price_formatted($item->product_gst, $item->product_currency,false); ?>&nbsp;(<?php echo $item->product_gst_rate; ?>%)
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($item->product_type == 'physical'):
                                                echo price_formatted($item->product_shipping_cost, $item->product_currency,false);
                                            endif; ?>
                                        </td>
                                        <td><?php echo price_formatted($item->product_total_price, $item->product_currency,false); ?></td>
                                        <td>
                                            <strong><?php echo $item->order_status; ?></strong>
                                            <?php if ($item->buyer_id == 0): ?>
                                                <?php if ($item->is_approved == 0): ?>
                                                    <br>
                                                    <?php echo form_open('order_admin_controller/approve_guest_order_product'); ?>
                                                    <input type="hidden" name="order_product_id" value="<?php echo $item->id; ?>">
                                                    <button type="submit" class="btn btn-xs btn-primary m-t-5">Approve</button>
                                                    <?php echo form_close(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($item->product_type == 'physical'):
                                                echo time_ago($item->updated_at);
                                            endif; ?>
                                        </td>
                                        <td>
                                            <?php if (($item->product_type == 'digital' && $item->order_status != 'completed') || $item->product_type == 'physical'): ?>
                                               
                                                <div class="dropdown">
                                           <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                           Options <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item" data-bs-placement="top" 
                                                        title="Edit this Item"  
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateStatusModal_<?= $item->id; ?>"><i class="fa fa-edit option-icon"></i>Update order Status</a>
                                              
                                              
                                               <div class="dropdown-divider"></div>
                                               <a class="" onclick="confirmDelete(this.id,'orders');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>"> <i class="fas fa-trash-alt text-danger" title="Remove"></i> Delete
                                             </a>
                                            </div>
                                        </div>
                                        <!-- <a href="javascript:void(0)" onclick="delete_item('order_admin_controller/delete_order_product_post','<?php //echo $item->id; ?>','<?php //echo trans("confirm_delete"); ?>');"><i class="fa fa-times option-icon"></i><?php //echo trans('delete'); ?></a> -->
        
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>

                            <?php if (empty($order_products)): ?>
                                <p class="text-center">
                                    <?php //echo trans("no_records_found"); ?>
                                </p>
                            <?php endif; ?>
                            <div class="col-sm-12 table-ft">
                                <div class="row">
                                    <div class="pull-right">
                                        <?php //echo $this->pagination->create_links(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
    <div class="col-sm-12">
        <div class="box-payment-total">

            <div class="row row-details">
                <div class="col-xs-12 col-sm-6 col-right">
                    <strong> Subtotal</strong>
                </div>
                <div class="col-sm-6">
                    <strong class="font-right"><?php echo price_formatted($order->price_subtotal, $order->price_currency,false); ?></strong>
                </div>
            </div>
            <?php if (!empty($order->price_vat)): ?>
                <div class="row row-details">
                    <div class="col-xs-12 col-sm-6 col-right">
                        <strong> GST</strong>
                    </div>
                    <div class="col-sm-6">
                        <strong class="font-right"><?php echo price_formatted($order->price_vat, $order->price_currency,false); ?></strong>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($is_order_has_physical_product): ?>
                <div class="row row-details">
                    <div class="col-xs-12 col-sm-6 col-right">
                        <strong> Shipping</strong>
                    </div>
                    <div class="col-sm-6">
                        <strong class="font-right"><?php echo price_formatted($order->price_shipping, $order->price_currency,false); ?></strong>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <div class="row row-details">
                <div class="col-xs-12 col-sm-6 col-right">
                    <strong> Total</strong>
                </div>
                <div class="col-sm-6">
                    <strong class="font-right"><?php echo price_formatted($order->price_total, $order->price_currency,false); ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($order_products as $item): ?>
    <!-- Modal -->
    <div class="modal fade" id="updateStatusModal_<?php echo $item->id; ?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <?php echo form_open('admin/orders/update_order_product_status_post'); ?>
                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Update Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-order-status">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select name="order_status" class="form-control">
                                <?php if ($item->product_type == 'physical'): ?>
                                    <option value="awaiting_payment" <?php echo ($item->order_status == 'awaiting_payment') ? 'selected' : ''; ?>>Awaiting Payment</option>
                                    <option value="payment_received" <?php echo ($item->order_status == 'payment_received') ? 'selected' : ''; ?>>Payment Received</option>
                                    <option value="order_processing" <?php echo ($item->order_status == 'order_processing') ? 'selected' : ''; ?>>Order Processing</option>
                                    <option value="shipped" <?php echo ($item->order_status == 'shipped') ? 'selected' : ''; ?>>Shipped</option>
                                <?php endif; ?>
                                <?php if ($item->buyer_id != 0 && $item->order_status != 'completed'): ?>
                                    <option value="completed" <?php echo ($item->order_status == 'completed') ? 'selected' : ''; ?>>Completed</option>
                                <?php endif; ?>
                                <option value="cancelled" <?php echo ($item->order_status == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>   
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
     </div>

<?php endforeach; ?>


<style>
    .sec-title {
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
        font-weight: 600;
    }

    .font-right {
        font-weight: 600;
        margin-left: 5px;
    }

    .font-right a {
        color: #55606e;
    }

    .row-details {
        margin-bottom: 10px;
    }

    .col-right {
        max-width: 240px;
    }

    .label {
        font-size: 12px !important;
    }

    .box-payment-total {
        width: 400px;
        max-width: 100%;
        float: right;
        background-color: #fff;
        padding: 30px;
    }

    @media (max-width: 768px) {
        .col-right {
            width: 100%;
            max-width: none;
        }

        .col-sm-8 strong {
            margin-left: 0;
        }
    }
</style>


