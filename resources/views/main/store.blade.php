@php
    use App\Cart;
    $lastProductId = null;
@endphp
@extends('main.components.master')

{{-- <style>
    /* width */
    ::-webkit-scrollbar {
    position: relative;
    top: 0px;
    float: right;
    width: 7px;
    height: 56px;
    background-color: rgb(66, 66, 66);
    border: 1px solid rgb(255, 255, 255);
    background-clip: padding-box;
    border-radius: 5px;
    overflow: auto
    }
    /* Handle */
    ::-webkit-scrollbar-thumb {
    width: 9px;
    z-index: 1000;
    cursor: default;
    position: absolute;
    top: 10.2334px;
    left: 291px;
    height: 250px;
    opacity: 0.3;
    }
</style> --}}

@section('Shopping cart')
   <!-- Shopping cart off-canvas-->
   <div class="cs-offcanvas cs-offcanvas-collapse-always cs-offcanvas-right" id="shoppingCart">
    <div class="cs-offcanvas-cap navbar-box-shadow px-4 mb-2">
        <h5 class="mt-1 mb-0">Your cart (<span id="cartItemsCounter" >{{ Cart::cartItems() }}</span>)</h5>
        <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="shoppingCart"><span
                aria-hidden="true">&times;</span></button>
    </div>
    <div class="cs-offcanvas-body p-4" data-simplebar id="cartBody">
      @include('main.components.cartItems')  
    </div>
    <div class="cs-offcanvas-cap d-block border-top px-4 mb-2">
        <div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0" id="totalPrice" > {{ Cart::totalPrice() }} CHF</span>
        </div><a id="checkoutBtn" class="@if(\App\Models\Settings::openOrCloseOnlineStore() == false || Cart::isCartEmpty() == true) disabled @endif btn btn-primary btn-sm btn-block" href="{{ route('store.checkout') }}"><i
                class="fe-credit-card font-size-base mr-2"></i>Checkout</a>
    </div>
</div> 
@endsection

@section('noteModal')
 <!-- Cart item Note Modal -->
 <div class="modal fade" tabindex="-1" role="dialog" id="noteModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Besondere Hinweise?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <textarea class="form-control" id="noteText" rows="5" placeholder="Hier hinzufügen. Wir geben unser Bestes den Wunsch zu erfüllen." ></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-sm" id="noteBtn">OK</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('main')
    <!-- Page content-->
        <!-- Hero - Featured Products (tabs)-->
        <section class="position-relative bg-gradient pt-5 pt-lg-6 pb-7 mb-7">
            <div class="cs-shape cs-shape-bottom cs-shape-curve bg-body">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                    <path fill="currentColor"
                        d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z">
                    </path>
                </svg>
            </div>
            <!-- Tabs-->
            <div class="container pb-7">
                <div class="row align-items-center pb-7">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs cs-media-tabs cs-media-tabs-light justify-content-center justify-content-lg-start pb-3 mb-4 pb-lg-0 mb-lg-0"
                            role="tablist">
                            <li class="nav-item mb-3" style="max-width: 16.25rem;">
                                <a class="nav-link active" href="#camera" data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded bg-smallPizzaNapoletana60x60" width="60" height="60" onerror="this.src='{{ asset('image/smallPizzaNapoletana60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body pl-2 ml-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="font-size-sm pr-1">Made with only Italian products</div><i
                                                    class="fe-chevron-right lead ml-2 mr-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a></li>
                            <li class="nav-item mb-3" style="max-width: 16.25rem;">
                                <a class="nav-link" href="#sneakers" data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded bg-smallSalatBowl60x60" width="60" height="60" onerror="this.src='{{ asset('image/smallSalatBowl60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body pl-2 ml-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="font-size-sm pr-1">Prepared only upon ordering</div>
                                                <i class="fe-chevron-right lead ml-2 mr-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a></li>
                            <li class="nav-item" style="max-width: 16.25rem;"><a class="nav-link" href="#vr"
                                    data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded bg-smallDonut60x60" width="60" height="60" onerror="this.src='{{ asset('image/smallDonut60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body pl-2 ml-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="font-size-sm pr-1">Discover our daily In-House made</div><i
                                                    class="fe-chevron-right lead ml-2 mr-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="camera">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                                        <div class="mx-auto">
                                            <div class="bg-pizzanapoletana443x440" width="443" height="400" onerror="this.src='{{ asset('image/pizzanapoletana443x440.png') }}'" alt="Pizza napoletana"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 order-lg-1 text-center text-lg-left">
                                        <div class="pl-xl-5">
                                            <h2 class="h1 text-light">Made with only Italian products</h2>
                                            <p class="font-size-lg text-light mb-lg-5">Family recipe, kneaded and stretched by us
                                                </p><a class="btn btn-translucent-light" href="#">Get now - $45.00</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sneakers">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                                        <div class="mx-auto">
                                            <div class="bg-saladbowl443x440" width="443" height="400" onerror="this.src='{{ asset('image/saladbowl443x440.png') }}'" alt="Salat"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 order-lg-1 text-center text-lg-left">
                                        <div class="pl-xl-5">
                                            <h2 class="h1 text-light">Prepared only<br>upon ordering</h2>
                                            <p class="font-size-lg text-light mb-lg-5">Prepared only upon ordering</p><a class="btn btn-translucent-light" href="#">Get now -
                                                $99.00</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vr">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 order-lg-2 pb-1 mb-4 pb-lg-0 mb-lg-0">
                                        <div class="mx-auto">
                                            <div class="bg-donut443x440" width="443" height="400" onerror="this.src='{{ asset('image/donut443x440.png') }}'" alt="Donut"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 order-lg-1 text-center text-lg-left">
                                        <div class="pl-xl-5">
                                            <h2 class="h1 text-light">Discover our daily In-House made</h2>
                                            <p class="font-size-lg text-light mb-lg-5">Donut be shy... Eat what you love</p><a class="btn btn-translucent-light" href="#">Get now -
                                                $180.00</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories (carousel)-->
        <section class="container bg-overlay-content" style="margin-top: -190px;">
            <div class="row d-flex justify-content-center">
                <ul class="nav nav-tabs cs-media-tabs cs-media-tabs-light justify-content-center justify-content-lg-start pb-3 mb-4 pb-lg-0 mb-lg-0"
                            role="tablist">

                            @foreach ($categories as $category)
                            <li class="nav-item mb-3" style="max-width: 16.25rem;margin-right: 4.3333333333rem !important;">
                                <a class="nav-link {{ $category->default_Category==1?'active':'' }}" href="#camera" data-toggle="tab" role="tab" data-category-tabs="{{ $category->id }}" data-product-name="{{ $category->name }}">
                                    <div class="media align-items-center">
                                        <div class="rounded {{ $category->css_class }} highlightBtn" width="50" height="50" onerror="this.src='{{ asset('image/smallPizzaNapoletana60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="font-size-md pr-1 text-center mt-4">{{ $category->name }}</div>
                            </li>    
                            @endforeach
                            


                            {{-- <li class="nav-item mb-3" style="max-width: 16.25rem;margin-right: 4.3333333333rem !important;">
                                <a class="nav-link" href="#sneakers" data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded highlightBtn" width="50" height="50" onerror="this.src='{{ asset('image/smallSalatBowl60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="font-size-md pr-1 text-center mt-4">Pasta</div>
                            </li>
                            <li class="nav-item" style="max-width: 16.25rem;margin-right: 4.3333333333rem !important;"><a class="nav-link" href="#vr"
                                    data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded highlightBtn" width="50" height="50" onerror="this.src='{{ asset('image/smallDonut60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="font-size-md pr-1 text-center mt-4">Pizza</div>
                            </li>
                                <li class="nav-item" style="max-width: 16.25rem;margin-right: 4.3333333333rem !important;"><a class="nav-link" href="#vr"
                                    data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded  highlightBtn" width="50" height="50" onerror="this.src='{{ asset('image/smallDonut60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="font-size-md pr-1 text-center mt-4">Dessert</div>
                            </li>
                                <li class="nav-item" style="max-width: 16.25rem;margin-right: 4.3333333333rem !important;"><a class="nav-link" href="#vr"
                                    data-toggle="tab" role="tab">
                                    <div class="media align-items-center">
                                        <div class="rounded highlightBtn" width="50" height="50" onerror="this.src='{{ asset('image/smallDonut60x60.png') }}'" alt="Product"></div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="font-size-md pr-1 text-center mt-4">Drink</div>
                            </li> --}}
                        </ul>
                <!-- Category-->

                {{-- <div class="categoryBtn mx-4">
                    <a class="card rounded card-category box-shadow d-flex align-items-center" href="#">
                        <div class="cs-swap-to bg-saladLeaf" width="50" height="50"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                        <div class="cs-swap-from bg-saladLeafwhite" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                    </a></div> --}}
                    
                    {{-- <div class="mb-grid-gutter BtnShadow mr-5">
                        <a class="card border-1 box-shadow card-hover py-3 py-sm-2 highlightBtn px-2" href="#">
                            <div class="card-body px-1 py-0 text-center">
                                <div class="cs-swap-image">
                                    <div class="cs-swap-to bg-saladLeafwhite" width="50" height="50"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                    <div class="cs-swap-from bg-saladLeaf" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                </div>
                            </div>
                        </a></div>

                        <div class="mb-grid-gutter BtnShadow mr-5">
                            <a class="card border-1 box-shadow card-hover py-3 py-sm-2 highlightBtn px-2" href="#">
                                <div class="card-body px-1 py-0 text-center">
                                    <div class="cs-swap-image">
                                        <div class="cs-swap-to bg-saladLeafwhite" width="50" height="50"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                        <div class="cs-swap-from bg-saladLeaf" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                    </div>
                                </div>
                            </a></div>

                            <div class="mb-grid-gutter BtnShadow mr-5">
                                <a class="card border-1 box-shadow card-hover py-3 py-sm-2 highlightBtn px-2" href="#">
                                    <div class="card-body px-1 py-0 text-center">
                                        <div class="cs-swap-image">
                                            <div class="cs-swap-to bg-saladLeafwhite" width="50" height="50"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                            <div class="cs-swap-from bg-saladLeaf" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                        </div>
                                    </div>
                                </a></div>

                                <div class="mb-grid-gutter BtnShadow mr-5">
                                    <a class="card border-1 box-shadow card-hover py-3 py-sm-2 highlightBtn px-2" href="#">
                                        <div class="card-body px-1 py-0 text-center">
                                            <div class="cs-swap-image">
                                                <div class="cs-swap-to bg-saladLeafwhite" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                                <div class="cs-swap-from bg-saladLeaf" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                            </div>
                                        </div>
                                    </a></div>

                                    <div class="mb-grid-gutter BtnShadow">
                                        <a class="card border-1 box-shadow card-hover py-3 py-sm-2 highlightBtn px-2" href="#">
                                            <div class="card-body px-1 py-0 text-center">
                                                <div class="cs-swap-image">
                                                    <div class="cs-swap-to bg-saladLeafwhite" width="50" height="50"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                                    <div class="cs-swap-from bg-saladLeaf" width="50" height="50" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                                </div>
                                            </div>
                                        </a></div> --}}
                    {{-- @foreach ($categories as $category)
                        <div class="categoryBtn mx-4">
                            <a class="card rounded card-category box-shadow d-flex align-items-center" href="#" data-category-tabs="{{ $category->id }}" data-product-name="{{ $category->name }}">
                            <span class="badge badge-lg badge-floating badge-floating-right badge-success">From $8.99</span>
                            <img width="50" height="50" class="card-img-top" style="height: 40px !important; opacity: 0.5;" data-src="{{ asset('uploads/icon/category/' . $category->icon) }}" alt="{{ $category->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $category->name }}</h4>
                                </div>
                            </a></div>
                    @endforeach --}}
            </div>
        </section>

        @if ($products != null)

            <!-- Trending products (grid)-->
            <section class="container pt-5 mt-5 mt-md-0 pt-md-6 pt-lg-7">
                <h2 class="text-center mb-5" id="displayCategoryProductNamesWithAjax">{{ $categoryName }}</h2>
                <div class="row pb-1" id="displayCategoryProductWithAjax">

                    @foreach ($products as $product)
                        <!-- Item-->
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
                            <div class="card card-product card-hover"><a class="card-img-top" href="">
                                <img data-src="{{ asset('uploads/product/' . $product->img) }}" alt="{{ $product->name }}" width="250" height="250"/></a>
                                <div class="card-body"><a class="meta-link font-size-xs mb-1"
                                        href="#">{{ $product->CategoryName($product->category_id) }}</a>
                                    <h3 class="font-size-md font-weight-medium mb-2"><a class="meta-link"
                                            href="shop-single.html">{{ $product->name }}</a>
                                    </h3>
                                    {{-- single Price --}}
                                    @if ($product->multiplePrice == 'false')
                                        @if ($product->sale_price != '')
                                            <del name="sale_price" class="font-size-md text-muted mr-1">{{ $product->sale_price }}</del>
                                        @endif
                                        <span name="product_price" class="text-heading font-weight-semibold">{{ $product->product_price }}
                                            CHF</span>
                                    {{-- multiple Price --}}
                                    @elseif ($product->multiplePrice == 'true')
                                        @php
                                        $price = $product->firstReturningMultipleProductPrice($product->id)
                                        @endphp
                                        @if ($price->sale_price != '')
                                            <del name="sale_price" class="font-size-md text-muted mr-1">{{ $product->sale_price }}</del>
                                        @endif
                                        <span name="product_price" class="text-heading font-weight-semibold">{{ $price->product_price }}
                                            CHF</span>
                                    @endif
                                </div>

                                @if ($product->multiplePrice == 'true')
                                    <!-- Dropdown -->
                                    <div class="input-group mb-3 pl-5 pr-5">

                                        <select name="sizeDropdown" class="custom-select" onchange="getPriceBySize(this);">
                                           {{--  <option disabled hidden selected>Grösse</option> --}}
                                            @foreach ($product->PriceSection($product->id) as $item)
                                            <option value="{{ $item->product_price }}" data-sale_price="{{ $item->sale_price }}" data-size_id="{{ $item->id }}">{{ $item->size }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="card-footer">
                                    <div class="star-rating">
                                        <span class="info"></span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <a class="btn-wishlist d-flex align-items-center" href="#" onclick="return false">
                                          <span name="likeCount"><small>{{ $product->likeCount($product->id) }}</small></span>
                                          &nbsp;
                                          <button data-product_id="{{ $product->id }}" onclick="like(this)" class="likebtn
                                          @if ($product->liked($product->id))
                                              is-active
                                          @endif"><span class="btn-tooltip like-btn-tooltip">Like</span></button>
                                            </a>
                                        <span class="btn-divider"></span>
                                        <a class="btn-addtocart" data-product_id="{{ $product->id }}" href="#" onclick="addToCart(this); return false;"><i class="fe-shopping-cart"></i>
                                            <span class="btn-tooltip">To Cart</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $lastProductId = $product->id;
                        @endphp
                    @endforeach



                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary" id="moreProducts" data-category="{{ $category_id }}" data-last-product = "{{ $lastProductId }}">More products</button>
                </div>
            </section>

        @endif
        <!-- New arrivals (widget) + Promo banner-->
        <section class="container pt-5 mt-3 mt-md-0 pt-md-6 pt-lg-7">
            <div class="row">
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="card h-100 p-4">
                        <div class="p-2">
                            <div class="d-flex justify-content-between align-items-center mb-4 pb-1">
                                <h3 class="font-size-xl mb-0">Last customer order</h3><a
                                    class="font-size-sm font-weight-medium mr-n2" href="shop-ls.html">View more<i
                                        class="fe-chevron-right font-size-lg ml-1"></i></a>
                            </div>
                            <div class="lastcustomerorder">
                                @foreach ($lastOrderItems as $item)
                                <div class="media align-items-center pb-2 mb-1">
                                    <a class="d-block" href="#">
                                    <img class="rounded" width="60" height="60" data-src="{{ asset("uploads/product/".$item->product->img ) }}" alt="Product" /></a>
                                    <div class="media-body pl-2 ml-1">
                                        <h4 class="font-size-md nav-heading mb-1">
                                            <a class="font-weight-medium" href="#">{{ $item->product->name }}</a>
                                        </h4>
                                        <p class="font-size-sm mb-0">{{ $item->unitPrice }} CHF</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="bg-secondary rounded-lg pt-5 px-3 pl-sm-5 pr-sm-2">
                        <div class="d-sm-flex align-items-end text-center text-sm-left pl-2">
                            <div class="mr-sm-n6 pb-5">
                                <h2 class="h1 text-sm-nowrap">This Week offer</h2>
                                <p class="pb-2 mx-auto mx-sm-0" style="max-width: 14rem;">Pizza of your choice - salad and drink</p>
                                <div class="d-inline-block bg-faded-danger text-danger font-size-sm font-weight-medium rounded-sm px-3 py-2">Limited time offer</div>
                                <div class="cs-countdown pt-3 h4 justify-content-center justify-content-sm-start" data-countdown="11/06/2021 11:00:00 PM">
                                    <div class="cs-countdown-days">
                                        <span class="cs-countdown-value">0</span>
                                        <span class="cs-countdown-label font-size-xs text-muted">Days</span>
                                    </div>
                                    <div class="cs-countdown-hours">
                                        <span class="cs-countdown-value">0</span>
                                        <span class="cs-countdown-label font-size-xs text-muted">Hours</span>
                                    </div>
                                    <div class="cs-countdown-minutes">
                                        <span class="cs-countdown-value">0</span>
                                        <span class="cs-countdown-label font-size-xs text-muted">Mins</span>
                                    </div>
                                </div><a class="btn btn-primary" href="#">Get one now</a>
                            </div>
                            <div><img width="516" height="311" data-src="{{ asset('image/foodBanner516x311.webp') }}" onerror="this.src='{{ asset('image/foodBanner516x311.png') }}'" alt="Promo banner" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Brands-->
        <section class="container pt-5 mt-3 mt-md-0 pt-md-6 pt-lg-7 pb-md-4" id="shopByBrand">
            <h2 class="mb-5 text-center">Shop by brand</h2>
            <div class="row">
                <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter">
                    <a class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                        <div class="card-body px-1 py-0 text-center">
                            <div class="cs-swap-image">
                                <div class="cs-swap-to bg-nastroAzzurroLogo" width="150" height="80"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                <div class="cs-swap-from bg-nastroAzzurroLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                        class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                        <div class="card-body px-1 py-0 text-center">
                            <div class="cs-swap-image">
                                <div class="cs-swap-to bg-ichnusaLogo" width="150" height="80" onerror="this.src='{{ asset('image/ichnusaLogo.png') }}'" alt="Brand logo"></div>
                                <div class="cs-swap-from bg-ichnusaLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/ichnusaLogoGray.png') }}'" alt="Brand logo"></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                        class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                        <div class="card-body px-1 py-0 text-center">
                            <div class="cs-swap-image">
                                <div class="cs-swap-to bg-birraMorettiLogo" width="150" height="80" onerror="this.src='{{ asset('image/nastroAzzurroLogo.png') }}'" alt="Brand logo"></div>
                                <div class="cs-swap-from bg-birraMorettiLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/nastroAzzurroLogoGray.png') }}'" alt="Brand logo"></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                        class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                        <div class="card-body px-1 py-0 text-center">
                            <div class="cs-swap-image">
                                <div class="cs-swap-to bg-peroniLogo150x80" width="150" height="80" onerror="this.src='{{ asset('image/peroniLogo150x80.png') }}'" alt="Brand logo"></div>
                                <div class="cs-swap-from bg-peroniLogoGray150x80" width="150" height="80" onerror="this.src='{{ asset('image/peroniLogoGray150x80.png') }}'" alt="Brand logo"></div>
                            </div>
                        </div>
                    </a></div>
                    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter">
                        <a class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                            <div class="card-body px-1 py-0 text-center">
                                <div class="cs-swap-image">
                                    <div class="cs-swap-to bg-nastroAzzurroLogo" width="150" height="80"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                    <div class="cs-swap-from bg-nastroAzzurroLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                            class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                            <div class="card-body px-1 py-0 text-center">
                                <div class="cs-swap-image">
                                    <div class="cs-swap-to bg-ichnusaLogo" width="150" height="80" onerror="this.src='{{ asset('image/ichnusaLogo.png') }}'" alt="Brand logo"></div>
                                    <div class="cs-swap-from bg-ichnusaLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/ichnusaLogoGray.png') }}'" alt="Brand logo"></div>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                            class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                            <div class="card-body px-1 py-0 text-center">
                                <div class="cs-swap-image">
                                    <div class="cs-swap-to bg-birraMorettiLogo" width="150" height="80" onerror="this.src='{{ asset('image/nastroAzzurroLogo.png') }}'" alt="Brand logo"></div>
                                    <div class="cs-swap-from bg-birraMorettiLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/nastroAzzurroLogoGray.png') }}'" alt="Brand logo"></div>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                            class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                            <div class="card-body px-1 py-0 text-center">
                                <div class="cs-swap-image">
                                    <div class="cs-swap-to bg-peroniLogo150x80" width="150" height="80" onerror="this.src='{{ asset('image/peroniLogo150x80.png') }}'" alt="Brand logo"></div>
                                    <div class="cs-swap-from bg-peroniLogoGray150x80" width="150" height="80" onerror="this.src='{{ asset('image/peroniLogoGray150x80.png') }}'" alt="Brand logo"></div>
                                </div>
                            </div>
                        </a></div>
                        <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter">
                            <a class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                                <div class="card-body px-1 py-0 text-center">
                                    <div class="cs-swap-image">
                                        <div class="cs-swap-to bg-nastroAzzurroLogo" width="150" height="80"  onerror="this.src='{{ asset('image/birraMorettiLogo.png') }}'" alt="Brand logo"></div>
                                        <div class="cs-swap-from bg-nastroAzzurroLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/birraMorettiLogoGray.png') }}'" alt="Brand logo"></div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                                class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                                <div class="card-body px-1 py-0 text-center">
                                    <div class="cs-swap-image">
                                        <div class="cs-swap-to bg-ichnusaLogo" width="150" height="80" onerror="this.src='{{ asset('image/ichnusaLogo.png') }}'" alt="Brand logo"></div>
                                        <div class="cs-swap-from bg-ichnusaLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/ichnusaLogoGray.png') }}'" alt="Brand logo"></div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                                class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                                <div class="card-body px-1 py-0 text-center">
                                    <div class="cs-swap-image">
                                        <div class="cs-swap-to bg-birraMorettiLogo" width="150" height="80" onerror="this.src='{{ asset('image/nastroAzzurroLogo.png') }}'" alt="Brand logo"></div>
                                        <div class="cs-swap-from bg-birraMorettiLogoGray" width="150" height="80" onerror="this.src='{{ asset('image/nastroAzzurroLogoGray.png') }}'" alt="Brand logo"></div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-md-3 col-sm-4 col-6 mb-grid-gutter"><a
                                class="card border-0 box-shadow card-hover py-3 py-sm-4" href="#">
                                <div class="card-body px-1 py-0 text-center">
                                    <div class="cs-swap-image">
                                        <div class="cs-swap-to bg-peroniLogo150x80" width="150" height="80" onerror="this.src='{{ asset('image/peroniLogo150x80.png') }}'" alt="Brand logo"></div>
                                        <div class="cs-swap-from bg-peroniLogoGray150x80" width="150" height="80" onerror="this.src='{{ asset('image/peroniLogoGray150x80.png') }}'" alt="Brand logo"></div>
                                    </div>
                                </div>
                            </a></div>
            </div>
        </section>
        <!-- Reviews-->
        <section class="bg-secondary py-5 py-md-6 mt-4 mt-md-5" id="reviews">
            <div class="container-fluid py-3 py-md-0">
                <h2 class="mb-5 text-center">Trusted reviews</h2>
                <div class="cs-carousel">
                    <div class="cs-carousel-inner"
                        data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 16}, &quot;520&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 12}, &quot;860&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 23}, &quot;1080&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 23}, &quot;1380&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 23}, &quot;1600&quot;:{&quot;items&quot;:6, &quot;gutter&quot;: 23}}}">
                        <!-- Review Card-->
                        <div class="py-2">
                            <div class="card h-100 border-0 box-shadow mx-1">
                                <div class="card-body"><a class="media align-items-center nav-heading mb-3"
                                        href="#">
                                        <div class="bg-smallPizzaNapoletana60x60" width="60" height="60" onerror="this.src='{{ asset('image/smallPizzaNapoletana60x60.png') }}'" alt="Product thumb"></div>
                                        <div class="media-body font-size-md font-weight-medium pl-2 ml-1">Outdoor HD Cloud Security Camera</div>
                                    </a>
                                    <div class="mb-2 pb-1 star-rating"><i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star"></i>
                                    </div>
                                    <p class="font-size-sm mb-0">Mario's pizza is simply the best in town. The delivery is always super fast. 
                                        Never got such a good vegan pizza before.</p>
                                </div>
                                <footer class="font-size-sm px-4 pb-4">
                                    <div class="media align-items-center border-top mb-n2 pt-3">
                                        <div class="rounded-circle bg-emma42x42" width="42" height="42" onerror="this.src='{{ asset('image/emma42x42.png') }}'" alt="Tatjana Egger"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">Tatjana Egger</div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <!-- From Instagram-->
                        <div class="py-2"><a class="card h-100 border-0 box-shadow mx-1" href="#">
                            <span class="card-floating-icon"><i class="fe-instagram"></i></span>
                                    <div class="card-img-top bg-instagramPasta" width="282" height="266" onerror="this.src='{{ asset('image/instagramPasta.png') }}'" alt="Image"></div>
                                <footer class="font-size-sm mt-auto py-2 px-4">
                                    <div class="media align-items-center py-2">
                                        <div class="rounded-circle bg-janeffel" width="42" height="42" onerror="this.src='{{ asset('image/janeffel.png') }}'" alt="@morni.janeffel"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">@morni.janeffel</div>
                                    </div>
                                </footer>
                            </a></div>
                        <!-- Review Card-->
                        <div class="py-2">
                            <div class="card h-100 border-0 box-shadow mx-1">
                                <div class="card-body">
                                    <a class="media align-items-center nav-heading mb-3" href="#">
                                        <div class="bg-smallSalatBowl60x60" width="60" height="60" onerror="this.src='{{ asset('image/smallSalatBowl60x60.png') }}'" alt="Product thumb"></div>
                                        <div class="media-body font-size-md font-weight-medium pl-2 ml-1">Running Sneakers, Sports Collection</div>
                                    </a>
                                    <div class="mb-2 pb-1 star-rating">
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                    </div>
                                    <p class="font-size-sm mb-0">
                                        The waiters are very nice and very accommodating every time. I really enjoy that every time I visit. 
                                        All dishes are delightfully arranged and always brought warm.</p>
                                </div>
                                <footer class="font-size-sm px-4 pb-4">
                                    <div class="media align-items-center border-top mb-n2 pt-3">
                                        <div class="rounded-circle bg-EdwardChew" width="42" height="42" onerror="this.src='{{ asset('image/EdwardChew.png') }}'" alt="Wilgot Hedlund"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">Wilgot Hedlund</div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <!-- From Instagram-->
                        <div class="py-2">
                            <a class="card h-100 border-0 box-shadow mx-1" href="#">
                                <span class="card-floating-icon"><i class="fe-instagram"></i></span>
                                <div class="card-img-top bg-instagramMeat" width="282" height="266" onerror="this.src='{{ asset('image/instagramMeat.png') }}'" alt="Image"></div>
                                <footer class="font-size-sm mt-auto py-2 px-4">
                                    <div class="media align-items-center py-2">
                                        <div class="rounded-circle bg-janepalson" width="42" height="42" onerror="this.src='{{ asset('image/janepalson.png') }}'" alt="@jane.palson"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">@jane.palson</div>
                                    </div>
                                </footer>
                            </a></div>
                        <!-- Review Card-->
                        <div class="py-2">
                            <div class="card h-100 border-0 box-shadow mx-1">
                                <div class="card-body">
                                    <a class="media align-items-center nav-heading mb-3" href="#">
                                        <div class="bg-smallDonut60x60" width="60" height="60" onerror="this.src='{{ asset('image/smallDonut60x60.png') }}'" alt="Product thumb"></div>
                                        <div class="media-body font-size-md font-weight-medium pl-2 ml-1">Wireless Bluetooth Headset</div>
                                    </a>
                                    <div class="mb-2 pb-1 star-rating">
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star"></i>
                                    </div>
                                    <p class="font-size-sm mb-0">The selection of the drinks felt bombshell for me and my sister! I hadn't been so fascinated by a place for a long time.
                                    </p>
                                </div>
                                <footer class="font-size-sm px-4 pb-4">
                                    <div class="media align-items-center border-top mb-n2 pt-3">
                                        <div class="rounded-circle bg-timbrooks" width="42" height="42" onerror="this.src='{{ asset('image/timbrooks.png') }}'" alt="Alexander Schultheiss"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">Alexander Schultheiss</div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <!-- From Instagram-->
                        <div class="py-2">
                            <a class="card h-100 border-0 box-shadow mx-1" href="#">
                                <span class="card-floating-icon">
                                    <i class="fe-instagram"></i>
                                </span>
                                <div class="card-img-top bg-instagramCarpaccio" width="282" height="266" onerror="this.src='{{ asset('image/instagramCarpaccio.png') }}'" alt="Image"></div>
                                <footer class="font-size-sm mt-auto py-2 px-4">
                                    <div class="media align-items-center py-2">
                                        <div class="rounded-circle bg-sarahcole" width="42" height="42" onerror="this.src='{{ asset('image/sarahcole.png') }}'" alt="@sarah.cole"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">@sarah.cole</div>
                                    </div>
                                </footer>
                            </a></div>
                        <!-- Review Card-->
                        <div class="py-2">
                            <div class="card h-100 border-0 box-shadow mx-1">
                                <div class="card-body">
                                    <a class="media align-items-center nav-heading mb-3" href="#">
                                        <div class="bg-icedMocha" width="60" height="60" onerror="this.src='{{ asset('image/icedMocha.png') }}'" alt="Product thumb"></div>
                                        <div class="media-body font-size-md font-weight-medium pl-2 ml-1">Block-colored Hooded Top</div>
                                    </a>
                                    <div class="mb-2 pb-1 star-rating">
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star-filled active"></i>
                                        <i class="sr-star fe-star"></i>
                                    </div>
                                    <p class="font-size-sm mb-0">Delicious food and nice service.
                                        Price - performance absolutely ok!
                                        We will be back. For me a tip in St Gallen.</p>
                                </div>
                                <footer class="font-size-sm px-4 pb-4">
                                    <div class="media align-items-center border-top mb-n2 pt-3">
                                        <div class="rounded-circle bg-MichaelSmith" width="42" height="42" onerror="this.src='{{ asset('image/MichaelSmith.png') }}'" alt="Roger Eberle"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">Roger Eberle</div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <!-- From Instagram-->
                        <div class="py-2">
                            <a class="card h-100 border-0 box-shadow mx-1" href="#">
                                <span class="card-floating-icon">
                                    <i class="fe-instagram"></i>
                                </span>
                                    <div class="card-img-top bg-instagramShake" width="282" height="266" onerror="this.src='{{ asset('image/instagramShake.png') }}'" alt="Image"></div>
                                <footer class="font-size-sm mt-auto py-2 px-4">
                                    <div class="media align-items-center py-2">
                                        <div class="rounded-circle bg-janeffel" width="42" height="42" onerror="this.src='{{ asset('image/janeffel.png') }}'" alt="@morni.janeffel"></div>
                                        <div class="media-body text-heading font-weight-medium pl-2 ml-1 mt-n1">@morni.janeffel</div>
                                    </div>
                                </footer>
                            </a></div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('customJs')
    <script src="{{ asset('js/store.js') }}"></script>
    <script>
        /* ==========================================================================
                    LAZYLOAD FIRST VISIBLE CONTENT IMAGES
        ========================================================================== */
        var feedback = document.querySelectorAll('#shopByBrand');
        var appearOptions = {
            threshold: 0,
            rootMargin: "0px 0px 0px 0px"
        };

        var observer = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {

        /* ==========================================================================
                            LOAD CSS ONLY WHEN ENTERING SECTION 
        ========================================================================== */
                    function dynamicLoadCss(href) {
                        var giftofspeed = document.createElement('link');
                        giftofspeed.rel = 'stylesheet';
                        giftofspeed.href = href;
                        giftofspeed.type = 'text/css';
                        var godefer = document.getElementsByTagName('link')[0];
                        godefer.parentNode.insertBefore(giftofspeed, godefer);
                    }
                    loadFeedback();

                    function loadFeedback() {
                        //load here as many dynamic scripts as you want
                        dynamicLoadCss("css/shopByBrandImages.css");
                        //end ------
                    }
        /* ==========================================================================
                            END OF LOAD CSS ONLY WHEN ENTERING SECTION
        ========================================================================== */

                    var fb = entry.target;
                    observer.unobserve(entry.target);
                    console.log(entry)
                }
            });
        },
        appearOptions);
    
        feedback.forEach(fb => {
            observer.observe(fb);
        });
        /* ==========================================================================
                            END OF LAZYLOAD FIRST VISIBLE CONTENT IMAGES  
        ========================================================================== */
        /* ==========================================================================
                    LAZYLOAD LAST VISIBLE CONTENT IMAGES
        ========================================================================== */
        var feedback = document.querySelectorAll('#reviews');
        var appearOptions = {
            threshold: 0,
            rootMargin: "0px 0px 370px 0px"
        };

        var observer = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {

        /* ==========================================================================
                            LOAD CSS ONLY WHEN ENTERING SECTION 
        ========================================================================== */
                    function dynamicLoadCss(href) {
                        var giftofspeed = document.createElement('link');
                        giftofspeed.rel = 'stylesheet';
                        giftofspeed.href = href;
                        giftofspeed.type = 'text/css';
                        var godefer = document.getElementsByTagName('link')[0];
                        godefer.parentNode.insertBefore(giftofspeed, godefer);
                    }
                    loadFeedback();

                    function loadFeedback() {
                        //load here as many dynamic scripts as you want
                        dynamicLoadCss("css/lastVisibleContentImages.css");
                        //end ------
                    }
        /* ==========================================================================
                            END OF LOAD CSS ONLY WHEN ENTERING SECTION
        ========================================================================== */

                    var fb = entry.target;
                    observer.unobserve(entry.target);
                    console.log(entry)
                }
            });
        },
        appearOptions);
    
        feedback.forEach(fb => {
            observer.observe(fb);
        });
        /* ==========================================================================
                            END OF LAZYLOAD LAST VISIBLE CONTENT IMAGES  
        ========================================================================== */
    </script>
@endsection