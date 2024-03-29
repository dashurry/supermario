<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Around | Sign In - Image</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Around - Multipurpose Bootstrap Template">
    <meta name="keywords"
        content="bootstrap, business, consulting, coworking space, services, creative agency, dashboard, e-commerce, mobile app showcase, multipurpose, product landing, shop, software, ui kit, web studio, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->
    <style>
    
            .cs-page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .cs-page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .cs-page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .cs-page-loading.active>.cs-page-loading-inner {
            opacity: 1;
        }

        .cs-page-loading-inner>span {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #737491;
        }

        .cs-page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #766df4;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .tns-ovh{
        height: 245px !important;
    }

    </style>
    <!-- Page loading scripts-->
    <script>
        (function() {
            window.onload = function() {
                var preloader = document.querySelector('.cs-page-loading');
                preloader.classList.remove('active');
                setTimeout(function() {
                    preloader.remove();
                }, 2000);
            };
        })();

    </script>
    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/tiny-slider.css') }}" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/shop.css') }}">
    
</head>
<!-- Body-->

<body>
    <!-- Page loading spinner-->
    <div class="cs-page-loading active">
        <div class="cs-page-loading-inner">
            <div class="cs-page-spinner"></div><span>Loading...</span>
        </div>
    </div>
    <main class="cs-page-wrapper d-flex flex-column">
        <!-- Sign In Modal-->
        <div class="modal fade" id="modal-signin" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="cs-view show" id="modal-signin-view">
                        <div class="modal-header border-0 bg-dark px-4">
                            <h4 class="modal-title text-light">Sign in</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">Sign in to your account using email and password provided
                                during registration.</p>
                            <form class="needs-validation" novalidate>
                                <div class="input-group-overlay form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                                class="fe-mail"></i></span></div>
                                    <input class="form-control prepended-form-control" type="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="input-group-overlay cs-password-toggle form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                                class="fe-lock"></i></span></div>
                                    <input class="form-control prepended-form-control" type="password"
                                        placeholder="Password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show
                                            password</span>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="keep-signed">
                                        <label class="custom-control-label" for="keep-signed">Keep me signed in</label>
                                    </div><a class="nav-link-style font-size-ms" href="password-recovery.html">Forgot
                                        password?</a>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                <p class="font-size-sm pt-3 mb-0">Don't have an account? <a href='#'
                                        class='font-weight-medium' data-view='#modal-signup-view'>Sign up</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="cs-view" id="modal-signup-view">
                        <div class="modal-header border-0 bg-dark px-4">
                            <h4 class="modal-title text-light">Sign up</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">Registration takes less than a minute but gives you full
                                control over your orders.</p>
                            <form class="needs-validation" novalidate>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Full name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Email" required>
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password" placeholder="Password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show
                                            password</span>
                                    </label>
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password" placeholder="Confirm password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show
                                            password</span>
                                    </label>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                                <p class="font-size-sm pt-3 mb-0">Already have an account? <a href='#'
                                        class='font-weight-medium' data-view='#modal-signin-view'>Sign in</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="modal-body text-center px-4 pt-2 pb-4">
                        <hr>
                        <p class="font-size-sm font-weight-medium text-heading pt-4">Or sign in with</p><a
                            class="social-btn sb-facebook sb-lg mx-1 mb-2" href="#"><i class="fe-facebook"></i></a><a
                            class="social-btn sb-twitter sb-lg mx-1 mb-2" href="#"><i class="fe-twitter"></i></a><a
                            class="social-btn sb-instagram sb-lg mx-1 mb-2" href="#"><i class="fe-instagram"></i></a><a
                            class="social-btn sb-google sb-lg mx-1 mb-2" href="#"><i class="fe-google"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar (Floating dark)-->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <header class="cs-header navbar navbar-expand-lg navbar-light navbar-floating navbar-sticky" data-scroll-header>
            <div class="container px-0 px-xl-3">
                <button class="navbar-toggler ml-n2 mr-2" type="button" data-toggle="offcanvas"
                    data-offcanvas-id="primaryMenu"><span class="navbar-toggler-icon"></span></button><a
                    class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4" href="index.html"><img
                        class="d-none d-lg-block" width="153" src="{{ asset('image/shopLogoDark.png') }}"
                        alt="Around" /><img class="d-lg-none" width="58" src="{{ asset('image/shopLogo.png') }}"
                        alt="Around" /></a>
                <div class="d-flex align-items-center order-lg-3 ml-lg-auto"><a
                        class="nav-link-style font-size-sm text-nowrap" href="#modal-signin" data-toggle="modal"
                        data-view="#modal-signin-view"><i class="fe-user font-size-xl mr-2"></i>Sign in</a><a
                        class="btn btn-primary ml-grid-gutter d-none d-lg-inline-block" href="#modal-signin"
                        data-toggle="modal" data-view="#modal-signup-view">Sign up</a></div>
                <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
                    <div class="cs-offcanvas-cap navbar-box-shadow">
                        <h5 class="mt-1 mb-0">Menu</h5>
                        <button class="close lead" type="button" data-toggle="offcanvas"
                            data-offcanvas-id="primaryMenu"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="cs-offcanvas-body">
                        <!-- Menu-->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown dropdown-mega"><a class="nav-link dropdown-toggle" href="#"
                                    data-toggle="dropdown">Demos</a>
                                <div class="dropdown-menu"><a class="dropdown-column dropdown-column-img bg-secondary"
                                        href="index.html" style="background-image: url(img/demo/menu-banner.jpg);"></a>
                                    <div class="dropdown-column"><a class="dropdown-item" href="index.html">Web Template
                                            Presentation</a><a class="dropdown-item"
                                            href="demo-business-consulting.html">Business Consulting</a><a
                                            class="dropdown-item" href="demo-shop-homepage.html">Shop Homepage</a><a
                                            class="dropdown-item" href="demo-booking-directory.html">Booking /
                                            Directory</a><a class="dropdown-item"
                                            href="demo-creative-agency.html">Creative Agency</a><a class="dropdown-item"
                                            href="demo-web-studio.html">Web Studio</a><a class="dropdown-item"
                                            href="demo-product-software.html">Product Landing - Software</a></div>
                                    <div class="dropdown-column"><a class="dropdown-item"
                                            href="demo-product-gadget.html">Product Landing - Gadget</a><a
                                            class="dropdown-item" href="demo-mobile-app.html">Mobile App Showcase</a><a
                                            class="dropdown-item" href="demo-coworking-space.html">Coworking Space</a><a
                                            class="dropdown-item" href="demo-event-landing.html">Event Landing</a><a
                                            class="dropdown-item" href="demo-marketing-seo.html">Digital Marketing &amp;
                                            SEO</a><a class="dropdown-item" href="demo-food-blog.html">Food Blog</a><a
                                            class="dropdown-item" href="demo-personal-portfolio.html">Personal
                                            Portfolio</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-mega"><a class="nav-link dropdown-toggle" href="#"
                                    data-toggle="dropdown">Templates</a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-column mb-2 mb-lg-0">
                                        <h5 class="dropdown-header">Blog</h5><a class="dropdown-item"
                                            href="blog-grid-rs.html">Grid Right Sidebar</a><a class="dropdown-item"
                                            href="blog-grid-ls.html">Grid Left Sidebar</a><a class="dropdown-item"
                                            href="blog-grid-ns.html">Grid No Sidebar</a><a class="dropdown-item"
                                            href="blog-list-rs.html">List Right Sidebar</a><a class="dropdown-item"
                                            href="blog-list-ls.html">List Left Sidebar</a><a class="dropdown-item"
                                            href="blog-list-ns.html">List No Sidebar</a><a class="dropdown-item"
                                            href="blog-single-rs.html">Single Post Right Sidebar</a><a
                                            class="dropdown-item" href="blog-single-ls.html">Single Post Left
                                            Sidebar</a><a class="dropdown-item" href="blog-single-ns.html">Single Post
                                            No Sidebar</a>
                                    </div>
                                    <div class="dropdown-column mb-2 mb-lg-0">
                                        <h5 class="dropdown-header">Portfolio</h5><a class="dropdown-item"
                                            href="portfolio-style-1.html">Grid Style 1</a><a class="dropdown-item"
                                            href="portfolio-style-2.html">Grid Style 2</a><a class="dropdown-item"
                                            href="portfolio-style-3.html">Grid Style 3</a><a class="dropdown-item"
                                            href="portfolio-single-side-gallery-grid.html">Project Side Gallery
                                            (Grid)</a><a class="dropdown-item"
                                            href="portfolio-single-side-gallery-list.html">Project Side Gallery
                                            (List)</a><a class="dropdown-item"
                                            href="portfolio-single-carousel.html">Project Carousel</a><a
                                            class="dropdown-item" href="portfolio-single-wide-gallery.html">Project Wide
                                            Gallery</a>
                                    </div>
                                    <div class="dropdown-column mb-2 mb-lg-0">
                                        <h5 class="dropdown-header">Shop</h5><a class="dropdown-item"
                                            href="shop-ls.html">Grid Left Sidebar</a><a class="dropdown-item"
                                            href="shop-rs.html">Grid Right Sidebar</a><a class="dropdown-item"
                                            href="shop-ns.html">Grid No Sidebar</a><a class="dropdown-item"
                                            href="shop-single.html">Single Product</a><a class="dropdown-item"
                                            href="checkout.html">Cart &amp; Checkout</a><a class="dropdown-item"
                                            href="order-tracking.html">Order Tracking</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#"
                                    data-toggle="dropdown">Account</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-toggle="dropdown">Dashboard</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="dashboard-orders.html">Orders</a></li>
                                            <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                                            <li><a class="dropdown-item" href="dashboard-messages.html">Messages</a>
                                            </li>
                                            <li><a class="dropdown-item" href="dashboard-followers.html">Followers</a>
                                            </li>
                                            <li><a class="dropdown-item" href="dashboard-reviews.html">Reviews</a></li>
                                            <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-toggle="dropdown">Account Settings</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="account-profile.html">Profile Info</a>
                                            </li>
                                            <li><a class="dropdown-item" href="account-payment.html">Payment Methods</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="account-notifications.html">Notifications</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="signin-illustration.html">Sign In -
                                            Illustration</a></li>
                                    <li><a class="dropdown-item" href="signin-image.html">Sign In - Image</a></li>
                                    <li><a class="dropdown-item" href="signin-signup.html">Sign In - Sign Up</a></li>
                                    <li><a class="dropdown-item" href="password-recovery.html">Password Recovery</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    data-toggle="dropdown">Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="about.html">About</a></li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-toggle="dropdown">Contacts</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="contacts-v1.html">Contacts v.1</a></li>
                                            <li><a class="dropdown-item" href="contacts-v2.html">Contacts v.2</a></li>
                                            <li><a class="dropdown-item" href="contacts-v3.html">Contacts v.3</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-toggle="dropdown">Help Center</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="help-topics.html">Help Topics</a></li>
                                            <li><a class="dropdown-item" href="help-single-topic.html">Single Topic</a>
                                            </li>
                                            <li><a class="dropdown-item" href="help-submit-request.html">Submit a
                                                    Request</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-toggle="dropdown">404 Not Found</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="404-simple.html">Simple Text</a></li>
                                            <li><a class="dropdown-item" href="404-illustration.html">Illustration</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                            data-toggle="dropdown">Coming Soon</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="coming-soon-image.html">Image</a></li>
                                            <li><a class="dropdown-item"
                                                    href="coming-soon-illustration.html">Illustration</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    data-toggle="dropdown">Docs / UI Kit</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="docs/dev-setup.html">
                                            <div class="d-flex align-items-center">
                                                <div class="font-size-xl text-muted"><i class="fe-file-text"></i></div>
                                                <div class="pl-3"><span
                                                        class="d-block text-heading">Documentation</span><small
                                                        class="d-block text-muted">Kick-start customization</small>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="components/typography.html">
                                            <div class="d-flex align-items-center">
                                                <div class="font-size-xl text-muted"><i class="fe-layers"></i></div>
                                                <div class="pl-3"><span class="d-block text-heading">UI Kit<span
                                                            class="badge badge-danger ml-2">50+</span></span><small
                                                        class="d-block text-muted">Flexible components</small></div>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="docs/changelog.html">
                                            <div class="d-flex align-items-center">
                                                <div class="font-size-xl text-muted"><i class="fe-edit"></i></div>
                                                <div class="pl-3"><span class="d-block text-heading">Changelog<span
                                                            class="badge badge-success ml-2">v1.2.0</span></span><small
                                                        class="d-block text-muted">Regular updates</small></div>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="mailto:support@createx.studio">
                                            <div class="d-flex align-items-center">
                                                <div class="font-size-xl text-muted"><i class="fe-life-buoy"></i></div>
                                                <div class="pl-3"><span
                                                        class="d-block text-heading">Support</span><small
                                                        class="d-block text-muted">support@createx.studio</small></div>
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <!-- Background image-->
        <div class="d-none d-md-block position-absolute w-50 h-100 bg-size-cover"
            style="top: 0; right: 0; background-image: url({{ asset('image/signin-img.jpg') }});"></div>
        <!-- Actual content-->
        <section class="container d-flex align-items-center pt-7 pb-3 pb-md-4" style="flex: 1 0 auto;">
            <div class="w-100 pt-3">
                <div class="row">
                    <div class="col-lg-4 col-md-6 offset-lg-1">
                        <!-- Sign in view-->
                        <div class="cs-view show" id="signin-view">
                            <h1 class="h2">Thank you</h1>
                            <p class="font-size-ms text-muted mb-4">
                                @if ($orderData->orderType == 'asap')
                                    The average delivery time is 45min. We will try and process your order as soon as possible.
                                @elseif($orderData->orderType == 'preorder')Your Preorder has been recieved.
                                @endif
                            </p>
                            <!-- Featured entries: List -->
                            <div class="cs-widget">

                                <!-- Title -->
                                <div class="d-flex flex-wrap justify-content-between mb-4">
                                    <h3 class="cs-widget-title mb-0 mr-3">Your order</h3>
                                    <a class="font-size-sm font-weight-medium" href="#">
                                        Order Tracking
                                        <i class="fe-chevron-right font-size-lg"></i>
                                    </a>
                                </div>

                                <div class="media pb-3 border-bottom mb-4">
                                    <div class="media-body">
                                        <span class="font-size-ms text-muted">Order ID: </span> <a class="font-size-ms nav-link-style" href="#">{{ $orderData->id }}</a>
                                        <a class="d-block nav-link-style font-size-sm" href="#">Ref-Nr: {{ $orderData->referenceNumber }}</a>
                                    </div>
                                </div>

                                <div class="orderContainer">
                                    <!-- Vertical carousel + Arrows visible on hover -->
                                    <div class="cs-carousel cs-controls-inside cs-controls-onhover">
                                        <div class="cs-carousel-inner" data-carousel-options='{"axis": "vertical", "gutter": 15, "items": 3, "nav": true, "touch": true}'>
                                        @php
                                            $lists = $orderData->listOrderItems($orderData->id);
                                        @endphp
                                @foreach ($lists as $list)           
                                    <div>   
                                        <!-- Item -->
                                        <div class="media align-items-center pb-2 mb-1">
                                            <a class="d-block" href="#">
                                                <img class="rounded" width="60"
                                                    src="{{ $list->getProductImage($list->productId) }}" alt="Product" />
                                            </a>
                                            <div class="media-body pl-2 ml-1">
                                                <h4 class="font-size-md nav-heading mb-1">
                                                    <a class="font-weight-medium" href="#">{{ $list->getProductName($list->productId) }}</a>
                                                </h4>
                                                <p class="font-size-sm mb-0">CHF {{ $list->unitPrice }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                                </div>

                            </div>
                        </div>
                        <!-- Sign up view-->
                        <div class="cs-view" id="signup-view">
                            <h1 class="h2">Sign up</h1>
                            <p class="font-size-ms text-muted mb-4">Registration takes less than a minute but gives you
                                full control over your orders.</p>
                            <form class="needs-validation" novalidate>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Full name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Email" required>
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password" placeholder="Password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show
                                            password</span>
                                    </label>
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password" placeholder="Confirm password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show
                                            password</span>
                                    </label>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                                <p class="font-size-sm pt-3 mb-0">Already have an account? <a href='#'
                                        class='font-weight-medium' data-view='#signin-view'>Sign in</a></p>
                            </form>
                        </div>
                        <div class="border-top text-center mt-4 pt-4">
                            <p class="font-size-sm font-weight-medium text-heading">Your order queue is <h2>{{ $orderData-> getQueueNumber($orderData->id,$orderData->deliveryTime) }}</h2></p>
                            <a class="social-btn sb-facebook sb-outline sb-lg mx-1 mb-2" href="#"><i
                                    class="fe-facebook"></i></a><a
                                class="social-btn sb-twitter sb-outline sb-lg mx-1 mb-2" href="#"><i
                                    class="fe-twitter"></i></a><a
                                class="social-btn sb-instagram sb-outline sb-lg mx-1 mb-2" href="#"><i
                                    class="fe-instagram"></i></a><a
                                class="social-btn sb-google sb-outline sb-lg mx-1 mb-2" href="#"><i
                                    class="fe-google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="cs-footer py-4">
        <div class="container font-size-sm mb-0 py-3"><span class="text-muted mr-1">© All rights reserved. Made
                by</span><a class="nav-link-style" href="https://createx.studio/" target="_blank" rel="noopener">Spider
                Man</a></div>
    </footer>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span
            class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i
            class="btn-scroll-top-icon fe-arrow-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <!-- Main theme script-->
    <script src="{{ asset('js/theme.min.js') }}"></script>
</body>

</html>
