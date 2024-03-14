<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Team Lead</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Team Lead</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <!-- <a href="<?= admin_url('seller/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
                                    <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>TL Name</th>
                                                    <th>Contact No</th>
                                                    <th>eMail</th>
                                                    <!-- <th>Status</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><a href="#"><?= $item->full_name;?></a></td>
                                                    <td><a href="#"><?= $item->role;?></a></td>
                                                    <td><a href="#"><?= get_tl_name($item->tl_id); ?></a></td>
                                                    <td><a href="#"><?= $item->phone_number;?></a></td>
                                                    <td><a href="#"><?= $item->email;?></a></td>
                                                    <!-- <td><= check_visibility($item->status);?> </td> -->
                                                    
                                                    <td>
                                                        <a class="btn btn-outline-success" href="<?= admin_url('team_lead/request_approve/'.$item->id);?>" alt="edit">Approve <i class="ti-check-box"></i></a>
                                                        <a class="btn btn-outline-danger" href="<?= admin_url('team_lead/request_remove/'.$item->id);?> ">Cancel<i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                               
                                            </tbody>
                                        </table>

                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>