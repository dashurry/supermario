@php
use App\Cart;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

$opening = \App\Models\Settings::find(1)->opening;

/* Start Date */
$startDate = Carbon::now();
/* End Date */
$endDate = Carbon::now()->addDays(7);

$dateRange = CarbonPeriod::create($startDate,$endDate);
$dateRange->toArray();
@endphp
@extends('main.components.master')
@section('customCss')
    <link rel="stylesheet" media="screen" href="{{ asset('css/chosen.css') }}" />
@endsection
<style>
    #cartBody{
        max-height: 350px;
        overflow:hidden;
    }
    
    #showMap {
        width: 100%;
        height: 500px;
        box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
        border-radius: 5px;
        margin-bottom: 20px;
        display: none;
    }

    #map {
        width: 100%;
        height: 100%;
    }

    .cs-carousel .tns-nav {
    padding-top: 1.5rem;
    }

    .tns-ovh{
        height: 300px !important;
    }
    .cs-carousel.cs-controls-inside [data-controls] {
    top: 109% !important;
    }
    .cs-carousel [data-controls] {
    border: 1px solid transparent !important;
    background-color: transparent !important;
    }
    .cs-carousel.cs-controls-inside [data-controls='next'] {
    right: 2.75rem !important;
    }

</style>

@section('main')
    <!-- Page content-->
    <form class="cs-sidebar-enabled cs-sidebar-right needs-validation" novalidate autocomplete="off"
        onsubmit="isInvalid(event)">
        <input type="hidden" id="lat">
        <input type="hidden" id="lng">
        <div class="container">
            <div class="row">
                <!-- Content-->
                <div class="col-lg-8 cs-content py-4">
                    <nav aria-label="breadcrumb">
                        <ol class="py-1 my-2 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('store') }}">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                    <h1 class="mb-3 pb-4">Checkout</h1>
                    <div class="alert alert-info font-size-md mb-5" role="alert"><i
                            class="fe-alert-circle font-size-xl mt-n1 mr-3"></i>Have a coupon code? <a href='#modal-coupon'
                            data-toggle='modal' class='cs-fancy-link' style="text-decoration: none;">Click here to enter
                            your code</a>
                    </div>
                    <h2 class="h3 pb-3">Billing details</h2>
                    <div class="row mb-4">
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="ch-fn">First name<sup class="text-danger ml-1">*</sup></label>
                            <input class="form-control" type="text" id="ch-fn" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="ch-ln">Last names<sup class="text-danger ml-1">*</sup></label>
                            <input class="form-control" type="text" id="ch-ln" required>
                        </div>
                        <!-- Inline checkboxes -->
                        <div class="col-sm-6 form-group">
                        <!-- Inline radio buttons -->
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="ex-radio-4" name="radio2" checked value="private">
                            <label class="custom-control-label" for="ex-radio-4">Privat</label>
                        </div>
                        
                        <!-- Inline radio buttons -->
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="ex-radio-5" name="radio2" value="business">
                            <label class="custom-control-label" for="ex-radio-5">Business</label>
                          </div>
                    </div>
                        <div class="col-12 form-group" id="company" style="display: none;">
                            <label class="form-label" for="ch-company">Company name<sup class="text-danger ml-1">*</sup></label>
                            <input class="form-control" type="text" id="ch-company">
                        </div>
                        <div class="col-12 form-group">
                            <label class="form-label" for="ch-city">City<sup class="text-danger ml-1">*</sup></label>
                            <select class="form-control custom-select chosen" id="ch-city" required>
                                <option value="" selected disabled hidden>Choose City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <div class="" id="showMap">
                                <div class="" id="map">

                                </div>
                            </div>
                            <label class="form-label" for="ch-address">Street address<sup
                                    class="text-danger ml-1">*</sup></label>
                            <input class="form-control" type="text" id="ch-address"
                                placeholder="House number and street name" required>
                        </div>
                        <div class="col-12 form-group">
                            <input class="form-control" type="text" id="ch-floor"
                                placeholder="Apartment, suite, unit, etc. (optional)">
                        </div>
                        
                        <div class="col-12 form-group">
                            <label class="form-label" for="ch-delivery">Delivery Type<sup class="text-danger ml-1">*</sup></label>
                            <select class="form-control custom-select chosen" id="ch-delivery" required>
                                <option value="" selected disabled hidden>Choose Delivery Service</option>
                                <option value="Home Delivery">Home Delivery</option>
                                <option value="Take Away">Take Away</option>
                            </select>
                        </div>
                        <!-- Inline checkboxes -->
                        <div class="col-12 form-group">
                            <!-- Inline radio buttons -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" id="ex-radio-6" name="radio3" checked value="asap">
                                <label class="custom-control-label" for="ex-radio-6">ASAP</label>
                            </div> 
                            <!-- Inline radio buttons -->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" id="ex-radio-7" name="radio3" value="preorder">
                                <label class="custom-control-label" for="ex-radio-7">Preorder</label>
                              </div>
                        </div>
                        
                        <!-- Date time input -->
                        <div class="col-6 form-group" id="dateInput">
                            <div class="form-group">
                                <label for="ch-delivery-date">Date<sup class="text-danger ml-1">*</sup></label>
                                <select class="form-control custom-select" id="ch-delivery-date">
                                    <option value="" selected disabled hidden>Select a date</option>
                                    @foreach ($dateRange as $date)
                                    <option value="{{ $date->format('Y-m-d') }}">@if($date->isToday()){{ $date->format('d.m.Y - ') }} Today @elseif ($date->isTomorrow()){{ $date->format('d.m.Y - ') }} Tomorrow @else {{ $date->format('d.m.Y - l') }} @endif</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group" id="timeInput">
                            <div class="form-group">
                                <label for="ch-delivery-time">Time<sup class="text-danger ml-1">*</sup></label>
                                <select class="form-control custom-select" id="ch-delivery-time">
                                    <option value="17:00" selected disabled hidden>Select Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label class="form-label" for="ch-postcode">Postcode<sup
                                    class="text-danger ml-1">*</sup></label>
                            <select class="form-control custom-select chosen" id="ch-postcode" required>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="ch-phone">Phone<sup class="text-danger ml-1">*</sup></label>
                            <input class="form-control" type="tel" id="ch-phone"  data-format="custom" data-delimiter=" " data-blocks="3 3 2 2" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="ch-email">Email address<sup
                                    class="text-danger ml-1">*</sup></label>
                            <input class="form-control" type="email" id="ch-email" required>
                        </div>
                    </div>
                    <h2 class="h3 pb-3">Additional information</h2>
                    <div class="form-group pb-3 pb-lg-5">
                        <label class="form-label" for="ch-order-notes">Order notes</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fe-message-square"></i>
                                </span>
                            </div>
                            <textarea class="form-control" id="ch-order-notes" rows="5"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                </div>
                <!-- Sidebar-->
                <div class="col-lg-4 cs-sidebar bg-secondary pt-5 pl-lg-4 pb-md-2">
                    <div class="pl-lg-4 mb-3 pb-5">
                        <h2 class="h4 pb-3">Your cart (<span id="cartItemsCounter">{{ Cart::cartItems() }}</span>)</h2>
                        
                        <div class="container" id="cartBody">
                            @include('main.components.cartItemsCheckout')
                        </div>

                        <hr class="mb-4">
                        {{-- <div class="d-flex justify-content-between mb-3"><span
                                class="h6 mb-0">Subtotal:</span><span class="text-nav"> {{ Cart::totalPrice() }} CHF</span>
                        </div> --}}
                        <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Tax:</span><span
                                class="text-nav">&mdash;</span></div>
                        <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Shipping:</span><span
                                class="text-nav">&mdash;</span></div>
                        <div class="d-flex justify-content-between mb-3"><span class="h6 mb-0">Total:</span><span
                                class="h6 mb-0" id="totalPrice"> {{ Cart::totalPrice() }} CHF</span></div>
                        <div class="accordion accordion-alt pt-4 mb-grid-gutter" id="payment-methods">
                            <div class="card border-0 box-shadow card-active">
                                <div class="card-header p-3">
                                    <div class="p-1">
                                        <div class="custom-control custom-radio" data-toggle="collapse"
                                            data-target="#credit-card">
                                            <input class="custom-control-input" value="card" type="radio"
                                                id="credit-card-radio" name="payment_method" checked required>
                                            <label class="custom-control-label d-flex align-items-center h6 mb-0"
                                                for="credit-card-radio"><span>Credit Card</span><img class="ml-3"
                                                    width="130" data-src="{{ asset('image/cards.png') }}" alt="Accepted cards" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse show" id="credit-card" data-parent="#payment-methods">
                                    <div class="card-body">
                                        <p class="font-size-ms">Pay with your credit card via Stripe.</p>
                                        <div class="form-group">
                                            <label class="form-label" for="cc-number">Card number</label>
                                            <input class="form-control bg-image-0" type="text" id="cc-number"
                                                data-format="card" placeholder="0000 0000 0000 0000">
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-7 px-2 form-group mb-1">
                                                <label class="form-label" for="cc-expiry">Expiry date</label>
                                                <input class="form-control bg-image-0" type="text" id="cc-expiry"
                                                    data-format="date" placeholder="mm/yy">
                                            </div>
                                            <div class="col-5 px-2 form-group mb-1">
                                                <label class="form-label" for="cc-cvc">CVC</label>
                                                <input class="form-control bg-image-0" type="text" id="cc-cvc"
                                                    data-format="cvc" placeholder="000">
                                                </div>
                                            </div>
                                            <small class="form-text text-muted text-center">We possess SSL / Secure сertificate</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 box-shadow">
                                <div class="card-header p-3">
                                    <div class="p-1">
                                        <div class="custom-control custom-radio collapsed" data-toggle="collapse"
                                            data-target="#paypal">
                                            <input class="custom-control-input" type="radio" id="paypal-radio"
                                                name="payment_method" required value="paypal">
                                            <label class="custom-control-label d-flex align-items-center h6 mb-0"
                                                for="paypal-radio"><span>PayPal</span><img class="ml-3" width="20"
                                                    data-src="{{ asset('image/paypal.png') }}" alt="PayPal" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="paypal" data-parent="#payment-methods">
                                    <div class="card-body">
                                        <p class="font-size-ms">By clicking on the button below you will be redirected to
                                            your PayPal account to complete the payment.</p><a class="d-inline-block"
                                            href="#"><img class="d-block" width="200"
                                            data-src="{{ asset('image/paypal-button.png') }}" alt="PayPal" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 box-shadow">
                                <div class="card-header p-3">
                                    <div class="p-1">
                                        <div class="custom-control custom-radio collapsed" data-toggle="collapse"
                                            data-target="#cash">
                                            <input class="custom-control-input" type="radio" value="cash" id="cash-radio"
                                                name="payment_method" required>
                                            <label class="custom-control-label d-flex h6 mb-0" for="cash-radio">Cash on
                                                delivery</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="cash" data-parent="#payment-methods">
                                    <div class="card-body">
                                        <p class="font-size-ms mb-0">You have selected to pay with cash upon delivery.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Place order</button>

                        <!-- Danger toast -->
                        <div class="toast mt-3" role="alert" aria-live="assertive" aria-atomic="true" id="errorAlert" data-delay="5000">
                            <div class="toast-header bg-danger text-white">
                                <i class="fe-slash mr-2"></i>
                                <span class="mr-auto">Warning alert:</span>
                                <button type="button" class="close text-white ml-2 mb-1" data-dismiss="toast" aria-label="Close" onclick="$('#errorAlert').hide()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body text-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

@section('customJs')
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD4sDrRxHRhFryErOK8rkIjAVUj6ol_4Q&libraries=places&v=weekly">
    </script>
    
    <script src="{{ asset('js/locationService.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.js') }}"></script>
    
    <script>
/* ==========================================================================
                           LOAD SCRIPT ON SCROLL 
========================================================================== */
function dynamicLoad(url) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = url;
    document.getElementsByTagName("body")[0].appendChild(script);
}
window.addEventListener("scroll", loadScripts);

function loadScripts() {
    //load here as many dynamic scripts as you want
    dynamicLoad("https://checkout.stripe.com/checkout.js");
    dynamicLoad("https://js.stripe.com/v3");
    dynamicLoad(base_url + "/admin_area/assets/bundles/izitoast/js/iziToast.min.js");
    //end ------
    window.removeEventListener("scroll", loadScripts);
}
/* ==========================================================================
                            END OF LOAD SCRIPT ON SCROLL 
 ========================================================================== */
/* ==========================================================================
        LOAD NOT CRITICAL CSS ON SCROLL OR CLICK
========================================================================== */
function dynamicLoadCss(href) {
var giftofspeed = document.createElement('link');
giftofspeed.rel = 'stylesheet';
giftofspeed.href = href;
giftofspeed.type = 'text/css';
var godefer = document.getElementsByTagName('link')[0];
godefer.parentNode.insertBefore(giftofspeed, godefer);
}
window.addEventListener("scroll", loadCss);
window.addEventListener("click", loadCss);

function loadCss() {
//load here as many dynamic scripts as you want
dynamicLoadCss(base_url + "/admin_area/assets/bundles/izitoast/css/iziToast.min.css");
iziToast.warning({
    icon: 'icon-chat_bubble',
    progressBar: false,
    message: 'Delivery time might increase due to the high number of orders',
    timeout: false,
    position: 'bottomCenter',
});
//end ------
window.removeEventListener("scroll", loadCss);
window.removeEventListener("click", loadCss);
}
</script>
<script>
    /* Checkout plugin 'Choosen' */
    $('.chosen').chosen();

    /* Auto Fill Postcode */
    $('#ch-city').chosen().change(()=>{
        parsePostcode($('#ch-city').val());
    });
</script>
<script src="{{ asset('js/store.js') }}"></script>
@endsection
