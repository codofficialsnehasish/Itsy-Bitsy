   <style type="text/css">
  
   	
.pricingTable{
    color: #666;
    font-family: 'Poppins', sans-serif;
    text-align: center;
}
.pricingTable .pricingTable-header{
    background-color: #fff;
    padding: 25px;
    border-radius: 40px 40px 0 0;
    box-shadow: 0px 0px 8px 0px #00000045;
}
.pricingTable .title{
    color: #333;
    font-size: 25px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin: 0 0 10px;
}
.pricingTable .price-value {
    color: #fff;
    background: linear-gradient(to right bottom,#25c648,#21a313);
    height: 150px;
    width: 150px;
    padding: 26px 20px;
    margin: 0 auto;
    border-radius: 50%;
    position: relative;
    z-index: 1;
}
.pricingTable .price-value:before{
    content: '';
    background: linear-gradient(to left top,#25c648,#21a313);
    border-radius: inherit;
    box-shadow: 1px 1px 5px rgba(0,0,0,0.2) inset;
    position: absolute;
    left: 12px;
    top: 12px;
    bottom: 12px;
    right: 12px;
    z-index: -1;
}
.pricingTable .price-value .currency{
    font-size: 20px;
    line-height: 22px;
    font-weight: 500;
    display: inline-block;
    vertical-align: top;
}
.pricingTable .price-value .amount{
    font-size: 40px;
    line-height: 55px;
    font-weight: 600;
    display: inline-block;
}
.pricingTable .price-value .duration{
    font-size: 15px;
    line-height: 15px;
    font-weight: 500;
    display: block;
}
.pricingTable .pricing-content{
    background: linear-gradient(to right bottom,#25c648,#21a313);
    padding: 30px 20px 60px;
    margin: 0;
    list-style: none;
    border-radius: 0 0 40px 40px;
}
.pricingTable .pricing-content li{
    color: rgba(255,255,255,0.7);
    font-size: 16px;
    font-weight: 500;
    line-height: 25px;
    padding: 0;
    margin: 0 0 13px;
    position: relative;
}
.pricingTable .pricing-content li:last-child{ margin-bottom: 0; }
.pricingTable .pricing-content li strong{ color: #fff; }
.pricingTable .pricingTable-signup a, .pricingTable .pricingTable-signup button {
    color: #fff;
    background: linear-gradient(to right bottom,#25c648,#21a313);
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 0px;
    text-transform: uppercase;
    width: 150px;
    padding: 12px 25px;
    margin: -30px auto 0;
    border: none;
    box-shadow: 0 0 5px rgb(0 0 0 / 20%);
    border-radius: 15px;
    display: block;
    transition: all 0.3s ease 0s;
}
.pricingTable.blue .pricingTable-signup button {
    color: #fff;
    background: linear-gradient(to right bottom,#01AFED,#0097EA);
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 0px;
    text-transform: uppercase;
    width: 150px;
    padding: 12px 25px;
    margin: -30px auto 0;
    border: none;
    box-shadow: 0 0 5px rgb(0 0 0 / 20%);
    border-radius: 15px;
    display: block;
    transition: all 0.3s ease 0s;
}
.pricingTable .pricingTable-signup a:hover{
    color: #fff;
    text-shadow: 3px 3px rgba(0,0,0,0.3);
    box-shadow: 0 -3px 15px rgba(0,0,0,0.2);
}
.pricingTable.blue .price-value{ background: linear-gradient(to right bottom,#01AFED,#0097EA); }
.pricingTable.blue .price-value:before{ background: linear-gradient(to left top,#01AFED,#0097EA); }
.pricingTable.blue .pricing-content,
.pricingTable.blue .pricingTable-signup a{
    background: linear-gradient(to right bottom,#01AFED,#0097EA);
}
.pricingTable.pink .price-value{ background: linear-gradient(to right bottom,#FF4EA5,#FE0879); }
.pricingTable.pink .price-value:before{ background: linear-gradient(to left top,#FF4EA5,#FE0879); }
.pricingTable.pink .pricing-content,
.pricingTable.pink .pricingTable-signup a{
    background: linear-gradient(to right bottom,#FF4EA5,#FE0879);
}

.active .pricingTable-header {
    border: 4px solid #22ad22;
    border-bottom: none;
}



@media only screen and (max-width: 990px){
    .pricingTable{ margin: 0 0 40px; }
}
   
   </style>



	
	<!-----------------history section--------------------->
	<section class="history-section" style="background-color: #fff9f6;">
<div class="container">
<div class="row">
				

	<div class="demo">
        <div class="row">
            <?php if(!empty($alliplans)):
            $i=1;
                foreach($alliplans as $plan):    
                    if($i%2==0){
                        $class='blue';
                    }else{
                        $class='';
                    }
            ?>
            <div class="col-md-4 col-sm-6">
                <a href="#" class="<?= $plan->is_recomended==1?'active':'';?>">
                    <div class="pricingTable <?= $class;?>">
                    	<div class="pricingTable-header">
                        	<h3 class="title"><?= $plan->title;?></h3>
                        	<div class="price-value">
                            	<span class="currency"><?= select_value_by_id('currencies','id',$plan->currency_code,'code')?></span>
                            	<span class="amount"><?= $plan->subscription_amount;?></span>
                            	<span class="duration"><?= $plan->subscription_type;?></span>
                        	</div>
                    	</div>
                    	<ul class="pricing-content">
                        	<li><strong><?= $plan->no_of_product;?></strong> Products</li>
                        	<li><strong><?= $plan->no_of_product_images;?></strong> Images per Product</li>
                    	</ul>
                    	<div class="pricingTable-signup">
                        	<?php if($plan->is_free==1){?>
                        	<a href="<?= base_url('seller/profile/complete');?>" class="btn btn-primary">Buy Now</a>
                        	<?php }else{?>
                            	<?= form_open('paymentmethod',  'class="needs-validation"  novalidate '); ?>
                            	<input type="hidden" name="plan_id" value="<?= $plan->id;?>" />
                            	<input type="hidden" name="token" value="<?= $this->input->get('token');?>" />
                            	<button type="submit" class="btn btn-primary ">Buy Now</button>
                            	<?= form_close(); ?>
                        	<?php }?>
                    	</div>
                	</div>
                </a>
            </div>
            <?php
            $i++;
            endforeach;
            endif;
            ?>
        </div>
    </div>
</div>
</div>
</section>






