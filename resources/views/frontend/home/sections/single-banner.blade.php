    <!--============================
        SINGLE BANNER START
    ==============================-->
    <section id="wsus__single_banner" class="wsus__single_banner_2">
    <div class="container">
        <div class="row">
            <!-- Premier élément : Slots -->
            <div class="col-xl-6 col-lg-6">
                <div class="wsus__single_banner_content">
                    <div class="wsus__single_banner_img">
                        <img src="{{ asset('frontend/images/GroupSlot.png') }}" alt="Créneaux" class="img-fluid w-100">
                    </div>
                    <div class="wsus__single_banner_text">
                        <h6>{{ \App\Helpers\TranslationHelper::translate('Découvrez nos créneaux') }}</h6>
                        <h3>{{ \App\Helpers\TranslationHelper::translate('Réservez maintenant') }}</h3>
                        <a class="shop_btn" href="{{ url('/slots') }}">
                            {{ \App\Helpers\TranslationHelper::translate('Voir les créneaux') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Deuxième élément : Coaches -->
            <div class="col-xl-6 col-lg-6">
                <div class="wsus__single_banner_content single_banner_2">
                    <div class="wsus__single_banner_img">
                        <img src="{{ asset('frontend/images/coaches.png') }}" alt="Coachs" class="img-fluid w-100">
                    </div>
                    <div class="wsus__single_banner_text">
                        <h6>{{ \App\Helpers\TranslationHelper::translate('Nos coachs') }}</h6>
                        <h3>{{ \App\Helpers\TranslationHelper::translate('Trouvez votre coach') }}</h3>
                        <a class="shop_btn" href="{{ url('/coaches') }}">
                            {{ \App\Helpers\TranslationHelper::translate('Voir les coachs') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--============================
        SINGLE BANNER END  
    ==============================-->