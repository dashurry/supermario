@php
    $route_name = Request::route()->getName();
    
@endphp

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="{{ asset('admin_area/assets/img/logo.png') }}" class="header-logo" /> <span class="logo-name">Otika</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown @if($route_name == "deliveryman.dashboard") active @endif">
        <a href="{{ route('deliveryman.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>My Profile</span></a>
      </li>
      <li class="dropdown @if($route_name == "deliveryman.myOrder") active @endif">
        <a href="{{ route('deliveryman.myOrder') }}" class="nav-link"><i data-feather="monitor"></i><span>My Orders </span></a>
      </li>

    </ul>
  </aside>
</div>