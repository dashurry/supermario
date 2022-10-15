@php
    $deliveryMans = \App\Deliveryman::select('id','name')->get();
@endphp
@extends('admin.pages.master')
@section('title')
    Order - {{ $orderDetails->id }}
@endsection

@section('content')
@include('admin.components.alert')
<div class="container">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">Order {{ $orderDetails->id }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Super Mario Ristorante</strong><br>
                                        Bürglistrasse 2,<br>
                                        9000 St.Gallen
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Delivery To:</strong><br>
                                        {{ $orderDetails->firstname }} {{ $orderDetails->lastname }}<br>
                                        {{ $orderDetails->streetAddress }}<br>
                                        {{ $orderDetails->phone }}<br>
                                        {{ $orderDetails->email }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Payment Method:</strong>
                                        <span class="text-muted">@if($orderDetails->paymentType == "card")Stripe Payment @elseif($orderDetails->paymentType == "paypal")Paypal Payment @elseif($orderDetails->paymentType == "cash") Cash on delivery @endif</span><br>
                                        @if ($orderDetails->paymentType != 'cash')
                                        <strong>Reference Number:</strong> <span class="text-muted">{{ $orderDetails->paymentId }}</span>
                                            <div width="40" style=" font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla'; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 10px 8px 0;" align="left" bgcolor="#f7f7fc" valign="middle">
                                                @if($orderDetails->cardBrand == 'mastercard')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/mobile-receipt-mastercard.png') }}">
                                                @elseif($orderDetails->cardBrand == 'visa')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/visa.png') }}">
                                                @elseif($orderDetails->cardBrand == 'amex')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/American-Express-Logo-Small.png') }}">
                                                @elseif($orderDetails->cardBrand == 'cartes_bancaires')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/cartes_bancaires.jpg') }}">
                                                @elseif($orderDetails->cardBrand == 'diners_club')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/diners-club-international-logo.png') }}">
                                                @elseif($orderDetails->cardBrand == 'discover')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/discover-network.png') }}">
                                                @elseif($orderDetails->cardBrand == 'jcb')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/jcb.svg') }}">
                                                @elseif($orderDetails->cardBrand == 'unionpay')
                                                <img width="40" style="width: 40px; vertical-align: middle; height: auto !important; font-weight: bold;" alt="Mastercard Icon" src="{{ asset('images/unionpay.svg') }}">
                                                @endif
                                            <span class="table-muted" style="font-size: 14px; font-weight: bold; color: #bdbdbd; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Karla';"> (•••••••••••• {{ $orderDetails->last4 }})</span>
                                          </div>
                                        @endif
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ \Carbon\Carbon::parse($orderDetails->created_at)->format('F d,Y H:m') }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Order Summary</div>
                            <p class="section-lead" style="font-size: 1rem;">@if ($orderDetails->orderType == "asap") <strong>To deliver as soon as possible</strong> @else <strong>This is a Preorder</strong> @endif</p>
                            <div class="table-responsive">
                                <table class="table table-hover table-md">
                                    <thead>
                                        <tr>
                                            <th data-width="40" style="width: 40px;">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Product Note</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($orderItems as $orderItem)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ \App\Models\Product::getProductName($orderItem->productId) }}
                                                    &nbsp;
                                                    @if ($orderItem->sizeName != '')
                                                        ({{ $orderItem->sizeName }}) @endif
                                                </td>
                                                <td class="text-center">{{ $orderItem->quantity }}x</td>
                                                <td>{{ $orderItem->productNote }}</td>
                                                <td class="text-center">{{ $orderItem->unitPrice }}</td>
                                                <td class="text-right">{{ $orderItem->totalPrice }}</td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Order Note</div>
                                    <p class="section-lead">{{ $orderDetails->orderNote }}</p>
                                    {{-- <div class="images">
                                        <img src="assets/img/cards/visa.png" alt="visa">
                                        <img src="assets/img/cards/jcb.png" alt="jcb">
                                        <img src="assets/img/cards/mastercard.png" alt="mastercard">
                                        <img src="assets/img/cards/paypal.png" alt="paypal">
                                    </div> --}}
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="">{{ $orderDetails->totalPrice }}.-</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Shipping</div>
                                        <div class="invoice-detail-value">Free</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">{{ $orderDetails->totalPrice }}.-</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Invoice Footer --}}
                @if ($orderDetails->status != 'completed')
                <div class="row">
                    <form action="{{ route('admin.increaseTime') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $orderDetails->id }}" name="orderId">
                        <div class="col-md-12 form-group">
                            <label>Delivery Time <strong style="font-size: 2rem;">{{ \Carbon\Carbon::parse($orderDetails->arrivalTime)->format('H:i') }}</strong></label>
                            <input type="number" value="10" name="increaseTime" class="form-control">
                            <span>Increase the delivery Time</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="submit" value="Add Time" class="btn btn-success">
                        </div>
                    </form>
                </div>
                @endif
                <div class="text-md-right">
                    <h6>Order Status: <span class="@if ($orderDetails->status == "pending") text-warning @elseif ($orderDetails->status == "processing") text-warning @else text-success" @endif style="text-transform: uppercase">{{ Str::upper($orderDetails->status) }}</span></h6>
                    <br>
                    <div class="float-lg-left mb-lg-0 mb-3">
                        @if ($orderDetails->status == "pending")
                        <a href="{{ route('admin.processOrder',$orderDetails->id) }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Order</a>
                        <a href="{{ route('admin.cancelOrder',$orderDetails->id) }}" class="btn btn-danger btn-icon icon-left" onclick="return confirm('Confirm to cancel Order')"><i class="fas fa-times"></i> Cancel</a>
                        @elseif ($orderDetails->status == "processing")
                        <form action="{{ route('admin.shipOrder') }}" method="POST" class="form-inline">
                            @csrf
                            <input type="hidden" name="orderId" value="{{ $orderDetails->id }}">
                            <div class="form-group">
                                <select name="deliveryMan" class="form-control">
                                    <option value="" hidden> Select delivery Man</option>
                                    @foreach ($deliveryMans as $deliveryman)
                                    @if ($deliveryman->isBusy($deliveryman->id))
                                    <option value="" disabled title="DeliveryMan is already assigned">{{ $deliveryman->name }}</option>
                                    @else
                                    <option value="{{ $deliveryman->id }}">{{ $deliveryman->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ml-5">
                                <input type="submit" class="btn btn-primary" value="Send for Shipping">
                            </div>
                        </form>
                        @elseif($orderDetails->status == "shipped")
                        <h6><span>{{ $orderDetails->getDeliveryManName($orderDetails->delivery_man_id) }}</span> is deliverying this Order</h6>
                        <a href="{{ route('admin.forceCompleteOrder',$orderDetails->id) }}" class="btn btn-success mr-5">Force Complete</a>
                        @else
                        <h6 class="text-success">This Order is completed</h6>
                        @endif
                    </div>
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection
