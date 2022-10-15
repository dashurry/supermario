<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @yield('title')
        Admin Dashboard
    </title>
    <!-- General CSS Files -->
    @include('deliveryman.components.css')
    @yield('custom_css')
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #9e9fb4;
        }

    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- TOP HEADER NAVIGATION BAR -->
            @include('deliveryman.components.header')
            <!-- END OF TOP HEADER NAVIGATION BAR -->

            <!-- MAIN SIDEBAR -->
            @include('deliveryman.components.sidebar')
            <!-- END OF MAIN SIDEBAR -->

            <!-- Main Content -->
            @yield('card-statistic')
            <div class="main-content">
                <!-- MAIN SECTION -->
                @yield('content')
                <!-- END OF MAIN SECTION -->

                <!-- SETTINGS SIDEBAR -->
                @include('deliveryman.components.settingSidebar')
                <!-- END OF SETTINGS SIDEBAR -->


            </div>

            <!-- FOOTER -->
            @include('deliveryman.components.footer')
            <!-- END OF FOOTER -->

        </div>
    </div>

    {{-- MODAL --}}
    @yield('modal')
    <!-- GENERAL JS SCRIPTS -->
    @include('deliveryman.components.js')
    <!-- END OF GENERAL JS SCRIPTS -->

    <!-- ADDITIONAL JAVASCRIPT -->
    @yield('customJs')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const deliverymanId = {{ auth('deliveryman')->user()->id }};
        const base_url = window.location.origin;
        var pusher = new Pusher("491efc69aefe0fab1e12", {
            encrypted: true
        });

        var pusherChannel = pusher.subscribe(`OrderAssignment.${deliverymanId}`);
        pusherChannel.bind('order-notification', function(resp) {
            console.log(resp);

            new Audio('{{ asset(' / img / cart_add.wav ') }}').play();

            if($('#orderCardSection'))
            {
                appendOrder(resp.orderData.info,resp.orderData.items,resp.orderData.arrival_time);
            }

        });  

        function appendOrder(orderData,items,arrival_time){

            var list = ``;

            items.forEach((item, i)=>{
                list += `<div class="pricing-item">
                            <div class="mr-2">
                                <h6><span class="badge badge-primary">x${ item.quantity }</span></h6>
                            </div>
                            <div class="pricing-item-label">${ item.product['name'] }
                                ${item.productNote!=''?
                                `<i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="${ item.productNote }"></i>`:''}
                                <p><small>${ item.sizeName??"" }</small></p>
                            </div>
                        </div>`;
            });

            $('#orderCardSection').append(
                `<div class="col-12 col-md-4 col-lg-4">
                <div class="pricing pricing-highlight">
                    ${orderData.orderType=='asap'?'<span class="badge badge-floating badge-pill badge-warning text-uppercase">asap</span>':'<span class="badge badge-floating badge-pill badge-warning text-uppercase">preorder</span>'}
                    <div class="pricing-title">
                        Order ID - ${orderData.id }
                    </div>

                    <div class="pricing-padding">
                        <div class="pricing-price">
                            <div>${ orderData.totalPrice }</div>
                        </div>
                        <div class="card-body mb-4">
                            <div id="accordion">
                              <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                  <h4>Address</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                                  <p class="mb-0"><a class="d-block nav-link-style font-size-sm" href="https://maps.google.com/?q={ $order->streetAddress }">
                                    <a href='https://maps.apple.com/maps?q= ${ orderData.streetAddress }'> ${ orderData.streetAddress }</a><br>

                                    <span> ${ orderData.floor??"" }</span>
                                </p>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
                                  <h4>Phone</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion" style="">
                                  <p class="mb-0"> <a class="d-block nav-link-style font-size-sm" href="tel: ${ orderData.phone }"> ${ orderData.phone }</a></p>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-3" aria-expanded="false">
                                  <h4>Name</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion" style="">
                                  <p class="mb-0 font-size-sm text-capitalize"> ${ orderData.firstname }  ${ orderData.lastname }</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <div class="pricing-details">
                            ${list}
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <!-- Link with href -->
                        <a href="#collapseExample" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="far fa-comment-alt" style="font-size: 2vh"></i>
                        </a>
                        <!-- Collapse -->
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                            ${orderData.orderNote}
                            </div>
                        </div>
                    </div>

                    <div class="pricing-details">
                        ${orderData.paymentType=="cash"?
                        `<div class="pricing-item">
                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                            <div class="pricing-item-label">Not Paid</div>
                        </div>`:`<div class="pricing-item">
                            <div class="pricing-item-icon bg-success text-white"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Paid</div>
                        </div>`
                        }   
                    </div>
                        
                        <div>
                            <p class="mb-0"><small>arrival time</small></p>
                            <h1>${ arrival_time }</h1>
                        </div>
                        <div class="pricing-cta">
                            <a href="${base_url}/deliveryman/completeOrder/orderId/${orderData.id}">Mark as Delivered <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>`
            )
        }
    </script>
    
    <!-- END OF ADDITIONAL JAVASCRIPT -->
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
