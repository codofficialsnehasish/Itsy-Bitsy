<?php $this->load->view('admin/partials/main');?>

    <head> 
        <?php $this->load->view('admin/partials/title-meta');?>

        <?php PageSpecCss($pagecss);?>
        
        <?php $this->load->view('admin/partials/head-css');?>
       
    
    </head>
    <?php $this->load->view('admin/partials/body');?>

        <!-- Begin page -->
        <div id="layout-wrapper">
        <?php $this->load->view('admin/partials/menu');?>
        
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">