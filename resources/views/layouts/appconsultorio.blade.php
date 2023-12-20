<!DOCTYPE html>

<html lang="es" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio San Santiago</title>
    @php
    $logo = session('logo');
    @endphp
    <link rel="icon" href="{{ $logo == 'D' || $logo == 'N' || $logo == 'C' || $logo == 'A' ? asset('estilos_tecno/img/logo3.png') : asset('estilos_tecno/img/logo1.png') }}" type="image/png">
    <!-- Agrega el enlace a tu archivo de estilos generado por Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset(session('estilo_actual', 'estilos_tecno/theme/dia.css')) }}">
    {{-- <link rel="stylesheet" href="{{ asset('template/assets/css/owl-carousel.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('estilos_tecno/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos_tecno/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos_tecno/css/animacion.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('estilos_tecno/js/nav.js') }}"></script>
    <script src="{{ asset('estilos_tecno/js/carousel.js') }}"></script>
</head>


<body class="h-full">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <nav class="bg-gray-700 navegacion">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('welcome') }}">
                                <img class="h-8 w-8" src="{{ $logo == 'D' || $logo == 'N' || $logo == 'C' || $logo == 'A' ? asset('estilos_tecno/img/logo3.png') : asset('estilos_tecno/img/logo1.png') }}" alt="Consultorio San Santiago">
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div id="menu" class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('welcome') }}" class="menu-link {{ Route::is('welcome') ? 'active' : '' }} color-texto ">Inicio</a>
                                <a href="{{ route('servicio') }}" class="menu-link {{ Route::is('servicio') ? 'active' : '' }} color-texto ">Servicios</a>
                                <a href="{{ route('cita') }}" class="menu-link {{ Route::is('cita') ? 'active' : '' }} color-texto ">Citas</a>
                                <a href="{{ route('pago') }}" class="menu-link {{ Route::is('pago') ? 'active' : '' }} color-texto ">Pagos</a>

                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            {{-- <button type="button"
                                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only color-texto">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button> --}}

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" class="relative flex max-w-xs items-center rounded-full background-button text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>

                                        <img class="h-8 w-8 rounded-full " src="{{ $logo == 'J' ? asset('estilos_tecno/img/user_blue.png') : asset('estilos_tecno/img/user_white.png') }}" alt="">
                                    </button>
                                </div>

                                <!--
                  Dropdown menu, show/hide based on menu state.
  
                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                                <div id="user-menu" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    @auth
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                                    <a href="{{ route('configuracion') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Configuración</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Salir</a>
                                    @endauth

                                    <!-- Menú si no está autenticado -->
                                    @guest
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Register</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Login</a>
                                    <a href="{{ route('configuracion') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Configuración</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button id="mobile-menu-button" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                    <a href="{{ route('welcome') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('welcome') ? 'active' : '' }} color-texto " aria-current="page">Inicio</a>
                    <a href="{{ route('servicio') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('servicio') ? 'active' : '' }} color-texto ">Servicios</a>
                    <a href="{{ route('cita') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('cita') ? 'active' : '' }} color-texto ">Citas</a>
                    <a href="{{ route('pago') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('pago') ? 'active' : '' }} color-texto ">Pagos</a>
                    {{-- <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Estilos</a> --}}
                    @if (Route::has('login'))
                    {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                    @auth

                    <a href="{{ url('/dashboard') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('dashboard') ? 'active' : '' }} color-texto ">Dashboard</a>

                    @else

                    <a href="{{ route('login') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('login') ? 'active' : '' }} color-texto ">Log
                        in</a>

                    @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="menu-link block rounded-md px-3 py-2 text-base font-medium color-texto {{ Route::is('register') ? 'active' : '' }} color-texto ">Register</a>

                    @endif
                    @endauth
                    {{-- </div> --}}
                    @endif
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button" class="relative ml-auto flex-shrink-0 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Perfil</a>
                        <a href="{{ route('configuracion') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">Configuración</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white color-texto">
                            Salir
                        </a>

                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>


        @if (Route::is('welcome'))
        <header class="bg-white shadow active">
            <div class="header-container">
                <img class="header-image" src="{{ asset('estilos_tecno/img/fondo_consultorio.jpg') }}" alt="Logo de la empresa">
                <div class="title-container" id="titleContainer"></div>
                <h1 class="title-static">CONSULTORIO SAN SANTIAGO</h1>
            </div>
        </header>
        @endif

        <main class="body-background">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @yield('contenido')
            </div>
        </main>

    </div>
    <script>
        var menu = document.getElementById('user-menu');
        menu.style.display = 'none';

        document.addEventListener('click', function(event) {
            var button = document.getElementById('user-menu-button');
            var menu = document.getElementById('user-menu');

            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.style.display = 'none';
            }
        });

        document.getElementById('user-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('user-menu');
            menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
        });
    </script>
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    {{-- animación --}}


</body>

</html>