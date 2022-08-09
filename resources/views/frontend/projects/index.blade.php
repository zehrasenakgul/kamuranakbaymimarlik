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
    <section class="projects section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12  mb-30 animate-box" data-animate-effect="fadeInUp">
                    <div class="section-title">Projeler</div>
                </div>
            </div>
            <div class="row">
                @foreach ($projects as $item)
                    <div class="col-md-6 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                        <div class="item">
                            @foreach ($item->images as $image)
                                <div class="position-re o-hidden"> <img src="{{ url('storage/' . $image->image) }}"
                                        alt="{{ $item->name }}"> </div>
                            @endforeach
                            <div class="con">
                                <h5><a href="{{ url('projeler/' . $item->slug) }}">{{ $item->name }}</a></h5>
                                <div class="line"></div> <a href="{{ url('projeler/' . $item->slug) }}"><i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

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
