<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Consultation</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Consultation</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <!-- <a href="<?= admin_url('contact/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a> -->
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
                                                    <!-- <th>eMail</th> -->
                                                    <th>Phone</th>
                                                    <th>Messsage</th>
                                                    <th>Dated</th>
                                                    <!-- <th>Visibility</th> -->
                                                    <!-- <th>Subject</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><?= $item->name;?></td>
                                                    <!-- <td><?= $item->email;?></td> -->
                                                    <td><?= $item->phone;?></td>
                                                    <td><?= excerpt($item->msg,3);?></td> 
                                                    <td><?= formatted_date($item->created_at);?></td> 
                                                    <!-- <td><?= check_visibility($item->is_visible);?> </td> -->
                                                    <td>
                                                        <a href="javascript:;" class="btn btn-primary btn-sm edit" 
                                                        data-bs-placement="top" 
                                                        title="Edit this Item"  
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#messageModal<?= $item->id;?>">
                                                                <i class="fas fa-search-plus" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                        title="View Message" title="View Message"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'contact');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                                                <i class="fas fa-trash-alt" title="Remove"></i>
                                                            </a></td>
                                                </tr>

                                                <div class="modal fade" id="messageModal<?= $item->id;?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                    Message</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?= $item->msg;?></p>                                         
                                                            </div>                         
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <?php endforeach;?>
                                               
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>