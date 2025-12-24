<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100 text-gray-800 flex flex-col">

    @include('partials.header')

    <main class="flex-1 min-h-[500px] bg-stone-600 bg-cover bg-center"
    style="background-image: url({{ asset('images/office.png') }});">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

</body>
</html>