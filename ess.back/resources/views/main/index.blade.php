@extends('layouts.main')

@section('content')

    @include('includes.home-page-title')

    @include('includes.arrow-down')
    
  <div class="top-container">

    <div class="slider-container">
    
      <div class="flexbox-slider flexbox-slider-1">

        <div class="flexbox-slide block-slide1 pattern">
          <a href="{{ route('private-person') }}">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/slide3.jpg') }}" alt="Slide Image" class="lazyLoading_js">
          </a>
          <div class="slider-link-wrap visible-viewportchecker visibility--check">
            <span class="visible-viewportchecker visibility--check">01</span>
            <a href="{{ route('private-person') }}" class="slider-link__content visible-viewportchecker visibility--check">{{ __('main-page.individuals') }}</a>
            <a href="{{ route('private-person') }}" class="slider-link__befored"></a>
          </div>
        </div>

        <div class="flexbox-slide block-slide2 pattern">
          <a href="{{ route('company') }}">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/slide1.jpg') }}" alt="Slide Image" class="lazyLoading_js">
          </a>
          <div class="slider-link-wrap visible-viewportchecker visibility--check">
            <span class="visible-viewportchecker visibility--check">02</span>
            <a href="{{ route('company') }}" class="slider-link__content visible-viewportchecker visibility--check">{{ __('main-page.enterprises') }}</a>
            <a href="{{ route('company') }}" class="slider-link__befored"></a>
          </div>
        </div>

        <div class="flexbox-slide block-slide3 pattern">
          <a href="{{ route('credit') }}">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/slide2new_smal.jpg') }}" alt="Slide Image" class="lazyLoading_js">
          </a>
          <div class="slider-link-wrap visible-viewportchecker visibility--check">
            <span class="visible-viewportchecker visibility--check">03</span>
            <a href="{{ route('credit') }}" class="slider-link__content visible-viewportchecker visibility--check">{{ __('main-page.credit') }}</a>
            <a href="{{ route('credit') }}" class="slider-link__befored"></a>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>


  <div class="energosave-system section">
    <div class="energosave-system-content">
      <div class="energosave-left-content">
        <div class="energosave-left-wrap">
          <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('main-page.energosave_systems') }}</div>
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('main-page.about') }} <span>{{ __('main-page.about') }}</span></div>
          <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('main-page.energosave_company') }}
            <br>
            <br>
            {{ __('main-page.team') }}
          </div>
        </div>
        <div class="ess-section-btn visible-viewportchecker visibility--check">
            <a class=" {{ Route::is('about') ? ' active' : '' }}" href="{{ route('about') }}">{{ __('main-page.more') }}</a>
        </div>
      </div>
      <div class="energosave-right-banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/energsave.png') }}" alt="" class="lazyLoading_js">
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
           <div class="ess-section-suptitle">{{ __('main-page.sunpower') }}</div>
           <div class="ess-section-title">{{ __('about.energy_innovation') }}<span>{{ __('main-page.sunpower2') }}</span></div>
           <div class="ess-section-btn">
               <a href="{{ route('sunpower') }}" class="btn-sunpower-primary">{{ __('about.details') }}</a>
           </div>
         </div>
         <div class="sunpower-panel__content-right-block visible-viewportchecker visibility--check">
           <div class="ess-section-text">
             {{ __('about.official_dealer') }}
              <br>
             {{ __('about.produces_crystal') }} </div>
         </div>
       </div>
     </div>
  </div>

  <div class="wrap-sun-kness-section section">
    <div class="section-sunport">
      <div class="sunport-wrap">
        <div class="sunport-left-content pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunportBanner01.png') }}" alt="" class="lazyLoading_js">
          <div class="sunport-left-content__icon visible-viewportchecker visibility--check"></div> 
        </div>
        <div class="sunport-right-content visible-viewportchecker visibility--check">
          <div class="right-content-sunport">
            <div class="ess-section-suptitle">{{ __('main-page.sunport') }}
              <span>{{ __('main-page.sunport2') }}</span>
            </div>
            <div class="ess-section-title">{{ __('main-page.sunport_power') }}</div>
            <div class="ess-section-text">{{ __('main-page.30_years') }}</div>
          </div>
          <div class="ess-section-btn">
            <a href="{{route('sunport')}}" class="btn-sunpower-primary more-dateils">{{ __('main-page.more') }}</a>
          </div>
        </div>
      </div>
    </div>

    <div class="kness-section">
      <div class="kness-section-content">
        <div class="kness-left-content">
          <div class="kness-left-wrap visible-viewportchecker visibility--check">
            <div class="ess-section-suptitle">{{ __('main-page.best') }}</div>
            <div class="ess-section-title">{{ __('main-page.kness') }} <span>{{ __('main-page.kness2') }}</span></div>
            <div class="ess-section-text">{{ __('about.ukrainian_manufacturer') }}
            </div>
          </div>
          <div class="ess-section-btn visible-viewportchecker visibility--check">
            <a href="{{route('kness')}}">{{ __('main-page.more') }}</a>
          </div>
        </div>
        <div class="kness-right-banner pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/kness foto.png') }}" alt="" class="lazyLoading_js">
        </div>
      </div>
    </div>
  </div>

  <div class="offer-to-individuals section">
    <div class="offer-to-ind-wrap">
      <div class="offer-ind-top-banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img//chastnikam.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="offer-ind__content visible-viewportchecker visibility--check">
        <div class="offer-ind__content-left-block">
          <div class="ess-section-suptitle">{{ __('main-page.sentence') }}</div>
          <div class="ess-section-title">{{ __('main-page.individuals') }} <span>{{ __('main-page.individuals') }}</span></div>
          <div class="ess-section-btn">
          <a class="{{ Route::is('private-person') ? ' active' : '' }}" href="{{ route('private-person') }}">{{ __('main-page.more') }}</a>
          </div>
        </div>
        <div class="offer-ind__content-right-block">
          <div class="ess-section-text">{{ __('main-page.build') }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="offer-to-company section">
    <div class="offer-to-company-wrap">
      <div class="offer-to-company__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/pred.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="offer-to-company__content">
        <div class="offer-company-wrap visible-viewportchecker visibility--check">
          <div class="ess-section-suptitle">{{ __('main-page.sentence') }}</div>
          <div class="ess-section-title">{{ __('main-page.enterprises') }}<span>{{ __('main-page.enterprises') }}</span></div>
          <div class="ess-section-text">{{ __('main-page.develops') }}
          </div>
        </div>
        <div class="ess-section-btn visible-viewportchecker visibility--check">
          <a class="{{ Route::is('company') ? ' active' : '' }}" href="{{ route('company') }}">{{ __('main-page.more') }}</a>
        </div>
      </div>
    </div>
  </div>

  <div class="offer-to-kred section">
    <div class="offer-to-kred-wrap">
      <div class="offer-to-kred__content">
        <div class="offer-to-kred-left-wrap visible-viewportchecker visibility--check">
          <div class="ess-section-suptitle">{{ __('main-page.sentence') }}</div>
          <div class="ess-section-title">{{ __('main-page.lending') }} <span>{{ __('main-page.lending') }}</span></div>
          <div class="ess-section-text">{{ __('main-page.get_loan') }}
          </div>
        </div>
        <div class="ess-section-btn visible-viewportchecker visibility--check">
            <a class="{{ Route::is('credit') ? ' active' : '' }}" href="{{ route('credit') }}">{{ __('main-page.more') }}</a>
        </div>
      </div>
      <div class="offer-to-kred__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/slide2new.jpg') }}" alt="" class="lazyLoading_js"> 
      </div>
    </div>
  </div>

  <div class="page-insurance-reliability section">
      <div class="ins-reliability_left">
        <div class="ins-reliability_left-flexcontent">
          <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('insurance.reliability') }}</div>
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('insurance.best_protection') }} <span>{{ __('insurance.reliability') }}</span>
          </div>
          <div class="ess-section-text visible-viewportchecker visibility--check">
            {{ __('insurance.disasters') }}
          </div>
        </div>
        <div class="ess-section-btn visible-viewportchecker visibility--check">
          <a class="link {{ Route::is('insurance') ? ' active' : '' }}"  href="{{ route('insurance') }}">{{ __('main-page.more') }}</a>
        </div>
      </div>
      <div class="ins-reliability_right pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceBanner1.jpg') }}" alt="" class="lazyLoading_js">
      </div>
    </div>

  <div class="project-cost-section s2 section">
      <div class="project-cost__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/foto_fon.jpg') }}" alt="" class="lazyLoading_js">

        @include('includes.project-form')

      </div>
    </div>

  <div class="map-object-section section">
    <div class="map-object__banner-wrap">
      <div class="map-object__img pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Ukraine MAXEON_map.png') }}" alt="" class="lazyLoading_js">
        <span data-region="{{ __('main-page.krivoy_rog') }}" data-power="1 мгВт" class="geo-kr-obj map-el"></span>
        <span data-region="{{ __('main-page.dnieper') }}" data-power="300 кВт" class="geo-dnepr-obj map-el"></span>
        <span data-region="{{ __('main-page.zapor') }}" data-power="150 кВт" class="geo-zaporizhya-obj map-el"></span>
        <span data-region="{{ __('main-page.berd') }}" data-power="100 кВт" class="geo-berd-obj map-el"></span>
        <span data-region="{{ __('main-page.odessa') }}" data-power="90 кВт" class="geo-odessa-obj map-el"></span>
        <span data-region="{{ __('main-page.poltava') }}" data-power="200 кВт" class="geo-poltava-obj map-el"></span>
        <span data-region="{{ __('main-page.kiev') }}" data-power="300 кВт" class="geo-keiv-obj map-el"></span>
        <span data-region="{{ __('main-page.tern') }}" data-power="30 кВт" class="geo-ternopol-obj map-el"></span>
        <span data-region="{{ __('main-page.vinnyt') }}" data-power="60 кВт" class="geo-vinnica-obj map-el"></span>
        <span data-region="{{ __('main-page.kherson') }}" data-power="120 кВт" class="geo-herson-obj map-el"></span>
      </div>
    </div>
    <div class="toLower-content">
      <div class="toLower__content-left-block visible-viewportchecker visibility--check">
        <div class="ess-section-suptitle">{{ __('main-page.our_reach') }}</div>
        <div class="ess-section-title">{{ __('main-page.map') }} <span>{{ __('main-page.we_map') }}</span></div>
        <div class="ess-section-btn">
          <button class="modal_open_button"
              {{-- data-btn-text="{{ __('private-person.questions') }}" --}}
              data-form-type="1"
              data-form-target="modal_question_body"
              data-modal-target="modal_question"
            >{{ __('main-page.questions') }}</button>
        </div>
      </div>
      <div class="toLower__content-right-block visible-viewportchecker visibility--check">
        <div class="ess-section-text">{{ __('main-page.experience') }}
        </div>
      </div>
    </div>
  </div>

  <div class="projects section">
    <div class="project-section slider-container">
      <div class="flexbox-slider flexbox-slider-1">
        @if($projects)
          @foreach($projects as $project)
            <div class="flexbox-slide block-slide1">
              <a class="link-absolute" href="{{ resourceGet($project, 'routeShow') }}"></a>
              <img src="{{ resourceGet($project, 'mainPicture.full_link') }}" alt="">
              <div class="slider-link-wrap">
                <span>
                  @if($loop->iteration < 10)
                    0{{ $loop->iteration }}
                  @else
                    {{ $loop->iteration }}
                  @endif
                </span>
                <a href="{{ resourceGet($project, 'routeShow') }}" class="slider-link__content">{{ resourceGet($project, 'title') }}</a>
                <a href="{{ resourceGet($project, 'routeShow') }}" class="slider-link__befored"></a>
              </div>
            </div>
          @endforeach
        @endif

      </div>
    </div>
    <div class="project-bottom-content toLower-content">
      <div class="toLower__content-left-block visible-viewportchecker visibility--check">
        <div class="ess-section-suptitle">{{ __('main-page.portfolio') }}</div>
        <div class="ess-section-title">{{ __('main-page.our_work') }}<span>{{ __('main-page.portfolio') }}</span></div>
      </div>
      <div class="toLower__content-right-block visible-viewportchecker visibility--check">
        <div class="ess-section-btn">
          <a href="{{ route('projects.index')}}">{{ __('main-page.projects') }}</a>
        </div>
      </div>
    </div>
  </div>
    {{--   <div class="projects-btn">
      <div class="ess-section-btn">
        <a href="{{ route('projects.index')}}">{{ __('main-page.projects') }}</a>
      </div>
    </div> --}}
   {{-- <div class="manufacturer-slide-section">
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
    </div>  --}}
  </div>

  <div class="green-zone-section section">
    <div class="green-zone-wrap">
      <div class="green-zone-left-content">

        <div class="green-zone-left-wrap visible-viewportchecker visibility--check">
          <div class="ess-section-suptitle">{{ __('main-page.why') }}</div>
          <div class="ess-section-title">{{ __('main-page.green_tariff') }} <span>{{ __('main-page.green') }}</span></div>
          <div class="ess-section-text">{{ __('main-page.will_act') }}
          </div>

          <div class="green-zone-table">
            <div class="ess-section-title">{{ __('main-page.green_rates') }}</div>
            <div class="green-zone-table-subtitle">{{ __('main-page.cost') }}</div>
            <div class="table">
              <div class="thead flex">
                <div class="th-name border-t">{{ __('main-page.source_type') }}</div>
                <div class="th border-t">2020-2024</div>
                <div class="th border-t">2025-2029</div>
              </div>
              <div class="tbody flex">
                <div class="tr">
                  <div class="tb-name border-t">{{ __('main-page.ground') }}</div>
                  <div class="tb border-t">0,131</div>
                  <div class="tb border-t">0,117</div>
                </div>
                <div class="tr">
                  <div class="tb-name border-t">{{ __('main-page.rooftop') }}</div>
                  <div class="tb border-t">0,146</div>
                  <div class="tb border-t">0,126</div>
                </div>
                <div class="tr">
                  <div class="tb-name border-t">{{ __('main-page.private') }}</div>
                  <div class="tb border-t">0,16</div>
                  <div class="tb border-t">0,15</div>
                </div>
              </div>
            </div>
          </div>
          <div class="green-zone-left__benefit">
            <div class="green-zone-left__benefit-wrap">
              <div class="benefit-suptitle">{{ __('main-page.earn') }}</div>
              <div class="benefit-title">4 892 938.26 ₴*</div>
              <div class="benefit-subtitle">{{ __('main-page.install') }}</div>
            </div>
            <div class="ess-section-btn visible-viewportchecker visibility--check">
              <button type="button" class="modal_open_button" 
                data-btn-text="{{ __('main-page.submit') }}?"
                data-form-type="2"
                data-form-target="modal_companies_form_main"
                data-modal-target="modal_companies_main"
              >{{ __('main-page.submit') }}</button>
            </div>
          </div>
        </div>
        <div class="ess-section-btn desktop-btn visible-viewportchecker visibility--check">
          <button type="button" class="modal_open_button" 
            data-btn-text="{{ __('main-page.submit') }}?"
            data-form-type="2"
            data-form-target="modal_companies_form_main"
            data-modal-target="modal_companies_main"
          >{{ __('main-page.submit') }}</button>
        </div>

      </div>
      <div class="green-zone__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/green.jpg') }}" alt="" class="lazyLoading_js">
      </div>
    </div>
  </div>
@endsection