@extends('layouts.backend')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/editors/quill/quill.snow.css') }}">
<link href="{{ asset('assets/backend/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
@section('content')
    <div class="layout-px-spacing">

        <div class=" layout-top-spacing">
            <form class="form-vertical" enctype="multipart/form-data" action="{{ url('admin/services') }}" method="POST">
                {{ csrf_field() }}
                {{-- @if ($errors->any())
                    @foreach ($errors->all as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif --}}
                <div class="form-group mb-4">
                    <label class="control-label">Başlık</label>
                    <input type="text" name="name" class="form-control">
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Metin</label>
                    <textarea class="form-control"name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger text-left">{{ $errors->first('content') }}</span>
                    @endif
                </div>
                <div class="form-group custom-file-container mb-4" data-upload-id="myFirstImage">
                    <label class="control-label">Görsel Seçimi </label><br>
                    <label class="custom-file-container__custom-file">
                        <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input"
                            accept="image/*">
                        @if ($errors->has('image'))
                            <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                        @endif
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                </div>
                <div class="form-group mb-4">
                    <label class="control-label">Aktif/Pasif</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <option value="1">Aktif</option>
                        <option value="0">Pasif</option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                <input type="submit" name="submit" value="Ekle" class="btn btn-primary">

            </form>
        </div>
    </div>
@endsection
