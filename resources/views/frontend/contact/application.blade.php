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
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="section-subtitle">Transport</div>
                    <div class="section-title"> Arsa Bayilik Başvurusu</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 m-auto mb-90 text-center">
                    <h5>Türkiye’nin yatırım değeri yüksek bölgelerindeki sıfır riskli ARSA’larının satışını yaparak
                        yüksek gelir elde etmek için formu doldurun sizi arayalım.</h5>
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
                                <input name="city" type="text" id="city"
                                    placeholder="Başvuru Yaptığınız Şehir *">
                            </div>
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Gönder" id="contact-form-button">
                            </div>
                        </div>
                    </form>
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
                var city = $("#city").val();
                if (name.length > 0 && email.length > 0 && phone.length > 0 && city
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
                        url: "{{ url('/sendApplication') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": $("#name").val(),
                            "email": $("#email").val(),
                            "phone": $("#phone").val(),
                            "city": $("#city").val()
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
