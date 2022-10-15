@php
use App\Cart;
@endphp
<style>
.quantityInput {
    background-image: none !important; 
}
</style>

@foreach (Cart::cartContent() as $cartItemId => $item)
    <div class="media align-items-center mb-3">
        <a class="d-block" href="shop-single.html"><img class="rounded" width="60"
            data-src="{{ asset('uploads/product/' . $item['product_image']) }}" alt="Product" /></a>
        <div class="media-body pl-2 ml-1">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mr-3">
                    <h4 class="nav-heading font-size-md mb-1"><a class="font-weight-medium" href="shop-single.html">
                            {{ $item['product_name'] }}
                            @if ($item['size_name'] != '')
                                <small class="text-muted">({{ $item['size_name'] }})</small>
                            @endif
                        </a></h4>
                    <div class="d-flex align-items-center font-size-sm"><span class="mr-2">CHF
                            {{ $item['product_price'] }}</span><span class="mr-2">x</span>
                        <input class="form-control form-control-sm px-2 quantityInput" type="number" style="max-width: 3.5rem;" data-cart-item-id="{{ $cartItemId }}"
                            value="{{ $item['quantity'] }}" min="1" onchange="updateCartItemQuantity(this)">
                    </div>
                </div>
                <div class="pl-3 border-left">
                    <a class="d-block text-danger text-decoration-none font-size-xl" href="#" data-toggle="tooltip" 
                        title="Remove" data-cart-item-id="{{ $cartItemId }}" onclick="removeItemFromCart(this); return false"><i class="fe-x-circle"></i></a>
                    <a class="d-block text-muted text-decoration-none font-size-md mt-2" href="#" data-toggle="tooltip"
                        data-note="{{ $item['note'] }}" onclick="cartItemNote(this); return false" title="Edit" data-cart-item-id="{{ $cartItemId }}"><i
                            class="fe-edit-2"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach