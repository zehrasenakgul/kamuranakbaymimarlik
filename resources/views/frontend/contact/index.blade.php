@extends('layouts.frontend')
@section('content')
    <!-- Lines section -->
    <section class="content-lines-wrapper">
        <div class="content-lines-inner">
            <div class="content-lines"></div>
        </div>
    </section>
    <!-- Header Banner section -->
    <section class="banner-header banner-img section-padding valign bg-img bg-fixed" data-overlay-light="3"
        data-background="{{ asset('assets/frontend/img/banner2.jpg') }}"></section>
    <section class="contact section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Transport</div>
                    <div class="section-title"> İletişim</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-90">
                    <p>Çalışma Günleri: Haftanın 7 Günü
                        Esentepe Mh. Ali Kaya Sk. No:3, Apa Nef Plaza Levent, 34394 Şişli/İstanbul</p>
                    <ul class="list-unstyled contact-list">
                        <li>
                            <div class="icon"><span class="ti-headphone-alt"></span></div>
                            <div class="text">
                                <p><a href="tel:+1123-456-0606">+1 123-456-0606</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"> <span class="ti-email"></span> </div>
                            <div class="text">
                                <p><a href="mailto:info@architecture.com">info@architecture.com</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"> <span class="ti-location-pin"></span> </div>
                            <div class="text">
                                <p>120 King St, Charleston SC 29401 USA</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 offset-md-2 mb-90">
                    <h5>Bize Ulaşabilirsiniz</h5>
                    <form class="contact__form">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input name="name" type="text" id="name" placeholder="İsminiz*">
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" id="email" placeholder="E-Posta *">
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="phone" type="text" id="phone" placeholder="Telefon *">
                            </div>
                            <div class="col-md-12 form-group">
                                <input name="subject" type="text" id="subject" placeholder="Konu *">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Mesajınız *"></textarea>
                            </div>
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Gönder" id="contact-form-button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d838.6467795218418!2d-79.93308707079942!3d32.77668842639422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a104df45875%3A0x961a7ca2436378eb!2s120%20King%20St%2C%20Charleston%2C%20SC%2029401%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1637798294140!5m2!1str!2str"
                        width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customJs')
    <script>
        $(document).ready(function() {
            $("#contact-form-button").click(function() {

                var name = $("#name").val();
                var phone = $("#phone").val();
                var email = $("#email").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                if (name.length > 0 && email.length > 0 && message.length > 0 && phone.length > 0 && subject
                    .length > 0) {
                    Swal.fire({
                        title: 'İletiliyor...',
                        width: 600,
                        padding: '3em',
                        color: '#b19777',
                        background: '#fff url(https://sweetalert2.github.io/images/trees.png)',

                        showConfirmButton: false,

                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/sendMessage') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": $("#name").val(),
                            "email": $("#email").val(),
                            "phone": $("#phone").val(),
                            "subject": $("#subject").val(),
                            "message": $("#message").val()
                        },

                        success: function(response) {
                            Swal.fire({
                                title: 'Mesajınız başarıyla iletildi.',
                                width: 600,
                                padding: '3em',
                                color: '#b19777',
                                background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
                                showConfirmButton: false,
                                timer: 1500

                            });
                            console.log(response);
                        },

                        error: function(response) {
                            console.log("hata");
                            console.log(response);
                        }
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Lütfen boş alan bırakmayınız.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            });
        });
    </script>
@endpush

@push('customCss')
    <style>
        .navbar .navbar-nav .nav-link,
        .logo-wrapper .logo h2,
        .logo-wrapper .logo span {
            color: #1e1e1e
        }

        .nav-scroll .navbar-nav .nav-link,
        .show .navbar-nav .nav-link {
            color: #999
        }

        @media (max-width:768px) {

            .logo-wrapper .logo h2,
            .logo-wrapper .logo span {
                color: white;
            }
        }
    </style>
@endpush
