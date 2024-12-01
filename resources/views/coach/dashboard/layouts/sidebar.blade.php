<div class="dashboard_sidebar">
        <span class="close_icon">
          <i class="far fa-bars dash_bar"></i>
          <i class="far fa-times dash_close"></i>
        </span>
        <a href="{{ route('coach.profile') }}" class="dash_logo"><img src="{{asset('frontend/images/logoST.png')}}" alt="logo" class="img-fluid"></a>
        <ul class="dashboard_link">
          <li><a href="{{ route('home') }}"><i class="bi bi-house-door"></i>Home</a></li> 
          <li><a class="active" href="{{ route('coach.dashboard') }}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
          <!-- <li><a href="dsahboard_order.html"><i class="fas fa-list-ul"></i> Orders</a></li> -->
          <!-- <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a></li> -->
          <li><a href="{{ route('coach.slots.index') }}"><i class="far fa-star"></i>Slots</a></li>
          <!-- <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li> -->
          <li><a href="{{ route('coach.profile') }}"><i class="far fa-user"></i> My Profile</a></li>
          <!-- <li><a href="dsahboard_address.html"><i class="fal fa-gift-card"></i> Addresses</a></li> -->
          <li>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
             <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none;">
            <i class="far fa-sign-out-alt"></i> Log out
              </a>
            </form>
          </li>
        </ul>
</div>