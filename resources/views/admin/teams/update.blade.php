@extends('layouts.backend')
@section('content')

    <div class="layout-px-spacing">
        <div class=" layout-top-spacing">

            <form class="form-vertical" enctype="multipart/form-data" action="{{ url('admin/teams/' . $team->id) }}"
                method="POST">
                <input type="hidden" name="_method" value="PUT">

                {{ csrf_field() }}
                @if ($errors->any())
                    @foreach ($errors->all as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif

                <div class="form-group mb-4">
                    <label class="control-label">İsim</label>
                    <input type="text" name="name" Value="{{ $team->name }}" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Unvan</label>
                    <input type="text" name="title" class="form-control" value="{{ $team->title }}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">E-Mail</label>
                    <input type="text" name="email" class="form-control" value="{{ $team->email }}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Phone</label>
                    <input type="tel" name="phone" class="form-control" value="{{ $team->phone }}">
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Aktif/Pasif</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <option value="1" @if ($team->status == '1') selected @endif>Aktif</option>
                        <option value="0" @if ($team->status == '0') selected @endif>Pasif</option>
                    </select>
                </div>
                <div class="form-group custom-file-container mb-4" data-upload-id="myFirstImage">
                    <label class="control-label"> Görsel Seçimi </label><br>
                    <div class="card component-card_2 mb-3" style="width:150px">
                        <img src="{{ asset('storage/' . $team->image) }}" class="card-img-top" alt="widget-card-2">
                    </div>
                    <label class="custom-file-container__custom-file">
                        <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input"
                            accept="image/*">
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
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>
@endpush

@push('customCss')
    <link href="{{ asset('assets/backend/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
