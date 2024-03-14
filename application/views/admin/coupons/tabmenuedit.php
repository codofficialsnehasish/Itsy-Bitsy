<?php 
    if($this->uri->segment(4)!=''){
        $queryString=$this->uri->segment(4);
    }else{
        $queryString="";
    }
?>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link <?= tab_active('edit')?>"  href="<?= admin_url('coupons/edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Basic Information</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  <?= tab_active('price-details-edit')?>"  href="<?= admin_url('coupons/price-details-edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">General</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link  <?= tab_active('usage-restriction-edit')?>"  href="<?= admin_url('coupons/usage-restriction-edit/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Usage Restriction</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>
    
    
    
</ul>
