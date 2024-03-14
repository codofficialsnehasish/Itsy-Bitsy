<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Products</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Products</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= admin_url('products/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a>
                                        </div>
                                    </div>
                                </div>
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
                                                    <th>Name</th>
                                                    <th>Collection</th>
                                                    <th>Category</th>
													<th>Seller</th>
                                                    <th>SKU</th>
                                                    <th>Stock</th>
                                                    <th>Price</th>
                                                    <!-- <th>Offer Price</th> -->
                                                    <th>Image</th>
                                                    <th>Visibility</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><a href="<?= admin_url('products/edit/'.$item->id);?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $item->title;?>"><?= word_limiter(strip_tags($item->title), 2);?></a></td>
                                                    <td><?= select_value_by_id('brands','id',$item->product_brand_id,'title');?></td>
                                                    <td>
                                                        <?= select_value_by_id('categories','cat_id',$item->category_id,'cat_name');?>
                                                        <?php if($item->subcategory_id!='' && $item->subcategory_id!=NULL && $item->subcategory_id!=0){?>
                                                        /<br> <?= select_value_by_id('categories','cat_id',$item->subcategory_id,'cat_name');?>
                                                        <?PHP }?>
                                                    </td>
                                                    <td><a href="<?= admin_url('seller/details/'.$item->user_id);?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View Seller Profile"><?= select_value_by_id('users','id',$item->user_id,'shop_name');;?> </a></td> 
                                                    <td><?= $item->sku;?> </td>
                                                    <td style="color:<?php if($item->stock > 0){echo 'green';}else{echo 'red';} ?>;font-weight:700;"><?php if($item->stock > 0){echo $item->stock;}else{echo "Out of Stock";} ?></td>
                                                    <td><?= select_value_by_id('currencies','id',$item->currency_code,'symbol').' '.$item->price;?> </td>
                                                    <!-- <td><?= select_value_by_id('currencies','id',$item->currency_code,'symbol').' '.$item->offer_price;?> </td> -->
                                                    <td><img src="<?= get_product_main_image($item);?>" width="50" /> </td>
                                                    <td><?= check_visibility($item->is_visible);?> </td>
                                                    <td>
                                                        <a href="<?= admin_url('products/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'products');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                                        </a>
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