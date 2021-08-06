<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- <style>
            [x-cloak] { display: none !important; }
        </style> --}}
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex min-h-screen">
            <div class="w-1/6 bg-gray-800">
                <!-- Sidebar content -->
                @include('includes.sidebar')
            </div>
            <div class="bg-gray-100 flex-1">
                {{-- <div class="overflow-y-scroll"> --}}
                {{-- <div class="min-h-screen bg-gray-100"> --}}
                    {{-- <div class="sticky top-0> --}}
                        @livewire('navigation-menu')
                    
                    @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                    @endif
                    {{-- </div> --}}
                    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
               {{-- </div> --}}
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
