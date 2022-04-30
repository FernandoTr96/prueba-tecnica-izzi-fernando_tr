<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css?v=<?echo time();?>')}}">
    @yield('head')
</head>
<body class="pt-20 md:-mt-20">
    
    @include('ui/navbar')


    @yield('content')


    @include('ui/footer')
    
   
    <script src="{{asset('js/app.js?v=<?echo time();?>')}}"></script>
    <script src="{{asset('js/helpers.js?v=<?echo time();?>')}}"></script>
    <script src="{{asset('js/dropdown.js?v=<?echo time();?>')}}"></script>
    <script src="{{asset('js/confirmations.js?v=<?echo time();?>')}}"></script>
    <script src="{{asset('js/menu.js?v=<?echo time();?>')}}"></script>
    @yield('scripts')
</body>
</html>