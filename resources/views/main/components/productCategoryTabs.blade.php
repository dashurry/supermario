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
                    @endforeach

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