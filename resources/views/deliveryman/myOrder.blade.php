@php
$userData = auth('deliveryman')->user();
use Carbon\Carbon;
@endphp
@extends('deliveryman.layouts.master')

@section('title')
    My Orders
@endsection

@section('custom_css')
    <style>
        .badge-floating:not(.badge-floating-right) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .badge-floating {
            position: absolute;
            top: 3.5rem;
            left: 0;
            z-index: 5;
            font-size: 75%;
        }
        .card {
            box-shadow: none;
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #fdfdff;
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    @include('deliveryman.components.alert')
    <div class="row justify-content-center" id="orderCardSection">
        @foreach ($orders as $order)
            @php
                $productsList = $order->listOrderItems($order->id);
            @endphp
            <div class="col-12 col-md-4 col-lg-4">
                <div class="pricing pricing-highlight">
                    @if ($order->orderType == "asap")
                        <span class="badge badge-floating badge-pill badge-warning text-uppercase">asap</span>
                        @elseif($order->orderType == "preorder")
                        <span class="badge badge-floating badge-pill badge-warning text-uppercase">preorder</span>
                    @endif
                    <div class="pricing-title">
                        Order ID - {{ $order->id }}
                    </div>

                    <div class="pricing-padding">
                        <div class="pricing-price">
                            <div>$ {{ $order->totalPrice }}</div>
                        </div>
                        <div class="card-body mb-4">
                            <div id="accordion">
                              <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                  <h4>Address</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                                  <p class="mb-0"><a class="d-block nav-link-style font-size-sm" href="https://maps.google.com/?q={{ $order->streetAddress }}">
                                    <a href='https://maps.apple.com/maps?q={{ $order->streetAddress }}'>{{ $order->streetAddress }}</a><br>
                                @if ($order->floor != "")
                                    <span>{{ $order->floor }}</span>
                                @endif
                                </p>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
                                  <h4>Phone</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion" style="">
                                  <p class="mb-0"> <a class="d-block nav-link-style font-size-sm" href="tel:{{ $order->phone }}">{{ $order->phone }}</a></p>
                                </div>
                              </div>
                              <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-3" aria-expanded="false">
                                  <h4>Name</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion" style="">
                                  <p class="mb-0 font-size-sm text-capitalize">{{ $order->firstname }} {{ $order->lastname }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <div class="pricing-details">
                            @foreach ($productsList as $list)
                                <div class="pricing-item">
                                    <div class="mr-2">
                                        <h6><span class="badge badge-primary">x{{ $list->quantity }}</span></h6>
                                    </div>
                                    <div class="pricing-item-label">{{ $list->getProductName($list->productId) }}
                                        @if ($list->productNote != "")
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $list->productNote }}"></i>
                                        @endif 
                                        <p><small>{{ $list->sizeName }}</small></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if ($order->orderNote != "")
                    <div class="mb-5">
                        <!-- Link with href -->
                        <a href="#collapseExample" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="far fa-comment-alt" style="font-size: 2vh"></i>
                        </a>
                        <!-- Collapse -->
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                            {{ $order->orderNote }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="pricing-details">
                    @if ($order->paymentType == "cash")
                        <div class="pricing-item">
                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                            <div class="pricing-item-label">Not Paid</div>
                        </div>
                        @else
                        <div class="pricing-item">
                            <div class="pricing-item-icon bg-success text-white"><i class="fas fa-check"></i></div>
                            <div class="pricing-item-label">Paid</div>
                        </div>
                        @endif
                    </div>
                        
                        <div>
                            <p class="mb-0"><small>arrival time</small></p>
                            <h1>{{ Carbon::parse($order->arrivalTime)->format('H:i') }}</h1>
                        </div>
                        <div class="pricing-cta">
                            <a href="{{ route('deliveryman.completeOrder',$order->id) }}">Mark as Delivered <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
        @endforeach

    </div>
@endsection

@section('customJs')
    <script src="https://unpkg.com/feather-icons"></script>
@endsection