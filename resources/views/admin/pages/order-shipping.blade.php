@extends('admin.pages.master')
@section('title')
    Shipped Orders
@endsection
<style>
    .badge-warning{
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
                    <div class="card-header">
                        <h4>Shipped Orders ({{ count($shipping_orders) }})</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Queue Nr.</th>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Payment Type</th>
                                        <th>Delivery Man</th>
                                        <th>Delivery Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $position = 1;
                                @endphp
                                <tbody>
                                    @foreach ($shipping_orders as $order)
                                        <tr>
                                            <td>{{ $position }}</td>
                                            <td><span class="badge @if($order->orderType == "asap") badge-danger @else badge-warning @endif">@if($order->orderType == "asap") ASAP @else PREORDER @endif</span></td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                            <td>${{ $order->totalPrice }}</td>
                                            <td>
                                                @if ($order->paymentType == "cash")
                                                   Cash on delivery
                                                   @elseif($order->paymentType == "card")
                                                   Stripe Payment
                                                   @elseif($order->paymentType == "paypal")
                                                   Paypal Payment
                                                @endif
                                            </td>
                                            <td>{{ $order->getDeliveryManName($order->delivery_man_id) }}</td>
                                            <td>Today - {{ \Carbon\Carbon::parse($order->deliveryTime)->format('H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.orderDetails',$order->id) }}" class="btn btn-sm btn-primary">View Details</a>
                                            </td>
                                        </tr>
                                        @php
                                            $position++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-center">
                            {{ $shipping_orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
<script>
    $('td[data-live-time]').each(function(){
        var elem = $(this);
        let date = $(this).data('live-time');

        setInterval(function(){
            $.ajax({
            type: 'GET',
            url: '{{ route('admin.timeUpdate') }}',
            data:{"date":date},
            success:function(resp){
                elem.html(resp);
            },
            error:function(err){
                console.error(err.responseText);
            }
        })
        },5000);
    });
</script>
@endsection