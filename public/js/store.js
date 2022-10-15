//Global url
const base_url = window.location.origin;


$('#shopPageBtn').click(function () {
    window.location.href = "/store";
})

// PRODUCT LIKE BUTTON AND STORING IT INTO MYSQL DATABASE
//  #################################
function like(target) {
    var product_id = $(target).data('product_id');

    $.ajax({
        method: 'POST',
        url: base_url + '/like',
        dataType: 'json',
        data: { "product_id": product_id },
        success: function (resp) {
            if (resp.code == 0 || resp.code == 1) {
                $(target).toggleClass('is-active');
                $(target).parent().find('span[name="likeCount"]').html(resp.likes);
            }
            else if (resp.code == 2) {
                console.error("Failed to Like")
            }
        },
        error: function (err) {
            console.error(err.responseText);
        }
    });
};
// END OF PRODUCT LIKE BUTTON AND STORING IT INTO MYSQL DATABASE
//  #################################

// Get price by size
function getPriceBySize(target) {
    var product_price = $(target).val();
    var sale_price = $(target).children('option:selected').data('sale_price');

    $(target).parent().parent().find('span[name="product_price"]').html(product_price + " CHF");

    if (sale_price != "") {
        $(target).parent().parent().find('del[name="sale_price"]').html(sale_price);

    }



}

// Add to Cart
function addToCart(target) {
    var product_id = $(target).data('product_id');
    var size_id = "";
    var size_name = "";

    var sizeDropdown = $(target).parent().parent().parent().find('select[name="sizeDropdown"]');
    size_id = sizeDropdown.children('option:selected').data('size_id');
    size_name = sizeDropdown.children('option:selected').text();

    $.ajax({
        method: 'POST',
        url: base_url + '/cart',
        data: {
            "product_id": product_id,
            "size_id": size_id,
            "size_name": size_name
        },
        success: function (resp) {
            if (resp == 0) {
                new Audio(base_url + '/img/cart_add.wav').play();
                refreshCart();
            }
        },
        error: function (err) {
            console.error(err.responseText);
        }
    });
}

    /* update Cart */
    function refreshCart() {
        $.ajax({
            method: 'GET',
            url: base_url + '/refreshCart',
            dataType: 'json',
            data: {},
            success: function (resp) {
                $('#cartBody').html(resp.response);
                $('#cartItemsCount').html(resp.total_item);
                $('#cartItemsCounter').html(resp.total_item);
                $('#totalPrice').html(resp.total_price + " CHF");
                if(resp.total_item > 0)
                {
                    $('#checkoutBtn').removeClass('disabled');
                }
                else{
                    $('#checkoutBtn').addClass('disabled');
                }

            },
            error: function (err) {
                console.error(err.responseText);
            }
        });
    }

    /* product cart item note */
    function cartItemNote(target) {
        var oldDesc = $(target).data('note');
        var cartItemId = $(target).data('cart-item-id');
        
        $('#noteModal').modal('show');

        $('#noteModal').on('shown.bs.modal',(e)=>{
            var targetBtn = $(e.relatedTarget);
            $('#noteText').val(oldDesc);

            $('#noteModal').find('button#noteBtn').click((e)=>{
                $(target).data('note',$('#noteText').val());
                $('#noteModal').modal('hide');
                updateCartItemNote(cartItemId,$(target).data('note'));
            });
        });
    }
    /* save Cart item existing note */
    function updateCartItemNote(cartItemId,note)
    {
        $.ajax({
            method: 'POST',
            url: base_url + '/updateCartItemNote',
            data: {
                "cartItemId": cartItemId,
                "note": note

            },
            success: function (resp) {
                if (resp == 0) {
                    refreshCart();
                }

            },
            error: function (err) {
                console.error(err.responseText);
            }
        });
    }
    /* Cart item quantity */
    function updateCartItemQuantity(target)
    {
        var cartItemId = $(target).data('cart-item-id');
        var quantity = $(target).val();

        
        $.ajax({
            method: 'POST',
            url: base_url + '/updateCartItemQuantity',
            data: {
                "cartItemId": cartItemId,
                "quantity": quantity

            },
            success: function (resp) {
                if (resp == 0) {
                    refreshCart();
                }

            },
            error: function (err) {
                console.error(err.responseText);
            }
        });
    }
    /* remove item from Cart */
    function removeItemFromCart(target)
    {
        var cartItemId = $(target).data('cart-item-id');

        $.ajax({
            method: 'POST',
            url: base_url + '/removeItemFromCart',
            data: {
                "cartItemId": cartItemId

            },
            success: function (resp) {
                if (resp == 0) {
                    refreshCart();
                }

            },
            error: function (err) {
                console.error(err.responseText);
            }
        });
    }

    
    /* Auto Fill Postcode */
    function parsePostcode(city_id)
    {
        $.ajax({
            type: 'GET',
            url: base_url + '/parsePostcode',
            data:{"cityId":city_id},
            success:(resp)=>
            {
                $('#ch-postcode').html(resp);
                $('#ch-postcode').trigger('chosen:updated');
            },
            error:(err)=>
            {
                console.error(err.responseText);
            }
        })
    }
    /* Global form data */
    var formData = new FormData();
    var preloader = document.querySelector('.cs-page-loading');



    var order = { 
        /* set stripe token inside form data  */
        setStripe: function(token)
        {
            formData.append("stripeToken",token.id);
        },
        setPaypalInfo:function(paymentId,paypalUserId){
            formData.append("paypalPaymentId",paymentId);
            formData.append("paypalUserId",paypalUserId);
        },
        submitOrder: function()
        {
            
            $.ajax({
                type: 'POST',
                url:base_url+'/submitOrder',
                dataType:'json',
                data:formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:()=>{
                    preloader.classList.add('active');
                },
                success:(resp)=>{
                    console.log(resp);
                    if(resp.status == "OK")
                    {
                        window.location.href=base_url+"/thankyou/"+resp.orderId;
                    }
                },
                error:(err)=>
                {
                    console.error(err.responseText);
                }
            });
        }
    }

    /* if Input is-Invalid */
    function isInvalid(e)
    {
        e.preventDefault();

        if($('#ch-city').val() == null)
        {
            $('#ch_city_chosen').find('a.chosen-single').addClass('is-invalid');
        }
        else{
            $('#ch_city_chosen').find('a.chosen-single').removeClass('is-invalid');
            $('#ch_city_chosen').find('a.chosen-single').addClass('is-valid');
        }

        if($('#ch-postcode').val() == null)
        {
            $('#ch_postcode_chosen').find('a.chosen-single').addClass('is-invalid');
        }
        else{
            $('#ch_postcode_chosen').find('a.chosen-single').removeClass('is-invalid');
            $('#ch_postcode_chosen').find('a.chosen-single').addClass('is-valid');
        }

        if($('#ch-delivery').val() == null)
        {
            $('#ch_delivery_chosen').find('a.chosen-single').addClass('is-invalid');
        }
        else{
            $('#ch_delivery_chosen').find('a.chosen-single').removeClass('is-invalid');
            $('#ch_delivery_chosen').find('a.chosen-single').addClass('is-valid');
        }
        if($('#date-time-input').val() == "")
        {
            $('#date-time-input').addClass('is-invalid');
            /* $('#date-time-input').parent().find('i').removeClass('fe-calendar'); */
        }
        else{
            $('#date-time-input').removeClass('is-invalid');
            $('#date-time-input').addClass('is-valid');
        }

        
        /* validate order */
        formData.append("lat",$('#lat').val());
        formData.append("lng",$('#lng').val());
        formData.append("firstName",$('#ch-fn').val());
        formData.append("lastName",$('#ch-ln').val());
        formData.append("companyName",$('#ch-company').val());
        formData.append("cityId",$('#ch-city').val());
        formData.append("cityName",$('#ch-city option:selected').text());
        formData.append("streetAddress",$('#ch-address').val());
        formData.append("floor",$('#ch-floor').val());
        formData.append("deliveryType",$('#ch-delivery').val());
        formData.append("deliveryDate",$('#ch-delivery-date').val());
        formData.append("deliveryTime",$('#ch-delivery-time').val());
        formData.append("orderType",$('input[type="radio"][name="radio3"]:checked').val());
        formData.append("postCode",$('#ch-postcode').val());
        formData.append("phone",$('#ch-phone').val());
        formData.append("email",$('#ch-email').val());
        formData.append("orderNotes",$('#ch-order-notes').val());
        formData.append("paymentMethod",$('input[type="radio"][name="payment_method"]:checked').val());

        $.ajax({
            type: 'POST',
            url: base_url + '/validate',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success:(resp)=>
            {
                console.log(resp)
                /* Status: "OK","FAIL","EMPTY_CART","POSTCODE_ERROR" */
                if(resp.status == "FAIL")
                {
                    $('#errorAlert').toast('show');
                    $('#errorAlert').find('div.toast-body').append('<span>Invalid Information</span>');
                    $('html,body').animate({
                        scrollTop: $('#errorAlert').offset().top -300
                    });
                    iziToast.error({
                        icon: 'fe-alert-triangle',
                        title: 'Caution',
                        message: 'You forgot important data',
                        position: 'bottomCenter',
                        transitionIn: 'bounceInUp'
                    });
                }
                if(resp.status == "EMPTY_CART")
                {
                    $('#errorAlert').toast('show');
                    $('#errorAlert').find('div.toast-body').append('<span>Cart is Empty</span>');
                    $('html,body').animate({
                        scrollTop: $('#errorAlert').offset().top
                    });
                    iziToast.error({
                        icon: 'fe-alert-triangle',
                        title: 'Caution',
                        message: 'Cart is Empty',
                        position: 'bottomCenter',
                        transitionIn: 'bounceInUp'
                    });
                }
                if(resp.status == "POSTCODE_ERROR")
                {
                    $('#errorAlert').toast('show');
                    $('#errorAlert').find('div.toast-body').append('<span>Invalid Postcode</span>');
                    $('html,body').animate({
                        scrollTop: $('#errorAlert').offset().top
                    });
                    iziToast.error({
                        icon: 'fe-alert-triangle',
                        title: 'Caution',
                        message: 'Postcode is missing',
                        position: 'bottomCenter',
                        transitionIn: 'bounceInUp'
                    });
                }
                if(resp.orderAmount.status == "FAIL")
                {
                    $('#errorAlert').toast('show');
                    $('#errorAlert').find('div.toast-body').append('<span>Minimum Purchase amount is '+resp.orderAmount.min_amount+' CHF for your selected area. Add some more. </span>');
                    $('html,body').animate({
                        scrollTop: $('#errorAlert').offset().top
                    });
                    iziToast.error({
                        icon: 'fe-alert-triangle',
                        title: 'Caution',
                        message: '<span>Minimum Purchase amount is '+resp.orderAmount.min_amount+' CHF for your selected area. Add some more. </span>',
                        position: 'bottomCenter',
                        transitionIn: 'bounceInUp'
                    });
                }
                if(resp.status == "OK" && resp.orderAmount.status == "OK")
                {

                    /* Check payment type */
                    if(resp.paymentType == "card")
                    {
                        let stripe = StripeCheckout.configure({
                            key : "pk_test_51HC7YBLlbDEEhNWIdcejioGpRaihA5McmPdGr23ChthdFICcEjf7UQCZjNHb5EIk6n3kITuZU0tCbU28gYmhkbaJ000td6R6ld",
                            locale:'auto',
                            token:(token)=>{
                                order.setStripe(token);
                                order.submitOrder();
                            }
                        });

                        stripe.open({
                            name: 'Super Mario Ristorante',
                            description: 'Online Payment',
                            email: $('#ch-email').val(),
                            currency: 'chf',
                            amount: resp.grandTotal*100
                        })
                    }
                    else if(resp.paymentType == "paypal")
                    {
                        $.ajax({
                            type: 'POST',
                            url:base_url+'/paypal',
                            beforeSend:()=>{
                                preloader.classList.add('active');
                            },
                            success:(respUrl)=>{
                                window.open(respUrl,'_blank','width=600px,height=800px');
                            },
                            error:(err)=>{
                                console.error(err.responseText);
                            }
                        })
                    }
                    else if(resp.paymentType == "cash")
                    {
                        order.submitOrder();
                    }
                }
            },
            error:(err)=>
            {
                console.error(err.responseText);
            }
        });
    }

    /* map */
    /* $('#ch-address').on('focusin',()=>{
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition((position)=>{
                let latitude = position.coords.latitude;
                let longitude = position.coords.longitude;
                let coordinate = {lat: latitude, lng: longitude};

                showMap(coordinate);
            });
        }
        else{
            alert("Your device doesn't support map location")
        }
        $('#ch-address').unbind('focusing');
    }) */

    /* show map */
    function showMap(coordinate)
    {
        $('#showMap').show();
        $('html,body').animate({
            scrollTop: $('#showMap').offset().top-100
        });
        mapCoordinates(coordinate);
    }

    /* hide company input field */
    $(function () {
        $('#company').hide();

        $('input[type="radio"][name="radio2"]').on('change',()=>{
            if($('input[type="radio"][name="radio2"]:checked').val() == "private"){
                $('#company').hide();
            }
            else{
                $('#company').fadeIn();
                $('#company').prop('required', true)
            }
        });
    });

    /* hide date and time input field */
    $(function () {
        $('#dateInput').hide();
        $('#timeInput').hide();

        $('input[type="radio"][name="radio3"]').on('change',()=>{
            if($('input[type="radio"][name="radio3"]:checked').val() == "asap"){
                $('#dateInput').hide();
                $('#timeInput').hide();
            }
            else{
                $('#dateInput').fadeIn();
                $('#ch-delivery-date').prop('required', true);
                $('#timeInput').fadeIn();
                $('#ch-delivery-time').prop('required', true);
            }
        });
    });

    /* select deliverydate and retrieve time slots from database */
    $('#ch-delivery-date').change(function()
    {
        let date = $(this).val();
        $.ajax({
            type: 'GET',
            url: base_url + '/time-slots',
            data: {"date":date},
            success:function(resp)
            {
                
                $('#ch-delivery-time').html(resp);
            },
            error:(err)=>
            {
                console.error(err.responseText);
            }
        })
        
    })

    /* category tabs with ajax */
    $('a[data-category-tabs]').each(function(){
        $(this).click(function(e){
            e.preventDefault()
            let categoryId = $(this).attr('data-category-tabs');
            let productName = $(this).attr('data-product-name');

            /* ajax call */
            $.ajax({
                type:'GET',
                url:base_url+'/store/category',
                data:{"categoryId":categoryId},
                success:function(resp){
                    $('#displayCategoryProductNamesWithAjax').text(productName);
                    $('#displayCategoryProductWithAjax').html(resp.html);
                    $('#moreProducts').show();
                    $('#moreProducts').data("last-product",resp.lastProductId);
                    $('#moreProducts').data("category",categoryId);
                },
                error:function(err){
                    console.error(err.responseText);
                }
            })

        })
    })

    // Load more products function

    $('#moreProducts').click(function(){
        let ctg = $(this).data("category");
        let lastProductId = $(this).data("last-product");

        $.ajax({
            type: 'GET',
            url: base_url+'/load-more-products',
            data:{
                "ctg": ctg,
                "lastProductId": lastProductId
            },
            dataType:'json',
            // beforeSend:function(){
            //     // Primary spinner
            //     // $("#moreProducts").html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
            // },
            success:function(resp){
                if(resp.status=="OK")
                {
                    $('#moreProducts').data("last-product",resp.lastProductId);
                    $("#displayCategoryProductWithAjax").append(resp.html);
                    if(resp.productCount < 8){
                        $('#moreProducts').hide();
                    }
                }
                console.log(resp);
            },
            error:function(err){
                console.error(err.responseText);
            }
        })
    });

    // Activate any Tooltip inside 'body'
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' })

