<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/css/styles.css') }} " rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
       
        <!-- Scripts -->
       
    </head>
    <body class="sb-nav-fixed">


     @include('layouts.inc.admin-navbar')

     <div id="layoutSidenav">


     @include('layouts.inc.admin-sidebar')

    <div id="layoutSidenav_content">
      <main>


        @yield('content')


        </main>
        
        @include('layouts.inc.admin-footer')

        
      </div>
</div>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} "></script>
        <script src="assets/js/scripts.js"></script>

    </body>
    
</html>