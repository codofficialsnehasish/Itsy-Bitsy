<div class="card mb-4 mb-xl-0">
    <div class="card-header">Profile Picture</div>
    <div class="card-body text-center">
        <!-- Profile picture image-->
            <?php
                if($this->auth_user->user_type=='facebook'){
                $imgUrl = $this->auth_user->fb_image;
                }elseif($this->auth_user->user_type=='google'){
                $imgUrl = $this->auth_user->google_image;
                }else{
                $imgUrl = get_image($this->auth_user->user_image);
                }
            ?>
        <img class="img-account-profile rounded-circle mb-2" src="<?= $imgUrl;?>" alt="">
        <h2 class="mt-3 mb-0"><?= $this->auth_user->appellation.' '.$this->auth_user->full_name;?></h2>
	<div class="small font-italic text-muted mb-4"><?= select_value_by_id('location_cities','id',$this->auth_user->city_id,'name');?>,<?= select_value_by_id('location_states','id',$this->auth_user->state_id,'name');?></a>,<?= select_value_by_id('location_countries','id',$this->auth_user->country_id,'name');?></div>		                    
      
    </div>
</div>