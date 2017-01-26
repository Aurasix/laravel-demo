<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="{{ asset('impulse-favicon.png') }}" />

    <title>@yield('title')</title>

    {!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/main.css') !!}
    {!! Html::style('assets/css/custom.css') !!}
</head>
<body>

    @yield('content')

    {!! Html::script('assets/js/lib/jquery/jquery.min.js') !!}
    {!! Html::script('assets/plugins/bootstrap/js/bootstrap.js') !!}
    {!! Html::script('assets/js/plugins.js') !!}
    {!! Html::script('assets/js/app.js') !!}
</body>
</html>