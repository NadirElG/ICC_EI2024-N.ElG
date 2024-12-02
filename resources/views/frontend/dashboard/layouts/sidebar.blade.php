<div class="dashboard_sidebar">
    <span class="close_icon">
        <i class="far fa-bars dash_bar"></i>
        <i class="far fa-times dash_close"></i>
    </span>
    <a href="dashboard.html" class="dash_logo"><img src="{{ asset('frontend/images/logoST.png') }}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a href="{{ route('home') }}"><i class="bi bi-house-door"></i>{{ \App\Helpers\TranslationHelper::translate('Accueil') }}</a></li>
        <li><a class="active" href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer"></i>{{ \App\Helpers\TranslationHelper::translate('Tableau de bord') }}</a></li>
        <li><a href="{{ route('plans') }}"><i class="bi bi-bag-plus"></i>{{ \App\Helpers\TranslationHelper::translate('Plans') }}</a></li>
        <li><a href="{{ route('user.profile') }}"><i class="far fa-user"></i>{{ \App\Helpers\TranslationHelper::translate('Mon profil') }}</a></li>
        <li><a href="{{ route('user.request_coach_form') }}"><i class="fal fa-gift-card"></i>{{ \App\Helpers\TranslationHelper::translate('Devenir Coach') }}</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none;">
                    <i class="far fa-sign-out-alt"></i>{{ \App\Helpers\TranslationHelper::translate('Se déconnecter') }}
                </a>
            </form>
        </li>
    </ul>
</div>
