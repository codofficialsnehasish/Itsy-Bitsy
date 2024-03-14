function confirmDelete(val, returnUrl) {
        const getUrl = window.location;
        if (getUrl.host == 'localhost') {
                callBcak = "/admin/" + returnUrl;
        } else {
                callBcak = "/" + returnUrl;
        }
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + callBcak + "/";
        console.log(baseUrl);
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: baseUrl + "delete/",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        id: val
                                },
                                dataType: "html",
                                success: function () {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                window.location.href = baseUrl;
                                        })
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}

function confirmDeleteQuestion(val, returnUrl) {
        const getUrl = window.location;
        if (getUrl.host == 'localhost') {
                callBcak = "/admin/" + returnUrl;
        } else {
                callBcak = "/" + returnUrl;
        }
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + callBcak + "/";
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: baseUrl + "delete/",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        id: val
                                },
                                dataType: "html",
                                success: function () {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                var post_order_ids = new Array();
                                                $('#post_list li').each(function () {
                                                        if ($(this).data("post-id") != val) {
                                                                post_order_ids.push($(this).data("post-id"));
                                                        }
                                                });
                                                $.ajax({
                                                        url: baseUrl+"update-category-order",
                                                        method: "POST",
                                                        data: { post_order_ids: post_order_ids },
                                                        success: function (data) {
                                                                if (data) {
                                                                        $('#post_list').html(data);
                                                                        $(".alert-danger").hide();
                                                                        $(".alert-success").show();
                                                                        $(".alert-success").fadeOut(5000);
                                                                } else {
                                                                        $(".alert-success").hide();
                                                                        $(".alert-danger").show();
                                                                }
                                                        }
                                                });


                                                // window.location.href = baseUrl;
                                        })
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}



function deleteRow(btn) {
        Swal.fire({
                title: 'Are you sure?',
                text: "You want to Remove!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        Swal.fire(
                                'Success!',
                                'Removed Successfully.',
                                'success'
                        ).then((e) => {
                                var row = btn.parentNode.parentNode;
                                row.parentNode.removeChild(row);

                        })

                }
        })

}

////////////set Visible
function confirmVisible(val,returnUrl,visibleStatus) {
        var visibleStatusMsg;
        if(visibleStatus=='visible'){
                visibleStatusMsg = 'Invisible';
        } else{
                visibleStatusMsg = 'Visible';
        }
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/" + returnUrl + "/";
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to " + visibleStatusMsg + " this Item!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, ' + visibleStatusMsg + ' it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                url: baseUrl + "visibility-status/",
                                type: "POST",
                                data: {
                                csrf_modesy_token:getCookie('csrf_modesy_token'),
                                id: val
                                },
                                dataType: "html",
                                success: function() {
                                        Swal.fire(
                                                'Success!',
                                                'Your Item has been ' + visibleStatusMsg + ' Successfully.',
                                                'success'
                                                ).then((e) => {
                                                        window.location.href=baseUrl;
                                                })
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!", "Please try again", "error");
                                }
                        });
                        
                        }
                        })
                        
    }

    
    ///////////set option Visible
function confirmOptionVisible(val,returnUrl,visibleStatus,ques_id) {
        var visibleStatusMsg;
        if(visibleStatus=='visible'){
                visibleStatusMsg = 'Invisible';
        } else{
                visibleStatusMsg = 'Visible';
        }
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/" + returnUrl + "/";
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to " + visibleStatusMsg + " this Item!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, ' + visibleStatusMsg + ' it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                url: baseUrl + "question-option-visibility-status/",
                                type: "POST",
                                dataType: "html",
                                data: {
                                csrf_modesy_token:getCookie('csrf_modesy_token'),
                                opt_id: val,
                                question_id:ques_id
                                },
                                dataType: "html",
                                success: function(response) {
                                        Swal.fire(
                                                'Success!',
                                                'Your Item has been ' + visibleStatusMsg + ' Successfully.',
                                                'success'
                                                ).then((e) => {
                                                     //   window.location.href=baseUrl;
                                                })
                                                var obj = JSON.parse(response);
                                                if (obj.result == 1) {
                                                        document.getElementById("response_option").innerHTML = obj.html_content;
                                                }
        
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!", "Please try again", "error");
                                }
                        });
                        
                        }
                        })
                        
    }

        ///////////set child option Visible
function confirmChildOptionVisible(val,returnUrl,visibleStatus,ques_id,parentId) {
        var visibleStatusMsg;
        if(visibleStatus=='visible'){
                visibleStatusMsg = 'Invisible';
        } else{
                visibleStatusMsg = 'Visible';
        }
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/admin/" + returnUrl + "/";
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to " + visibleStatusMsg + " this Item!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, ' + visibleStatusMsg + ' it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                                $.ajax({
                                url: baseUrl + "question-child-option-visibility-status/",
                                type: "POST",
                                dataType: "html",
                                data: {
                                csrf_modesy_token:getCookie('csrf_modesy_token'),
                                opt_id: val,
                                question_id:ques_id,
                                parent_id:parentId
                                },
                                dataType: "html",
                                success: function(response) {
                                        Swal.fire(
                                                'Success!',
                                                'Your Item has been ' + visibleStatusMsg + ' Successfully.',
                                                'success'
                                                ).then((e) => {
                                                     //   window.location.href=baseUrl;
                                                })
                                                var obj = JSON.parse(response);
                                                if (obj.result == 1) {
                                                      //  $('#childOptionModal').modal('show');
                                                        document.getElementById("response_child_option").innerHTML = obj.html_content;
                                                }
        
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!", "Please try again", "error");
                                }
                        });
                        
                        }
                        })
                        
    }
///////////////////////////////////////////////
function cardaddedError() {
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/payment-details";

        Swal.fire({
                text: "Kindly add your card details to proceed further",
                confirmButtonColor: "#198754",
                confirmButtonText: "Proceed",
                icon: "warning"
        }).then((result) => {
                window.location.href = baseUrl;
        })
}




function goLiveError() {
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/admin/projects";

        Swal.fire({
                text: "Projects is Under FVFP Process, Please Complete The FVFP Process to Go Live",
                confirmButtonColor: "#198754",
                confirmButtonText: "Proceed",
                icon: "warning"
        }).then((result) => {
                window.reloasd();
                //  window.location.href=baseUrl;
        })
}




function delete_product_variation(val) {
         const getUrl = window.location;
        // const base_url = getUrl.protocol + "//" + getUrl.host + "/";
        if(getUrl.host=='localhost'){
                base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
           }else{
                base_url = getUrl.protocol + "//" + getUrl.host + "/";
           }
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: base_url + "delete-variation-post",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        id: val
                                },
                                dataType: "html",
                                success: function (response) {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                // window.location.href=baseUrl;
                                        })
                                        var obj = JSON.parse(response);
                                        if (obj.result == 1) {
                                                document.getElementById("response_product_variations").innerHTML = obj.html_content;
                                        }

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}

//////////////////////////////////////

//delete product variation option


function delete_question_option(question_id, opt_id) {
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: base_url + "delete-option",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        question_id: question_id,
                                        opt_id: opt_id
                                },
                                dataType: "html",
                                success: function (response) {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                // window.location.href=baseUrl;
                                        })
                                        var obj = JSON.parse(response);
                                        if (obj.result == 1) {
                                                document.getElementById("response_option").innerHTML = obj.html_content;
                                        }

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}

////////delete child option

function delete_question_child_option(question_id, opt_id,parentId) {
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: base_url + "delete-child-option",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        question_id: question_id,
                                        opt_id: opt_id,
                                        parent_id:parentId
                                },
                                dataType: "html",
                                success: function (response) {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                // window.location.href=baseUrl;
                                        })
                                        var obj = JSON.parse(response);
                                        if (obj.result == 1) {
                                                document.getElementById("response_child_option").innerHTML = obj.html_content;
                                        }

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}

//////////////////////////////////////Delete cart
function remove_from_cart(val, returnUrl) {
        const getUrl = window.location;
        //const baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: baseUrl + "cart_controller/remove_from_cart/",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        cart_item_id: val
                                },
                                dataType: "html",
                                success: function () {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                window.location.href = baseUrl + returnUrl;
                                        })
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}



function loginConfirm(loginStatus) {
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        Swal.fire({
                title: 'Would You Like to Save this Result?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'No',
                confirmButtonText: 'Yes'
        }).then((result) => {
                if (result.isConfirmed) {   
                  if(loginStatus=='notLogedIn'){
                        $('#exampleModal').modal('show');
                        $('#register_type').val('question');
                        $('#login_type').val('question');
                  }else{
                        window.location.href=baseUrl + '/questions/doSave';  
                  }
                }else{
                        window.location.href=baseUrl + '/questions/doNotSave';   
                }
        })

}

function cancelOrder(val, orderId, returnurl) {
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                                url: baseUrl + "order_controller/cancel_order_product",
                                type: "POST",
                                data: {
                                        csrf_modesy_token: getCookie('csrf_modesy_token'),
                                        id: val
                                },
                                dataType: "html",
                                success: function () {
                                        Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                        ).then((e) => {
                                                // window.location.href = baseUrl + 'order-details/' + orderId;
                                                window.location.href = baseUrl + returnurl + '/' + orderId;
                                        })
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                }
                        });

                }
        })

}