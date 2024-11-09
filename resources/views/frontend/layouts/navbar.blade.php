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
                        <li><a href="{{ route('home') }}"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                        <li><a href="{{ route('plans') }}"><i class="fas fa-tags"></i> Plans</a></li>
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
                        <li><a class="active" href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>

                    <!-- Account and Logout -->
                    <ul class="wsus__menu_item wsus__menu_item_right">
                    <li class="wsus__relative_li"><a href="#">Dashboard <i class="fas fa-caret-down"></i></a>
                        <ul class="wsus__menu_droapdown">
                            @auth
                                <!-- Liens vers les dashboards selon le rôle de l’utilisateur -->
                                @if(Auth::user()->role === 'admin')
                                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                    <li><a href="{{ route('user.dashboard') }}">User Dashboard</a></li>
                                @elseif(Auth::user()->role === 'coach')
                                    <li><a href="{{ route('coach.dashboard') }}">Coach Dashboard</a></li>
                                @else
                                    <li><a href="{{ route('user.dashboard') }}">User Dashboard</a></li>
                                @endif
                            @else
                                <!-- Option pour les utilisateurs non connectés -->
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endauth
                        </ul>
                    </li>
                        <li>
                            @auth
                            <a href="{{ route('plans') }}" class="btn btn-outline-info" role="button">
                                <i class="bi bi-bag-plus"></i>
                                <span id="wallet-balance">{{ Auth::user()->wallet->balance ?? '0.00' }}</span>
                            </a>
                            @endauth
                        </li>
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

<!--============================
        MOBILE MENU START
==============================-->
<section id="wsus__mobile_menu">
    <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>

    <!-- Formulaire de recherche -->
    <form>
        <input type="text" placeholder="Search">
        <button type="submit"><i class="far fa-search"></i></button>
    </form>

    <!-- Onglets Categories et Main Menu -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">Main Menu</button>
        </li>
    </ul>

    <!-- Contenu des onglets -->
    <div class="tab-content" id="pills-tabContent">

        <!-- Catégories (sous forme de menu accordéon) -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <ul class="wsus_mobile_menu_category">
                        <li><a href="{{ route('home') }}"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                        <li><a href="{{ route('plans') }}"><i class="fas fa-tags"></i> Plans</a></li>
                        <li>
                            <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSessions" aria-expanded="false" aria-controls="flush-collapseSessions">
                                <i class="fas fa-calendar"></i> Sessions (Slots)
                            </a>
                            <div id="flush-collapseSessions" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="#">My Sessions</a></li>
                                        <li><a href="#">Create New Session</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="#"><i class="fas fa-users"></i> Coaches</a></li>
                        <li><a href="#"><i class="fal fa-gamepad-alt"></i> Activities</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Menu (sous forme de liste) -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="wsus__mobile_menu_main_menu">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">My Account</a></li>
                    <li>
                        @auth
                        <a href="{{ route('plans') }}" class="btn btn-outline-info" role="button">
                            <i class="bi bi-bag-plus"></i> Wallet Balance: <span id="wallet-balance">{{ Auth::user()->wallet->balance ?? '0.00' }}</span>
                        </a>
                        @endauth
                    </li>
                    <li>
                        @auth
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--============================
        MOBILE MENU END
==============================-->

