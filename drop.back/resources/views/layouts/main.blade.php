<!DOCTYPE html>
<html lang="en">

<head>
  <title>DROPPLACE</title>
  <!--  -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">

  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Microsoft Tiles -->
  <meta name="msapplication-config" content="browserconfig.xml">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/png" href="favicon.ico">

  <!-- Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/fonts_fa.min.css') }}">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <!-- bootstrap -->

  <link rel="stylesheet" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/app.css') }}">
  <link rel="stylesheet" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/main.min.css') }}">

  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.css">
  <link rel="stylesheet" type="text/css" href="https://mreq.github.io/slick-lightbox/gh-pages/bower_components/slick-carousel/slick/slick-theme.css">
  <!--  -->

  <script type="text/javascript">
    var _IS_GUEST = @json(\App\Helpers\Auth\AuthenticatedUser::isGuest());
    var _ENVIRONMENT = @json(env('APP_ENV', 'local'));
    var _BASE_URL = @json(env('APP_URL'));
  </script>
</head>

<body>

<!--[if lte IE 11]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
  your browser</a> to improve your experience and security.</p>
<![endif]-->


<div class="mainWrapper">

  <div class="contentWrapper">
  <!-- Start header -->
  @yield('header')
  <!-- End header -->

  <!-- Start of page code insertion here -->
  @yield('content')
  <!-- End of page code insertion here -->
  </div>

</div>
<!--  -->
<!--________SCRIPTS______-->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script>window.jQuery || document.write('<script src="{{ \EscapeWork\Assets\Facades\Asset::v('js/vendor/jquery-3.3.1.min.js') }}"><\/script>')</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/dotdotdot.min.js') }}"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/slick.min.js') }}"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/index.min.js') }}"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/app.js') }}"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/cart-quantity.js') }}"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/product-order.js') }}"></script>

<!-- bootstrap -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

<!-- slick slider -->
<script type="text/javascript" 
        src="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js"
        charset="utf-8"></script>

@yield('scripts')

</body>

</html>

