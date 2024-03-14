<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Coupons</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Coupons</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                        <a href="<?= admin_url('coupons/add_new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                        <i class="fas fa-plus me-2"></i> Add New
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <!-- <th>Discount Type</th> -->
                                    <th>Discount Price</th>
                                    <th>Expiry Date</th>
                                    <!-- <th>Discount Price</th> -->
                                    <!-- <th>Image</th> -->
                                    <th>Visibility</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($allitems as $item):?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><?= $item->coupons_code ?></td>
                                    <td><?= $item->description ?></td>
                                    <!-- <td><= $item->discount_type ?></td> -->
                                    <td><?= $item->amount ?></td>
                                    <td><?= $item->expiry_date ?></td>
                                    <!-- <td><= $item->amount ?></td>
                                    <td><= $item->amount ?></td> -->
                                    <!-- <td><= substr($item->file_name, 0, strpos($item->file_name, "."));?></td> -->
                                    <!-- <td><img src="<= get_restaurant_image($item->id);?>" width="50" /> </td> -->
                                    <td style="text-align:center;"><a href="<?= admin_url('restaurant_image/change_visibility/'.$item->id); ?>"><?= check_visibility($item->is_visible);?></a> </td>
                                    <td style="text-align:center;">
                                        <a href=" <?= admin_url('coupons/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'coupons');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                        </a></td>
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