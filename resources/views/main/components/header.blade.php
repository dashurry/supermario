@php
use App\Cart;

$languageList = array(
    [
        "code" => "en",
        "name" => "English",
        "shortcut" => "Eng",
        "flag" => "bg-en20x20",
    ],
    [
        "code" => "fr",
        "name" => "Français",
        "shortcut" => "Fra",
        "flag" => "bg-fr20x20",
    ],
    [
        "code" => "de",
        "name" => "Deutsch",
        "shortcut" => "Deu",
        "flag" => "bg-de20x20",
    ],
    [
        "code" => "it",
        "name" => "Italiano",
        "shortcut" => "Ita",
        "flag" => "bg-it20x20",
    ]
);

@endphp
<!-- Navbar (Solid background + shadow)-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="cs-header">
    <div class="topbar topbar-dark bg-dark">
        <div class="container d-md-flex align-items-center px-0 px-xl-3">
            <div class="d-none d-md-block text-nowrap mr-3"><i class="fe-phone font-size-base text-muted mr-1"></i><span
                    class="text-muted mr-2">@lang("language.Support")</span><a class="topbar-link mr-1" href="tel:0715346400">071 534 64 00</a>
            </div>
            <div class="d-flex text-md-right ml-md-auto">
                <a class="topbar-link pr-2 mr-4" href="{{ route('order.trackingOrder') }}">
                    <i class="fe-map-pin font-size-base opacity-60 mr-1"></i>@lang("language.track") <span class='d-none d-sm-inline'>@lang("language.your_order")</span>
                </a>
                <div class="dropdown ml-auto ml-md-0 mr-3">
                    @foreach ($languageList as $language)
                            @if (app()->getLocale() == $language["code"])
                                <a class="topbar-link dropdown-toggle d-flex" href="#" data-toggle="dropdown">
                                <div class="mr-2 {{ $language['flag'] }}" width="20" height="20" alt="{{ $language["shortcut"] }}" onerror="this.src='{{ $language['flag'] }}'"></div>{{ $language["shortcut"] }}</a>
                                @endif
                        @endforeach
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach ($languageList as $language)
                            @if (app()->getLocale() != $language["code"])
                                <a class="dropdown-item d-flex" href="{{ route("language",$language["code"]) }}">
                                <div class="mr-2 {{ $language['flag'] }}" width="20" height="20" alt="{{ $language["name"] }}" onerror="this.src='{{ $language['flag'] }}'"></div>{{ $language["name"] }}</a>
                                {{-- <a class="dropdown-item d-flex" href="#">
                                    <div class="mr-2 bg-de20x20" width="20" height="20" alt="Deutsch" onerror="this.src='{{ asset('image/de.png') }}'"></div>Deutsch</a>
                                <a class="dropdown-item d-flex" href="#">
                                    <div class="mt-n1 mr-2 bg-it20x20" width="20" height="20" alt="Italiano" onerror="this.src='{{ asset('image/it.png') }}'"></div>Italiano</a> --}}
                                @endif
                        @endforeach
                    </div>
                </div>
                <div class="dropdown"><a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">$
                        Dollar
                        (US)</a>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">€ Euro
                            (EU)</a><a class="dropdown-item" href="#">£ Pound (UK)</a><a class="dropdown-item"
                            href="#">¥ Yen (JP)</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-expand-lg navbar-light bg-light navbar-box-shadow navbar-sticky" data-scroll-header>
        <div class="navbar-search bg-light">
            <div class="container d-flex flex-nowrap align-items-center"><i class="fe-search font-size-xl"></i>
                <input class="form-control form-control-xl navbar-search-field" type="text" placeholder="Search site">
                <div class="d-none d-sm-block flex-shrink-0 pl-2 mr-4 border-left border-right" style="width: 10rem;">
                    <select class="form-control custom-select pl-2 pr-0">
                        <option value="all">All categories</option>
                        <option value="clothing">Clothing</option>
                        <option value="shoes">Shoes</option>
                        <option value="electronics">Electronics</option>
                        <option value="accessoriies">Accessories</option>
                        <option value="software">Software</option>
                        <option value="automotive">Automotive</option>
                    </select>
                </div>
                <div class="d-flex align-items-center"><span
                        class="text-muted font-size-xs mt-1 d-none d-sm-inline">Close</span>
                    <button class="close p-2" type="button" data-toggle="search">&times;</button>
                </div>
            </div>
        </div>
        <div class="container px-0 px-xl-3">
            <button class="navbar-toggler ml-n2 mr-4" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
                <a class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4" href="index.html">
                <div class="d-none d-lg-block bg-shopLogoDark153x55" width="153" height="55" onerror="this.src='{{ asset('image/shopLogoDark153x55.png') }}'" alt="Around"></div>
                    <img class="d-lg-none" width="58" height="55" data-src="{{ asset('image/shopLogo.png') }}" alt="Around" /></a>
            <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
                <div class="navbar-tool">
                    <a class="navbar-tool-icon-box mr-2" href="#" data-toggle="search">
                        <i class="fe-search"></i>
                    </a>
                </div>
                <div class="navbar-tool d-none d-sm-flex"><a class="navbar-tool-icon-box mr-2" href="#modal-signin"
                        data-toggle="modal" data-view="#modal-signin-view"><i class="fe-user"></i></a></div>
                <div class="border-left mr-2" style="height: 30px;"></div>
                <div class="navbar-tool mr-2"><a class="navbar-tool-icon-box" href="#" data-toggle="offcanvas"
                        data-offcanvas-id="shoppingCart"><i class="fe-shopping-cart"></i><span class="navbar-tool-badge"
                            id="cartItemsCount">{{ Cart::cartItems() }}</span></a></div>
            </div>
            <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
                <div class="cs-offcanvas-cap navbar-box-shadow">
                    <h5 class="mt-1 mb-0">Menu</h5>
                    <button class="close lead" type="button" data-toggle="offcanvas"
                        data-offcanvas-id="primaryMenu"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="cs-offcanvas-body">
                    <!-- Menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown dropdown-mega active"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown">@lang("language.nav_1")</a>
                            <div class="dropdown-menu"><a class="dropdown-column dropdown-column-img bg-secondary"
                                    href="index.html" style="background-image: url(img/demo/menu-banner.jpg);"></a>
                                <div class="dropdown-column"><a class="dropdown-item" href="index.html">Web
                                        Template
                                        Presentation</a><a class="dropdown-item"
                                        href="demo-business-consulting.html">Business
                                        Consulting</a><a class="dropdown-item" href="demo-shop-homepage.html">Shop
                                        Homepage</a><a class="dropdown-item" href="demo-booking-directory.html">Booking
                                        / Directory</a><a class="dropdown-item"
                                        href="demo-creative-agency.html">Creative
                                        Agency</a><a class="dropdown-item" href="demo-web-studio.html">Web
                                        Studio</a><a class="dropdown-item" href="demo-product-software.html">Product
                                        Landing - Software</a></div>
                                <div class="dropdown-column"><a class="dropdown-item"
                                        href="demo-product-gadget.html">Product
                                        Landing - Gadget</a><a class="dropdown-item" href="demo-mobile-app.html">Mobile
                                        App
                                        Showcase</a><a class="dropdown-item" href="demo-coworking-space.html">Coworking
                                        Space</a><a class="dropdown-item" href="demo-event-landing.html">Event
                                        Landing</a><a class="dropdown-item" href="demo-marketing-seo.html">Digital
                                        Marketing
                                        &amp; SEO</a></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-mega"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown">@lang("language.nav_2")</a>
                            <div class="dropdown-menu">
                                <div class="dropdown-column mb-2 mb-lg-0">
                                    <h5 class="dropdown-header">Blog</h5><a class="dropdown-item"
                                        href="blog-grid-rs.html">Grid Right
                                        Sidebar</a><a class="dropdown-item" href="blog-grid-ls.html">Grid Left
                                        Sidebar</a><a class="dropdown-item" href="blog-grid-ns.html">Grid No
                                        Sidebar</a><a class="dropdown-item" href="blog-list-rs.html">List Right
                                        Sidebar</a><a class="dropdown-item" href="blog-list-ls.html">List Left
                                        Sidebar</a><a class="dropdown-item" href="blog-list-ns.html">List No
                                        Sidebar</a><a class="dropdown-item" href="blog-single-rs.html">Single
                                        Post Right Sidebar</a><a class="dropdown-item" href="blog-single-ls.html">Single
                                        Post Left Sidebar</a><a class="dropdown-item" href="blog-single-ns.html">Single
                                        Post No
                                        Sidebar</a>
                                </div>
                                <div class="dropdown-column mb-2 mb-lg-0">
                                    <h5 class="dropdown-header">Portfolio</h5><a class="dropdown-item"
                                        href="portfolio-style-1.html">Grid Style 1</a><a class="dropdown-item"
                                        href="portfolio-style-2.html">Grid Style 2</a><a class="dropdown-item"
                                        href="portfolio-style-3.html">Grid Style 3</a><a class="dropdown-item"
                                        href="portfolio-single-side-gallery-grid.html">Project Side Gallery
                                        (Grid)</a><a class="dropdown-item"
                                        href="portfolio-single-side-gallery-list.html">Project Side Gallery
                                        (List)</a><a class="dropdown-item" href="portfolio-single-carousel.html">Project
                                        Carousel</a><a class="dropdown-item"
                                        href="portfolio-single-wide-gallery.html">Project
                                        Wide Gallery</a>
                                </div>
                                <div class="dropdown-column mb-2 mb-lg-0">
                                    <h5 class="dropdown-header">Shop</h5><a class="dropdown-item"
                                        href="shop-ls.html">Grid Left
                                        Sidebar</a><a class="dropdown-item" href="shop-rs.html">Grid Right
                                        Sidebar</a><a class="dropdown-item" href="shop-ns.html">Grid No
                                        Sidebar</a><a class="dropdown-item" href="shop-single.html">Single
                                        Product</a><a class="dropdown-item" href="checkout.html">Cart
                                        &amp; Checkout</a><a class="dropdown-item" href="order-tracking.html">Order
                                        Tracking</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown">@lang("language.nav_3")</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-toggle="dropdown">Dashboard</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="dashboard-orders.html">Orders</a>
                                        </li>
                                        <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                                        <li><a class="dropdown-item" href="dashboard-messages.html">Messages</a>
                                        </li>
                                        <li><a class="dropdown-item" href="dashboard-followers.html">Followers</a></li>
                                        <li><a class="dropdown-item" href="dashboard-reviews.html">Reviews</a>
                                        </li>
                                        <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-toggle="dropdown">Account Settings</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="account-profile.html">Profile
                                                Info</a></li>
                                        <li><a class="dropdown-item" href="account-payment.html">Payment
                                                Methods</a></li>
                                        <li><a class="dropdown-item" href="account-notifications.html">Notifications</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="signin-illustration.html">Sign In -
                                        Illustration</a></li>
                                <li><a class="dropdown-item" href="signin-image.html">Sign In - Image</a></li>
                                <li><a class="dropdown-item" href="signin-signup.html">Sign In - Sign Up</a>
                                </li>
                                <li><a class="dropdown-item" href="password-recovery.html">Password Recovery</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown">@lang("language.nav_4")</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="about.html">About</a></li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-toggle="dropdown">Contacts</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="contacts-v1.html">Contacts v.1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="contacts-v2.html">Contacts v.2</a>
                                        </li>
                                        <li><a class="dropdown-item" href="contacts-v3.html">Contacts v.3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-toggle="dropdown">Help
                                        Center</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="help-topics.html">Help Topics</a>
                                        </li>
                                        <li><a class="dropdown-item" href="help-single-topic.html">Single
                                                Topic</a></li>
                                        <li><a class="dropdown-item" href="help-submit-request.html">Submit a
                                                Request</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-toggle="dropdown">404
                                        Not Found</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="404-simple.html">Simple Text</a></li>
                                        <li><a class="dropdown-item" href="404-illustration.html">Illustration</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-toggle="dropdown">Coming
                                        Soon</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="coming-soon-image.html">Image</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="coming-soon-illustration.html">Illustration</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown">@lang("language.nav_5")</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="docs/dev-setup.html">
                                        <div class="d-flex align-items-center">
                                            <div class="font-size-xl text-muted"><i class="fe-file-text"></i>
                                            </div>
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
                                                        class="badge badge-success ml-2">v1.1.1</span></span><small
                                                    class="d-block text-muted">Regular updates</small></div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="mailto:support@createx.studio">
                                        <div class="d-flex align-items-center">
                                            <div class="font-size-xl text-muted"><i class="fe-life-buoy"></i>
                                            </div>
                                            <div class="pl-3"><span class="d-block text-heading">Support</span><small
                                                    class="d-block text-muted">support@createx.studio</small>
                                            </div>
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="cs-offcanvas-cap border-top"><a class="btn btn-translucent-primary btn-block"
                        href="#modal-signin" data-toggle="modal" data-view="#modal-signin-view"><i
                            class="fe-user font-size-lg mr-2"></i>Sign in</a></div>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
