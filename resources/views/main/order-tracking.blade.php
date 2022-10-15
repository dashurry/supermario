@php
    use Carbon\Carbon;
    $queue = $data->getQueueNumber($data->id,$data->deliveryDate);
@endphp

@extends('main.components.master')

@section('title')
  Order Tracking
@endsection

@section('main')
    <!-- Page content-->
<div class="container pt-4 mb-2 pb-6">
  <nav aria-label="breadcrumb">
    <ol class="py-1 my-2 breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item"><a href="shop-ls.html">Shop</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Order tracking</li>
    </ol>
  </nav>
  
  <!-- Button + badge -->
  <div class="row">
    <div class="col-md-6">
      <h1 class="mb-3 pb-4">Tracking order: <span class='font-weight-normal'>{{ $data->id }}</span></h1>
    </div>
    
    <div class="col-md-6">
           <!-- Outline button + badge -->
        @if($queue > 2)
            <a class="btn btn-dark btn-sm mt-2 float-right">
              Your queue <span class="badge badge-light  ml-1">{{ $queue }}</span>
            </a>
        @endif
  </div>
  </div>
  <!-- Details-->
  <div class="row mb-4">
    <div class="col-sm-4 mb-2">
      <div class="bg-secondary h-100 p-4 text-center rounded"><span class="font-weight-medium text-heading mr-2">Shipped by:</span>@if($data->delivery_man_id == "")Waiting for Shipping @else{{ $data->getDeliveryManName($data->delivery_man_id) }} @endif</div>
    </div>
    <div class="col-sm-4 mb-2">
      <div class="bg-secondary h-100 p-4 text-center rounded text-capitalize"><span class="font-weight-medium text-heading mr-2">Status:</span>{{ $data->status }}</div>
    </div>
    <div class="col-sm-4 mb-2">
      <div class="bg-secondary h-100 p-4 text-center rounded"><span class="font-weight-medium text-heading mr-2">Expected date:</span>
        @if (Carbon::parse($data->arrivalTime)->isToday())Today , {{ Carbon::parse($data->arrivalTime)->format('H:i') }} 
        @elseif(Carbon::parse($data->arrivalTime)->isTomorrow())Tomorrow , {{ Carbon::parse($data->arrivalTime)->format('H:i') }}
        @else {{ Carbon::parse($data->arrivalTime)->format('d , H:i') }}
        @endif</div>
    </div>
  </div>

  @if ($data->status == "pending")
    <!-- Progress-->
  <div class="card border-0 box-shadow">
    <div class="card-body">
      <div class="progress mb-3" style="height: 4px;">
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="row pt-4">
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="bg-secondary rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-shopping-bag font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Order placed</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border border-primary text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-settings font-size-xl text-primary"></i></div>
            <div class="media-body pl-3"><span class="badge badge-primary badge-pill mb-1">In progress</span>
              <h6 class="text-primary mb-0">Processing order</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-star font-size-xl"></i></div>
            <div class="media-body pl-3"><span class="d-block text-muted font-size-ms mb-1">Waiting</span>
              <h6 class="mb-0">Shipped</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-package font-size-xl"></i></div>
            <div class="media-body pl-3"><span class="d-block text-muted font-size-ms mb-1">Waiting</span>
              <h6 class="mb-0">Product delivered</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @elseif($data->status == "processing")
  <!-- Progress-->
  <div class="card border-0 box-shadow">
    <div class="card-body">
      <div class="progress mb-3" style="height: 4px;">
        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="row pt-4">
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="bg-secondary rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-shopping-bag font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Order placed</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border border-primary text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-settings font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Processing Order</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-star font-size-xl text-primary"></i></div>
            <div class="media-body pl-3"><span class="badge badge-primary badge-pill mb-1">In progress</span>
              <h6 class="text-primary mb-0">Shipped</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-package font-size-xl"></i></div>
            <div class="media-body pl-3"><span class="d-block text-muted font-size-ms mb-1">Waiting</span>
              <h6 class="mb-0">Product delivered</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @elseif($data->status == "shipping")
  <!-- Progress-->
  <div class="card border-0 box-shadow">
    <div class="card-body">
      <div class="progress mb-3" style="height: 4px;">
        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="row pt-4">
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="bg-secondary rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-shopping-bag font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Order placed</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border border-primary text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-settings font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Processing Order</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-star font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Shipped</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-package font-size-xl text-primary"></i></div>
            <div class="media-body pl-3"><span class="badge badge-primary badge-pill mb-1">In progress</span>
              <h6 class="text-primary mb-0">Product delivered</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @elseif($data->status == "completed")
  <!-- Progress-->
  <div class="card border-0 box-shadow">
    <div class="card-body">
      <div class="progress mb-3" style="height: 4px;">
        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="row pt-4">
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="bg-secondary rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-shopping-bag font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Order placed</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border border-primary text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-settings font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Processing Order</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-star font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Shipped</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="media align-items-center mb-4">
            <div class="rounded-circle border text-center" style="width: 60px; height: 60px; line-height: 54px;"><i class="fe-package font-size-xl text-muted"></i></div>
            <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i class="fe-check mr-1"></i>Completed</span>
              <h6 class="text-muted mb-0">Product delivered</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  @endif
  
  <!-- Footer-->
  <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
    <div class="custom-control custom-checkbox mt-2 mr-3">
      <input class="custom-control-input" type="checkbox" id="notify-me" checked>
      <label class="custom-control-label" for="notify-me">Notify me when order is delivered</label>
    </div><a class="btn btn-primary btn-sm mt-2" href="dashboard-orders.html">View order details</a>
  </div>
</div>
@endsection