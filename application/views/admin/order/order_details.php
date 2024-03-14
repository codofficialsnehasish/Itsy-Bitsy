<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Orders</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="<?= admin_url('orders');?>">All Orders</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                                    </ol>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= base_url(); ?>invoice/<?= $order->order_number.'/'.$order_id.'/'.$buyer_id; ?>', title: 'Invoise', w: 1000, h: 600});" class="btn btn-info  dropdown-toggle" aria-expanded="false">
                                                <i class="mdi mdi-cloud-download me-2"></i> Download Invoice
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end page title -->
							<?php $this->load->view('admin/partials/_messages');?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                        <div class="card-header bg-primary text-light">
                                            Order Details
                                        </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <?php if ($order->status == 1): ?>
                                                                <label class="btn btn-success btn-sm waves-effect">Completed</label>
                                                            <?php else: ?>
                                                                <label class="btn btn-secondary btn-sm waves-effect">Processing</label>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Order Id</label>
                                                    <div class="col-sm-8">
                                                        <strong class="font-right"><?php echo $order->id; ?></strong>
                                                    </div>
                                                </div> -->
                                                <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Order Number</label>
                                                    <div class="col-sm-8">
                                                        <strong class="font-right"><?php echo $order->order_number; ?></strong>
                                                    </div>
                                                </div>
                                                <div class="row mb-0">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Payment Method</label>
                                                <div class="col-sm-8">
                                                    <strong class="font-right">
                                                    <?php
                                                        if ($order->payment_method == "Bank Transfer") {
                                                            echo "Bank Transfer";
                                                        } else {
                                                            echo $order->payment_method;
                                                        } ?>
                                                    </strong>
                                                </div>
                                                </div>
                                                <div class="row mb-0">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Currency</label>
                                                <div class="col-sm-8">
                                                    <strong class="font-right"><?php echo $order->price_currency; ?></strong>
                                                </div>
                                                </div>
                                                <div class="row mb-0">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Payment Status</label>
                                                <div class="col-sm-8">
                                                    <strong class="font-right"><?php echo get_order_status($order->payment_status); ?></strong>
                                                </div>
                                                </div>
                                                <div class="row mb-0">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Payment Date</label>
                                                <div class="col-sm-8">
                                                    <strong class="font-right"><?php echo formatted_date($order->updated_at); ?>&nbsp;(<?php echo time_ago($order->updated_at); ?>)</strong>
                                                </div>
                                                </div>
                                                <div class="row mb-0">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Transaction id</label>
                                                <div class="col-sm-8">
                                                    <strong class="font-right"><strong><?= select_value_by_id('transactions','order_id ',$order->id,'payment_id');?></strong> </strong>
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <?php $buyer = get_user($order->buyer_id);
                                                    if (!empty($buyer)):?>

                                                    <div class="row mb-0">
                                                            <label for="example-text-input" class="col-sm-4 col-form-label">User Name</label>
                                                            <div class="col-sm-8">
                                                            <strong class="font-right">
                                                            <?php //echo html_escape($buyer->username); ?>
                                                            <?php echo html_escape($buyer->full_name); ?>
                                                            </strong>
                                                            </div>
                                                    </div>
                                                    <div class="row mb-0">
                                                            <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
                                                            <div class="col-sm-8">
                                                            <strong class="font-right">
                                                            <?php echo $buyer->phone_number; ?>
                                                            </strong>
                                                            </div>
                                                    </div>

                                                    <div class="row mb-0">
                                                            <label for="example-text-input" class="col-sm-4 col-form-label">Email</label>
                                                            <div class="col-sm-8">
                                                            <strong class="font-right">
                                                            <?php echo $buyer->email; ?>
                                                            </strong>
                                                            </div>
                                                    </div>
                                                    <?php endif; ?>
                                            </div>

                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                         <!-- end ROW title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header bg-primary text-light">
                                    Products
                                </div>
                                    <div class="card-body">
                                        <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                                            <strong><?php echo get_order_status($item->order_status); ?></strong>
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
                                                                        data-bs-target="#updateStatusModal_<?= $item->id; ?>"><i class="fa fa-edit option-icon"></i>Update order Status
                                                            </a>
                                                            
                                                            
                                                            <div class="dropdown-divider"></div>
                                                             <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= base_url(); ?>invoice/<?= $order->order_number.'/'.$item->order_id.'/'. $item->product_id.'/'. $item->buyer_id; ?>', title: 'Invoise', w: 1000, h: 600});"  class="dropdown-item"><i class="fa fa-file-invoice"></i>&nbsp;View Invoice</a>
                                                             <!-- <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= base_url(); ?>invoice/<?= $order->order_number.'/'.$order_id.'/'.$buyer_id; ?>', title: 'Invoise', w: 1000, h: 600});" class="btn btn-info  dropdown-toggle" aria-expanded="false"> -->
                                                             <div class="dropdown-divider"></div>
                                                             
                                                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDeleteProduct(this.id,'orders',<?= $this->uri->segment(4);?>);" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>"> <i class="fas fa-trash-alt text-danger" title="Remove"></i> Delete
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
                                       
                                        <div class="col-lg-4 float-end">
                                            <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Subtotal</label>
                                                    <div class="col-sm-8">
                                                    <strong class="float-end">
                                                    <?php echo formatted_price($order->price_subtotal, $order->price_currency,false); ?>
                                                    </strong>
                                                    </div>
                                            </div>
                                            <?php if (!empty($order->price_gst)): ?>
                                            <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">GST</label>
                                                    <div class="col-sm-8">
                                                    <strong class="float-end">
                                                    <?php echo formatted_price($order->price_gst, $order->price_currency,false); ?>
                                                    </strong>
                                                    </div>
                                            </div>
                                            <?php endif; ?>

                                            <?php if ($is_order_has_physical_product): ?>
                                            <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Shipping</label>
                                                    <div class="col-sm-8">
                                                    <strong class="float-end">
                                                    <?php echo formatted_price($order->price_shipping, $order->price_currency,false); ?>
                                                    </strong>
                                                    </div>
                                            </div>
                                            <?php endif; ?>

                                            <div class="row mb-0">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Total</label>
                                                    <div class="col-sm-8">
                                                    <strong class="float-end">
                                                    <?php echo formatted_price($order->price_total, $order->price_currency,false); ?>
                                                    </strong>
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
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
                            <select name="order_status" class="form-select" aria-label="Default select example" id="shippingOption" onchange="toggleFields()">
                                <?php if ($item->product_type == 'physical'): ?>
                                    <option value="awaiting_payment" <?php echo ($item->order_status == 'awaiting_payment') ? 'selected' : ''; ?>>Awaiting Payment</option>
                                    <option value="payment_received" <?php echo ($item->order_status == 'payment_received') ? 'selected' : ''; ?>>Payment Received</option>
                                    <option value="order_processing" <?php echo ($item->order_status == 'order_processing') ? 'selected' : ''; ?>>Order Processing</option>
                                    <option value="shipped" <?php echo ($item->order_status == 'shipped') ? 'disabled' : ''; ?>>Shipped</option>
                                <?php endif; ?>
                                <?php if ($item->buyer_id != 0 && $item->order_status != 'completed'): ?>
                                    <option value="completed" <?php echo ($item->order_status == 'completed') ? 'selected' : ''; ?>>Completed</option>
                                <?php endif; ?>
                                <option value="cancelled" <?php echo ($item->order_status == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                            <div id="shippedFields" class="d-none mt-3">
                                <label class="control-label" for="trackingNumber">Tracking Number</label>
                                <input type="text" class="form-control mb-3" id="trackingNumber" name="shipping_tracking_number">
                                <label for="deliveryDate">Tracking Url</label>
                                <input type="text" class="form-control" id="deliveryDate" name="shipping_tracking_url">
                            </div>
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
<script>
    function toggleFields() {
        var option = document.getElementById("shippingOption").value;
        var shippedFields = document.getElementById("shippedFields");

        if (option === "shipped") {
            shippedFields.classList.remove("d-none");
            shippedFields.classList.add("d-block");
        } else {
            shippedFields.classList.add("d-none");
            shippedFields.classList.remove("d-block");
        }
    }
</script>