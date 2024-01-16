<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'save-text_and_save-file') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!--Styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js">
    </script>
    <style>
        body{
            font-size: 18px;
        }
        img{
            width: 250px;
            height: 250px;
        }
        a{

            text-decoration: none;

        }
        .files:hover{
            color: #000000;
            opacity: 0.5;
        }
        .btn1{
            max-width: 100px;
            text-align: center;

        }
        .dd{
            display: flex;
            justify-content: space-between;
        }
        input{
            font-size: 20px;
        }
        .navbar{
            display: flex;
            justify-content: space-between;
        }
        .hover{
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            text-align: end;
        }

        /*Контакты окно*/
.popup {
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.711);
    top: 0;
    left: 0;
    opacity: 0;
    visibility: hidden;
    overflow-x: hidden;
    overflow-y: auto;
    -webkit-transition: all 0.8s ease 0s;
    transition: all 0.8s ease 0s;
  }

  .popup__body {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    min-height: 100%;
    padding: 30px 10px;
  }

  .popup__content {
    max-width: 800px;
    min-width: 300px;
    border-radius: 10px;
    background-color: #fff;
    color: #000;
    padding: 30px;
    position: relative;
    -webkit-transition: all 0.8s ease 0s;
    transition: all 0.8s ease 0s;
  }

  .popup__close {
    position: absolute;
    right: 25px;
    top: 20px;
    font-size: 20px;
    color: #000;
  }

  .popup__title {
    font-size: 16px;
    margin-bottom: 20px;
  }

  .popup__text {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 20px;
  }

  .popup .popup__area {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    position: absolute;
  }

  .popup:target {
    opacity: 1;
    visibility: visible;
  }

  .popup__button {
    padding: 30px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    text-align: center;
  }

  .popup .popup__button a {
    border: 2px solid #000;
    color: #000;
    padding: 30px;
    margin: 10px;
    font-size: 20px;
  }

  .popup .popup__button a:hover {
    background-color: #eecfba;
  }


    </style>
</head>
<body>
@include('includes.header')
<main class="d-flex flex-column min-vh-100 container" id="app">
    @yield('content')
</main>
@include('includes.footer')

<script>
    console.log("privet");
    document.addEventListener('DOMContentLoaded', function() {
  var wrapCtrlElements = document.getElementsByClassName('wrap_ctrl');

  for (var i = 0; i < wrapCtrlElements.length; i++) {
    wrapCtrlElements[i].addEventListener('click', function() {
      var href = this.getAttribute('data-href');
      showModal(href);
    });
  }

  function showModal(href) {
    var modalContent = document.getElementById('modal-content');
    modalContent.textContent = href;
    // Здесь можно добавить дополнительный код для отображения модального окна
  }
});
</script>
</body>
</html>
