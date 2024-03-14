	<?php
	// echo '<pre>';
	// print_r($allproducts); 
	?>
	<!------------------------product section------------------------->
	<section class="home-product prorit border-t pt-5">
		<div class="container mb-5">
			<div class="row flex-row-reverse align-items-center">	
				<div class="col-md-6">
					<div class="text-end">
						<div class="roiuy">
							
							<form action="/action_page.php" class="lis_t">
							  <label for="cars">Sort By</label>
							  <select name="sort_by" id="sort_by">
							  <option value="">Choose</option>
							    <option value="low_to_high" <?= $this->input->get('sort_by')=='low_to_high'?'selected':'';?>>Price Low to High</option>
							    <option value="high_to_low" <?= $this->input->get('sort_by')=='high_to_low'?'selected':'';?>>Price High to Low</option>
							    <option value="latest" <?= $this->input->get('sort_by')=='latest'?'selected':'';?>>Lastest </option>
							  </select>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="heading text-start">
						<h3 class="yeseva m-0 pt-3 pb-3 text-small"><small><?= !empty($title)?$title:'';?></small></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12">
					<div id="mobile-filter">

					<div class="partj">
							<h6>Filter By</h6>
							<p class="mb-2 border-bottom">Category</p>
							<div class="accordion" id="accordionExample">
							<?php 
							//	foreach($parentcategories as $pcat):
								// $catconditions = array(
								// 	'tblName' => 'categories',
								// 	'where' => array(
								// 		'parent_id' => $pcat->cat_id,
								// 		'is_visible' => 1,
								// 		'is_special' => 0
								// 	)
								// );
							//	$childCategories = $this->select->getResult($catconditions);
							?>

								<div class="accordion-item">
									<h2 class="accordion-header" id="parentCat<?= $parentcategories[0]->parent_id;?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseparentCat<?= $parentcategories[0]->parent_id;?>" aria-expanded="true" aria-controls="collapseOne">
									<?= select_value_by_id('categories','cat_id',$parentcategories[0]->parent_id,'cat_name');?>
									</button>
									</h2>
									<div id="collapseparentCat<?= $parentcategories[0]->parent_id;?>" class="accordion-collapse collapse show" aria-labelledby="parentCat<?= $parentcategories[0]->parent_id?>" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<?php if(!empty($parentcategories)):?>
										<ul>
										<?php foreach($parentcategories as $cat):?>
											<li>
												<input type="checkbox" name="" id="<?= $cat->cat_id;?>" <?= $this->uri->segment(2)==$cat->cat_slug?'checked':'';?>>
												<label for="<?= $cat->cat_id;?>"><?= $cat->cat_name;?></label>
										</li>
										<?php endforeach; ?>

										
										</ul>
										<?php endif;?>
									</div>
									</div>
								</div>
							<?php //endforeach;?>
								
							</div>		
							
							<?php 
							   $colorArray = $this->select->custom_qry("SELECT distinct color FROM `variation_options` where color!='';");
								if(!empty($colorArray)):
									$i=1;
							?>
							<p class="mb-2 border-bottom">Color</p>
							<ul class="list-group">
								<?php foreach($colorArray as $color):?>
								<li class="list-group-item list-group-item-action mb-2 rounded" style="padding: 3px;">
									<input type="checkbox" name="color[]" id="color<?= $i;?>" style="opacity:0;" value="<?= $color->color;?>"> 
									<label for="color<?= $i;?>" class="pl-1 pt-sm-0 pt-1">
									<span class="fa fa-circle pr-1" style="color: <?= $color->color;?>;font-size: 23px;"></span>
									</label>
								</li>
								<?php 
									$i++;
									endforeach;
								?>
							</ul>
							<?php endif;?>
						</div>
						<div class="part1">
							<p class="mb-2 border-bottom">Customer Review</p>

								<div class="form-inline rounded p-sm-2 my-2">
									<input type="checkbox" name="type" id="star1">
									<label for="star1" class="pl-1 pt-sm-0 pt-1">
										1 <span class="mdi mdi-star text-primary"></span>
									</label> 
									<label for="star2" class="pl-1 pt-sm-0 pt-1">
									  2 <span class="mdi mdi-star text-primary"></span>	
								   </label>
								   
								   <label for="star3" class="pl-1 pt-sm-0 pt-1">
								       <input type="checkbox" name="type" id="star3">
										3 <span class="mdi mdi-star text-primary"></span>
									</label>
									<input type="checkbox" name="type" id="star4">
									<label for="star4" class="pl-1 pt-sm-0 pt-1">
										4 <span class="mdi mdi-star text-primary"></span>
									</label>
									<input type="checkbox" name="type" id="star5">
									<label for="star5" class="pl-1 pt-sm-0 pt-1">
										5 <span class="mdi mdi-star text-primary"></span>
								   </label>

								</div>
								<!-- <div class="form-inline rounded p-sm-2 my-2">
									<input type="checkbox" name="type" id="star2">
									<label for="star2" class="pl-1 pt-sm-0 pt-1">
									  2 <span class="mdi mdi-star text-primary"></span>	
								   </label>
								</div>
								<div class="form-inline rounded p-md-2 p-sm-1">
									<input type="checkbox" name="type" id="star3">
									<label for="star3" class="pl-1 pt-sm-0 pt-1">
										3 <span class="mdi mdi-star text-primary"></span>
									</label>
								</div>
								<div class="form-inline rounded p-md-2 p-sm-1">
									<input type="checkbox" name="type" id="star4">
									<label for="star4" class="pl-1 pt-sm-0 pt-1">
										4 <span class="mdi mdi-star text-primary"></span>
									</label>
								</div>
								<div class="form-inline rounded p-md-2 p-sm-1">
									<input type="checkbox" name="type" id="star5">
									<label for="star5" class="pl-1 pt-sm-0 pt-1">
										5 <span class="mdi mdi-star text-primary"></span>
								</label>
								</div> -->

							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-4 col-sm-12">
					<div class="row" id="dataList">
					<?php 
					if(!empty($allproducts)): 
						foreach($allproducts as $product):
					?>
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="product-content">
							<div class="product-image">
								<a href="<?= base_url('product/'.$product->slug);?>"><img src="<?= get_product_main_image($product);?>" alt=""></a>
							</div>
							<div class="product-details text-center">
								<div class="p-code"><?= $product->sku;?></div>
								<div class="p-name yeseva"><?= word_limiter($product->title,2);?></div>
								<div class="p-price"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $product->price;?></div>
								<a href="<?= base_url('product/'.$product->slug);?>" class="product-btn">View Details <i class="zmdi zmdi-open-in-new"></i></a>
							</div>
						</div>
					</div>
					<?php 
						endforeach;
					endif;
					?>
					</div>
				</div>
			</div>
			



<div class="pagination">
<?php  echo $this->pagination->create_links(); ?>

</div>





		</div>
	</section>
	<script>
	function searchFilter(page_num){
		page_num = page_num?page_num:0;
        var catid = '<?= $this->uri->segment(2)?>';
        var keywords = '<?= $this->input->get('keyword')?>';
        var industrys = [];
        var madeIns = [];
        var availables = [];
        var industrysElements = document.getElementsByClassName('brnd');
        for(var i=0; industrysElements[i]; ++i){
            if(industrysElements[i].checked){
                industrys.push(industrysElements[i].value)
            }
        }
        var madeInElements = document.getElementsByClassName('made_in');
        for(var i=0; madeInElements[i]; ++i){
            if(madeInElements[i].checked){
                madeIns.push(madeInElements[i].value)
            }
        }
        var availableElements = document.getElementsByClassName('avail_able');
        for(var i=0; availableElements[i]; ++i){
            if(availableElements[i].checked){
                availables.push(availableElements[i].value)
            }
        }
		$.ajax({
			type: 'POST',
			url: '<?= base_url('solutions/ajaxPaginationData/'); ?>'+page_num,
			//data:'page='+page_num + '&csrf_modesy_token='+getCookie(csrf_modesy_token),
            data:{page:page_num,cat_id:catid,keyword:keywords,industry:industrys,made_in:madeIns,available:availables,csrf_modesy_token:getCookie('csrf_modesy_token'),},
			beforeSend: function(){
			    $('.loading').attr('style','display: flex !important;');
				$('.loading').show();
			},
			success: function(html){
				$('#dataList').html(html);
				$('.loading').delay(1000).fadeOut("slow");
			}
		});
	}

	</script>