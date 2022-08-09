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
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-30 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                    <div class="section-subtitle">Bize Ulaşabilirsiniz</div>
                    <div class="section-title">Müşteri İlişkileri</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-120 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                    <div class="projects2">
                        <figure>
                            <a href="javascript:void()">
                                <img src="{{ asset('assets/frontend/img/about.jpg') }}" alt="Müşteri İlişkileri"></a>
                        </figure>
                        <div class="caption">
                            <h4>Müşteri İlişkileri</h4>
                            <p>Müşteri İlişkileri Departmanımız hafta İçi 09:00 – 18:00 arasında hizmet vermektedir.</p>
                            <p>
                            <ul>
                                <li> <i class="ti-angle-right"></i> Teslim süreci</li>
                                <li> <i class="ti-angle-right"></i> Proje ilerleme süreçleri</li>
                                <li> <i class="ti-angle-right"></i> Tapu süreçleri</li>
                                <li> <i class="ti-angle-right"></i> Site yönetim süreçleri</li>
                                <li> <i class="ti-angle-right"></i> Talep ve şikayetleriniz</li>

                            </ul>

                            gibi pek çok konuda müşteri ilişkileri departmanımıza aşağıdaki telefon numarası ve emailden
                            ulaşabilirsiniz.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customJs')
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
