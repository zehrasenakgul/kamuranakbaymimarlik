@extends('layouts.frontend')
@section('content')
    @include('frontend.projects.owl-carousel')
    @include('frontend.projects.slider')
    @include('frontend.services.owl-carousel')
    @include('frontend.documents.documents-index')
    @include('frontend.blogs.latest-blog')
    @include('frontend.teams.teams-index')
    @include('frontend.video.video-index')
@endsection
@push('customJs')
@endpush

@push('customCss')
    <style>
        @media (max-width:768px) {
            .section-title {
                font-size: 35px;
            }
        }
    </style>
@endpush
