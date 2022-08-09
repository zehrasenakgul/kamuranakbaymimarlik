@extends('layouts.backend')
@section('content')
    <div class="layout-px-spacing">
        <div class=" layout-top-spacing">
            @if (session()->has('alertSuccessMessage'))
                <div class="alert alert-success">
                    {{ session()->get('alertSuccessMessage') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-condensed mb-4">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Aktif/Pasif</th>
                            <th class="text-center">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $item)
                            <tr>
                                <td>{{ $item->name }}</td>

                                <td>
                                    @if ($item->status == '0')
                                        <button class="btn btn-outline-danger">Pasif</button>
                                    @else
                                        <button class="btn btn-outline-success">Aktif</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="{{ url('admin/documents/' . $item->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-check-circle text-primary">
                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                </svg></a></li>
                                        <li>
                                            <form
                                                action="{{ route('admin.documents.destroy', ['document' => $item->id]) }}"method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="deleteButton"
                                                    class="btn btn-light bg-transparent border-0 btn-sm ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x-circle text-danger">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="15" y1="9" x2="9" y2="15">
                                                        </line>
                                                        <line x1="9" y1="9" x2="15" y2="15">
                                                        </line>
                                                    </svg>
                                                </button>

                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('assets/backend/js/scrollspyNav.js') }}"></script>
@endpush

@push('customCss')
    <link href="{{ asset('assets/backend/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
@endpush
