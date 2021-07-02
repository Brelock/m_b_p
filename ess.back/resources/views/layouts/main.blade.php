<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <!-- Hotjar Tracking Code for https://energosave.pro/ru -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:2346750,hjsv:6};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
  <!--  -->

<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-186433555-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-186433555-1');
  </script>
  <!--  -->

<!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '301220351420602');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=301220351420602&ev=PageView&noscript=1"
  /></noscript>
<!-- End Facebook Pixel Code -->


  <!--  -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}

  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Microsoft Tiles -->
  <meta name="msapplication-config" content="browserconfig.xml">

  <link rel="icon" type="image/png" href="{{ \EscapeWork\Assets\Facades\Asset::v('favicon.ico') }}">


  <link rel="stylesheet" type="text/css" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/photoswipe.min.css') }}">
  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.css">
  <link rel="stylesheet" type="text/css" href="https://mreq.github.io/slick-lightbox/gh-pages/bower_components/slick-carousel/slick/slick-theme.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
  <link rel="stylesheet" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/nouislider.min.css') }}">

  <link rel="stylesheet" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/main.min.css') }}">
  <link rel="stylesheet" href="{{ \EscapeWork\Assets\Facades\Asset::v('css/app_site.css') }}">

</head>

<body>
<div class="mainWrapper">
  <div class="contentWrapper">

    <div id="homePage" class="homePage page container">
      <div class="top-section section">

      @include('layouts.header.header')

      @yield('content')

      @include('layouts.footers.main-footer')

    

    </div>
  </div>


  @include('includes.logo-scroll')

  @include('includes.region-popap')

  @include('includes.discussion-form')

  @include('includes.question-form')

  @include('includes.discussion-form-main')

  <div id="fullPageNav" class="full-page-nav"></div>
  <!-- <div id="fullPageNavSidebar" class="full-page-nav-sidebar nav js_hide_buttons">
    <div class="nav-container nav-links">
      <div class="nav-buttons">
        <div class="icomoon icon-arrow navigateIcon up" data-direction="-1">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow.svg') }}" alt="">
        </div>

        <div class="icomoon icon-arrow navigateIcon down" data-direction="1">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow.svg') }}" alt="">
        </div>

        <div class="icomoon icon-arrow navigateIcon to-top" data-index="0">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow.svg') }}" alt="">
          <img class="white" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow.svg') }}" alt="">        
        </div>
      </div>

      <div class="nav-handler">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow.svg') }}" alt="">
      </div>
      
    </div>
  </div> -->

  <div class="relative js_scrollTopContainer">
    <div id="scrollTopButton" class="icomoon icon-arrow navigateIcon">
      <img class="orange" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow-orange.svg') }}" alt="">
      <img class="orange" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/arrow-orange.svg') }}" alt="">

    </div>
  </div>
</div>

<!--  -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.2/nouislider.min.js"></script>

<!-- typeIt -->
<script src="https://cdn.jsdelivr.net/npm/typeit@7.0.4/dist/typeit.min.js"></script>


<!-- <script src="https://rawgit.com/alvarotrigo/fullPage.js/dev/src/fullpage.js"></script> -->

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/bez.min.js') }}"></script>
<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/myFullpage.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-viewport-checker/1.8.8/jquery.viewportchecker.min.js"></script>
<script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/index.min.js') }}"></script>

<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modals_form_module.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modal_question.js') }}"></script>

</body>
</html>
