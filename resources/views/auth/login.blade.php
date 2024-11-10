<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>SLOTEAM</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon1.png') }}">

    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
    <style>
        .login-register-page {
            background-color: #08C ;
        }
    </style>
</head>

<body class="login-register-page">
    <!--============================
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">signup</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input id="remember_me" class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckDefault" name="remember">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password ?</a>
                                        </div>
                                        <button class="common_btn" type="submit">login</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel" aria-labelledby="pills-profile-tab2">
                            <div class="wsus__login">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input name="name" type="text" placeholder="Name">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input name="username" type="text" placeholder="Username">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input name="email" type="email" placeholder="Email">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input name="password" type="password" placeholder="Password">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input name="password_confirmation" type="password"  placeholder="Confirm Password">
                                        </div>

                                        <button class="common_btn mt-4" type="submit">signup</button>
                                    </form>
                                </div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       LOGIN/REGISTER PAGE END
    ==============================-->

    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
<!--select2 js-->
<script src="{{ asset('frontend/js/select2.min.js') }}"></script>
<!--slick slider js-->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!--simplyCountdown js-->
<script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
<!--product zoomer js-->
<script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
<!--nice-number js-->
<script src="{{ asset('frontend/js/jquery.nice-number.min.js') }}"></script>
<!--counter js-->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
<!--add row js-->
<script src="{{ asset('frontend/js/add_row_custon.js') }}"></script>
<!--multiple-image-video js-->
<script src="{{ asset('frontend/js/multiple-image-video.js') }}"></script>
<!--sticky sidebar js-->
<script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
<!--price ranger js-->
<script src="{{ asset('frontend/js/ranger_jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/js/ranger_slider.js') }}"></script>
<!--isotope js-->
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<!--venobox js-->
<script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
<!--classycountdown js-->
<script src="{{ asset('frontend/js/jquery.classycountdown.js') }}"></script>

<!--main/custom js-->
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>