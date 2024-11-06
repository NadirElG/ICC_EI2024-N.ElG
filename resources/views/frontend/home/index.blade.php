@extends('frontend.layouts.master')

@section('content')

    <!--============================
        PLANS BANNER START
    ==============================-->
    <section id="wsus__monthly_top" class="wsus__monthly_top_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="wsus__monthly_top_banner">
                        <div class="wsus__monthly_top_banner_img">
                            <img src="{{ asset('frontend/images/about_2.jpg') }}" alt="Wallet" class="img-fluid w-100">
                            <span></span>
                        </div>
                        <div class="wsus__monthly_top_banner_text">
                            <h3>Add Funds with Our <span>Exclusive Plans</span></h3>
                            <h6>Top-up Now</h6>
                            <a class="shop_btn" href="{{ route('plans') }}">View Plans</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PLANS BANNER END
    ==============================-->


    <!--============================
        BRAND SLIDER START
    ==============================-->
    <section id="wsus__brand_sleder" class="brand_slider_2">
        <div class="container">
            <div class="brand_border">
                <div class="row brand_slider">
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="wsus__brand_logo">
                            <img src="{{ asset('frontend/images/brand_slider_jims.png') }}" alt="brand" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BRAND SLIDER END
    ==============================-->

    



@endsection