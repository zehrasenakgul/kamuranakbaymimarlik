@extends('layouts.backend')
@section('content')
    <div class="layout-px-spacing">
        <div class=" layout-top-spacing">
            <form class="form-vertical" enctype="multipart/form-data" action="{{ url('admin/projects/' . $project->id) }}"
                method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group mb-4">
                    <label class="control-label">Başlık:</label>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Metin</label>
                    <textarea class="form-control"name="content" id="exampleFormControlTextarea1" rows="3">{{ $project->content }}
                    </textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Aktif/Pasif</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <option value="1" @if ($project->status == 1) selected @endif>Aktif</option>
                        <option value="0" @if ($project->status == 0) selected @endif>Pasif</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Güncelle" class="btn btn-primary">

            </form>
        </div>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>
@endpush

@push('customCss')
    <link href="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
