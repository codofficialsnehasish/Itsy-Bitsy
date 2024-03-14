		            <!-- Profile picture card-->
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
        <img class="img-account-profile rounded-circle mb-2" src="<?= $imgUrl;?>" alt="" style="width: 317px;">
        <!-- Profile picture help block-->
        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 1 MB</div>
        <!-- Profile picture upload button-->
        <?php if($this->auth_user->user_type!='facebook' || $this->auth_user->user_type!='google'){?>
        <div class="images-upload-posito">
            <!-- <span class="go-checkout" type="button" style="line-height: 32px; padding:0 15px;">Upload image</span> -->
            <?= form_open_multipart('', 'class="custom-validation" id ="profileForm"');?>
            <input type="file" id="profileImage" name="profile_image" class="image-input-u btn">
            <?= form_close();?>
        </div>
        <?php }?>
    </div>
</div>
