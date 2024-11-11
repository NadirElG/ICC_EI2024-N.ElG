@extends('frontend.layouts.master')

@section('content')

    <!--============================
        SLOT  START
    ==============================-->
    <br>
    @include('frontend.home.sections.slot')
    <!--============================
        SLOT BANNER END
    ==============================-->

    <!--============================
        PLANS BANNER START
    ==============================-->
    @include('frontend.home.sections.banner')
    <!--============================
        PLANS BANNER END
    ==============================-->

    <!--============================
        BRAND SLIDER START
    ==============================-->
        @include('frontend.home.sections.brand')
    <!--============================
        BRAND SLIDER END
    ==============================-->

    <!--============================
        HOME BLOGS START
    ==============================-->
        @include('frontend.home.sections.blog')
    <!--============================
        HOME BLOGS END
    ==============================-->



@endsection