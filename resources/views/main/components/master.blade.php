@php
    use App\Cart;
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Super Mario - Multipurpose Bootstrap Template">
    <meta name="keywords"
        content="bootstrap, business, consulting, coworking space, services, creative agency, dashboard, e-commerce, mobile app showcase, multipurpose, product landing, shop, software, ui kit, web studio, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Super Mario">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    
    <link rel="mask-icon" color="#5bbad5" href="{{ asset('img/safari-pinned-tab.svg') }}">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        
        /* width */
        ::-webkit-scrollbar {
        width: 3px;
        }
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #9e9fb4;
        }
    </style>
    <!-- Page loading scripts-->

    <!-- Custom CSS-->
    @yield('customCss')
    <!-- Custom CSS-->
    <script>
        (function() {
            window.onload = function() {
                var preloader = document.querySelector('.cs-page-loading');
                preloader.classList.remove('active');
                
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
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Page loading spinner-->
    <div class="cs-page-loading active">
        <div class="cs-page-loading-inner">
            <div class="cs-page-spinner"></div><span>Loading...</span>
        </div>
    </div>
    <main class="cs-page-wrapper">
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
                                during
                                registration.</p>
                            <form class="needs-validation" novalidate>
                                <div class="input-group-overlay form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                                class="fe-mail"></i></span>
                                    </div>
                                    <input class="form-control prepended-form-control" type="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="input-group-overlay cs-password-toggle form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                                class="fe-lock"></i></span>
                                    </div>
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
                                control over
                                your orders.</p>
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
        <!-- Shopping cart off-canvas-->
        @yield('Shopping cart')
        <!-- Navbar (Solid background + shadow)-->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        @include('main.components.header')
        <!-- Page content-->
        <!-- Hero - Featured Products (tabs)-->
        @yield('main')
    </main>
    <!-- Footer-->
    @include('main.components.footer')

    @yield('noteModal')

    <!-- Vendor scripts: js libraries and plugins-->
    <script src="{{ asset('js/jquery3.5.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/cleave.min.js') }}"></script>
    <!-- Main theme script-->
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script>
        $.ajaxSetup({
          headers:{"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')}
        })
    </script>
    <!-- ADDITIONAL JAVASCRIPT -->
    @yield('customJs')
    <script>
    // LAZY LOADING Vanilla JS
    //  #################################
    var images = document.querySelectorAll('img');
    var appearOptions = {
    threshold: 0,
    rootMargin: "0px 0px 370px 0px"
  };
    
    var observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                var img = entry.target;
                img.setAttribute('src', img.getAttribute('data-src'));
                observer.unobserve(entry.target);
            }
        });
    },
    appearOptions);
    
    images.forEach(img => {
        observer.observe(img);
    });
    // End of LAZY LOADING Vanilla JS
    //  #################################
    </script>
    <!-- END OF ADDITIONAL JAVASCRIPT -->
</body>

</html>
