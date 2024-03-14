<script>
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


$(document).on("click", ".viewpass", function (event) {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    $('.vv').removeClass('fa-eye-slash');
    $('.vv').addClass('fa-eye');
  } else {
    x.type = "password";
    $('.vv').addClass('fa-eye-slash');
    $('.vv').removeClass('fa-eye');

  }
});

$(document).on("click", ".viewpassreg", function (event) {
  var x = document.getElementById("regpassword");
  if (x.type === "password") {
    x.type = "text";
    $('.rvv').removeClass('fa-eye-slash');
    $('.rvv').addClass('fa-eye');
  } else {
    x.type = "password";
    $('.rvv').addClass('fa-eye-slash');
    $('.rvv').removeClass('fa-eye');

  }
});

//////

// $(document).on("change", "#cat_id", function () {
//     const getUrl = window.location;
//     const base_url = getUrl.protocol + "//" + getUrl.host + "/" ;
//  //   console.log($(this).val());
//      if($(this).val()!=''){
//     window.location.href=base_url + 'category/' + $(this).val();
//  }
// });
// $(document).on("change", "#sort_by", function () {
//     const getUrl = window.location;
//     const base_url = getUrl.protocol + "//" + getUrl.host + "/" ;
//     let catSlug=$('#cat_id').val();
//  //   console.log($(this).val());
//     // window.location.href=base_url + 'category/' + catSlug + '/?sort_by=' + $(this).val();
//  <?php if(!empty($this->input->get('keyword'))):?>
//         window.location.href=base_url + 'search/?keyword=<?= $this->input->get('keyword');?>' + catSlug + '&sort_by=' + $(this).val();
//     <?php else:?>
//      window.location.href=base_url + 'category/' + catSlug + '/?sort_by=' + $(this).val();
//     <?php endif;?>
// });

///////////
// $(document).on("change", "#servicecat_id", function () {
//     const getUrl = window.location;
//     const base_url = getUrl.protocol + "//" + getUrl.host + "/" ;
//  //   console.log($(this).val());
//      if($(this).val()!=''){
//     window.location.href=base_url + 'services/' + $(this).val();
//  }
// });

///////different shipping
// $(document).on("change", "#differentShipping", function () {
//      if(this.checked) {
//         $('.shippingAddress').slideUp('slow');
//         $('.billingButton').show();
//         $(".shippinField").attr("required", false);
//     }else{
//         $('.billingButton').hide();
//         $(".shippingAddress").animate( { "opacity": "show", top:"10"} , 500 );
//         $(".shippinField").attr("required", true);
//     }
// });


/////redirect checkout
$(document).on("click", ".goCheckout", function () {
    const getUrl = window.location;
 //   const base_url = getUrl.protocol + "//" + getUrl.host + "/";
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
    window.location.href=base_url + 'checkout';
});


/////////ajax search
$(document).on("input", "#input_search", function () {
   // var c = $("#input_search").val();
	//var c =document.getElementById("input_search").value;
	//alert(c);
	//var c='product';
    var b = $(this).val();
	//alert(b);
    if (b.length < 2) {
        $(".responseSearchResults").hide();
        return false;
    }
    var a = { keyword: b,csrf_modesy_token:getCookie('csrf_modesy_token')};
    $.ajax({
        type: "POST",
        url: base_url + "ajax/ajax_search",
        data: a,
        success: function (e) {
			
          // console.log(e);
           // var d = JSON.parse(e);
		   var d =$.parseJSON(e);
			console.log(d.response);
        if (d.result == 1) {
				 $(".responseSearchResults").html(d.response);
                //document.getElementById("response_search_resultsmobile").innerHTML = d.response;
                $(".responseSearchResults").show();
            }
            $(".responseSearchResults ul li a").wrapInTag({ words: [b] });
        },
    });
});
// $(document).on("click", function (a) {
//     if ($(a.target).closest(".top-search-bar").length === 0) {
//         $(".responseSearchResults").hide();
//     }
// });

// $.fn.wrapInTag = function (b) {
//     function a(g) {
//         return g.textContent ? g.textContent : g.innerText;
//     }
//     var e = b.tag || "strong",
//         f = b.words || [],
//         c = RegExp(f.join("|"), "gi"),
//         d = "<" + e + " style=\"color:#ef4036\">$&</" + e + ">";
//     $(this)
//         .contents()
//         .each(function () {
//             if (this.nodeType === 3) {
//                 $(this).replaceWith(a(this).replace(c, d));
//             } else {
//                 if (!b.ignoreChildNodes) {
//                     $(this).wrapInTag(b);
//                 }
//             }
//         });
// };

/////favorite

// $(document).on("click", ".fav", function () {
//     const getUrl = window.location;
//     const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
//     <?php
//         if(!auth_check()){
//     ?>
//         // $('#login_modal').modal('show');
//         window.location.href = "<?= base_url('/login'); ?>";
//     <?php 
//         }else{
//     ?>
//     var productId = $(".fav").attr("id");
//     alert(productId);
//     var a = { product_id: productId,csrf_modesy_token:getCookie('csrf_modesy_token')};
//     $.ajax({
//         type: "POST",
//         url: base_url + "ajax/set_favorite",
//         data: a,
//         success: function (e) {
// 		    var d =$.parseJSON(e);
//             clearTost();
//             //var obj = JSON.parse(response);
//             // console.log(response);
//             if (d.status == 1) {
//                 showToast('success','',d.msg); 
//             }else{
//                 showToast('error','',d.msg);
//             }
//         },
//     });
//     <?php 
//     }
//     ?>
// });

function add_wishlist(productId,from_details=0){
    // alert(product_id);
    const getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
    <?php
        if(!auth_check()){
    ?>
        // $('#login_modal').modal('show');
        window.location.href = "<?= base_url('/login'); ?>";
    <?php 
        }else{
    ?>
    var a = { product_id: productId,csrf_modesy_token:getCookie('csrf_modesy_token')};
    $.ajax({
        type: "POST",
        url: base_url + "ajax/set_favorite",
        data: a,
        success: function (e) {
		    var d =$.parseJSON(e);
            clearTost();
            if (d.status == 1) {
                if(from_details == 1){
                    var buttonwish = document.getElementById("wishidlist"+productId);
                    buttonwish.classList.add("wiss_activ");
                    var buttonbest = document.getElementById("wishidbest"+productId);
                    buttonbest.classList.add("wiss_activ");
                    showToast('success','',d.msg); 
                }else{
                    showToast('success','',d.msg); 
                }
            }else{
                if(from_details == 1){
                    var buttonwis = document.getElementById("wishidlist"+productId);
                    if (buttonwis.classList.contains("wiss_activ")) {
                        buttonwis.classList.remove("wiss_activ");
                    }
                    var buttonbest = document.getElementById("wishidbest"+productId);
                    if (buttonbest.classList.contains("wiss_activ")) {
                        buttonbest.classList.remove("wiss_activ");
                    }
                    showToast('error','',d.msg);
                }else{
                    showToast('error','',d.msg);
                }
            }
        },
    });
    <?php 
    }
    ?>
}




///////////
$(document).on("click", "#review-submit-button", function () {
    $('#review-submit-button').addClass('eventbtn');
    const getUrl = window.location;
    // const base_url = getUrl.protocol + "//" + getUrl.host + "/" ;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

    <?php if(!auth_check()){ ?>
        window.location.href = "<?= base_url('/login'); ?>";
    <?php //redirect('/login'); ?>
    <?php }else{ ?>
        // var productId = $(".fav").attr("id");
        var productId = <?= !empty($product) ? $product->id : 0; ?>;
        var rating = $('#rating').val();
        var review = $('#review').val();
        var reviewTitle = $('#review_title').val();
        var a = { product_id:productId,rating_count:rating,review_title:reviewTitle,comment:review,csrf_modesy_token:getCookie('csrf_modesy_token') };

        if(rating==null || rating=='' || rating==0 || rating=='undefined'){
            showToast('error','','Star Rating Can not be null');
            $('#review-submit-button').removeClass('eventbtn');
        }else{
            $.ajax({
                type: "POST",
                url: base_url + "saveReview",
                data: a,
                // dataType:'json',
                success: function (e) {
                    // var d = JSON.parse(e);
                    var d =$.parseJSON(e);
                    if (d.status == 0) {
                        showToast('error','',d.msg);
                        $('#review-submit-button').removeClass('eventbtn');
                    }else{
                        $('#review').val('');
                        $('#review_title').val('');
                        $('#rating').val('');
                            //getReviewForm(); 
                        showToast('success','',d.msg); 
                        $('#review-submit-button').removeClass('eventbtn');
                    }
                },
            });
        }
    <?php } ?>
});




function getReviewForm(){
 $.ajax({
        type: "GET",
        url: base_url + "ajax/getReviewForm",
      	dataType:'html',
        success: function (e) {
		    // var d =$.parseJSON(e);
			  $('#reviewForm').html(e);
        
        },
    });

}


        //$('.leftpan, .rightpan').theiaStickySidebar({'additionalMarginTop':60});


         $('input[type=radio][name=addrradio]').change(function() {
             if (this.value=='fornewaddr'){
              $('#orderdiv').fadeIn(500);
              $('.validate'). prop('required',true);
            }else{
              $('.validate'). prop('required',false);
              $('#orderdiv').fadeOut(150);
            }
         });


        $('input[type=radio][name=payment_option]').change(function() {
            if(this.value=='cash_on_delivery'){
                $.ajax({
                    url: base_url + "fetchCartCount",
                    type: "post",
                    data: '',
                    dataType: "json",
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if (response.status == 1) {
                            // console.log(response.grandtotal);
                            // $('#CartCount').html(response.qty);
                            // $('#subtol').html(response.cartTotal);
                            $('#shiptptal').html(response.shipping)
                            $('#gdtotal').html(response.grandtotal);
                            // $('#taxable').html('₹ 0.00')
                            // get_cart();
                        }else{
                    
                        }
                    }
                });
            }
            if (this.value=='q_r_code'){
                $('#qrdiv').fadeIn(500);
                $.ajax({
                    url: base_url + "fetchPrepaidShipping",
                    type: "post",
                    data: '',
                    dataType: "json",
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if (response.status == 1) {
                            // $('#CartCount').html(response.qty);
                            // $('#subtol').html(response.cartTotal);
                            $('#shiptptal').html(response.shipping)
                            $('#gdtotal').html(response.grandtotal);
                            // $('#taxable').html('₹ 0.00')
                        }else{
                    
                        }
                    }
                });
            }else{
                $('#qrdiv').fadeOut(150);
            }
        });
      

// $(document).on("click", "#rr", function () {
// $('#home').removeClass('active');
// $('#pd').removeClass('active');
// $('#menu2').addClass('active show');
// $('#pr').addClass('active');
// });

// $(document).on("change", "#profileImage", function () {
//     //e.preventDefault();
//     var file = this.files[0];
//     var fileType = file.type;
//     var match = ['image/jpeg', 'image/png', 'image/jpg'];
//     if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
//         alert('Sorry, only JPEG, & PNG files are allowed to upload.');
//         $("#profileImage").val('');
//         return false;
//     }
//  console.log('Hello');
//     var file_data = $('#profileImage').prop('files')[0];
//     var form_data = new FormData();
//     form_data.append('file', file_data);
//    // form = $('#profileForm');
   
//     const getUrl = window.location;
//     const base_url = getUrl.protocol + "//" + getUrl.host + "/" ;

//         $.ajax({
//             type: 'POST',
//             url: base_url + "ajax/saveProfilePicture",
//             data: form_data,
//             dataType: 'json',
//             contentType: false,
//             cache: false,
//             processData:false,
//             beforeSend: function(){
//                 //$('.submitBtn').attr("disabled","disabled");
//                 //$('#fupForm').css("opacity",".5");
//             },
//             success: function(response){
//                 // $('.statusMsg').html('');
//                  if(response.status == 1){
//                     $('.img-account-profile').attr('src',response.img_url);
//                 //     $('#fupForm')[0].reset();
//                 //     $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
//                  }else{
//                 //     $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
//                  }
//                 // $('#fupForm').css("opacity","");
//                 // $(".submitBtn").removeAttr("disabled");
//             }
//         });
//     });

    // File type validation
// $("#file").change(function() {
//     var file = this.files[0];
//     var fileType = file.type;
//     var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
//     if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
//         alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
//         $("#file").val('');
//         return false;
//     }
// });

// //////////
// $(document).on("click", "#login_with_otp", function () {
// $('#emailLoginForm').hide();
// $('#otpLoginForm').show();
// });

// //////////forget password
// $(document).on("click", "#forgetPassword", function () {
// $('#emailLoginForm').hide();
// $('#login_with_otp').hide();
// $('#forgetpasswordForm').show();
// });

// //////////back to login
// $(document).on("click", "#backtoLogin", function () {
// $('#emailLoginForm').show();
// $('#login_with_otp').show();
// $('#otpLoginForm').hide();
// $('#forgetpasswordForm').hide();
// });

/////////// reset password link
// $(document).on("click", ".forgetPass", function () {
//     const getUrl = window.location;
//     const base_url = getUrl.protocol + "//" + getUrl.host + "/" ;
   
// 	let emailId = $('#forgetEmail').val(); 
//    if(emailId!=''){
//     var a = { email: emailId,csrf_modesy_token:getCookie('csrf_modesy_token')};

//     $.ajax({
//         type: "POST",
//         url: base_url + "forgot-password-post",
//         data: a,
//     	//dataType:'json',
//         success: function (e) {
// 		   var d =$.parseJSON(e);
			
//              if (d.status == 0) {
//                 $("#forgetpasswordresponse").html(d.msg);
//              	$("#forgetpasswordresponse").attr('style','color:#ef4036');
//              }else{
//                  $("#forgetpasswordresponse").html(d.msg); 
//              $("#forgetpasswordresponse").attr('style','color:#198754');
//              }
//         },
//     });
//    }else{
//   				$("#forgetpasswordresponse").html(d.msg);
//              	$("#forgetpasswordresponse").attr('style','color:#ef4036');
//    }
   
// });
<?= get_custom_javascript();?>
</script>