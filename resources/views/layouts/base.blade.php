<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .bar{
            background: #00ff00;
        }

        .precent{
            position: absolute;
            left: 50%;
            color: black;
        }
    </style>

</head>
<body>
@include('includes.header')

<div class="d-flex flex-column min-vh-100 container" id="app">
    @yield('content')
</div>


@include('includes.footer')
</body>
</html>
