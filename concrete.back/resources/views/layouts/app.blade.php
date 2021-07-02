<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!--  -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Microsoft Tiles -->
  <meta name="msapplication-config" content="browserconfig.xml">

  <link rel="icon" type="image/png" href="favicon.ico">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

  <!-- Fonts -->
{{--  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic" rel="stylesheet">--}}

  <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">


{{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

</head>

<body>
<div class="mainWrapper">
  <div class="contentWrapper">
    <!--  -->
  <div class="contact-us-modal">
    
       <div class="contact-us-contant">
         <div class="us-contant-block">
            <div class="contact-us-contant-header">
               <div class="contact-us_title">Have Any Questions?</div>
               <button type="button" class="modal-custom_buttom modal-custom__close-btn"></button>
            </div>
          <div class="contact-us-contant-body">

             <form class="form--contact" action="#">
               
                  <fieldset class="formRow">
                      <div class="formRow--item contact-us_input">
                        <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                          <input name="name" type="text" class="formRow--input js-input" id="firstname" placeholder="Name">
                        </label>
                      </div>
                  </fieldset>

                  <fieldset class="formRow">
                      <div class="formRow--item contact-us_input">
                        <label for="firstemail" class="formRow--input-wrapper js-inputWrapper">
                          <input name="email" type="text" class="formRow--input js-input" id="firstemail" placeholder="Email">
                        </label>
                      </div>
                  </fieldset>

                 <fieldset class="formRow">
                      <div class="formRow--item contact-us_textarea">
                        <label for="firsttext" class="formRow--input-wrapper js-inputWrapper">
                          <textarea name="question"  rows="10"  type="text" class="formRow--input js-input" id="firsttext" placeholder="Your Question"></textarea>
                        </label>
                      </div>
                  </fieldset>

                 <div class="form-contact-us_button">
                   <button type="submit">
                    <div class="spinner spinner--search spinner--contact-js"></div>
                    <span class="button-contact__label">Send</span>
                   </button>
                 </div>

            </form>

          </div>
        </div>
      </div>
    
    <div class="contact-us-overlay"></div>
  </div>


    <!-- --> 
    <header class="main-header">
      
        <div class="main-header-contant">
          <div class="main-header_logo">
            <a href="{{ route('site.home') }}">
              <p class="logo-title">concrete</p>
              <p class="logo-subtitle">calculations</p>
            </a>
          </div>
          <div class="contact-us">
            <img src="{{ asset('img/contact-us.svg') }}" alt="">
            <p class="btn-contact-us">Contact Us</p>
          </div>
        </div>
      
    </header>


    <!--  -->
    <div class="section-calculator calculator-blocks-bg">
      <div class="mcontainer">
        

          @yield('content')

        
      </div>
    </div>
  </div>
  <!--  -->

 

  <div class="modal-custom">
    <div class="modal-custom__content" tabindex="-1" role="dialog">
      <div class="modal-custom_content">
        <div class="modal-custom_header">
          <p class="modal-text">Slabs or Footings</p>
          <button type="button" class="modal-custom_buttom modal-custom__close-btn"></button>
        </div>
        <div class="modal-custom_footer">
          <img class="modal-img" src="{{ asset('img/slabs-def.png') }}" alt="">
        </div>
      </div>
    </div>
    <div class="modal-custom__overlay"></div>
  </div>
  <footer class="main-footer">
    <div class="footer-contant">
      <div class="footer-contant_copirait">{{ $setting->footer }}</div>
      <div class="footer-contant_info">
        <!--<ul class="footer-contant_info-list">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Use</a></li>
        </ul>-->
      </div>
    </div>
  </footer>
  <!--  -->

  <!--  -->
</div>
<!--  -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>

<script type="text/javascript" src="{{ asset('js/index.min.js') }}"></script>


</body>
</html>

{{--<!doctype html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}
