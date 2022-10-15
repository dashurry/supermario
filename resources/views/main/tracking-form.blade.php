@extends('main.components.master')

@section('title')
  Order Tracking
@endsection

@section('main')
  
  <!-- Page content-->
      <!-- Hero-->
      <section class="jarallax bg-dark py-6 py-md-7" data-jarallax data-type="scale-opacity" data-speed="0.09">
        <div class="jarallax-img" style="background-image: url({{ asset('image/hero-bg.jpg') }});"></div>
        <div class="container py-md-3">
          <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-10">
              <div class="bg-light rounded-lg box-shadow-lg py-5 px-4">
                <form action="{{ route('order.trackingOrder') }}" method="POST" class="py-sm-2 px-sm-3 needs-validation" novalidate>
                  @csrf
                  <h1 class="text-center mb-4">Track your order</h1>
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label class="form-label" for="rf-id">Order ID</label>
                      <input type="number" class="form-control" id="rf-id" name="orderId" placeholder="34VB5540K83" required>
                      <div class="invalid-feedback">Please provide a valid order ID!</div>
                    </div>
                    {{-- <div class="col-sm-6 form-group">
                      <label class="form-label" for="rf-email">Email</label>
                      <div class="input-group-overlay">
                        <input type="email" class="form-control" id="rf-email" placeholder="sample@email.com" name="orderId">
                      </div>
                    </div> --}}
                    {{-- <div class="col-sm-6 form-group">
                      <label class="form-label" for="rf-company-size">Company size</label>
                      <input class="form-control" type="number" value="1" placeholder="How many people" id="rf-company-size">
                    </div> --}}
                    <div class="col-sm-6 form-group">
                      <label class="form-label" for="rf-email">Email address</label>
                      <input class="form-control" type="email" placeholder="Your email" id="rf-email" required name="userEmail">
                      <div class="invalid-feedback">Please provide a valid email address!</div>
                    </div>
                  </div>
                  <div class="row align-items-center pt-2">
                    <div class="col-sm-6 mb-4 mb-sm-0"><a href="tel:+15262200459">{{-- <i class="fe-phone font-size-xl mr-2"></i> --}}</a></div>
                    <div class="col-sm-6">
                      <button class="btn btn-primary btn-block" type="submit">Track</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Danger toast -->
      <div class="toast mt-3 d-none" role="alert" aria-live="assertive" aria-atomic="true" id="errorAlert" data-delay="5000">
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
      </section>
@endsection

@section('customJs')
  @if (session()->has('error'))
  <script>
    $('#errorAlert').removeClass('d-none');
    $('#errorAlert').toast('show');
    $('#errorAlert').find('div.toast-body').append('<span>{{ session()->get('error') }}</span>');
    </script>
  @endif   
@endsection