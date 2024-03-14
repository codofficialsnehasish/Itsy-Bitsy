<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Buyer</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Buyer</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <!-- <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= admin_url('buyer/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a>
                                        </div>
                                    </div> -->
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
                                                    <th width="4%">Sl No.</th>
                                                    <th width="11%">Registered Through</th>
                                                    <th width="18%">Name</th>
                                                    <!-- <th width="15%">Address</th> -->
                                                    <th width="17%">eMail</th>
                                                    <th width="13%">Contact No</th>
                                                    <th width="10%">Status</th>
                                                    <th width="12%">Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):
                                                $registeredType=explode('_',$item->user_type);
                                                ?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><a href="<?= admin_url('buyer/details/'.$item->id);?>"><?= ucfirst($registeredType[0]);?></a></td>
                                                    <td><a href="<?= admin_url('buyer/details/'.$item->id);?>"><?= $item->full_name;?></a></td>
                                                    <!-- <td><a href="<?= admin_url('buyer/details/'.$item->id);?>"><?= wordwrap($item->address,8,"<br>\n");?></a></td> -->
                                                    <td><a href="<?= admin_url('buyer/details/'.$item->id);?>"><?= $item->email;?></a></td>
                                                    <td><a href="<?= admin_url('buyer/details/'.$item->id);?>"><?= $item->phone_number;?></a></td>
                                                    <td><?= check_visibility($item->status);?> </td>
                                                    
                                                    <td>
                                                            <a href="<?= admin_url('buyer/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'buyer');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
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