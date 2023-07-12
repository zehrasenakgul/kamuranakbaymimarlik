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
                    <div class="section-title">Tasarım ve İnovasyon</div>
                </div>
            </div>
            @php
                $say = 0;
            @endphp
            @foreach ($services as $item)
                @php
                    $say++;
                @endphp
                <div class="row">
                    <div class="col-md-12 mb-120 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
                        <div class="projects2  @if ($say % 2 != 0) left @endif  ">
                            <figure>
                                <img src="{{ url('storage/' . $item->image) }}" alt="{{ $item->name }}">
                            </figure>


                            <div class="caption">
                                <div class="section-number">{{ $say }}</div>
                                <h6>Transport</h6>
                                <h4>{{ $item->name }}</h4>
                                <div class="butn-dark"><a
                                        href="{{ url('tasarim-ve-inovasyon/' . $item->slug) }}"><span>KEŞFET
                                            <i class="ti-arrow-right"></i></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
