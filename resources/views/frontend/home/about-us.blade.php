@extends('frontend.layouts.master')

@section('content')

<!--============================
    ABOUT US START
==============================-->
<section id="wsus__about_us">
    <div class="container">
        <div class="wsus__about_accordian">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h4>{{ \App\Helpers\TranslationHelper::translate('We Offer Premium Services for Our Clients') }}</h4>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ \App\Helpers\TranslationHelper::translate('Customer Support') }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ \App\Helpers\TranslationHelper::translate('At SloTeam, we prioritize exceptional customer support to ensure a seamless experience. Our team is available to answer questions, guide you through booking, and assist with managing your sports sessions.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{ \App\Helpers\TranslationHelper::translate('Reservation Management') }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ \App\Helpers\TranslationHelper::translate('Our platform allows users to easily manage bookings, modify reservations, and track their sessions, providing a simple and flexible way to organize fitness activities.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{ \App\Helpers\TranslationHelper::translate('Personalized Coaching') }}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ \App\Helpers\TranslationHelper::translate('We offer a variety of coaches specializing in different areas, ensuring a personalized approach tailored to individual fitness goals and preferences.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <img src="{{ asset('frontend/images/about_2.jpg') }}" alt="img" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="wsus__about_counter_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__about_counter_single">
                        <span class="counter">120</span>
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Registered Coaches') }}</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__about_counter_single">
                        <span class="counter">1,500</span>
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Reservations Made') }}</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__about_counter_single">
                        <span class="counter">850</span>
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Satisfied Users') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wsus__why_shop">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h3>{{ \App\Helpers\TranslationHelper::translate('Why Choose SloTeam?') }}</h3>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fal fa-users"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Certified Coaches') }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fal fa-calendar-check"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Easy and Flexible Booking') }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fal fa-map-marker-alt"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('In-Person Sessions') }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fas fa-headset"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Dedicated Support') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wsus__about_team">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h4>{{ \App\Helpers\TranslationHelper::translate('Meet Our Team') }}</h4>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__team_single">
                        <div class="wsus__team_img">
                            <img src="{{ asset('frontend/images/team_1.jpg') }}" alt="team" class="img-fluid w-100">
                            <a class="wsus__team_single_overlay" href="#"></a>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__team_text">
                            <h5>Nadir El Ghammaz</h5>
                            <p>{{ \App\Helpers\TranslationHelper::translate('Founder & CEO') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__team_single">
                        <div class="wsus__team_img">
                            <img src="{{ asset('frontend/images/team_2.jpg') }}" alt="team" class="img-fluid w-100">
                            <a class="wsus__team_single_overlay" href="#"></a>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__team_text">
                            <h5>Jane Smith</h5>
                            <p>{{ \App\Helpers\TranslationHelper::translate('Marketing Manager') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__team_single">
                        <div class="wsus__team_img">
                            <img src="{{ asset('frontend/images/team_5.jpg') }}" alt="team" class="img-fluid w-100">
                            <a class="wsus__team_single_overlay" href="#"></a>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__team_text">
                            <h5>Sayed Massoud</h5>
                            <p>{{ \App\Helpers\TranslationHelper::translate('Corporate Secretary') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__team_single">
                        <div class="wsus__team_img">
                            <img src="{{ asset('frontend/images/team_1.png') }}" alt="team" class="img-fluid w-100">
                            <a class="wsus__team_single_overlay" href="#"></a>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__team_text">
                            <h5>Caner Korkut</h5>
                            <p>{{ \App\Helpers\TranslationHelper::translate('Developer') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    ABOUT US END
==============================-->

@endsection
