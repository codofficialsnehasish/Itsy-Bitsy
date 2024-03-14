<?php 
    if($this->uri->segment(4)!=''){
        $queryString=$this->uri->segment(4);
    }else{
        $queryString="";
    }
?>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link <?= tab_active('edit')?>"  href="<?= admin_url('products/edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Basic Information</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  <?= tab_active('price-details-edit')?>"  href="<?= admin_url('products/price-details-edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Price Details</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  <?= tab_active('inventory-edit')?>"  href="<?= admin_url('products/inventory-edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Inventory</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link  <?= tab_active('variations-edit')?>"  href="<?= admin_url('products/variations-edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Variations</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link <?= tab_active('specifications')?>"  href="<?= admin_url('products/specifications/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Specifications</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link <?= tab_active('add-images-edit')?>"  href="<?= admin_url('products/add-images-edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Product Images</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
        </a>
    </li>
    
    
    
</ul>
