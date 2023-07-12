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

    <section class="bauen-blog2 section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Blog</h2>
                </div>
            </div>
            @php
                $say = 0;
            @endphp
            @foreach ($blogs as $item)
                @php
                    $say++;
                @endphp
                <div class="row mb-60">
                    @if ($say % 2 != 0)
                        <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                            <div class="img left ">
                                <a href="{{ url('blog/' . $item->slug) }}"><img src="{{ url('storage/' . $item->image) }}"
                                        alt="{{ $item->name }}"></a>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6 valign animate-box" data-animate-effect="fadeInRight">
                        <div class="content">
                            <div class="date">
                                <h3>{{ $item->created_at->translatedFormat('d ') }}</h3>
                                <h6>{{ $item->created_at->translatedFormat(' F Y ') }}</h6>
                            </div>
                            <div class="cont">
                                <div class="info">
                                    <h6><a href="{{ url('blog/' . $item->slug) }}">Transport</a> / <a
                                            href="{{ url('blog/' . $item->slug) }}"
                                            class="tags">{{ $item->category->name }}</a>
                                    </h6>
                                </div>
                                <h4>{{ $item->name }}</h4> <a href="{{ url('blog/' . $item->slug) }}" class="more"
                                    data-splitting=""><span>KEŞFET</span></a>
                            </div>
                        </div>
                    </div>
                    @if ($say % 2 == 0)
                        <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                            <div class="img">
                                <a href="{{ url('blog/' . $item->slug) }}"><img src="{{ url('storage/' . $item->image) }}"
                                        alt="{{ $item->name }}"></a>
                            </div>
                        </div>
                    @endif
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
