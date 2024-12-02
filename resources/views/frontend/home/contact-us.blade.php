@extends('frontend.layouts.master')

@section('content')

<!--============================
    CONTACT PAGE START
==============================-->
<section id="wsus__contact">
    <div class="container">
        <div class="wsus__contact_area">
            <div class="row">
                <!-- Contact Info Section -->
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="wsus__contact_single">
                                <i class="fal fa-envelope"></i>
                                <h5>{{ \App\Helpers\TranslationHelper::translate('Adresse Email') }}</h5>
                                <a href="mailto:contact-info@sloteam.com">contact-info@sloteam.com</a>
                                <span><i class="fal fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__contact_single">
                                <i class="far fa-phone-alt"></i>
                                <h5>{{ \App\Helpers\TranslationHelper::translate('Numéro de Téléphone') }}</h5>
                                <a href="tel:+32489886488">+32 489 886 488</a>
                                <span><i class="far fa-phone-alt"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__contact_single">
                                <i class="fal fa-map-marker-alt"></i>
                                <h5>{{ \App\Helpers\TranslationHelper::translate('Adresse de Bureau') }}</h5>
                                <p>{{ \App\Helpers\TranslationHelper::translate('Institut des Carrières Commerciales, Bruxelles, BE') }}</p>
                                <span><i class="fal fa-map-marker-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Section -->
                <div class="col-xl-8">
                    <div class="wsus__contact_question">
                        <h5>{{ \App\Helpers\TranslationHelper::translate('Envoyez-nous un Message') }}</h5>
                        <form id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <input type="text" placeholder="{{ \App\Helpers\TranslationHelper::translate('Votre Nom') }}" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <input type="email" placeholder="{{ \App\Helpers\TranslationHelper::translate('Email') }}" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <input type="text" placeholder="{{ \App\Helpers\TranslationHelper::translate('Téléphone : ex : +32 488 88 88 88') }}" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__con_form_single">
                                        <input type="text" placeholder="{{ \App\Helpers\TranslationHelper::translate('Sujet') }}" name="subject" >
                                    </div>
                                </div>
                                
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <textarea cols="3" rows="5" placeholder="{{ \App\Helpers\TranslationHelper::translate('Message') }}" name="message"></textarea>
                                    </div>
                                    <button id="form-submit" type="submit" class="common_btn">{{ \App\Helpers\TranslationHelper::translate('Envoyer') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Google Map Section -->
                <div class="col-xl-12">
                    <div class="wsus__con_map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.49035819982!2d4.339900475473914!3d50.8406032716693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c470f8e9e6e5%3A0x74b42f79e53c1b55!2sBruxelles%2C%20Education%20Promotion%20Sociale%2C%20Institut%20Des%20Carri%C3%A8res%20Commerciales!5e0!3m2!1sen!2sbe!4v1730904043902!5m2!1sen!2sbe"
                            width="1600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    CONTACT PAGE END
==============================-->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url : "{{ route('handle-contact-form') }}",
                    data : data,
                    beforeSend: function() {
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data) {
                        if(data.status == 'success') {
                            alert(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(data) {
                        let errors = data.responseJSON.errors;
                        if(errors) {
                            $.each(errors, function(key, value) {
                                alert(value);
                            });
                            $('#form-submit').attr('disabled', false);
                        }
                    }
                });
            });
        });
    </script>
@endpush
