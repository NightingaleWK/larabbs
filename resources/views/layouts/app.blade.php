<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description', 'LaraBBS 爱好者社区')" />

    {{-- CSRF Token --}}
    @csrf

    <title>@yield('title', 'LaraBBS') - LaraBBS 进阶教程</title>

    {{-- vite --}}
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id='app' class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @include('shared._messages')

            @yield('content')
        </div>
        @include('layouts._footer')
    </div>
</body>

</html>
