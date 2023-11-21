<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    @csrf

    <title>@yield('title', 'LaraBBS') - LaraBBS 进阶教程</title>

    {{-- Style --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id='app' class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @include('shared._message')

            @yield('content')
        </div>
        @include('layouts._footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
