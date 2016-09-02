<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href='https://fonts.google.com/?query=work+sans&selection.family=Work+Sans:800' rel='stylesheet' type='text/css'>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="{{ URL::asset('js/main.js')}}"></script>
    <script src="{{ URL::asset('js/index/index.js')}}"></script>
    <script src="{{ URL::asset('js/select2/select2.js')}}"></script>
    <link href="{{ URL::asset('js/select2/select2.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/fonts.css')}}" rel="stylesheet" type="text/css">

    <title>Laravel</title>
    {{--<meta name="csrf-token" content="{{ csrf_token() }}"/>--}}
</head>
<body>
<div class="body-overlay"></div>
<div class="container">
    @yield('content')
</div>
</body>
</html>
