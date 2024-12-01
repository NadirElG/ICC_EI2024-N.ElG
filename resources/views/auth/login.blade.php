<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>SLOTEAM</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon1.png') }}">

    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
    <style>
        .login-register-page {
            background-color: #08C;
        }
    </style>
</head>

<body class="login-register-page">
    <!--============================
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">Connexion</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">Inscription</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input type="password" name="password" placeholder="Mot de passe">
                                        </div>
                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                                                <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                        </div>
                                        <button class="common_btn" type="submit">Se connecter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input name="name" type="text" placeholder="Nom">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input name="username" type="text" placeholder="Nom d'utilisateur">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input name="email" type="email" placeholder="Email">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input name="password" type="password" placeholder="Mot de passe">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input name="password_confirmation" type="password" placeholder="Confirmation mot de passe">
                                        </div>

                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="terms-checkbox">
                                                <label class="form-check-label" for="terms-checkbox">
                                                    <a href="#" id="terms-link">J'accepte les conditions d'utilisation</a>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Bouton d'inscription désactivé par défaut -->
                                        <button class="common_btn mt-4" type="submit" id="signup-button" disabled>Inscription</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <!-- Modal pour les conditions d'utilisation -->
                    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- En-tête du modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="termsModalLabel">Conditions Générales d'Utilisation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                </div>
                                <!-- Corps du modal -->
                                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                    <!-- Contenu des conditions d'utilisation -->
                                    <p><strong>Date de dernière mise à jour :</strong> 1er décembre 2024</p>

                                    <p>Bienvenue sur <strong>SLOTEAM</strong>. En utilisant notre site web et nos services, vous acceptez sans réserve les présentes Conditions Générales d'Utilisation (CGU). Veuillez les lire attentivement avant de procéder.</p>

                                    <h5>1. Objet</h5>
                                    <p>Les présentes CGU définissent les modalités et conditions dans lesquelles les utilisateurs peuvent accéder et utiliser le site SLOTEAM pour réserver des séances de sport.</p>

                                    <h5>2. Acceptation des Conditions</h5>
                                    <p>
                                        L'accès au site et son utilisation impliquent l'acceptation pleine et entière des présentes CGU. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser nos services.
                                    </p>

                                    <h5>3. Inscription et Compte Utilisateur</h5>
                                    <p>
                                        a) Vous devez créer un compte en fournissant des informations exactes et à jour.<br>
                                        b) Vous êtes responsable de la confidentialité de vos identifiants. Toute activité réalisée avec vos identifiants vous est imputable.<br>
                                        c) Si vous soupçonnez une utilisation non autorisée de votre compte, contactez-nous immédiatement.
                                    </p>

                                    <h5>4. Réservation des Séances</h5>
                                    <p>
                                        a) Vous pouvez réserver des créneaux pour des séances de sport via notre site.<br>
                                        b) Les disponibilités sont mises à jour régulièrement. Nous ne garantissons pas l'absence d'erreurs ou de modifications de dernière minute.<br>
                                        c) Les conditions spécifiques de chaque séance (horaires, tarifs, conditions d'annulation) sont disponibles avant chaque réservation.
                                    </p>

                                    <h5>5. Annulation et Remboursement</h5>
                                    <p>
                                        Les conditions d'annulation et de remboursement varient selon les séances. Veuillez consulter ces informations avant de finaliser votre réservation.
                                    </p>

                                    <h5>6. Obligations de l'Utilisateur</h5>
                                    <p>
                                        a) Vous vous engagez à utiliser le site conformément aux lois en vigueur et aux présentes CGU.<br>
                                        b) Vous vous abstenez de toute utilisation frauduleuse, abusive ou illégale du site.<br>
                                        c) Vous respectez les droits de propriété intellectuelle associés au site.
                                    </p>

                                    <h5>7. Protection des Données Personnelles</h5>
                                    <p>
                                        a) Vos données personnelles sont collectées et traitées conformément au Règlement Général sur la Protection des Données (RGPD).<br>
                                        b) En cas de suppression de votre compte, vos données seront anonymisées. Toutes les informations personnelles (nom, email, etc.) seront remplacées par des valeurs neutres (ex : "Utilisateur supprimé"), tout en conservant les informations nécessaires à la traçabilité financière, telles que les transactions de wallet.<br>
                                        c) Vous avez un droit d'accès, de rectification, de suppression et de portabilité de vos données. Pour exercer ces droits, contactez-nous à : <a href="mailto:contact@sloteam.be">contact@sloteam.be</a>.<br>
                                        d) Pour plus d'informations, veuillez consulter notre <a href="#">Politique de Confidentialité</a>.
                                    </p>

                                    <h5>8. Propriété Intellectuelle</h5>
                                    <p>
                                        Tous les éléments du site (textes, images, logos, logiciels, etc.) sont protégés par les lois sur la propriété intellectuelle. Toute reproduction non autorisée est strictement interdite.
                                    </p>

                                    <h5>9. Responsabilité</h5>
                                    <p>
                                        a) SLOTEAM ne peut garantir un accès continu au site, notamment en cas de maintenance ou de panne.<br>
                                        b) Nous ne sommes pas responsables des dommages résultant de l'utilisation du site, sauf en cas de faute grave.
                                    </p>

                                    <h5>10. Liens Hypertextes</h5>
                                    <p>
                                        Le site peut contenir des liens vers des sites tiers. Nous ne sommes pas responsables du contenu de ces sites.
                                    </p>

                                    <h5>11. Modification des CGU</h5>
                                    <p>
                                        Nous nous réservons le droit de modifier les CGU à tout moment. Les modifications prendront effet dès leur publication sur le site.
                                    </p>

                                    <h5>12. Droit Applicable et Juridiction</h5>
                                    <p>
                                        Les présentes CGU sont régies par le droit belge. Tout litige sera soumis à la compétence exclusive des tribunaux belges.
                                    </p>

                                    <h5>13. Contact</h5>
                                    <p>
                                        Pour toute question ou réclamation, contactez-nous :
                                    </p>
                                    <p>Email : <a href="mailto:contact@sloteam.be">contact@sloteam.be</a></p>
                                    <p>Adresse : 123 Avenue des Sports, Bruxelles, Belgique</p>

                                    <p>En cochant la case "J'accepte les conditions d'utilisation", vous reconnaissez avoir lu, compris et accepté les présentes CGU, y compris la politique d'anonymisation des données personnelles.</p>
                                </div>
                                <!-- Pied de page du modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       LOGIN/REGISTER PAGE END
    ==============================-->

    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('frontend/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('frontend/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('frontend/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('frontend/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('frontend/js/jquery.classycountdown.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <!-- Script pour gérer la case à cocher et le modal -->
    <script>
        $(document).ready(function() {
            // Désactive le bouton d'inscription par défaut
            $('#signup-button').prop('disabled', true);

            // Active/désactive le bouton en fonction de la case à cocher
            $('#terms-checkbox').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#signup-button').prop('disabled', false);
                } else {
                    $('#signup-button').prop('disabled', true);
                }
            });

            // Affiche le modal lors du clic sur le lien
            $('#terms-link').on('click', function(e) {
                e.preventDefault();
                $('#termsModal').modal('show');
            });
        });
    </script>

</body>

</html>
