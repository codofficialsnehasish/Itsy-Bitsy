<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login | <?= $this->settings->application_name?> - Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= get_favicon(); ?>">

        <!-- Bootstrap Css -->
        <link href="<?= base_url('assets/admin/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?= base_url('assets/admin/css/icons.min.css');?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?= base_url('assets/admin/css/app.min.css');?>" id="app-style" rel="stylesheet" type="text/css">

    </head>

<body style="background: url('<?= base_url('assets/site/images/background_bg.jpg') ?>');background-size: cover;background-position: center;">

    <div class="home-btn d-none d-sm-block">
        <a href="<?= base_url();?>" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to <?= $this->settings->application_name?>.</p>
                                <a href="<?= base_url();?>" class="logo logo-admin">
                                    <img src="<?= get_favicon(); ?>" height="50" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            
                            <div class="p-3">

                                <?= form_open(admin_url().'authentication/process',['class'=>'mt-4'])?>
                                <?php $this->load->view('admin/partials/_messages');?>
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" name="email" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>
                                <?= form_close();?>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p class="mb-0"> © <script>document.write(new Date().getFullYear())</script> Admin<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by <?= $this->settings->application_name?>.</span>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/admin/libs/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/libs/metismenu/metisMenu.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/libs/simplebar/simplebar.min.js');?>"></script>
    <script src="<?= base_url('assets/admin/libs/node-waves/waves.min.js');?>"></script>

    <script src="<?= base_url('assets/admin/js/app.js');?>"></script>

</body>

</html>