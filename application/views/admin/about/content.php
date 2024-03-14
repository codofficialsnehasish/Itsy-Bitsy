<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">About</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All abouts</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="<?= admin_url('about/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                                <i class="fas fa-plus me-2"></i> Add About 
                                            </a>
                                            <a href="<?= admin_url('about/add-new-image')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                                <i class="fas fa-plus me-2"></i> Add Image
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
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Image</th>
                                                    <th>Visibility</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                foreach($image as $img):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><img src="<?= get_image($img->media_id);?>" width="50" /></td>
                                                    <td><?= check_visibility($img->visibility);?> </td>
                                                    <td>
                                                        <a href="<?= admin_url('about/edit_image/'.$img->id);?>" class="btn btn-primary btn-sm edit" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="View Message" title="View Message"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit" onclick="return confirm('Are you sure?')" href="<?= base_url('admin/about/img_delete/'.$img->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $img->id;?>">
                                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </div>
                                                <?php endforeach;?>
                                               
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Header</th>
                                                    <th>Content</th>
                                                    <th>Visibility</th>
                                                    <th>Main About</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><?= $item->about_header;?></td>
                                                    <td><?= $item->about_content;?></td>
                                                    <td><?= check_visibility($item->visiblity);?> </td>
                                                    <td><?= check_visibility($item->main_about);?> </td>
                                                    <td>
                                                        <a href="<?= admin_url('about/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="View Message" title="View Message"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'about');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <!-- <div class="modal fade" id="messageModal<= $item->id;?>" tabindex="-1" role="dialog"
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
                                                                <p><= $item->c_msg;?></p>                                         
                                                            </div>                         
                                                        </div>
                                                        
                                                    </div>
                                                    /.modal-dialog -->
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