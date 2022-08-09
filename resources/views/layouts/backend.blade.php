<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> @yield('title', 'Yönetim Paneli') </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend/img/favicon.ico') }}" />
    <link href="{{ asset('assets/backend/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/backend/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/backend/plugins/lightbox/photoswipe.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/plugins/lightbox/default-skin/default-skin.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/backend/plugins/lightbox/custom-photswipe.css') }}" rel="stylesheet" type="text/css" />
    @stack('customCss')


</head>

<body>

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-text">
                    <a href="/admin" class="nav-link"> KAMURAN AKBAY MİMARLIK</a>
                </li>
            </ul>


            <ul class="navbar-item flex-row ml-md-auto">


                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{ asset('assets/backend/img/girl-1.png') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="javascript:void()"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> {{ Auth::user()->name }}</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="/admin/logout"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Çıkış Yap</a>
                            </div>
                        </div>
                    </div>

                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><span>Yönetici Paneli</span>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{ url('/admin/dashboard') }}"
                            @if (request()->is('admin/dashboard')) data-active="true" data-toggle="collapse"
                            aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                            @else aria-expanded="false" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Yönetim Paneli</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('/admin/settings') }}"
                            @if (request()->is('admin/settings')) data-active="true" data-toggle="collapse"
                            aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                            @else aria-expanded="false" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                                <span>Site Ayarları</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('/admin/images') }}"
                            @if (request()->is('admin/images*')) data-active="true" data-toggle="collapse"
                            aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                            @else aria-expanded="false" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <rect x="3" y="3" width="18" height="18"
                                        rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span>Görsel Ayarları</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('/admin/menus') }}"
                            @if (request()->is('admin/menu*')) data-active="true" data-toggle="collapse"
                            aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                            @else aria-expanded="false" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span>Menü Ayarları</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#categories"
                            @if (request()->is('admin/categor*')) data-active="true" data-toggle="collapse"
                        aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                        @else data-toggle="collapse" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                    <path
                                        d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                                    </path>
                                    <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                </svg>
                                <span>Kategoriler</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->is('admin/categor*') ? 'show' : '' }} "
                            id="categories" data-parent="#accordionExample">
                            <li @if (request()->is('admin/categories/create')) class="active" @endif>
                                <a href="{{ url('/admin/categories/create') }}"> Ekle </a>
                            </li>
                            <li @if (request()->is('admin/categories')) class="active" @endif>
                                <a href="{{ url('/admin/categories') }}"> Listele </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#blogs"
                            @if (request()->is('admin/blog*')) data-active="true" data-toggle="collapse"
                        aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                        @else data-toggle="collapse" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                                <span>Blog Yazıları</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->is('admin/blog*') ? 'show' : '' }} "
                            id="blogs" data-parent="#accordionExample">
                            <li @if (request()->is('admin/blogs/create')) class="active" @endif>
                                <a href="{{ url('/admin/blogs/create') }}"> Ekle </a>
                            </li>
                            <li @if (request()->is('admin/blogs')) class="active" @endif>
                                <a href="{{ url('/admin/blogs') }}"> Listele </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#services"
                            @if (request()->is('admin/service*')) data-active="true" data-toggle="collapse"
                        aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                        @else data-toggle="collapse" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>
                                <span>Hizmetlerimiz</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->is('admin/service*') ? 'show' : '' }} "
                            id="services" data-parent="#accordionExample">
                            <li @if (request()->is('admin/services/create')) class="active" @endif>
                                <a href="{{ url('/admin/services/create') }}"> Ekle </a>
                            </li>
                            <li @if (request()->is('admin/services')) class="active" @endif>
                                <a href="{{ url('/admin/services') }}"> Listele </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#projects"
                            @if (request()->is('admin/project*')) data-active="true" data-toggle="collapse"
                        aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                        @else data-toggle="collapse" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <rect x="4" y="4" width="16" height="16"
                                        rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Projelerimiz</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->is('admin/project*') ? 'show' : '' }} "
                            id="projects" data-parent="#accordionExample">
                            <li @if (request()->is('admin/projects/create')) class="active" @endif>
                                <a href="{{ url('/admin/projects/create') }}"> Ekle </a>
                            </li>
                            <li @if (request()->is('admin/projects')) class="active" @endif>
                                <a href="{{ url('/admin/projects') }}"> Listele </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#documents"
                            @if (request()->is('admin/document*')) data-active="true" data-toggle="collapse"
                        aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                        @else data-toggle="collapse" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                <span>Belgelerimiz</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->is('admin/document*') ? 'show' : '' }} "
                            id="documents" data-parent="#accordionExample">
                            <li @if (request()->is('admin/documents/create')) class="active" @endif>
                                <a href="{{ url('/admin/documents/create') }}"> Ekle </a>
                            </li>
                            <li @if (request()->is('admin/documents')) class="active" @endif>
                                <a href="{{ url('/admin/documents') }}"> Listele </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#teams"
                            @if (request()->is('admin/team*')) data-active="true" data-toggle="collapse"
                        aria-expanded="true" aria-expanded="false" class="dropdown-toggle"
                        @else data-toggle="collapse" class="dropdown-toggle" @endif>
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Ekibimiz</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->is('admin/team*') ? 'show' : '' }} "
                            id="teams" data-parent="#accordionExample">
                            <li @if (request()->is('admin/teams/create')) class="active" @endif>
                                <a href="{{ url('/admin/teams/create') }}"> Ekle </a>
                            </li>
                            <li @if (request()->is('admin/teams')) class="active" @endif>
                                <a href="{{ url('/admin/teams') }}"> Listele </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            @yield('content')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/backend/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/backend/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/backend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/backend/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/backend/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/editors/quill/custom-quill.js') }}"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/backend/plugins/lightbox/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/lightbox/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/lightbox/custom-photswipe.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @stack('customJs')

</body>


</html>
