<style>
   @charset "UTF-8";
   /* CSS Document */
   * {
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   article, aside, details, figcaption, figure, footer, header, nav, section, summary {
   display: block;
   }
   audio, canvas, video {
   display: inline-block;
   }
   audio:not([controls]) {
   display: none;
   height: 0;
   }
   [hidden] {
   display: none;
   }
   a {
   color: #231F40;
   text-decoration: none;
   outline: none;
   }
   a:hover, a:focus, a:active {
   text-decoration: none;
   outline: none;
   color: #525FE1;
   }
   a:focus {
   outline: none;
   }
   address {
   margin: 0 0 24px;
   }
   abbr[title] {
   border-bottom: 1px dotted;
   }
   b, strong {
   font-weight: bold;
   }
   ._2sc7ZR {
   font-size: 16px;
   line-height: 1.63;
   font-weight: 500;
   color: #6F6B80;
   margin: 0 0 10px;
   }
   h5, .h5 {
   font-weight: 700;
   }
   .mt--40 {
   margin-top: 40px !important;
   }
   .mb--20 {
   margin-bottom: 20px !important;
   }
   .pt--40 {
   padding-top: 40px !important;
   }
   .mb--25 {
   margin-bottom: 25px !important;
   }
   .fa-star {
   color: #ffa41b;
   }
   .course-details-card {
   border-radius: 8px;
   border: 1px solid #EEEEEE;
   padding: 30px;
   }
   .course-details-card .course-details-two-content p:last-child {
   margin-bottom: 0;
   }
   .row--30 {
   margin-left: -30px;
   margin-right: -30px;
   }
   @media only screen and (min-width: 1200px) and (max-width: 1599px) {
   .row--30 {
      margin-left: -15px;
      margin-right: -15px;
   }
   }
   @media only screen and (min-width: 992px) and (max-width: 1199px) {
   .row--30 {
      margin-left: -15px;
      margin-right: -15px;
   }
   }
   @media only screen and (min-width: 768px) and (max-width: 991px) {
   .row--30 {
      margin-left: -15px;
      margin-right: -15px;
   }
   }
   @media only screen and (max-width: 767px) {
   .row--30 {
      margin-left: -15px !important;
      margin-right: -15px !important;
   }
   }
   .row--30 > [class*="col"], .row--30 > [class*="col-"] {
   padding-left: 30px;
   padding-right: 30px;
   }
   @media only screen and (min-width: 1200px) and (max-width: 1599px) {
   .row--30 > [class*="col"], .row--30 > [class*="col-"] {
      padding-left: 15px;
      padding-right: 15px;
   }
   }
   @media only screen and (min-width: 992px) and (max-width: 1199px) {
   .row--30 > [class*="col"], .row--30 > [class*="col-"] {
      padding-left: 15px;
      padding-right: 15px;
   }
   }
   @media only screen and (min-width: 768px) and (max-width: 991px) {
   .row--30 > [class*="col"], .row--30 > [class*="col-"] {
      padding-left: 15px !important;
      padding-right: 15px !important;
   }
   }
   @media only screen and (max-width: 767px) {
   .row--30 > [class*="col"], .row--30 > [class*="col-"] {
      padding-left: 15px !important;
      padding-right: 15px !important;
   }
   }
   .course-details-content .rating-box {
   background: #FFFFFF;
   box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.07);
   border-radius: 5px;
   text-align: center;
   min-width: 200px;
   padding: 10px 10px;
   }
   .course-details-content .rating-box .rating-number {
   font-weight: 800;
   font-size: 48px;
   line-height: 90px;
   color: #231F40;
   }
   .course-details-content .rating-box span {
   font-weight: 500;
   font-size: 16px;
   line-height: 26px;
   }
   .course-details-content .course-tab-content {
   margin-top: 40px;
   }
   .course-details-content .rating-box {
   background: #FFFFFF;
   box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.07);
   border-radius: 5px;
   text-align: center;
   min-width: 200px;
   padding: 29px 10px;
   }
   .course-details-content .rating-box .rating-number {
   font-weight: 800;
   font-size: 48px;
   line-height: 90px;
   color: #231F40;
   }
   .course-details-content .rating-box span {
   font-weight: 500;
   font-size: 16px;
   line-height: 26px;
   }
   .review-wrapper .single-progress-bar {
   position: relative;
   }
   .review-wrapper .rating-text {
   display: inline-block;
   position: relative;
   top: 13px;
   }
   .review-wrapper .progress {
   max-width: 83%;
   margin-left: 38px;
   height: 7px;
   background: #EEEEEE;
   }
   @media only screen and (min-width: 992px) and (max-width: 1199px) {
   .review-wrapper .progress {
      max-width: 80%;
   }
   }
   .review-wrapper .progress .progress-bar {
   background-color: #FFA41B;
   }
   .review-wrapper span.rating-value {
   position: absolute;
   right: 0;
   top: 50%;
   }
   .edu-comment {
   display: flex;
   }
   @media only screen and (max-width: 575px) {
   .edu-comment {
      flex-direction: column;
   }
   }
   .edu-comment .thumbnail {
   min-width: 70px;
   width: 70px;
   max-height: 70px;
   border-radius: 100%;
   margin-right: 25px;
   }
   .edu-comment .thumbnail img {
   border-radius: 100%;
   width: 100%;
   }
   .edu-comment .comment-content .comment-top {
   display: flex;
   align-items: center;
   }
   .edu-comment .comment-content .title {
   font-weight: 700;
   font-size: 20px;
   line-height: 32px;
   margin-bottom: 10px;
   margin-right: 15px;
   }
   .edu-comment .comment-content .subtitle {
   font-weight: 700;
   font-size: 16px;
   line-height: 26px;
   display: block;
   margin-bottom: 10px;
   color: #231F40;
   }
   @media only screen and (max-width: 575px) {
   .edu-comment .comment-content {
      margin-top: 20px;
   }
   }
   .edu-comment + .edu-comment {
   border-top: 1px solid #EEEEEE;
   padding-top: 30px;
   margin-top: 30px;
   }
</style>
<?php

// SELECT rating,count(`rating`) rating_count FROM `product_review` where product_id=431 group by rating;
// Sample data: number of reviews for each star rating
$starRatings = array();
if(!empty($productRating)){
   foreach($productRating as $pr){
      $starRatings[$pr->rating] = $pr->rating_count;
   }
// Calculate total reviews for all star ratings
$totalReviews = array_sum($starRatings);
}
?>
<div class="row">
   <div class="col-lg-12 mb-3">
   <a class="btn bg-dark text-white float-end" href="#review_section"><i class="an-1x an an-pencil-alt me-1"></i> Write a review</a>
   </div>

</div>
<?php if(!empty($productRating)){?>
<div class="row">
    <div class="col-md-12 course-details-content">
        <div class="course-details-card mt--20">
            <div class="course-content">
                <h5 class="mb--20">Review</h5>
                <div class="row row--30">
                    <div class="col-lg-4">
                        <div class="rating-box">
                            <div class="rating-number"><?= get_avg_rationg_count($product->id);?></div>
                            <div class="rating">
                                <?php
                                 for ($i = 1; $i <= 5; $i++) {
                                       $starCount = isset($starRatings[$i]) ? $starRatings[$i] : 0;
                                       echo '<i class="fa fa-star" aria-hidden="true"></i> ';
                                 }
                                ?>
                            </div>
                            <span>(<?php echo $totalReviews; ?> Reviews)</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="review-wrapper">
                            <?php
                            for ($i = 5; $i >= 1; $i--) {
                                $starCount = isset($starRatings[$i]) ? $starRatings[$i] : 0;
                                $percentage = ($starCount / $totalReviews) * 100;
                                if($i >=3){
                                 $background = 'background-color:#3bab20;';
                                }else if($i == 2){
                                 $background = 'background-color:#ff9f00;';
                                }else{
                                 $background = 'background-color:#ff6161;';
                                }
                                ?>
                                <div class="single-progress-bar">
                                    <div class="rating-text"> <?php echo $i; ?> <i class="fa fa-star text-dark" aria-hidden="true"></i> </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="<?= $background;?> width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="rating-value"><?php echo $starCount; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Rest of the HTML content -->
            </div>
        </div>
        <div class="comment-wrapper pt--40">
         <div class="section-title">
            <h5 class="mb--25">Product Feedback</h5>
         </div>
         <?php if(!empty($productReview)):
               foreach($productReview as $review):
               $reviewUser = get_user_by_id($review->user_id);
         ?>
         <!--  Comment Box start--->
         <div class="edu-comment">
            <div class="thumbnail"> <img src="<?= get_user_image($reviewUser->full_name); ?>" alt="Comment Images"> </div>
            <div class="comment-content">
               <div class="comment-top">
                  <h6 class="title"><?= !empty($review->title)?$review->title:'';?></h6> 
               <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
               </div>
                  <p><?= $review->comment;?></p>
                  <div class="rew-denewala" style="float:right">
                     <div class="row">
                        <p class="_2sc7ZR"><i class="zmdi zmdi-account"></i><span> <?= $reviewUser->full_name; ?> </span></p>
                        <p class="_2sc7ZR"><?= time_ago($review->created_at);?></p>
                     </div>
                  </div>
            </div>
         </div>
         <!-- Comment Box end--->
         <?php 
            endforeach;
            else:?>
         <p>No Review Yet!</p>
         <?php endif;?>
         </div>
        </div>
    </div>
</div>
<?php }else{?>
   <p>No Review Yet!</p>
<?php }?>      
<hr/>
<section id="review_section" >
   <form class="SFueOp" method="post" action="">
      <div class="row _14YOVU">
         <div class="col-md-12 O5at2W form-group">
            <div class="_2sxtk-">
               <span>Rate this product</span>
            </div>
            <div class="row" id="reviewForm">
               <div class="rating-star">
                  <input type="hidden" name="rating" id="rating" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-primary"/> <!-- data-fractions="2" -->
                  <!-- <input type="hidden" class="rating" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/> -->
               </div>
               <div class="_2sxtk-">
                  <input type="text"  placeholder="Review Title..." id="review_title" class="form-control _3kRe7w mt-3 mb-3" />
               </div>
               <div class="_2sxtk-">
                  <textarea placeholder="Comments..." id="review" class="form-control _3kRe7w"></textarea>
               </div>
            </div>
            <div class="col-md-12"><button type="button" class="btn btn-md bg-dark text-white  mt-2" id="review-submit-button">Submit</button></div>
            <!-- <div id="reviewResponse"></div> -->
         </div>
      </div>
   </form> 
   <div class="SFueOp">
   </div>
</section>
