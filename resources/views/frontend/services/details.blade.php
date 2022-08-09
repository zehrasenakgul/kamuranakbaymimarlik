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
    <!-- Post section -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">{{ $service[0]->name }}</div>
                    <p class="mb-30">{{ $service[0]->content }}</p>
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

        .nav-scroll .navbar-nav .nav-link {
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
