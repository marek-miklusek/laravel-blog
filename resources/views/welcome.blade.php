<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous">
    </script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    
    <x-navigation-icons></x-navigation-icons>

    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a href="/" class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl">
                Miki Blog
            </a>
            <p class="text-lg text-gray-600">
                {{ \App\Models\TextWidget::getWidget('header', 'title') }}
            </p>
        </div>
    </header>

    <x-navigation-items :categories="$categories"></x-navigation-items>

    <main class="container mx-auto flex flex-wrap py-6">
        {{ $slot }}
    </main>

    <x-footer></x-footer>

</body>
</html>
