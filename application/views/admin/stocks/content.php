<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Stocks</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product Stocks</li>
                                    </ol>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<= admin_url('products/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
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
                                                    <th>Sl No.</th>
                                                    <th>Products</th>
                                                    <th>Category</th>
													<th>Date Added</th>
                                                    <th>Stock</th>
                                                    <th>In Stock</th>
                                                    <!-- <th>Offer Price</th> -->
                                                    <th>Status</th>
                                                    <!-- <th>Visibility</th>
                                                    <th>Action</th> -->
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><img src="<?= get_product_main_image($item);?>" width="50" />&nbsp;&nbsp;&nbsp;&nbsp;<?= word_limiter(strip_tags($item->title));?></td>
                                                    <td>
                                                        <?= select_value_by_id('categories','cat_id',$item->category_id,'cat_name');?>
                                                        <?php if($item->subcategory_id!='' && $item->subcategory_id!=NULL && $item->subcategory_id!=0){?>
                                                        /<br> <?= select_value_by_id('categories','cat_id',$item->subcategory_id,'cat_name');?>
                                                        <?PHP }?>
                                                    </td>
                                                    <td><?php echo date("d-m-Y",strtotime($item->created_at)) ?></td> 
                                                    <td><?= $item->actual_stock;?> </td>
                                                    <td><?= $item->stock;?> </td>
                                                    <td style="color:<?php if($item->stock_status == 1){echo 'green';}else{echo 'red';} ?>;font-weight:700;"><?php if($item->stock_status == 1){echo "In Stock";}else{echo "Out of Stock";} ?></td>
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