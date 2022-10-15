@php
    $countUnseenOrders = count(\App\Models\Order::totalUnseenOrder()->get());
    $unseens = \App\Models\Order::totalUnseenOrder()->limit(10)->get();
@endphp
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
         collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a></li>
            <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
           text-white"> <img alt="image" src="{{ asset('admin_area/assets/img/users/user-6.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                Deo</span>
                            <span class="time messege-text">Please check your mail !!</span>
                            <span class="time">2 Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('admin_area/assets/img/users/user-2.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span> <span class="time messege-text">Request for leave
                                application</span>
                            <span class="time">5 Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('admin_area/assets/img/users/user-5.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                Ryan</span> <span class="time messege-text">Your payment invoice is
                                generated.</span> <span class="time">12 Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('admin_area/assets/img/users/user-4.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                Smith</span> <span class="time messege-text">hii John, I have upload
                                doc
                                related to task.</span> <span class="time">30
                                Min Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('admin_area/assets/img/users/user-3.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                Joshi</span> <span class="time messege-text">Please do as specify.
                                Let me
                                know if you have any query.</span> <span class="time">1
                                Days Ago</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="{{ asset('admin_area/assets/img/users/user-2.png') }}" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span> <span class="time messege-text">Client Requirements</span>
                            <span class="time">2 Days Ago</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

       
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
          class="nav-link notification-toggle nav-link-lg message-toggle"><i data-feather="bell" class="bell"></i>
          <span id="notificationCount" class="badge headerBadge1 bg-danger @if($countUnseenOrders == 0) d-none @endif">{{ $countUnseenOrders }}</span>
      </a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
          <div class="dropdown-header">
              Notifications
              <div class="float-right">
                  <a href="#">Mark All As Read</a>
              </div>
          </div>
          <div class="dropdown-list-content dropdown-list-icons" id="notification-bell">
            @foreach ($unseens as $unseen)
              <a href="{{ route('admin.orderDetails',$unseen->id) }}" name="order-notification" class="dropdown-item dropdown-item-unread"> 
                  <span class="dropdown-item-icon bg-primary text-white"> 
                      <i class="fas fa-address-card" style="margin: 11px 0 11px 0;"></i>
                  </span> 
                  <span class="dropdown-item-desc"> 
                    <span class="message-user">New Order #{{ $unseen->id }}</span>
                    <span class="time messege-text">{{ $unseen->streetAddress }}</span>
                    <span data-live-time="{{ $unseen->created_at }}" class="time">{{ $unseen->created_at->diffForHumans() }}</span>
                  </span>
              </a>
              @endforeach
          </div>
          <div class="dropdown-footer text-center">
              <a href="{{ route('admin.newOrder',"asap") }}">View All <i class="fas fa-chevron-right"></i></a>
          </div>
      </div>
  </li>


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('admin_area/assets/img/users/user-10.png') }}"
                    class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">Hello Sarah Smith</div>
                <a href="profile.html" class="dropdown-item has-icon"> <i class="far
          fa-user"></i> Profile
                </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                    Activities
                </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <form action="credentials/logoutStatus.php" method="POST" id="logoutForm" style="display: none;"></form>
            </div>
        </li>
    </ul>
</nav>
