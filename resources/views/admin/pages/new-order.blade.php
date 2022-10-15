@extends('admin.pages.master')
@section('title')
    New Orders
@endsection
<style>
    .badge-warning {
        transform: scale(1);
        animation: pulse-orange 2s infinite;
    }

    @keyframes pulse-orange {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(255, 121, 63, 0.7);
        }

        70% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(255, 121, 63, 0);
        }

        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(255, 121, 63, 0);
        }
    }

</style>

@section('content')
    @include('admin.components.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="buttons">
                            <a href="{{ route('admin.newOrder', 'asap') }}" class="btn btn-sm @if ($type=='asap' ) btn-primary @endif">Today's Order - <span
                                    id="countTodayAsap">{{ \App\Models\Order::countTodaysAsapOrder() }}</span></a>
                            <a href="{{ route('admin.newOrder', 'preorder') }}" class="btn btn-sm @if ($type=='preorder' ) btn-primary @endif">Today's Preorder -
                                <span id="countTodayPreoder">{{ \App\Models\Order::countTodaysPreOrder() }}</span></a>
                            <a href="{{ route('admin.newOrder', 'all-preorder') }}" class="btn btn-sm @if ($type=='all-preorder' ) btn-primary @endif">All
                                Preordes - <span
                                    id="countAllPreorder">{{ \App\Models\Order::countAllPreOrder() }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                        @if ($type == 'asap') Pending Orders -@else Preorders Today -
                            @endif {{ count($pending_orders) }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Payment Type</th>
                                        <th>Email </th>
                                        <th>Phone</th>
                                        <th>Order Placed</th>
                                        <th>Delivery Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody @if ($type = 'asap') id="asapListTable"
                                            @elseif ($type = "preorder")  id="preorderListTable"
                                            @elseif ($type = "all-preorder")  id="allPreorderListTable" @endif>
                                    @foreach ($pending_orders as $order)
                                        <tr @if ($order->seenByAdmin == 0) class="text-muted" @endif>
                                            <td><span class="badge @if ($order->orderType ==
                                                    'asap') badge-danger @else badge-warning @endif">@if ($order->orderType == 'asap')
                                                    ASAP @else PREORDER @endif</span></td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                            <td>${{ $order->totalPrice }}</td>
                                            <td>
                                                @if ($order->paymentType == 'cash')
                                                    Cash on delivery
                                                @elseif($order->paymentType == "card")
                                                    Stripe Payment
                                                @elseif($order->paymentType == "paypal")
                                                    Paypal Payment
                                                @endif
                                            </td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td data-live-time="{{ $order->created_at }}">
                                                {{ $order->created_at->diffForHumans() }}</td>
                                            <td>Today - {{ \Carbon\Carbon::parse($order->deliveryTime)->format('H:i') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.orderDetails', $order->id) }}"
                                                    class="btn btn-sm btn-primary">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-center">
                            {{ $pending_orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
