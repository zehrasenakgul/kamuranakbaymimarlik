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
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-condensed mb-4">
                    <thead>
                        <tr id="settingTableHeader">
                            <th>#</th>
                            <th>Başlık</th>
                            <th>Aktif/Pasif</th>
                            <th class="text-center">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $say = 0;
                        @endphp
                        @foreach ($projects as $project)
                            @php
                                $say++;
                            @endphp
                            <tr>
                                <td>{{ $say }}</td>
                                <td>{{ $project->name }}</td>
                                <td>
                                    @if ($project->status == 1)
                                        <button class="btn btn-success mb-2">Aktif</button>
                                    @else
                                        <button class="btn btn-danger mb-2">Pasif</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="{{ url('admin/projects/' . $project->id) }}" data-toggle="tooltip"
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
                                                action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"method="POST">
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
                                        <li><a href="{{ url('admin/projects/' . $project->id . '/images') }}"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Images">
                                                <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="css-i6dzq1 text-warning">
                                                    <rect x="3" y="3" width="18" height="18"
                                                        rx="2" ry="2"></rect>
                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                </svg></a></li>
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
