@extends('frontend.layouts.master')

@section('content')

    <!--============================
        PLANS BANNER START
    ==============================-->
    @include('frontend.home.sections.banner')
    <!--============================
        PLANS BANNER END
    ==============================-->
    <h1>{{ \App\Helpers\TranslationHelper::translate('Welcome to SloTeam') }}</h1>
    <p>{{ \App\Helpers\TranslationHelper::translate('This is the best sports booking site.') }}</p>

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