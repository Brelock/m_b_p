<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\Product[] $products */
?>


@extends('layouts.app')

@section('content')
  <div id="sunpowerPage" class="sunpowerPage page">

    <div class="sun-top-banner section">
      @include('layouts.header.header')
      <div class="sunpower-page-wrap-section">
        <div class="wrap-title">SUNPOWER</div>
        <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">SUNPOWER</a></li>
          </ul>
        </div>
      </div>
      <div class="img-wrap pattern">
        <img class="img-top-banner lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/SunPower-Home-Black-Solar-Panels2.jpg') }}" alt="">
        <img class="img-top-logo-banner" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunpower-seeklogo.com.svg') }}" alt="">
      </div>
      <div class="sun-top-banner__content visible-viewportchecker visibility--check">
        <div class="mcontainer">
          <div class="sun-title">{{ __('sunpower.only_strength') }}</div>
       {{-- <p class="sun-text">{{ __('sunpower.world_leader') }}</p>
          <h5>{{ __('sunpower.chosen') }}</h5>
          <p class="sun-text">{{ __('sunpower.using_conventional') }}<br>
            {{ __('sunpower.do_it') }}</p>
          <h5>Наше кредо:</h5>
          <p class="sun-text">{{ __('sunpower.help_customer') }}</p>
          <p class="sun-text bold-text">{{ __('sunpower.most_powerful') }} </p> --}}
        </div>
      </div>
    </div>
    <div class="sun-advantage-section section">
      <div class="advantage-content">
        <div class="advantage-left-content">
          <div class="advantage-left-wrap">
            <div class="ess-section-suptitle visible-viewportchecker visibility--check">SUNPOWER</div>
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunpower.our_advantages') }}<span>{{ __('sunpower.advantages_2') }}</span></div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              <p>{{ __('sunpower.suggestions') }}</p>
              <p>{{ __('sunpower.seriously') }}</p>
              <p>{{ __('sunpower.count') }}</p>
            </div>
          </div>
          <div class="advantage-left-btn visible-viewportchecker visibility--check">
            <button class="question__open-modals modal_open_button"
              type="button"
              data-btn-text="{{ __('sunpower.questions') }}?"
              data-form-type="1"
              data-form-target="modal_question_body"
              data-modal-target="modal_question"
            > {{ __('sunpower.questions') }}</button>
          </div>
        </div>
        <div class="advantage-right-banner">
          <video muted width="100%" height="100%" loop autoplay playsinline
            onloadedmetadata="this.muted = true">
            <source type="video/mp4" autoplay src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Warranty+panel.mp4') }}">
          </video>
        </div>
      </div>
    </div>
    <div class="sun-planet-banner pattern section">
      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunGroup4-new.jpg') }}" alt="" class="lazyLoading_js">
        <div class="sun-planet-content-section">
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunpower.first') }}<span>{{ __('sunpower.clients') }}</span></div>
          <div class="ess-section-subtitle visible-viewportchecker visibility--check">{{ __('sunpower.have_chosen') }}</div>
        </div>
        <div class="sun-planet-content-botton visible-viewportchecker visibility--check">
          <div class="ess-section-title">{{ __('sunpower.rulers_sunpower') }}</div>
        </div>
    </div>
    <div class="sun-presentation-pannel section">
      <div class="pre-left">
        <div class="presentation-title visible-viewportchecker visibility--check">Maxeon<span>Maxeon</span></div>
        <div class="presentation-pannel"></div>
        <div class="presentation-btn-wrap">
          <a class="button-pre" href="{{ \EscapeWork\Assets\Facades\Asset::v('/storage/files/SunPower MAX3-400 (UKR).pdf') }}" download>
            <p>MAX3-400</p>  <span class="img-pre"></span>
          </a>
          <a class="button-pre" href="{{ \EscapeWork\Assets\Facades\Asset::v('/storage/files/SunPower MAX2-360 (UKR) .pdf') }}" download>
            <p>MAX2-360</p>  <span class="img-pre"></span>
          </a>
        </div>
      </div>
      <div class="pre-right">
        <div class="presentation-title visible-viewportchecker visibility--check">Performance<span>Performance</span></div>
        <div class="presentation-pannel"></div>
        <div class="presentation-btn-wrap">
          <a class="button-pre" href="{{ \EscapeWork\Assets\Facades\Asset::v('/storage/files/Sunpower P3-335.pdf') }}" download>
            <p>P3-335</p>   <span class="img-pre"></span>
          </a>
          <a class="button-pre" href="{{ \EscapeWork\Assets\Facades\Asset::v('/storage/files/sunpower_performance_475-500_ukr.pdf') }}" download>
            <p>P3-475</p>   <span class="img-pre"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="sun-details-panel worksIn-slider section">
      <div class="details-top-panel">
        <div class="details-panel__title">
          <h5>{{ __('sunpower.performance') }}</h5>
          <h5>{{ __('sunpower.conventional_solar_panel') }}</h5>
        </div>
        <div class="sun-block-img">
         <figure class="worksIn-slider__item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
          <a class="gallary-workIn worg_bg_i1" href="/img/Performance-Infographics2.png"  data-size="950x800" itemprop="contentUrl">
           <img class="img-pannel-details" data-src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Performance-Infographics2.png') }}" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Performance-Infographics2.png') }}"
               alt="">
          </a>
         </figure>
        </div>
      </div>
      <div class="details-bottom-panel">
        <div class="details-panel__title">
          <h5>{{ __('sunpower.maxeon') }}</h5>
          <h5>{{ __('sunpower.conventional_solar_panel') }}</h5>
        </div>

        <div class="sun-block-img">
          <figure class="worksIn-slider__item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a class="gallary-workIn worg_bg_i2" href="/img/ess-bottom-popap-pannel.png"  data-size="950x800" itemprop="contentUrl">
              <img class="img-pannel-details" data-src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ess-bottom-popap-pannel.png') }}" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ess-bottom-popap-pannel.png') }}" alt="">
            </a>
          </figure>
        </div>
      </div>
      <div class="modal-pannel">
        {{-- <div class="body-modal-pannel">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Performance-Infographics2.png') }}" alt="">
        </div>
        <div class="overlay-modal-pannel"></div>
        <div class="overlay-close-btn"></div> --}}
      </div>
    </div>
    <div class="sun-performance section">
      <div class="sun-perform-contant-wrap">
        <div class="video-performance">
          <video muted width="100%" height="100%" loop autoplay playsinline
             onloadedmetadata="this.muted = true">
            <source type="video/mp4" autoplay src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Performance-fadeIn.mp4') }}">
          </video>
        </div>
        <div class="content-performance">
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunpower.exists') }}<span>{{ __('sunpower.two_rulers') }}</span>
          </div>
          <div class="mcontainer">
            <div class="column-list-performance">
              <ul>
                <li>
                  <p>{{ __('sunpower.hypercoles') }}</p>
                </li>
                <li>
                  <p>{{ __('sunpower.lack') }}</p>
                </li>
                <li>
                  <p>{{ __('sunpower.extra_space') }}</p>
                </li>
                <li>
                  <p>{{ __('sunpower.monocrystal') }}</p>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
      <div class="content-performance-wrapper">
        <div class="mcontainer">
          <div class="content-performance">
            <div class="content-performance__left visible-viewportchecker visibility--check">
              <div class="ess-section-suptitle">{{ __('sunpower.durability') }}</div>
              <div class="ess-section-title">SUNPOWER Performance<span>SUNPOWER Performance</span></div>
            </div>
            <div class="content-performance__right visible-viewportchecker visibility--check">
              {{-- <div class="ess-section-text">
                <p>{{ __('sunpower.designed') }}</p>
                <p>{{ __('sunpower.independent') }}</p>
                <br>
                <p class="font-weight-bisnes-section">{{ __('sunpower.uncompromising') }}</p>
              </div> --}}
              <div class="ess-section-btn">
                  <button type="button" class="modal_open_button"
                    data-btn-text="{{ __('sunpower.calculation') }}?"
                    data-form-type="5"
                    data-form-target="modal_companies_form"
                    data-modal-target="modal_companies"
                  >{{ __('sunpower.calculation') }}</button>
              </div>
              <a class="button-pre" href="{{ \EscapeWork\Assets\Facades\Asset::v('/storage/files/Sunport-Catalog.pdf') }}" download>
                <p>{{ __('sunpower.download_catalog') }}</p>  <span class="img-pre"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sun-quality section">
      <div class="sun-quality-contant-wrap">
        <div class="video-quality">
          <video muted width="100%" height="100%" loop autoplay playsinline
            onloadedmetadata="this.muted = true">
            <source type="video/mp4" autoplay src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunPage0-12.mp4') }}">
          </video>
        </div>
        <div class="content-quality">
          <div class="ess-section-text">{{ __('sunpower.reinforced_connections') }}
          </div>
          <div class="ess-section-title">{{ __('sunpower.level') }}
          </div>
        </div>
      </div>
      <div class="content-quality-wrapper">
        <div class="mcontainer">
          <div class="content-quality-bottom">
            <div class="content-quality__left visible-viewportchecker visibility--check">
              <div class="ess-section-suptitle">{{ __('sunpower.uncompromising_performance') }}</div>
              <div class="ess-section-title">SUNPOWER Performance<span>SUNPOWER Performance</span></div>
            </div>
            <div class="content-quality__right visible-viewportchecker visibility--check">
              {{-- <div class="ess-section-text">
                  <p>{{ __('sunpower.legal_garniah') }}</p>
                </div> --}}
                <div class="ess-section-btn">
                  <button type="button"
                    class="modal_open_button"
                    {{-- data-btn-text="{{ __('sunpower.invest') }}" --}}
                    data-form-type="5"
                    data-form-target="modal_question_body"
                    data-modal-target="modal_question"
                    data-sliders-target="sunpower_calc_form"
                  >{{ __('sunpower.invest') }}</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- slide --}}
    <div class="wrap-panel-slider section">
      <div class="mcontainer">
        <div class="sketch-slider_sanpower-top visible-viewportchecker visibility--check">
          @foreach($productPerformances as $productPerformance)
          <div class="thumbnail-sketch-product sketch-1 sketch-maxeon">
            <div class="top-sketch-section">
              <div class="product-slider">
                <div class="s-for">
                  @if(resourceGet($productPerformance, 'pictures'))
                    @foreach(resourceGet($productPerformance, 'pictures') as $picture)
                      <div class="wrap-img"
                           style="background-image:url({{ resourceFilledOutGet($picture, 'full_link') }});"></div>
                    @endforeach
                </div>
                <div class="s-nav">
                    @foreach(resourceGet($productPerformance, 'pictures') as $picture)
                      <div class="nav-wrap-img"><img src="{{ resourceFilledOutGet($picture, 'full_link') }}" alt="">
                      </div>
                    @endforeach
                  @endif
                </div>
                <div class="arrows"> 
                    <ul>
                        <li class="s-prev"></li>
                        <li class="s-next"></li>
                    </ul>
                </div>
              </div>
              <div class="product-table">
                <div class="product-table-title">{{ resourceGet($productPerformance, 'title')}}</div>
                <div class="product-table-lines-wrapper">
                  @if(resourceGet($productPerformance, 'params'))
                    @foreach(resourceGet($productPerformance, 'params') as $param)
                      <div class="product-table-line"><p>{{ resourceFilledOutGet($param, 'title') }}</p>
                        <span>{{ resourceFilledOutGet($param, 'value') }}</span></div>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="product-order">
                <div class="total-summ">{{ resourceGet($productPerformance, 'price')}} USD</div>
                <div class="ess-section-btn">
                  <button type="button"
                    class="modal_open_button"
                    data-btn-text="{{ __('private-person.order') }}?"
                    data-form-type="4"
                    data-form-target="modal_question_body_panel"
                    data-modal-target="modal_question_panel"
                  >{{ __('private-person.order') }}</button>
                </div>
                @if( resourceGet($productPerformance, 'xls_file_name') )
                  <a href="{{ resourceGet($productPerformance, 'xls_file_path') }}" target="blank">
                    <div class="product-btn-sheet">
                      <span>DATA SHEET</span>
                      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/file-pdf-regular.svg') }}" alt="">
                    </div>
                  </a>
                @endif
              </div>
            </div>
            <div class="thumbnail-sketch__content">
              @if(resourceGet($productPerformance, 'sub_description'))
                <div class="bottom-message">
                  <p>{{ resourceGet($productPerformance, 'sub_description')}}</p>
                </div>
              @endif
            </div>

          </div>
          @endforeach
        </div>
      </div>

      <div class="wrap-panel-arrows">
        <ul>
          <li class="prev-panel-top"></li>
          <li class="next-panel-top"></li>
        </ul>
      </div>

    </div>
    {{-- slide --}}

    <div class="sun-secondary-line-production pattern section">
      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunpower_black.jpg') }}" alt="" class="lazyLoading_js">
      <div class="content-secondary-line">
        <div class="ess-section-title">{{ __('sunpower.second_line') }}<span>SUNPOWER Maxeon</span></div>
        <div class="secondary-line-suptitle">{{ __('sunpower.solar_modules') }}
        </div>
        <div class="content-wrapper">
          <div class="secondary-line_left-content">
            <div class="secondary-line-items">
              <div class="title-sec-line line-1 befored-line">{{ __('sunpower.sealant') }}</div>
              <div class="text-sec-line">{{ __('sunpower.exceptional_resilience') }}
              </div>
            </div>
            <div class="secondary-line-items">
              <div class="title-sec-line line-2 befored-line">{{ __('sunpower.frame') }}</div>
              <div class="text-sec-line">{{ __('sunpower.connect') }}
              </div>
            </div>
            <div class="secondary-line-items">
              <div class="title-sec-line line-3 befored-line">{{ __('sunpower.glass') }}</div>
              <div class="text-sec-line">{{ __('sunpower.qualification') }}
              </div>
            </div>
          </div>
          <div class="secondary-line_right-content">
            <div class="secondary-line-items">
              <div class="title-sec-line line-4 befored-line">{{ __('sunpower.silicon') }}</div>
              <div class="text-sec-line">{{ __('sunpower.high_quality') }}
              </div>
            </div>
            <div class="secondary-line-items">
              <div class="title-sec-line line-5 befored-line">{{ __('sunpower.barrier') }}</div>
              <div class="text-sec-line">{{ __('sunpower.tin') }}
              </div>
            </div>
            <div class="secondary-line-items">
              <div class="title-sec-line line-6 befored-line">{{ __('sunpower.copper') }}</div>
              <div class="text-sec-line">{{ __('sunpower.plain_copper') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sun-efficion section">
      <div class="efficion-content">
        <div class="efficion-left-content">
          <div class="efficion-left-wrap">
            <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('sunpower.efficiency') }}<span>{{ __('sunpower.max') }}</span></div>
            <div class="eff-left-item visible-viewportchecker visibility--check">
              <div class="eff-left-title">{{ __('sunpower.generation') }}</div>
              <div class="eff-left-text">{{ __('sunpower.average') }}
              </div>
            </div>
            <div class="eff-left-item visible-viewportchecker visibility--check">
              <div class="eff-left-title">{{ __('sunpower.our_advantages') }}
              </div>
              <div class="eff-left-text">{{ __('sunpower.generating_more') }}
              </div>
            </div>
            <div class="eff-left-item visible-viewportchecker visibility--check">
              <div class="eff-left-title">{{ __('sunpower.environmental') }}</div>
              <div class="eff-left-text">{{ __('sunpower.ranking_social') }}
              </div>
            </div>
            <div class="eff-left-item visible-viewportchecker visibility--check">
              <div class="eff-left-title">{{ __('sunpower.areas_warranty') }}</div>
              <div class="eff-left-text">{{ __('sunpower.manufacturer') }}
              </div>
            </div>
            <div class="wrap-abcolute-eff-left-item">
              <div class="eff-left-item visible-viewportchecker visibility--check">
                <div class="eff-left-title">{{ __('sunpower.world_record') }}</div>
                <div class="eff-left-text">{{ __('sunpower.tallest') }}
                </div>
              </div>
              <div class="eff-left-item visible-viewportchecker visibility--check">
                <div class="eff-left-title">{{ __('sunpower.reliability') }}</div>
                <div class="eff-left-text">{{ __('sunpower.middle_modules') }}
                </div>
              </div>
              <div class="eff-left-item visible-viewportchecker visibility--check">
                <div class="eff-left-title">{{ __('sunpower.degradation') }}</div>
                <div class="eff-left-text">{{ __('sunpower.actual') }}
                </div>
              </div>
              <div class="eff-left-item visible-viewportchecker visibility--check">
                <div class="eff-left-title">{{ __('sunpower.coefficient') }}</div>
                <div class="eff-left-text">{{ __('sunpower.0.29') }} <br>
                  {{ __('sunpower.0.35') }}
                </div>
              </div>
            </div>
          </div>
          <div class="ess-section-btn visible-viewportchecker visibility--check">
                  <button type="button"
                    class="modal_open_button"
                    {{-- data-btn-text="{{ __('sunpower.invest') }}" --}}
                    data-form-type="5"
                    data-form-target="modal_question_body"
                    data-modal-target="modal_question"
                    data-sliders-target="sunpower_calc_form"
                  >{{ __('sunpower.invest_2') }}</button>
                </div>
        </div>
        <div class="efficion-right-banner pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/maxeon2.jpg') }}" alt="" class="lazyLoading_js">
        </div>
      </div>
    </div>

    {{-- slide --}}
    <div class="wrap-panel-slider section">
      <div class="mcontainer">
        <div class="sketch-slider_sanpower-bottom visible-viewportchecker visibility--check">
          @foreach($productMaxeons as $productMaxeon)
          <div class="thumbnail-sketch-product sketch-1 sketch-performance">
            <div class="top-sketch-section">
              <div class="product-slider">
                <div class="s-for">
                  @if(resourceGet($productMaxeon, 'pictures'))
                    @foreach(resourceGet($productMaxeon, 'pictures') as $picture)
                      <div class="wrap-img"
                           style="background-image:url({{ resourceFilledOutGet($picture, 'full_link') }});"></div>
                    @endforeach
                  </div>
                  <div class="s-nav">
                    @foreach(resourceGet($productMaxeon, 'pictures') as $picture)
                      <div class="nav-wrap-img"><img src="{{ resourceFilledOutGet($picture, 'full_link') }}" alt="">
                      </div>
                    @endforeach
                  @endif
                </div>
                <div class="arrows"> 
                    <ul>
                        <li class="s-prev"></li>
                        <li class="s-next"></li>
                    </ul>
                </div>
              </div>
              <div class="product-table">
                <div class="product-table-title">{{ resourceGet($productMaxeon, 'title')}}</div>
                <div class="product-table-lines-wrapper">
                  @if(resourceGet($productMaxeon, 'params'))
                    @foreach(resourceGet($productMaxeon, 'params') as $param)
                      <div class="product-table-line"><p>{{ resourceFilledOutGet($param, 'title') }}</p>
                        <span>{{ resourceFilledOutGet($param, 'value') }}</span></div>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="product-order">
                <div class="total-summ">{{ resourceGet($productMaxeon, 'price')}} USD</div>
                <div class="ess-section-btn">
                  <button type="button"
                    class="modal_open_button"
                    data-btn-text="{{ __('private-person.order') }}?"
                    data-form-type="4"
                    data-form-target="modal_question_body_panel"
                    data-modal-target="modal_question_panel"
                  >{{ __('private-person.order') }}</button>
                </div>
                @if( resourceGet($productMaxeon, 'xls_file_name') )
                  <a href="{{ resourceGet($productMaxeon, 'xls_file_path') }}" target="blank">
                    <div class="product-btn-sheet">
                      <span>DATA SHEET</span>
                      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/file-pdf-regular.svg') }}" alt="">
                    </div>
                  </a>
                @endif
              </div>
            </div>
            <div class="thumbnail-sketch__content">
              @if(resourceGet($productMaxeon, 'sub_description'))
                <div class="bottom-message">
                  <p>{{ resourceGet($productMaxeon, 'sub_description')}}</p>
                </div>
              @endif
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="wrap-panel-arrows">
        <ul>
          <li class="prev-panel"></li>
          <li class="next-panel"></li>
        </ul>
      </div>
    </div>
    {{-- slide --}}

    <div class="sun-lider-banner pattern section">
      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunGroup5.jpg') }}" alt="" class="lazyLoading_js">
      <div class="sun-liders-content-wrapper">
        <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunpower.construction') }}</div>
        <div class="sun-lider-bottom-content">
          <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('sunpower.leader') }}
          </div>
          <div class="ess-section-btn visible-viewportchecker visibility--check">
            <button type="button" class="modal_open_button"
              data-btn-text="{{ __('sunpower.order') }}"
              data-form-type="5"
              data-form-target="modal_companies_form"
              data-modal-target="modal_companies"
            >{{ __('sunpower.order') }}</button>
          </div>
        </div>
      </div>
    </div>
    <div class="sun-count-banner section">
      <div class="sun-count-wrapper pattern">
        <img class="sun-count-img lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunBottomGroup7.jpg') }}" alt="">
        <div id="sunpower_calc_form" class="sun-count-content-wrap">
          <div class="count-content-top">
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunpower.like_order') }}<span>{{ __('sunpower.payment') }}</span></div>
            <div class="count-suptitle visible-viewportchecker visibility--check">{{ __('sunpower.select_options') }}</div>
          </div>
          <div class="count-slide-bottom sliders-data visible-viewportchecker visibility--check">

            <div class="count-slide-bottom-wrapper">

              <div class="top-slider slider-data-item">
                <div class="mslider-title label-name">{{ __('sunpower.power') }}</div>
                <div id="sun-count-s1" data-name="slide-panel" class="item-slide slider-common4"></div>
                <div class="mslider-marking">
                  <p class="mark-hide mark-active">5 кВт</p>
                  <p class="mark-hide">10 кВт</p>
                  <p class="mark-hide">20 кВт</p>
                  <p class="mark-hide">30 кВт</p>
                  <p class="mark-hide">{{ __('sunpower.more') }}</p>
                </div>
              </div>

              <div class="top-slider slider-data-item">
                <div class="mslider-title label-name">{{ __('sunpower.sun_power') }}</div>
                <div id="sun-count-s2" data-name="slide-panel" class="item-slide slider-common4"></div>
                <div class="mslider-marking">
                  <p class="mark-hide mark-active">Performance</p>
                  <p class="mark-hide">Maxeon</p>
                </div>
              </div>

              <div class="top-slider slider-data-item">
                <div class="mslider-title label-name">{{ __('sunpower.construction_2') }}</div>
                <div id="sun-count-s3" data-name="slide-panel" class="item-slide slider-common4"></div>
                <div class="mslider-marking">
                  <p class="mark-hide mark-active">{{ __('sunpower.month') }}</p>
                  <p class="mr23 mark-hide">{{ __('sunpower.half_year') }}</p>
                  <p class="mr27 mark-hide">{{ __('sunpower.year') }}</p>
                </div>
              </div>

            </div>

            <div class="ess-section-btn">
              <button type="button"
                class="modal_open_button"
                data-btn-text="{{ __('sunpower.order') }}?"
                data-form-type="5"
                data-form-target="modal_question_body"
                data-modal-target="modal_question"
                data-sliders-target="sunpower_calc_form"
              >{{ __('sunpower.order') }}</button>
            </div>

          </div>

        </div>
      </div>
      @include('layouts.footers.footer')
    </div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

      <!-- Background of PhotoSwipe.
           It's a separate element as animating opacity is faster than rgba(). -->
      <div class="pswp__bg"></div>

      <!-- Slides wrapper with overflow:hidden. -->
      <div class="pswp__scroll-wrap">

          <!-- Container that holds slides.
              PhotoSwipe keeps only 3 of them in the DOM to save memory.
              Don't modify these 3 pswp__item elements, data is added later on. -->
          <div class="pswp__container">
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
          </div>

          <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
          <div class="pswp__ui pswp__ui--hidden">

              <div class="pswp__top-bar">

                  <!--  Controls are self-explanatory. Order can be changed. -->

                  <div class="pswp__counter"></div>

                  <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                  <button class="pswp__button pswp__button--share" title="Share"></button>

                  <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                  <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                  <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                  <!-- element will get class pswp__preloader--active when preloader is running -->
                  <div class="pswp__preloader">
                      <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                          <div class="pswp__preloader__donut"></div>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                  <div class="pswp__share-tooltip"></div>
              </div>

              <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
              </button>

              <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
              </button>

              <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
              </div>

          </div>

      </div>

    </div>
  </div>


@endsection