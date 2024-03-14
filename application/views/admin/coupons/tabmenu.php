<?php 
    if($this->uri->segment(4)!=''){
        $queryString=$this->uri->segment(4);
    }else{
        $queryString="";
    }
?>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link <?= tab_active('add_new')?>"  href="<?= admin_url('coupons/add_new/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Basic Information</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  <?= tab_active('price-details')?>"  href="<?= admin_url('coupons/price-details/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">General</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link  <?= tab_active('variations')?>"  href="<?= admin_url('coupons/variations/'.$queryString);?>" role="tab">
            <span class="d-none d-md-block">Variations</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
        </a>
    </li>
</ul>
