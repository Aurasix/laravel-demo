<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/ico" href="{{ asset('impulse-favicon.png') }}" />

    <title>Welcome :)</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .exit {
            color: #B0BEC5;
            text-decoration: underline;
            font-weight: 600;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
            color: #B0BEC5;
        }

        .title:hover {
            font-size: 80px;
            margin-bottom: 32px;
            color: #444a4e;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ Auth::check() ? route('dashboard') : url('login') }}">
        <div class="content">
            <div class="title">Impulse</div>
        </div></a>
    <br>
    @if(Auth::check())
        <a class="exit" href="{{ url('logout') }}">Exit</a>
    @endif
</div>
</body>
</html>
