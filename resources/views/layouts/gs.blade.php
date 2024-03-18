<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="og:site_name" content="Grassstation.XYZ">

    <title>@section('title'){{ config('app.name', 'Laravel') }}@show</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link href="//static.monolidthz.com/generic/css/HelveticaNeueLTCom_ChromeCompat.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/win95.css')}}">
    <link rel="stylesheet" href="{{asset('css/grassstation.css')}}?{{date("w-m")}}">
    
    @yield('xtracss')
    
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('./apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('./favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('./favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('./site.webmanifest')}}">
	
    @yield('head')
</head>
<body class="bg-gs">
    <div id="app">
        @include('layouts.nav')
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/grassstation.js')}}"></script>

@yield('xtrajs')
</body>
</html>
