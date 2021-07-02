@extends('layouts.app')

@section('content')
<div id="onasPage" class="onasPage page" >

  
  <div class="about-us__top-banner section">

    @include('layouts.header.header')

    <div class="wrap-title">{{ __('about.about') }}</div>
    <div class="breadcrumbs">
      <ul class="breadcrumbs-wrap">
        <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
        <li class="breadcrumbs-link active-link"><a href="#">{{ __('about.about') }}</a></li>
      </ul>
    </div>
    <div class="about-us__top-banner-img pattern">
      <div class="inlineImg lazyLoading_js" style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/poster-sun.jpg') }})"></div>
      <!-- <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/poster-sun.jpg') }}" alt="" class="lazyLoading_js"> -->
      <span class="top-banner__top-title visible-viewportchecker visibility--check">
                      {{ __('about.energy2') }}
                      <br>
                      {{ __('about.does_disappear') }}
                  </span>
      <span class="top-banner__bottom-title visible-viewportchecker visibility--check">{{ __('about.goes_over') }}</span>
    </div>
  </div>
  <div class="about-us__order-guarantee section">
    <div class="order-guarantee-wrap">
      <div class="order-guarantee-banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/guarantee-banner.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="order-guarantee-content">
        <div class="order-guarantee-content-wrap">
          <div class="ess-section-title visible-viewportchecker visibility--check">
            {{ __('about.order_guarantees') }}
          </div>
          <div class="guarantee-content-bottom-wrap flex">

            <div class="text-guarantee visible-viewportchecker visibility--check">
              <h4>{{ __('about.quality') }}</h4>
              <p>{{ __('about.warranty') }}</p>
            </div>
            <div class="text-guarantee visible-viewportchecker visibility--check">
              <h4>{{ __('about.deadlines') }}</h4>
              <p>{{ __('about.responsibly') }}</p>
            </div>
            <div class="text-guarantee visible-viewportchecker visibility--check">
              <h4>{{ __('about.saving') }}</h4>
              <p>{{ __('about.prices') }}</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>  
  <div class="about-us__secondary-section section">
    <div class="energosave-system">
      <div class="energosave-system-content">
        <div class="energosave-left-content">
          <div class="energosave-left-wrap">
            <div class="ess-section-suptitle visible-viewportchecker visibility--check">ENERGOSAVE SYSTEMS</div>
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('about.about') }}</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('about.energosave_company') }}
              <br>
              <br>
              {{ __('about.our_team') }} </div>
          </div>
          <div class="ess-section-btn  desktop-btn visible-viewportchecker visibility--check">
            <button type="button"
              class="  modal_open_button"
              data-btn-text="{{ __('header.have_questions') }}?"
              data-form-type="1"
              data-form-target="modal_question_body"
              data-modal-target="modal_question"
            >{{ __('header.have_questions') }}?</button> 
          </div>
        </div>
        <div class="energosave-right-banner pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/energsave.png') }}" alt="" class="lazyLoading_js">
        </div>
      </div>
    </div>
  </div>
  <div class="about-us__proposal section">
    <div class="about-us__proposal-banner pattern">
      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/proposal-banner.jpg') }}" alt="" class="lazyLoading_js">
      <div class="proposal-banner-wrap-content">
        <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('about.we_ready') }}
          <span> {{ __('about.ready') }}</span>
        </div>
        <div class="proposal-banner__table-wrap flex wrap">
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">1</span>
            {{ __('about.record') }} <br> {{ __('about.solar_panels') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">2</span>
            {{ __('about.building') }} <br> {{ __('about.sun') }} <br> {{ __('about.station') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">3</span>
            {{ __('about.charging_stations') }} <br> для <br> {{ __('about.electric_cars') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">4</span>
            {{ __('about.sources') }} <br> {{ __('about.uninterrupted') }} <br> {{ __('about.power') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">5</span>
            {{ __('about.systems') }} <br> {{ __('about.accumulation') }} <br> {{ __('about.energy') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">6</span>
            {{ __('about.solar_systems') }} <br> {{ __('about.heating') }} <br> {{ __('about.water') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">7</span>
            {{ __('about.thermal') }} <br> {{ __('about.pumps') }}
          </div>
          <div class="proposal-table-item mcol-xs-6 mcol-sm-6 mcol-md-3 visible-viewportchecker visibility--check">
            <span class="proposal-table-item-absolute">8</span>
            {{ __('about.electric_boilers') }}
          </div>
        </div>

      </div>
    </div>
    <div class="manufacturer-slide-section">
      <div class="manufacturer-conteiner-wrap">
        <div class="manufacturer-item">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo1.png') }}" alt="">
        </div>
        <div class="manufacturer-item">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo2.png') }}" alt="">
        </div>
        <div class="manufacturer-item active">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo3.png') }}" alt="">
        </div>
        <div class="manufacturer-item">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo4.png') }}" alt="">
        </div>
        <div class="manufacturer-item">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo5.png') }}" alt="">
        </div>
        <div class="manufacturer-item">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo6.png') }}" alt="">
        </div>
      </div>
     </div>
  </div>

  <div class="sunpower-panel section">
    <div class="sunpower-panel-wrap">
      <div class="sunpower-panel-top-banner">
        <img class="sunpower-panel_banner" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunpower_banner.jpg')}}" alt="">
        <img class="icon-sunpower-panel_banner" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunpower-logo.png')}}" alt="">
        <div class="sunporew-table">
          <div class="sunpower-table__title">{{ __('about.high_tech') }}</div>
          <div class="table">
            <div class="first-tr">
              <span class="td-item apple"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/apple_icon.svg')}}" alt=""></span>
              <span class="td-item nassa"> <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/NASA_icon.svg')}}" alt=""></span>
              <span class="td-item microsoft"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Microsoft_icon.svg')}}" alt=""></span>
            </div>
            <div class="last-tr">
              <span class="td-item ford"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ford_icon.svg')}}" alt=""></span>
              <span class="td-item toyota"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/toyota_icon.svg')}}" alt=""></span>
              <span class="td-item google"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/google_icon.svg')}}" alt=""></span>
            </div>
          </div>
        </div>
      </div>

       <div class="sunpower-panel__content">
         <div class="sunpower-panel__content-left-block visible-viewportchecker visibility--check">
           <div class="ess-section-suptitle">Sunpower</div>
           <div class="ess-section-title">{{ __('about.energy_innovation') }}<span>Sunpower</span></div>
           <div class="ess-section-btn">
               <a href="{{ route('sunpower') }}" class="btn-sunpower-primary">{{ __('about.details') }}</a>
           </div>
         </div>
         <div class="sunpower-panel__content-right-block visible-viewportchecker visibility--check">
           <div class="ess-section-text">{{ __('about.official_dealer') }}
              <br>
             {{ __('about.produces_crystal') }} </div>
         </div>
       </div>
     </div>
  </div>

  <div class="about-us__sun-kness-section section">
    <div class="wrap-sun-kness-section">
      <div class="section-sunport">
        <div class="sunport-wrap">
          <div class="sunport-left-content pattern">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img//sunportBanner01.png') }}" alt="" class="lazyLoading_js">
            <div class="sunport-left-content__icon visible-viewportchecker visibility--check"></div> 
          </div>
          <div class="sunport-right-content visible-viewportchecker visibility--check">
            <div class="right-content-sunport">
              <div class="ess-section-suptitle">Sunport
                <span>Sunport</span>
              </div>
              <div class="ess-section-title">Sunport Power</div>
              <div class="ess-section-text">{{ __('main-page.30_years') }}</div>
            </div>
            <div class="ess-section-btn">
              <a  href="{{ route('sunport') }}" class="btn-sunpower-primary more-dateils">{{ __('about.details') }}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="kness-section">
        <div class="kness-section-content">
          <div class="kness-left-content">
            <div class="kness-left-wrap">
              <div class="ess-section-suptitle visible-viewportchecker visibility--check">KNESS
                <span class="content-fon-text">KNESS</span>
              </div>
              <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('about.ukrainian_energy') }}</div>
              <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('about.ukrainian_manufacturer') }}</div>
            </div>
            <div class="ess-section-btn visible-viewportchecker visibility--check">
               <a href="{{route('kness')}}">{{ __('about.details') }}</a>
            </div>
          </div>
          <div class="kness-right-banner pattern">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/kness foto.png') }}" alt="" class="lazyLoading_js">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="about-us__country-energy section">
    <div class="country-energy__banner pattern">
      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/country-energy.jpg') }}" alt="" class="lazyLoading_js">
    </div>
    <div class="country-energy__line-content">

      <div class="country-energy-wrap-content">
        <div class="country-energy__content-left-block">
          <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('about.form_creation') }}
            <span class="content-fon-text">{{ __('about.energy_state') }}</span>
          </div>
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('about.energy_state') }}</div>
          <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('about.energy_problems') }}
          </div>
        </div>
        <div class="country-energy__content-right-block">
          <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('about.create_form') }}
            <br>
            <br>
            <span>{{ __('about.form') }}  </span> </div>
        </div>
      </div>
    </div>
  </div>
   <div class="project-cost-section s2 section">
      <div class="project-cost__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/foto_fon.jpg') }}" alt="" class="lazyLoading_js">

        @include('includes.project-form')
        
      </div>
      
  {{--   @include('layouts.footers.footer') --}}
    </div>
    @include('layouts.footers.main-footer')
</div>


@endsection
