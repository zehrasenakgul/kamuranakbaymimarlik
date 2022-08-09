@extends('layouts.backend')
@section('content')

    <div class="layout-px-spacing">

        <div class=" layout-top-spacing">
            @if (session()->has('alertSuccessMessage'))
                <div class="alert alert-success">
                    {{ session()->get('alertSuccessMessage') }}
                </div>
            @elseif (session()->has('alertErrorMessage'))
                <div class="alert alert-danger">
                    {{ session()->get('alertErrorMessage') }}
                </div>
            @endif
            <form class="form-vertical" enctype="multipart/form-data"
                action="{{ url('admin/projects/' . $project->id . '/store') }}" method="POST">
                {{ csrf_field() }}
                @if ($errors->any())
                    @foreach ($errors->all as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <div class="form-group custom-file-container mb-4" data-upload-id="mySecondImage">
                    <label class="control-label">Görselleri Yükle </label><br>
                    <label class="custom-file-container__custom-file">
                        <input type="file" name="image[]" class="custom-file-container__custom-file__custom-file-input"
                            multiple>
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                </div>
                <input type="submit" name="submit" value="Ekle" class="btn btn-primary">

            </form>
        </div>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
@endpush

@push('customCss')
    <link href="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
