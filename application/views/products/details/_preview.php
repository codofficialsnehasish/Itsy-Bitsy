<link href="<?= base_url('assets/admin/libs/zoom/css/my-zoom.css');?>" rel="stylesheet" type="text/css"/>

<div class="">
   <ul id="glasscase" class="gc-start">
      <?php foreach($product_images as $pimg):?>
         <li><img src="<?= get_product_image($pimg->media_id);?>" alt="Text"  data-gc-caption="Your caption text" /></li>
      <?php endforeach;?>
   </ul>
</div>

    <!-- <div class="zoompro-wrap product-zoom-right pl-20">
       <div class="zoompro-span">
       <?php //foreach($product_images as $pimg):?>
           <img class="blur-up lazyload zoompro" data-zoom-image="<= get_product_image($pimg->media_id);?>" alt="" src="<= get_product_image($pimg->media_id);?>" />              
       </div>
       <?php //break; endforeach;?>
       <div class="product-buttons">
            <a href="#" class="btn prlightbox" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom Image"><i class="icon an an-expand-arrows-alt" aria-hidden="true"></i></a>
       </div>
    </div> -->