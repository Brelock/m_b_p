<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <div class="mainWrapper">
    <div class="contentWrapper">
      @include('layouts.headers.header-front')

      <div id="app" class="page">
          @yield('content')
      </div>

    </div>
    @if(Route::currentRouteName() != '404')
      @include('layouts.footers.footer-front')
    @endif 
  </div>

  <div class="overlay-wrapper">
    <div class="overlay_js"></div>
  </div>
  

  <div class="js_scrollTopContainer">
	  <div id="scrollTopButton" class="navigateIcon">
      <span class="icomoon-icon icon-arrow-r-pimaryColor"></span>
	  </div>
  </div>



  @include('includes.review-modal-front')

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAor2gAXYMTj3AqHp0fBM0EjTKXrlEDavw"
        type="text/javascript"></script>

  <script type="text/javascript"
          src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.2/nouislider.min.js"></script> 
<!-- 
   <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>    -->

  <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>