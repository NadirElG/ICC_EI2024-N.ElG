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
                        <h3>{{ \App\Helpers\TranslationHelper::translate('Add Funds with Our') }} <span>{{ \App\Helpers\TranslationHelper::translate('Exclusive Plans') }}</span></h3>
                        <h6>{{ \App\Helpers\TranslationHelper::translate('Top-up Now') }}</h6>
                        <a class="shop_btn" href="{{ route('plans') }}">{{ \App\Helpers\TranslationHelper::translate('View Plans') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    PLANS BANNER END
==============================-->
