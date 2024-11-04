<!--============================
    MAIN MENU START
==============================-->
<nav class="wsus__main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="relative_contect d-flex">
                    <!-- Category Sidebar -->
                    <div class="wsus_menu_category_bar">
                        <i class="far fa-bars"></i>
                    </div>

                    <!-- Navigation Menu Items -->
                    <ul class="wsus_menu_cat_item show_home toggle_menu">
                        <li><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-tags"></i> Plans</a></li>
                        <li><a class="wsus__droap_arrow" href="#"><i class="fas fa-calendar"></i> Sessions (Slots)</a>
                            <ul class="wsus_menu_cat_droapdown">
                                <li><a href="#">My Sessions</a></li>
                                <li><a href="#">Create New Session</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fas fa-users"></i> Coaches</a></li>
                        <li><a href="#"><i class="fal fa-gamepad-alt"></i> Activities</a></li>
                    </ul>

                    <!-- Primary Navigation Links -->
                    <ul class="wsus__menu_item">
                        <li><a class="active" href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">My Account</a></li>
                        <li class="wsus__relative_li"><a href="#">More <i class="fas fa-caret-down"></i></a>
                            <ul class="wsus__menu_droapdown">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Account and Logout -->
                    <ul class="wsus__menu_item wsus__menu_item_right">
                        <li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--============================
    MAIN MENU END
==============================-->
