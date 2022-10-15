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
    @include('admin.components.css')
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
            @include('admin.components.header')
            <!-- END OF TOP HEADER NAVIGATION BAR -->

            <!-- MAIN SIDEBAR -->
            @include('admin.components.sidebar')
            <!-- END OF MAIN SIDEBAR -->

            <!-- Main Content -->
            @yield('card-statistic')
            <div class="main-content">
                <!-- MAIN SECTION -->
                @yield('content')
                <!-- END OF MAIN SECTION -->

                <!-- SETTINGS SIDEBAR -->
                @include('admin.components.settingSidebar')
                <!-- END OF SETTINGS SIDEBAR -->

            </div>

            <!-- FOOTER -->
            @include('admin.components.footer')
            <!-- END OF FOOTER -->

        </div>
    </div>

    {{-- MODAL --}}
    @yield('modal')
    <!-- GENERAL JS SCRIPTS -->
    @include('admin.components.js')
    <!-- END OF GENERAL JS SCRIPTS -->

    <!-- ADDITIONAL JAVASCRIPT -->
    @yield('customJs')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const base_url = window.location.origin;
        var pusher = new Pusher("491efc69aefe0fab1e12", {
            encrypted: true
        });

        var pusherChannel = pusher.subscribe('SuperMario');
        pusherChannel.bind('notification', function(data) {
            console.log(data);
            new Audio('{{ asset(' / img / cart_add.wav ') }}').play();
            var htmlText = `
      <a href="` + base_url + `/admin/order/order-details/order/` + data.orderNotification.orderId + `" name="order-notification" class="dropdown-item dropdown-item-unread"> 
                  <span class="dropdown-item-icon bg-primary text-white"> 
                      <i class="fas fa-address-card"></i>
                  </span> 
                  <span class="dropdown-item-desc"> 
                    <span class="message-user">New Order #` + data.orderNotification.orderId + `</span>
                    <span class="time messege-text">` + data.orderNotification.streetAddress + `</span>
                    <span  data-live-time="`+ data.orderNotification.live_time +`" class="time">` + data.orderNotification.time + `</span>
                  </span>
              </a>
      `;
            $("#notification-bell").prepend(htmlText);
            var notificationItems = $('#notification-bell').find('a[name="order-notification"]');
            if (notificationItems.lenght > 10) {
                notificationItems[10].remove();
            }
            var count = parseInt($('#notificationCount').text());
            count++;
            $('#notificationCount').html(count);

            if (data.orderNotification.orderType == "asap") {
                alert("Order recieved");
                let payment = null;
                if (data.orderNotification.orderData.paymentType == "cash") {
                    payment = "Cash on delivery";
                } else if (data.orderNotification.orderData.paymentType == "card") {
                    payment = "Stripe Payment";
                } else if (data.orderNotification.orderData.paymentType == "paypal") {
                    payment = "PayPal Payment";
                }

                let tableRow = `<tr class="text-muted">
                                            <td><span class="badge badge-danger">ASAP</span></td>
                                            <td>` + data.orderNotification.orderId + `</td>
                                            <td>` + data.orderNotification.orderData.firstname + ` ` + data
                    .orderNotification.orderData.lastname + `</td>
                                            <td>$` + data.orderNotification.totalPrice + `</td>
                                            <td>` + payment + `</td>
                                            <td>` + data.orderNotification.orderData.email + `</td>
                                            <td>` + data.orderNotification.orderData.phone + `</td>
                                            <td data-live-time="` + data.orderNotification.orderData.created_at +
                    `">` + data.orderNotification.time + `</td>
                                            <td>` + data.orderNotification.arrivalTime + `</td>
                                            <td>
                                                <a href="` + base_url + `/admin/order/order-details/order/` + data
                    .orderNotification.orderId + `" class="btn btn-sm btn-primary">View Details</a>
                                            </td>
                                        </tr>`;
                                        
                    $('#countTodayAsap').html(parseInt($('#countTodayAsap').html()) + 1);
                if ($('#asapListTable').length) {
                    updateAsapTable(tableRow);
                }
            } else if (data.orderNotification.orderType == "today_preorder") {
                let payment = null;
                if (data.orderNotification.orderData.paymentType == "cash") {
                    payment = "Cash on delivery";
                } else if (data.orderNotification.orderData.paymentType == "card") {
                    payment = "Stripe Payment";
                } else if (data.orderNotification.orderData.paymentType == "paypal") {
                    payment = "PayPal Payment";
                }

                let tableRow = `<tr class="text-muted">
                                            <td><span class="badge badge-danger">ASAP</span></td>
                                            <td>` + data.orderNotification.orderId + `</td>
                                            <td>` + data.orderNotification.orderData.firstname + ` ` + data
                    .orderNotification.orderData.lastname + `</td>
                                            <td>$` + data.orderNotification.totalPrice + `</td>
                                            <td>` + payment + `</td>
                                            <td>` + data.orderNotification.orderData.email + `</td>
                                            <td>` + data.orderNotification.orderData.phone + `</td>
                                            <td data-live-time="` + data.orderNotification.orderData.created_at +
                    `">` + data.orderNotification.time + `</td>
                                            <td>` + data.orderNotification.arrivalTime + `</td>
                                            <td>
                                                <a href="` + base_url + `/admin/order/order-details/order/` + data
                    .orderNotification.orderId + `" class="btn btn-sm btn-primary">View Details</a>
                                            </td>
                                        </tr>`;
                                        
                    $('#countTodayPreoder').html(parseInt($('#countTodayPreoder').html()) + 1);
                    $('#countAllPreorder').html(parseInt($('#countAllPreorder').html()) + 1);
                if ($('#preorderListTable').length) {
                    updatePreorderTable(tableRow);
                }
            }
            else if (data.orderNotification.orderType == "upcoming_preorder") {
                let payment = null;
                if (data.orderNotification.orderData.paymentType == "cash") {
                    payment = "Cash on delivery";
                } else if (data.orderNotification.orderData.paymentType == "card") {
                    payment = "Stripe Payment";
                } else if (data.orderNotification.orderData.paymentType == "paypal") {
                    payment = "PayPal Payment";
                }

                let tableRow = `<tr class="text-muted">
                                            <td><span class="badge badge-danger">ASAP</span></td>
                                            <td>` + data.orderNotification.orderId + `</td>
                                            <td>` + data.orderNotification.orderData.firstname + ` ` + data
                    .orderNotification.orderData.lastname + `</td>
                                            <td>$` + data.orderNotification.totalPrice + `</td>
                                            <td>` + payment + `</td>
                                            <td>` + data.orderNotification.orderData.email + `</td>
                                            <td>` + data.orderNotification.orderData.phone + `</td>
                                            <td data-live-time="` + data.orderNotification.orderData.created_at +
                    `">` + data.orderNotification.time + `</td>
                                            <td>` + data.orderNotification.arrivalTime + `</td>
                                            <td>
                                                <a href="` + base_url + `/admin/order/order-details/order/` + data
                    .orderNotification.orderId + `" class="btn btn-sm btn-primary">View Details</a>
                                            </td>
                                        </tr>`;
                                        
                    $('#countAllPreorder').html(parseInt($('#countAllPreorder').html()) + 1);
                if ($('#allPreorderListTable').length) {
                  updateAllPreorderTable(tableRow);
                }
            }

        });


        function updateAsapTable(html) {
            $('#asapListTable').append(html);
        }

        function updatePreorderTable(html) {
            $('#preorderListTable').append(html);
        }

        function updateAllPreorderTable(html) {
            $('#allPreorderListTable').append(html);
        }

    </script>
    <script>
        setInterval(function() {
            $('[data-live-time]').each(function() {
                var elem = $(this);
                let date = $(this).data('live-time');


                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.timeUpdate') }}',
                    data: {
                        "date": date
                    },
                    success: function(resp) {
                        elem.html(resp);
                    },
                    error: function(err) {
                        console.error(err.responseText);
                    }
                })
            });
        }, 10000);

    </script>
    <!-- END OF ADDITIONAL JAVASCRIPT -->
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
