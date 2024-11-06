@extends('frontend.layouts.master')

@section('content')

<!--============================
    CONTACT PAGE START
==============================-->
<section id="wsus__contact">
    <div class="container">
        <div class="wsus__contact_area">
            <div class="row">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="wsus__contact_single">
                                <i class="fal fa-envelope"></i>
                                <h5>Email Address</h5>
                                <a href="mailto:contact-info@sloteam.com">contact-info@sloteam.com</a>
                                <span><i class="fal fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__contact_single">
                                <i class="far fa-phone-alt"></i>
                                <h5>Phone Number</h5>
                                <a href="tel:+32489886488">+32 489 886 488</a>
                                <span><i class="far fa-phone-alt"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__contact_single">
                                <i class="fal fa-map-marker-alt"></i>
                                <h5>Office Address</h5>
                                <p>Institut des Carrières Commerciales, Brussels, BE</p>
                                <span><i class="fal fa-map-marker-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="wsus__contact_question">
                        <h5>Send Us a Message</h5>
                        <form id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <input type="text" placeholder="Your Name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <input type="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <input type="text" placeholder="Phone : ex : +32 488 88 88 88" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__con_form_single">
                                        <input type="text" placeholder="Subject" name="subject" >
                                    </div>
                                </div>
                                
                                <div class="col-xl-12">
                                    <div class="wsus__con_form_single">
                                        <textarea cols="3" rows="5" placeholder="Message" name="message"></textarea>
                                    </div>
                                    <button id="form-submit" type="submit" class="common_btn">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="wsus__con_map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.49035819982!2d4.339900475473914!3d50.8406032716693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c470f8e9e6e5%3A0x74b42f79e53c1b55!2sBruxelles%2C%20Education%20Promotion%20Sociale%2C%20Institut%20Des%20Carri%C3%A8res%20Commerciales!5e0!3m2!1sen!2sbe!4v1730904043902!5m2!1sen!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            width="1600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
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
        $(document).ready(function()
        {
            $('#contact-form').on('submit', function(e)
            {
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    method: 'POST', 
                    url : "{{ route('handle-contact-form') }}",
                    data :  data, 
                    beforeSend: function()
                    {
                        $('#form-submit').text('sending...');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data)
                    {
                        if(data.status == 'success')
                        {
                            alert(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').text('Send');
                            $('#form-submit').attr('disabled', false);

                        }
                    },
                    error: function(data){
                    let errors = data.responseJSON.errors;
                    if(errors){
                        $.each(errors, function(key, value){
                            alert(value);
                            //toastr.error(value);
                        })
                        $('#form-submit').text('Send');
                        $('#form-submit').attr('disabled', false);

                    }
                }
                })
            })
        })
    </script>
@endpush