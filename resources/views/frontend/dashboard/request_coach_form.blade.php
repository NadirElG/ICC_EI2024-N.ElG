@extends('frontend.dashboard.layouts.master')

@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('frontend.dashboard.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fas fa-chalkboard-teacher"></i> Demande pour Devenir Coach</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>Informations de Candidature</h4>
                <form action="{{ route('user.submit_coach_request') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <!-- Prénom -->
                    <div class="col-xl-12">
                    <label for="first_name">Prénom</label>
                      <div class="wsus__dash_pro_single">
                        <i class="fas fa-user-tie"></i>
                        <input type="text" id="first_name" name="first_name" placeholder="Votre prénom" required>
                      </div>
                    </div>

                    <!-- Nom -->
                    <div class="col-xl-12">
                        <label for="last_name">Nom</label>  
                        <div class="wsus__dash_pro_single">
                        <i class="fas fa-user-tie"></i>
                        <input type="text" id="last_name" name="last_name" placeholder="Votre nom" required>
                      </div>
                    </div>

                    <!-- Spécialité -->
                    <div class="col-xl-12">
                        <label for="specialty">Spécialité</label>
                      <div class="wsus__dash_pro_single">
                      <i class="fas fa-certificate"></i>

                        <input type="text" id="specialty" name="specialty" placeholder="Spécialité (ex. : Yoga, Fitness)">
                      </div>
                    </div>

                    <!-- Certification -->
                    <div class="col-xl-12">
                        <label for="certification">Certification</label>
                      <div class="wsus__dash_pro_single">
                        <i class="fas fa-user-graduate"></i>
                        <input type="file" id="certification" name="certification" accept=".pdf,.jpg,.png">
                      </div>
                    </div>

                    <!-- Message de Motivation -->
                    <div class="col-xl-12">
                    <label for="motivation">Motivation</label>
                      <div class="wsus__dash_pro_single">
                        <textarea id="motivation" name="motivation" placeholder="Pourquoi voulez-vous devenir coach ?" rows="5" required></textarea>
                      </div>
                    </div>

                  </div>
                  <div class="col-xl-12">
                    <button class="common_btn mb-4 mt-2" type="submit">Soumettre la Candidature</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD END
  ==============================-->

@endsection
