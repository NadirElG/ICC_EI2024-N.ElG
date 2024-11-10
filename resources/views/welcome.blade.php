<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SloTeam - Rejoignez notre communauté sportive!">
    <meta name="author" content="SloTeam Developers">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SloTeam - Rejoignez-nous!</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/cover.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body class="text-center">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">SloTeam</h3>
      <nav class="nav nav-masthead justify-content-center">
        @guest
          <a class="nav-link active" href="{{ route('login') }}">Login</a>
        @else
          <a class="nav-link" href="{{ route('user.dashboard') }}">Locker room</a>
        @endguest
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <!-- <h1 class="cover-heading">Rejoignez la communauté SloTeam!</h1> -->
    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="{{ route('home') }}">
                            <img src="{{ asset('frontend/images/logoST.png') }}" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
    <!-- <p class="lead">SloTeam est votre plateforme idéale pour réserver des séances de sport, gérer vos entraînements, et bien plus encore. Créez un compte ou connectez-vous pour découvrir tous les avantages.</p> -->
    <br>
    <p class="lead">
      @guest
        <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Let's SLOT</a>
      @else
        <a href="{{ route('user.dashboard') }}" class="btn btn-lg btn-primary">Locker room</a>
      @endguest
    </p>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>ICC EI 2024 : <a href="#">SloTeam</a>.</p>
    </div>
  </footer>
</div>

</body>
</html>
