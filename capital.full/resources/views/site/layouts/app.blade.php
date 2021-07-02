<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Microsoft Tiles -->
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @yield('meta_title')
    @yield('meta_description')
    @yield('meta_keywords')

    <!-- Styles -->
    <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    {{--@yield('styles')--}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo+2:600,700&amp;subset=cyrillic" rel="stylesheet">

    {{--<link rel="stylesheet" href="css/main.min.css">--}}

    @if(parse_url(url()->current())['host'] == 'lombard-capital.com.ua')
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WH9RBC9');</script>
<!-- End Google Tag Manager -->
    @else
      <script>
        var dataLayer = null;
      </script>
    @endif
</head>
<body data-locale="{{ $locale }}">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WH9RBC9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@include('site.includes.preloader')
<!--[if lte IE 11]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="mainWrapper">

    <div class="contentWrapper">
        @include('site.layouts.header')

        <!-- Start of page code insertion here -->
        @yield('content')
        <!-- End of page code insertion here -->

        <div class="relative scrollTopContainer">
            <div id="scrollTopButton" class="icomoon standard-arrow-icon navigateIcon up"></div>
        </div>

    </div>

    @include('site.includes.action_subscribe_popup_form')

    @include('site.includes.action_subscribe_popup_success')

    @include('site.includes.news_subscribe_popup_success')

    @include('site.includes.search_popup')

    @include('site.includes.callback_popup_success')

    @include('site.includes.callback_popup_form')

    @include('site.includes.callback_evaluation_popup_form')

    @include('site.includes.notification_popup')

    @include('site.includes.validation_errors_popup')
    
    @include('site.includes.message-second')
    <!--  -->
    <div id="popupMessage" class="popupActionsSuccess popupMessage popup">
      <div class="popupContentWrapper">
        
        <header class="modalHeader relative">
          <div class="modal-title title"></div>     
        </header>
        
        <div class="popUpContainer">
          <div class="description contentRow">
            <p></p>
          </div>
        </div>
      </div>
    </div>

    @include('site.includes.calc_gold_popup_form')

    @include('site.layouts.footer')
</div>
<!--________SCRIPTS______-->
<script type="text/javascript" src="{{ asset('js/site/jquery-3.3.1.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('js/site/infobox.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('js/site/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/index.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('js/site/popups.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('js/site/jquery.colorbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="{{ asset('js/site/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/calculator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/my-dropzone.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.1/jquery.plugin.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.1/jquery.countdown.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/aterrien/jQuery-Knob/master/dist/jquery.knob.min.js"></script>
<script type="text/javascript" src="{{ asset('js/site/cleave.min.js') }}"></script>


@yield('scripts')
</body>
</html>
