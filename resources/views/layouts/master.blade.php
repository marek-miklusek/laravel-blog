<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous">
    </script>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-slate-500 to-yellow-100">
    
    <x-navigation-icons />
    
    <x-header />

    <x-navigation :categories="$categories" />

    @if(session('message'))
        <x-flash-message-success :message="session('message')" />
    @endif

    <main class="container mx-auto flex flex-wrap py-6">
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
</body>
</html>




