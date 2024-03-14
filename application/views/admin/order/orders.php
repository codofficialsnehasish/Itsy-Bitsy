<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Orders</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                                    </ol>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                                <i class="fas fa-plus me-2"></i> Create Order
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>Order</th>
                                                <th>Buyer</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Updated</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                foreach ($orders as $item): ?>
                                                <tr>
                                                <td>
                                                    <a href="<?php echo admin_url(); ?>orders/order-details/<?php echo html_escape($item->id); ?>">
                                                        #<?php echo html_escape($item->order_number); ?>
                                                    </a>
								                </td>
                                                <td>
                                                    <?php if ($item->buyer_id == 0): ?>
                                                        <div class="table-orders-user">
                                                            <?php $shipping = get_order_shipping($item->id);
                                                            if (!empty($shipping)): ?>
                                                                <span><?php echo $shipping->shipping_first_name . " " . $shipping->shipping_last_name; ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php else:
                                                        $buyer = get_user($item->buyer_id);
                                                        // print_r( $buyer);
                                                        if (!empty($buyer)):?>
                                                            <div class="table-orders-user">
                                                                <a href="#" target="_blank">
                                                                    <?php echo html_escape($buyer->role); ?>
                                                                </a>
                                                            </div>
                                                        <?php endif;
                                                    endif;
                                                    ?>
                                                </td>
                                                <td><strong> <?php echo formatted_price($item->price_total, $item->price_currency,false); ?></strong></td>
                                                
                                                <td>
                                                    <?php if ($item->status == 1): ?>
                                                        <label class="btn btn-secondary btn-sm waves-effect mt-2 btn btn-success">Completed</label>
                                                    <?php else: ?>
                                                        <label class="btn btn-secondary btn-sm waves-effect mt-2 btn btn-secondary">Processing</label>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->payment_status; ?> <br>Txn Id. <strong><?= select_value_by_id('transactions','order_id ',$item->id,'payment_id');?></strong> 
                                                </td>
                                                <td><?php echo time_ago($item->updated_at); ?></td>
                                                <td> <?php echo formatted_date($item->created_at); ?></td>
                                                <td>
                                                    <?php echo form_open_multipart('admin/orders/order_options_post'); ?>
                                                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Options <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>orders/order-details/<?php echo html_escape($item->id); ?>">
                                                            <i class="fas fa-info-circle text-primary"></i> View Details</a>
                                                            <div class="dropdown-divider"></div>
                                                            <?php if ($item->payment_status != 'payment_received'): ?>
                                                                <button type="submit" name="option" value="payment_received" class="dropdown-item btn btn-primary btn-sm waves-effect waves-light btn btn-success">
                                                                    <i class="fas fa-check-circle"></i> Payment Received 
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                            <?php endif; ?>
                                                            <a href="javascript:void(0)" class="dropdown-item" onclick="confirmDelete(this.id,'orders');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>"> <i class="fas fa-trash-alt text-danger" title="Remove"></i> Delete</a>
                                                        </div>
                                                    </div>
								                    <?php echo form_close(); ?>
								                </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>