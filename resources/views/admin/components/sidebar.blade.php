@php
    $route_name = Request::route()->getName();
    $route_group = Request::route()->getPrefix();
@endphp

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="{{ asset('admin_area/assets/img/logo.png') }}" class="header-logo" /> <span class="logo-name">Otika</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown @if($route_name == "admin.home") active @endif">
        <a href="{{ route('admin.home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>

      <li class="dropdown @if($route_group == "admin/pages") active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown @if($route_group == "admin/pages") toggled @endif"><i data-feather="briefcase"></i><span>Product Category</span></a>
        <ul class="dropdown-menu">
          <li @if($route_name == "admin.createCategory") class="active" @endif><a class="nav-link" href="{{ route('admin.createCategory') }}">Create New Category</a></li>
          <li @if($route_name == "admin.categoryList") class="active" @endif><a class="nav-link" href="{{ route('admin.categoryList') }}">Category List</a></li>
        </ul>
      </li>
      
      <li class="dropdown @if($route_group == "admin/product") active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown @if($route_group == "admin/product") toggled @endif"><i data-feather="briefcase"></i><span>Products</span></a>
        <ul class="dropdown-menu">
          <li @if($route_name == "admin.createProduct") class="active" @endif><a class="nav-link" href="{{ route('admin.createProduct') }}">Add Product</a></li>
          <li @if($route_name == "admin.productList") class="active" @endif><a class="nav-link" href="{{ route('admin.productList') }}">Product List</a></li>
        </ul>
      </li>

      <li class="dropdown @if($route_name == "admin.setting") active @endif">
        <a href="{{ route('admin.setting') }}" class="nav-link"><i data-feather="settings"></i><span>Setting</span></a>
      </li>

      <li class="dropdown @if($route_name == "admin.deliveryArea") active @endif">
        <a href="{{ route('admin.deliveryArea') }}" class="nav-link"><i data-feather="map"></i><span>Delivery Area</span></a>
      </li>
      
      <li class="dropdown @if($route_group == "admin/order") active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown @if($route_group == "admin/order") toggled @endif"><i data-feather="shopping-cart"></i><span>Orders</span></a>
        <ul class="dropdown-menu">
          <li @if($route_name == "admin.newOrder") class="active" @endif><a class="nav-link" href="{{ route('admin.newOrder',"asap") }}">Pending Order ({{ App\Models\Order::countPendingOrders() }})</a></li>
          <li @if($route_name == "admin.processingOrderPage") class="active" @endif><a class="nav-link" href="{{ route('admin.processingOrderPage') }}">Processing Orders ({{ App\Models\Order::countProcessingOrder() }})</a></li>
          <li @if($route_name == "admin.shippingOrderPage") class="active" @endif><a class="nav-link" href="{{ route('admin.shippingOrderPage') }}">Shipped Orders ({{ App\Models\Order::countShippedOrder() }})</a></li>
        </ul>
      </li>

      <li class="dropdown @if($route_group == "admin/deliveryman") active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown @if($route_group == "admin/deliveryman") toggled @endif"><i data-feather="users"></i><span>Delivery Personal</span></a>
        <ul class="dropdown-menu">
          <li @if($route_name == "admin.deliveryman.register") class="active" @endif><a class="nav-link" href="{{ route('admin.deliveryman.register') }}">Register new</a></li>
          <li @if($route_name == "admin.deliveryman.list") class="active" @endif><a class="nav-link" href="{{ route('admin.deliveryman.list') }}">List All</a></li>
        </ul>
      </li>

      <li class="dropdown @if($route_group == "admin.timeRange") active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown @if($route_group == "admin.timeRange") toggled @endif"><i data-feather="watch"></i><span>Time</span></a>
        <ul class="dropdown-menu">
          <li @if($route_name == "admin.timeRange") class="active" @endif><a class="nav-link" href="{{ route('admin.timeRange') }}">Add new</a></li>
          <li @if($route_name == "admin.productList") class="active" @endif><a class="nav-link" href="{{ route('admin.productList') }}">List All</a></li>
        </ul>
      </li>

      <li class="dropdown @if($route_group == "admin/cars") active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown @if($route_group == "admin/cars") toggled @endif"><i data-feather="truck"></i><span>Delivery Car</span></a>
        <ul class="dropdown-menu">
          <li @if($route_name == "admin.carPage") class="active" @endif><a class="nav-link" href="{{ route('admin.carPage') }}">Create new car</a></li>
          <li @if($route_name == "admin.carList") class="active" @endif><a class="nav-link" href="{{ route('admin.carList') }}">List All</a></li>
        </ul>
      </li>

    </ul>
  </aside>
</div>