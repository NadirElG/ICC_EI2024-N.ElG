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
                    <h4>{{ \App\Helpers\TranslationHelper::translate('Nous offrons des services premium à nos clients') }}</h4>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ \App\Helpers\TranslationHelper::translate('Support Client') }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ \App\Helpers\TranslationHelper::translate('Chez SloTeam, nous accordons une priorité exceptionnelle au support client afin de garantir une expérience sans faille. Notre équipe est disponible pour répondre aux questions, vous guider dans vos réservations et vous aider à gérer vos séances sportives.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{ \App\Helpers\TranslationHelper::translate('Gestion des Réservations') }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ \App\Helpers\TranslationHelper::translate('Notre plateforme permet aux utilisateurs de gérer facilement leurs réservations, de modifier leurs séances et de suivre leur activité sportive, offrant une solution simple et flexible.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{ \App\Helpers\TranslationHelper::translate('Coaching Personnalisé') }}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ \App\Helpers\TranslationHelper::translate('Nous proposons une variété de coachs spécialisés dans différents domaines pour garantir un accompagnement personnalisé, adapté aux objectifs et préférences de chacun.') }}</p>
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
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Coachs Enregistrés') }}</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__about_counter_single">
                        <span class="counter">1,500</span>
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Réservations Effectuées') }}</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__about_counter_single">
                        <span class="counter">850</span>
                        <h2>{{ \App\Helpers\TranslationHelper::translate('Utilisateurs Satisfaits') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wsus__why_shop">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h3>{{ \App\Helpers\TranslationHelper::translate('Pourquoi Choisir SloTeam ?') }}</h3>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fal fa-users"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Coachs Certifiés') }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fal fa-calendar-check"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Réservations Simples et Flexibles') }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fal fa-map-marker-alt"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Séances en Présentiel') }}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__why_shop_single">
                        <i class="fas fa-headset"></i>
                        <p>{{ \App\Helpers\TranslationHelper::translate('Support Dédié') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wsus__about_team">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h4>{{ \App\Helpers\TranslationHelper::translate('Rencontrez Notre Équipe') }}</h4>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__team_single">
                        <div class="wsus__team_img">
                            <img src="{{ asset('frontend/images/team_1.jpg') }}" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="wsus__team_text">
                            <h5>Nadir El Ghammaz</h5>
                            <p>{{ \App\Helpers\TranslationHelper::translate('Fondateur & PDG') }}</p>
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
