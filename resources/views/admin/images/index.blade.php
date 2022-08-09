@extends('layouts.backend')
@section('content')
    <div class="layout-px-spacing">
        <div class=" layout-top-spacing">
            @if (session()->has('alertSuccessMessage'))
                <div class="alert alert-success">
                    {{ session()->get('alertSuccessMessage') }}
                </div>
            @endif

            <form class="form-vertical" enctype="multipart/form-data" action="{{ url('admin/images') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group custom-file-container mb-4" data-upload-id="myFirstImage">
                            <div class="card component-card_2 mt-3" style="height:100%;width:100%;background-color:white">
                                <img src="{{ asset('storage/' . $images->logo) }}" style="height:100%" class="card-img-top"
                                    alt="widget-card-2">
                            </div>
                            <label class="control-label mt-3">Logo Seçimi (Tek Dosya)</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="logo">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group custom-file-container mb-4" data-upload-id="mySecondImage">
                            <div class="card component-card_2 mt-3" style="height:150px;width:150px;background-color:white">
                                <img src="{{ asset('storage/' . $images->favicon) }}" class="card-img-top"
                                    alt="widget-card-2" style="height:100%">
                            </div>
                            <label class="control-label mt-3">Favicon Seçimi (Tek Dosya)</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="favicon">
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="Güncelle" class="btn btn-outline-success mb-2">

            </form>
        </div>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('assets/backend/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
@endpush

@push('customCss')
    <link href="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
