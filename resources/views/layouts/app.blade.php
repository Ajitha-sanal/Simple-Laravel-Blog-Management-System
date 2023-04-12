<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   
    
        <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet" />
        
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
   
   
   <!--@vite(['resources/sass/app.scss', 'resources/js/app.js'])-->
    
    
</head>
<body>
    <div id="app">

@include('layouts.inc.frontend-navbar')


        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>
   
</body>

</html>
