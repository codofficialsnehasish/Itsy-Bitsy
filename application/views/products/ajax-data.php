<!-- Display posts list -->
<?php if(!empty($all_solutions)){ 
	foreach($all_solutions as $solution):
       $company = get_company_info($solution->user_id);
      ?>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="single-product-block">
						<figure>
							<a href="<?= base_url('solutions/details/'.$solution->solution_slug)?>"><img src="<?= get_image($solution->solution_img);?>" alt=""></a>
						</figure>
						<span><a href="<?= base_url('solutions/company-profile/'.$company->company_slug)?>"><?= $company->company_name;?></a></span>
						<h4><a href="<?= base_url('solutions/details/'.$solution->solution_slug)?>"><?= $solution->solution_name;?></a></h4>
						<?php  if ($this->auth_check) {?>
						<a href="javascript:void(0);" class="wishlist" id="<?= $solution->id?>" onclick="favorite(this.id);">
						<?= is_favorite($this->auth_user->id,$solution->id)?></a>
						<?php }else{?>
							<a href="<?= base_url('login/');?>" class="wishlist" id="<?= $solution->id?>">
							<i class="far fa-heart"></i>
						</a>  
						<?php }?>
						<!-- <a href="" class="btn btn-dark-blue">Download</a> -->
					</div>
				</div>
     <?php endforeach;?>
<?php }else{ ?>
	<p class="notfound">Solution(s) not found...</p>
<?php } ?>

<!-- Render pagination links -->
<nav aria-label="Page navigation example">
<?php echo $this->ajax_pagination->create_links(); ?>
</nav>