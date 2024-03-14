<?php 
    if($this->uri->segment(4)!=''){
        $queryString=$this->uri->segment(4);
    }else{
        $queryString="";
    }
?>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link <?= tab_active('add-new')?>"  href="<?= admin_url('products/add-new/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Basic Information</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  <?= tab_active('price-details')?>"  href="<?= admin_url('products/price-details/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Price Details</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  <?= tab_active('inventory')?>"  href="<?= admin_url('products/inventory/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Inventory</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link  <?= tab_active('variations')?>"  href="<?= admin_url('products/variations/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Variations</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link <?= tab_active('specifications')?>"  href="<?= admin_url('products/specifications/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Specifications</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link <?= tab_active('add-images')?>"  href="<?= admin_url('products/add-images/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Product Images</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
        </a>
    </li>
    
    
</ul>
