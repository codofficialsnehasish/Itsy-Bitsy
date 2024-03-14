<?php $this->load->view('partials/customScript');?>
<script>
        const getUrl = window.location;
        //const base_url = getUrl.protocol + "//" + getUrl.host + "/filthygainzinc/" ;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
    $(document).ready(function() {
        <?php  if ($this->auth_check) {?>
        fetchCart();
        <?php }?>
        /*
        * Contact Form
        */
        $(document).on("submit", "#contactForm", function (event) {
                $('.loader2').show();
                const getUrl = window.location;
                const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
                var form = $("#contactForm");
                var serializedData = form.serializeArray();
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                $.ajax({
                    url: base_url + "contact-us/process",
                    type: "post",
                    data: serializedData,
                    dataType: "json",
                    success: function (response) {
                        $('.loader2').hide();
                        //var obj = JSON.parse(response);
                        console.log(response);
                        if (response.status == 1) {
                                form[0].reset();  
                                showToast('success','Success',response.msg);                         
                        }else{
                            // showToast('error','Error',response.msg);
                        var numbersArray = response.msg.split('\n');
                            $.each(numbersArray, function(index, value) { 
                            // console.log(index + ': ' + value);
                            showToast('error','Error',value);
                            });

                        }
                    }
            });
            event.preventDefault();
        });
       
        /*
        *login
        */
        $(document).on("submit", "#loginForm", function (event) {
                $('.logbtn').addClass('eventbtn'); 
                // $('.login').prop("disabled", true);
                // $('.login').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
                var form = $("#loginForm");
                var serializedData = form.serializeArray();
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                $.ajax({
                    url: base_url + "auth-process",
                    type: "post",
                    data: serializedData,
                    dataType: "json",
                    beforeSend: function() {
                        showToast('info','','Processing Your Request');
                    },
                    success: function (response) {
                        clearTost();
                    // $('.loader2').hide();
                        //var obj = JSON.parse(response);
                        console.log(response);
                        if (response.status == 1) {
                                showToast('success','',response.msg); 
                                setTimeout(window.location.replace(base_url), 3000);
                                //form[0].reset();  
                        }else{
                            $('.logbtn').removeClass('eventbtn'); 
                            let numbersArray = response.msg.split('\n');
                            $.each(numbersArray, function(index, value) { 
                            console.log(index + ': ' + value);
                            showToast('error','',value);
                            });
                        }
                    }
            });
            event.preventDefault();
        });
        /*
        *registraton
        */
        $(document).on("submit", "#regForm", function (event) {
                // $('.login').prop("disabled", true);
                // $('.login').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
                var form = $("#regForm");
                var serializedData = form.serializeArray();
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                $.ajax({
                    url: base_url + "registration",
                    type: "post",
                    data: serializedData,
                    dataType: "json",
                    beforeSend: function() {
                        $('.regbtn').addClass('eventbtn'); 
                        //('info','','Processing Your Request');
                    },
                    success: function (response) {
                        clearTost();
                    // $('.loader2').hide();
                        //var obj = JSON.parse(response);
                        console.log(response);
                        if (response.status == 1) {
                                showToast('success','',response.msg); 
                                setTimeout(window.location.replace(base_url), 3000);
                                //form[0].reset();  
                        }else{
                            $('#regpassword').val('');
                            $('.regbtn').removeClass('eventbtn'); 
                            let numbersArray = response.msg.split('\n');
                            $.each(numbersArray, function(index, value) { 
                            console.log(index + ': ' + value);
                            showToast('error','',value);
                            });
                        }
                    }
            });
            event.preventDefault();
        });
        /*
        *add to cart
        */
        $(document).on("submit", "#form_add_cart", function (event) {
                var form = $("#form_add_cart");
                var serializedData = form.serializeArray();
                // console.log(serializedData);
                serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
                $.ajax({
                    url: base_url + "add-to-cart",
                    type: "post",
                    data: serializedData,
                    dataType: "json",
                    beforeSend: function() {
                        $('.adcartbtn').addClass('eventbtn'); 
                    },
                    success: function (response) {
                        clearTost();
                        //var obj = JSON.parse(response);
                        // console.log(response);
                        if (response.status == 1) {
                                showToast('success','',response.msg); 
                               // setTimeout(window.location.replace(base_url), 3000);
                                //form[0].reset();  
                                $('.adcartbtn').removeClass('eventbtn'); 
                                fetchCart();
                        }else{
                            $('.adcartbtn').removeClass('eventbtn'); 
                            let numbersArray = response.msg.split('\n');
                            $.each(numbersArray, function(index, value) { 
                           // console.log(index + ': ' + value);
                            showToast('error','',value);
                            });
                        }
                    }
            });
            event.preventDefault();
        });
  
          /////////////////////////////get state name
          $("#country_id").on('change', function(){ 
                $("#states_id").html('');
                    const countryid= $(this).val();
                        $.ajax({
                            url : base_url + "get-state-list",
                            data:{country_id : countryid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                            method:'post',
                            dataType:'json',
                            beforeSend: function(){
                                $('#states_id').addClass('eventbtn'); 
                                },
                            success:function(response) {
                                $("#states_id").append('<option value="">Select State</option>');
                                $.each(response , function(index, item) { 
                                    $("#states_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                                });
                             $('.spinner-border').hide();
                            }
                        });
            });

        //////////////////////////////get city list
        $("#states_id").on('change', function(){ 
                $("#citys_id").html('');
                    const stateid= $(this).val();
                //    console.log(base_url);
                        $.ajax({
                            url : base_url + "get-city-list",
                            data:{state_id : stateid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                            method:'post',
                            dataType:'json',
                            beforeSend: function(){
                                $('#citys_id').html('<option value="">Loading...</option>'); 
                                },
                            success:function(response) {
                                $("#citys_id").html('');
                                $("#citys_id").append('<option value="">Select City</option>');
                                $.each(response , function(index, item) { 
                                    // console.log(item.name)
                                    $("#citys_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                                });
                            //  $('.spinner-border').hide();
                            }
                        });
    });

    });

    function fetchCart(){
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
                    $('#CartCount').html(response.qty);
                    $('#subtol').html(response.cartTotal);
                    $('#shippingcost').html(response.shipping)
                    $('#tot').html(response.grandtotal);
                    if(response.qty > 0){
                        $('#taxable').html('₹ 0.00');
                    }else{
                        $('#taxable').html('0.00');
                    }
                    get_cart();
                }else{
              
                }
            }
        });

    }

    function get_cart(){
        $.ajax({
            url: base_url + "fetchCartCount",
            type: "post",
            data: '',
            dataType: "json",
            beforeSend: function() {
            },
            success: function (response) {
                if (response.status == 1) {
                    $('#CartCount').html(response.qty);
                    $('#subtol').html(response.cartTotal);
                    $('#shippingcost').html(response.shipping)
                    $('#tot').html(response.grandtotal);
                    if(response.qty > 0){
                        $('#taxable').html('₹ 0.00');
                    }else{
                        $('#taxable').html('0.00');
                    }
                    if(response.qty == 0){
                        $("#CartCount").css("display", "none");
                    }else{
                        $("#CartCount").css("display", "block");
                    }
                }else{
              
                }
            }
        });
    }

    function cart_popup_data(){
        $.ajax({
            url: base_url + "showCartPopupData",
            type: "get",
            data: '',
            // dataType: "json",
            beforeSend: function() {
            },
            success: function (response) {
                // alert(response);
                // console.log(response);
                // alert(response);
                $('#listproduicttoggle').html(response);
                // $.each(response, function(index, value){
                //     console.log(value);
                //     console.log(value.id);
                //     getAndShowProduct(value.product_id);
                // });
                get_cart();
            }
        });
    }
    function getAndShowProduct(id){
        $.ajax({
            url: base_url + "getAndShowProduct",
            type: "post",
            data: '',
            data:{product_id : id,csrf_modesy_token:getCookie('csrf_modesy_token')},
            dataType: "json",
            beforeSend: function() {
            },
            success: function (response) {
                // alert(response);
                $.each(response, function(index, value){
                    console.log(value);
                    // console.log(value.id);
                    
                });
            }
        });
    }

    function pageRedirect() {
            window.location.replace(base_url + "dashboard");
    }  
///////////////////////////////////////////////////////
/////////////////get variations
function select_product_variation_option(c, d, b) {
    var a = { variation_id: c, selected_option_id: b, csrf_modesy_token:getCookie('csrf_modesy_token')};
   // a[csrf_modesy_token] = getCookie('csrf_modesy_token');
    $.ajax({
        type: "POST",
        url: base_url + "select-variation-option",
        data: a,
        success: function (f) {
            var e = JSON.parse(f);
            if (e.status == 1) {
                if (e.html_content_price != "") {
                    document.getElementById("product_details_price_container").innerHTML = e.html_content_price;
                }
                if (e.html_content_stock != "") {
                    document.getElementById("text_product_stock_status").innerHTML = e.html_content_stock;
                    if (e.stock_status == 0) {
                        $(".btn-product-cart").attr("disabled", true);
                       // $(".btn-product-cart").hide();
                    } else {
                        $(".btn-product-cart").attr("disabled", false);
                    $(".btn-product-cart").show();
                    }
                }
                if (e.html_content_slider != "") {
                    $("#product_slider").slick("unslick");
                    $("#product_thumbnails_slider").slick("unslick");
                    console.log("got slick");
                    document.getElementById("product_slider_container").innerHTML = e.html_content_slider;
                    $("#product_slider").slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        speed: 300,
                        arrows: true,
                        fade: true,
                        infinite: false,
                        swipeToSlide: true,
                        cssEase: "linear",
                        lazyLoad: "progressive",
                        prevArrow: $("#product-slider-nav .prev"),
                        nextArrow: $("#product-slider-nav .next"),
                        asNavFor: "#product_thumbnails_slider",
                    });
                    $("#product_thumbnails_slider").slick({
                        slidesToShow: 7,
                        slidesToScroll: 1,
                        speed: 300,
                        focusOnSelect: true,
                        arrows: false,
                        infinite: false,
                        vertical: true,
                        centerMode: false,
                        arrows: true,
                        cssEase: "linear",
                        lazyLoad: "progressive",
                        prevArrow: $("#product-thumbnails-slider-nav .prev"),
                        nextArrow: $("#product-thumbnails-slider-nav .next"),
                        asNavFor: "#product_slider",
                    });
                }
            }
            if (d == "dropdown") {
                get_sub_variation_options(c, b);
            }
        },
    });
}


// function updateCart(cartId,productId,qty,sign){
//     console.log(cartId);
//     console.log(productId);
//     console.log(qty);
//     console.log(sign);
//     if(sign == "+"){
//         var a = { product_id: productId, cart_item_id: cartId, quantity: qty, status : 1, csrf_modesy_token:getCookie('csrf_modesy_token') };
//     }else{
//         var a = { product_id: productId, cart_item_id: cartId, quantity: qty, status : 0, csrf_modesy_token:getCookie('csrf_modesy_token') };
//     }
//     $.ajax({
//         type: "POST",
//         url: base_url + "update-cart-product-quantity",
//         data: a,
//         success: function (b) {
//             console.log(b);
//             location.reload();
//         },
//     });  
// }

$(document).on("click", ".newsEmail", function () {
    let newsEmail= $('#news_email').val();
    var a = { email: newsEmail,csrf_modesy_token:getCookie('csrf_modesy_token') };
    $.ajax({
        type: "POST",
        url: base_url + "contact-us/newsletter",
        data: a,
        success: function (b) {
            var respObj = JSON.parse(b);
            // console.log(respObj.msg);
            if(respObj.status == 1){
                showToast('success','',respObj.msg); 
            }else{
                showToast('error','',respObj.msg); 
            }
            $('#news_email').val('');
            // $('#newsRes').html(b);
            // $('#newsRes').fadeOut(5000);
            //location.reload();
        },
    });  
});

function updateCartfromcart(cartId,productId,qty,sign){
    // console.log(cartId);
    // console.log(productId);
    // console.log(qty);
    var Qty = document.getElementById("updatescartquantity"+cartId);
    // console.log(Qty.value);
    // console.log(sign);
    if(sign == "+"){
        var a = { product_id: productId, cart_item_id: cartId, quantity: qty, status : 1, csrf_modesy_token:getCookie('csrf_modesy_token') };
    }else{
        var a = { product_id: productId, cart_item_id: cartId, quantity: qty, status : 0, csrf_modesy_token:getCookie('csrf_modesy_token') };
    }
    $.ajax({
        type: "POST",
        url: base_url + "update-cart-product-quantity",
        data: a,
        success: function (resp) {
            // console.log(resp);
            // var respObj = JSON.parse(resp);
            // console.log(respObj);
            location.reload();
            // $("#updatescartquantity"+cartId).val(respObj.qty);
            // get_cart();
        }
    });  
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function isMobile(mobile){
    var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
    return re.test(mobile);
}

   //add product variation option
   function productQuickView(id) {
        var data = {
            "product_id": id,
            "csrf_modesy_token": getCookie('csrf_modesy_token')
        };
        $.ajax({
            url: base_url + "productQuickView",
            type: "post",
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.result == 1) {
                    document.getElementById("responseSingleProductPreview").innerHTML = obj.html_content;
                   
                }
                setTimeout(
                    function () {
                        $("#quickProductView").modal('show');
                    }, 250);
            }
        });
    }


    function addToCart(id){
        console.log(id)
        var form = $("#cartForm" + id);
        // var form = $("#form_add_cart_go");
        var serializedData = form.serializeArray();
        serializedData.push({
            // name: "csrf_modesy_token", value: getCookie('csrf_modesy_token'),
            product_id : id, product_quantity : 1
        });
        // console.log(serializedData);
        $.ajax({
            url: base_url + "add-to-cart-single",
            type: "post",
            data: serializedData,
            dataType: "json",
            beforeSend: function() {
                $('.adcartbtn').addClass('eventbtn'); 
            },
            success: function (response) {
                clearTost();
                //var obj = JSON.parse(response);
                console.log(response);
                // alert("ok");
                if (response.status == 1) {
                    // alert("ok");
                        showToast('success','',response.msg); 
                        // setTimeout(window.location.replace(base_url), 3000);
                        //form[0].reset();  
                        $('.adcartbtn').removeClass('eventbtn'); 
                        
                        fetchCart();
                        // location.reload(true);
                }else{
                    $('.adcartbtn').removeClass('eventbtn'); 
                    let numbersArray = response.msg.split('\n');
                    $.each(numbersArray, function(index, value) { 
                    // console.log(index + ': ' + value);
                    showToast('error','',value);
                    });
                }
            }
        });
        // event.preventDefault();
    }

    function removefrompopupcart(cartID){
        const getUrl = window.location;
        //const baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        $.ajax({
            url: baseUrl + "cart_controller/remove_from_cart/",
            type: "POST",
            data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    cart_item_id: cartID
            },
            dataType: "html",
            success: function (resp) {
                cart_popup_data();
            },
        });
    }

    function updateCart(cartId,productId,qty,sign){
        // console.log(cartId);
        // console.log(productId);
        // console.log(qty);
        var Qty = document.getElementById("updatescartquantity"+cartId);
        // console.log(Qty.value);
        // console.log(sign);
        if(sign == "+"){
            var a = { product_id: productId, cart_item_id: cartId, quantity: Qty.value, status : 1, csrf_modesy_token:getCookie('csrf_modesy_token') };
        }else{
            var a = { product_id: productId, cart_item_id: cartId, quantity: Qty.value, status : 0, csrf_modesy_token:getCookie('csrf_modesy_token') };
        }
        $.ajax({
            type: "POST",
            url: base_url + "update-cart-product-quantity",
            data: a,
            success: function (resp) {
                // console.log(resp);
                var respObj = JSON.parse(resp);
                // console.log(respObj);
                // location.reload();
                $("#updatescartquantity"+cartId).val(respObj.qty);
                get_cart();
            }
        });  
    }

    function buynow(id){
        var form = $("#form_add_cart");
        // var form = $("#form_add_cart_go");
        var serializedData = form.serializeArray();
        serializedData.push({
            name: "csrf_modesy_token", value: getCookie('csrf_modesy_token'),
            product_id : id, product_quantity : 1
        });
        $.ajax({
            url: base_url + "buy-now",
            type: "post",
            data: serializedData,
            dataType: "json",
            beforeSend: function() {
                $('.adcartbtn').addClass('eventbtn'); 
            },
            success: function (response) {
                clearTost();
                //var obj = JSON.parse(response);
                // console.log(response);
                // alert("ok");
                if (response.status == 1) {
                    // alert("ok");
                        showToast('success','',response.msg); 
                        // setTimeout(window.location.replace(base_url), 3000);
                        //form[0].reset();  
                        $('.adcartbtn').removeClass('eventbtn'); 
                        
                        fetchCart();
                        // location.reload(true);
                }else{
                    $('.adcartbtn').removeClass('eventbtn'); 
                    let numbersArray = response.msg.split('\n');
                    $.each(numbersArray, function(index, value) { 
                    // console.log(index + ': ' + value);
                    showToast('error','',value);
                    });
                }
            }
        });
        // event.preventDefault();
    }
</script>