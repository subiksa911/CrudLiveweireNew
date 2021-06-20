<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Database FTK</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="http://icewall-laravel.left4code.com/dist/css/app.css" />


</head>

<body class="main">

    <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        @livewire('navigation-menu')
    </div>
    <div class="wrapper">
        <div class="wrapper-box">
            <nav class="side-nav">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon">
                                <i data-feather="home"></i>
                            </div>
                            <div class="side-menu__title">
                                Home
                                <div class="side-menu__sub-icon transform rotate-180">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon">
                                <i data-feather="users"></i>
                            </div>
                            <div class="side-menu__title">
                                Mahasiswa
                                <div class="side-menu__sub-icon transform rotate-180">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dosen') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon">
                                <i data-feather="users"></i>
                            </div>
                            <div class="side-menu__title">
                                Dosen Pengajar
                                <div class="side-menu__sub-icon transform rotate-180">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('system') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon">
                                <i data-feather="file"></i>
                            </div>
                            <div class="side-menu__title">
                                System Point
                                <div class="side-menu__sub-icon transform rotate-180">
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>
    @stack('modals')

    @livewireScripts
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG7gNHAhDzgYmq4-EHvM4bqW1DNj2UCuk&libraries=places">
    </script>
    <script src="http://icewall-laravel.left4code.com/dist/js/app.js"></script>
</body>


</html>
