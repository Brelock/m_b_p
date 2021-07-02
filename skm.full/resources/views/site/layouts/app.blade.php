<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114349501-5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-114349501-5');
    </script>

    <title>@hasSection('title') @yield('title') - @endif SKM мебель. Склад мебели. Днепр, Запорожье, Херсон, Николаев, Одесса</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Microsoft Tiles -->
    <meta name="msapplication-config" content="browserconfig.xml">

    <link rel="icon" type="image/png" href="https://skm-mebel.com.ua/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fonts_fa.min.css">
    <link rel="stylesheet" href="/css/main.min.css">

    <link rel="stylesheet" type="text/css" href="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.css">
    <link rel="stylesheet" type="text/css" href="https://mreq.github.io/slick-lightbox/gh-pages/bower_components/slick-carousel/slick/slick-theme.css">

   {{-- <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    --}}
</head>
<body>

<!--[if lte IE 11]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->



<div class="mainWrapper">

    <div class="contentWrapper">

        @include('site.layouts.header')

        @yield('content')

    @include('site.layouts.footer')

</div>

<!--________SCRIPTS______-->
<script>window.jQuery || document.write('<script src="/js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="/js/jquery-nivo-slider.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<script type="text/javascript" src="/js/index.min.js"></script>
<script src="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
