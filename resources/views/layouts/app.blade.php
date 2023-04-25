<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fuel Management System</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- ICON --}}
        <link rel="icon" href="{{ asset('image/CGoK Logo1 - Copy.JPG') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- Custom Styles --}}
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/75622ff29c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

        {{-- Livewire styles --}}
        @livewireStyles
        @powerGridStyles
    </head>
    <body class="font-sans antialiased">
            <div class="min-h-screen bg-gray-100" id="app">
                @if (Auth::user()->role == 'system admin')
                    @include('layouts.navigation.systemAdmin')
                @endif

                @if (Auth::user()->role == 'admin')
                    @include('layouts.navigation.admin')
                @endif
    
                @if (Auth::user()->role == 'secretary')
                    @include('layouts.navigation.secretary')
                @endif
    
                @if (Auth::user()->role == 'driver')
                    @include('layouts.navigation.driver')
                @endif
    
    
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'system admin')
                    <!-- Page Heading -->
                    <header class="bg-white shadow-sm">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

        <script src="{{ asset('js/custom.js') }}"></script>
        <!-- Scripts -->
        @livewireScripts
        @powerGridScripts
    </body>
</html>
