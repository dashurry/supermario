 <!-- Footer-->
 <footer class="cs-footer bg-dark pt-5 pt-md-6">
     <div class="container pt-3 pb-0 pt-md-0 pb-md-3">
         <div class="row mb-4">
             <div class="col-md-4">
                 <div class="cs-widget cs-widget-light pb-2 mb-4">
                     <h4 class="cs-widget-title">@lang("language.Shop_departments")</h4>
                     <ul>
                         <li><a class="cs-widget-link" href="#">@lang("language.category_1")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.category_2")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.category_3")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.category_4")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.category_5")</a></li>
                         {{-- <li><a class="cs-widget-link" href="#">Automotive</a></li> --}}
                     </ul>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="cs-widget cs-widget-light pb-2 mb-4">
                     <h4 class="cs-widget-title">@lang("language.Customer_zone")</h4>
                     <ul>
                         <li><a class="cs-widget-link" href="#">@lang("language.Your_account")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.Shipping_rates_&_policies")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.Refunds_&_replacements")</a></li>
                         <li><a class="cs-widget-link" href="{{ route('order.trackingOrder') }}">@lang("language.Order_tracking")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.Delivery_info")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.Taxes_&_fees")</a></li>
                         <li><a class="cs-widget-link" href="#">@lang("language.News")</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="cs-widget cs-widget-light pb-3 mb-4">
                     <h4 class="cs-widget-title">@lang("language.Stay_informed")</h4>
                     <form class="cs-subscribe-form validate"
                         action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126"
                         method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                         <div class="input-group input-group-overlay flex-nowrap">
                             <div class="input-group-prepend-overlay"><span class="input-group-text text-muted"><i
                                         class="fe-mail"></i></span></div>
                             <input class="form-control prepended-form-control" type="email" name="EMAIL"
                                 placeholder="Your email">
                             <div class="input-group-append">
                                 <button class="btn btn-primary" type="submit" name="subscribe">@lang("language.Subscribe")</button>
                             </div>
                         </div>
                         <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                         <div style="position: absolute; left: -5000px;" aria-hidden="true">
                             <input class="cs-subscribe-form-antispam" type="text"
                                 name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
                         </div><small class="form-text text-light opacity-50 pt-1">@lang("language.subscribe_text")</small>
                         <div class="cs-subscribe-status"></div>
                     </form>
                 </div>
                 <div class="cs-widget cs-widget-light pt-1 mb-4">
                     <h4 class="cs-widget-title">@lang("language.Download_our_app")</h4>
                     <div class="d-flex flex-wrap pt-1"><a class="btn-market btn-outline btn-apple mr-3 mb-3" href="#"
                             role="button"><span class="btn-market-subtitle">@lang("language.Download_on_the")</span><span
                                 class="btn-market-title">App Store</span></a><a class="btn-market btn-outline btn-google mb-3" href="#"
                             role="button"><span class="btn-market-subtitle">@lang("language.Download_on_the")</span><span class="btn-market-title">Google Play</span></a></div>
                 </div>
             </div>
         </div>
     </div>
     <div class="bg-darker pt-2">
         <div class="container py-sm-3">
             <div class="row pb-4 mb-2 pt-5 py-md-5">
                 <div class="col-md-3 col-sm-6 mb-4">
                     <div class="media align-items-center"><i class="fe-truck text-primary"
                             style="font-size: 2.125rem;"></i>
                         <div class="media-body pl-3">
                             <h6 class="font-size-base text-light mb-1">@lang("language.Fast_and_free_delivery")</h6>
                             <p class="mb-0 font-size-xs text-light opacity-50">@lang("language.Free_delivery_for_all_orders")</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6 mb-4">
                     <div class="media align-items-center"><i class="fe-refresh-cw text-primary"
                             style="font-size: 2.125rem;"></i>
                         <div class="media-body pl-3">
                             <h6 class="font-size-base text-light mb-1">@lang("language.Money_back_guarantee")</h6>
                             <p class="mb-0 font-size-xs text-light opacity-50">@lang("language.We_return_money_within_30_days")</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6 mb-4">
                     <div class="media align-items-center"><i class="fe-life-buoy text-primary"
                             style="font-size: 2.125rem;"></i>
                         <div class="media-body pl-3">
                             <h6 class="font-size-base text-light mb-1">@lang("language.24/7_customer_support")</h6>
                             <p class="mb-0 font-size-xs text-light opacity-50">@lang("language.Friendly_24/7_customer_support")</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6 mb-4">
                     <div class="media align-items-center"><i class="fe-credit-card text-primary"
                             style="font-size: 2.125rem;"></i>
                         <div class="media-body pl-3">
                             <h6 class="font-size-base text-light mb-1">@lang("language.Secure_online_payment")</h6>
                             <p class="mb-0 font-size-xs text-light opacity-50">@lang("language.We_possess_SSL_/_Secure_сertificate")</p>
                         </div>
                     </div>
                 </div>
             </div>
             <hr class="hr-light mb-5">
             <div class="d-sm-flex align-items-center mb-4 pb-3">
                 <div class="d-flex flex-wrap align-items-center mr-3">
                     <a class="d-block mr-grid-gutter mt-n1 mb-3" href="index.html">
                         <div width="108" height="28" class="bg-TextLogo" onerror="this.src='{{ asset('image/logo108x28.png') }}'" alt="SuperMario"></div></a>
                     <ul class="list-inline font-size-sm pt-2 mb-3">
                         <li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">@lang("language.About")</a>
                         </li>
                         <li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">@lang("language.Outlets")</a>
                         </li>
                         <li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">@lang("language.Affiliates")</a>
                         </li>
                         <li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">@lang("language.Support")</a>
                         </li>
                         <li class="list-inline-item"><a class="nav-link-style nav-link-light" href="#">@lang("language.Terms_of_use")</a></li>
                     </ul>
                 </div>
                 <div class="d-flex pt-2 pt-sm-0 ml-auto"><a class="social-btn sb-twitter sb-light mr-2 mb-2"
                         href="#"><i class="fe-twitter"></i></a><a class="social-btn sb-facebook sb-light mr-2 mb-2"
                         href="#"><i class="fe-facebook"></i></a><a class="social-btn sb-instagram sb-light mr-2 mb-2"
                         href="#"><i class="fe-instagram"></i></a><a class="social-btn sb-pinterest sb-light mr-2 mb-2"
                         href="#"><i class="fe-pinterest"></i></a><a class="social-btn sb-youtube sb-light mb-2"
                         href="#"><i class="fe-youtube"></i></a></div>
             </div>
             <div class="d-sm-flex justify-content-between align-items-center pb-4 pb-sm-2">
                 <div class="order-sm-2 mb-4 mb-sm-3">
                     <div width="181" height="27" class="bg-cards_footer181x27" onerror="this.src='{{ asset('image/cards-footer.png') }}'" alt="Payment methods"></div>
                 </div>
                 <div class="order-sm-1 mb-3">
                     <p class="font-size-ms mb-0"><span class="text-light opacity-50 mr-1">@lang("language.All_rights_reserved._Made_by")</span><a class="nav-link-style nav-link-light" href="https://maurofrappietro.com"
                             target="_blank" rel="noopener">Mauro Frappietro</a></p>
                 </div>
             </div>
         </div>
     </div>
 </footer>

 <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">@lang("language.Top")</span>
        <i class="btn-scroll-top-icon fe-arrow-up"></i></a>
