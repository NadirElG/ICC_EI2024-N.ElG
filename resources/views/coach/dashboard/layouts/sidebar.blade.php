<div class="dashboard_sidebar">
    <span class="close_icon">
        <i class="far fa-bars dash_bar"></i>
        <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{ route('coach.profile') }}" class="dash_logo"><img src="{{asset('frontend/images/logoST.png')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a href="{{ route('home') }}"><i class="bi bi-house-door"></i> {{ \App\Helpers\TranslationHelper::translate('Accueil') }}</a></li> 
        <li><a class="active" href="{{ route('coach.dashboard') }}"><i class="fas fa-tachometer"></i> {{ \App\Helpers\TranslationHelper::translate('Tableau de bord') }}</a></li>
        <li><a href="{{ route('coach.slots.index') }}"><i class="far fa-star"></i> {{ \App\Helpers\TranslationHelper::translate('Créneaux') }}</a></li>
        <li><a href="{{ route('coach.profile') }}"><i class="far fa-user"></i> {{ \App\Helpers\TranslationHelper::translate('Mon Profil') }}</a></li>
        <li><a href="{{ route('coach.withdrawal.create') }}"><i class="fas fa-wallet"></i> {{ \App\Helpers\TranslationHelper::translate('Demande de retrait') }}</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none;">
                    <i class="far fa-sign-out-alt"></i> {{ \App\Helpers\TranslationHelper::translate('Se déconnecter') }}
                </a>
            </form>
        </li>
    </ul>
</div>
