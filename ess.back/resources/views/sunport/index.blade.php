<?php
/* @var \App\Models\Product[] $products */
/* @var \App\Models\Sunport[] $sunports */
?>

@extends('layouts.app')

@section('content')
  <div id="sunportPage" class="sunportPage page">
    <div class="top-section-sunport section">

      @include('layouts.header.header')

      <div class="sunpower-page-wrap-section">
        <div class="wrap-title">SUNPORT</div>
        <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">SUNPORT</a></li>
          </ul>
        </div>
      </div>
      <div class="sunport-top-banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunportBanner01.png') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="top-section-sunport__content visible-viewportchecker visibility--check">
        <div class="sunport__content-icon">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo-sunport.png') }}" alt="">
        </div>
        <div class="ess-section-title">
          <p>{{ __('sunport.solar_panels') }}</p>
          <p>{{ __('sunport.unique') }}</p>
          <p>{{ __('sunport.guarantee') }}</p>
        </div>
      </div>
    </div>

    <div class="sunport-video-banner section">
      <video muted width="100%" height="100%" loop autoplay>
        <source type="video/mp4" autoplay src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sunportVideo.mp4') }}">
      </video>
      <div class="sunport-video_content">
        <div class="ess-section-title visible-viewportchecker visibility--check">Sunport Power</div>
        <div class="ess-section-text visible-viewportchecker visibility--check">
          {{ __('sunport.world_market') }}
        </div>
        <div class="ess-section-btn visible-viewportchecker visibility--check">
          <button
            class="modal_open_button"
            data-btn-text="{{ __('sunport.calculation') }}?"
            data-form-type="8"
            data-form-target="modal_sunport_calculation_form"
            data-modal-target="modal_sunport"
          >{{ __('sunport.calculation') }}</button>
        </div>
      </div>
      <div class="sunport-video-bg"></div>
    </div>

    <div class="sunport-first-slide-panel section">
      <div class="thumbnail-sketch-product init-top-slide-sunport">
          @foreach($sunports as $sunport)
            <div class="top-sketch-section visible-viewportchecker visibility--check">
              <div class="product-slider">
                <div class="img-prod-slider">
                  <div class="sunport-img-prod" style="background-image:url({{ resourceGet($sunport, 'picture_file_path') }});"></div>
                </div>
              </div>
              <div class="product-table-wrap">
                <div class="product-table_top">
                  <div class="product-table">
                    <div class="product-table-title">{{ resourceGet($sunport, 'title') }}
                      <br>
                      <span>{{ resourceGet($sunport, 'sub_title') }}</span></div>

                    <div class="product-table-wrap-line">
                      @if(resourceGet($sunport, 'params'))
                        @foreach(resourceGet($sunport, 'params') as $param)
                          <div class="product-table-line"><p>{{ resourceFilledOutGet($param, 'title') }}</p> <span>{{ resourceFilledOutGet($param, 'value') }}</span></div>
                        @endforeach
                      @endif
                    </div>

                  </div>
                  <div class="mobile-bg-panel">
                    <div class="sunport-img-prod" style="background-image:url({{ resourceGet($sunport, 'picture_file_path') }});"></div>
                  </div>
                  <div class="product-order">
                    <div class="total-summ">{{ resourceGet($sunport, 'price') }} USD</div>
                    <div class="ess-section-btn">
                      <button type="button"
                        class="modal_open_button"
                        data-btn-text="{{ __('sunport.order') }}?"
                        data-form-type="4"
                        data-form-target="modal_question_body_panel"
                        data-modal-target="modal_question_panel"
                      >{{ __('sunport.order') }}</button>
                    </div>
                    @if( resourceGet($sunport, 'xls_file_name') )
                      <a href="{{ resourceGet($sunport, 'xls_file_path') }}" target="blank">
                      <div class="product-btn-sheet">
                        <button>
                          <span>DATA SHEET</span>
                          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/file-pdf-regular.svg') }}" alt="">
                        </button>
                      </div>
                      </a>
                    @endif
                  </div>
                </div>
                <div class="product-table_bottom">
                  @if(resourceGet($sunport, 'paramsPicture'))
                    @foreach(resourceGet($sunport, 'paramsPicture') as $paramsPicture)
                  <div class="product-table_bottom-icon">
                    <img src="{{ resourceFilledOutGet($paramsPicture, 'full_link') }}" alt="">
                    <span>{{ resourceFilledOutGet($paramsPicture, 'title') }}</span>
                  </div>
                    @endforeach
                  @endif
                </div>
              </div>

            </div>
          @endforeach

      </div>
      <div class="arrows">
        <ul>
          <li class="top-sunport-prev"></li>
          <li class="top-sunport-next"></li>
        </ul>
      </div>

    </div>

    <div class="sunport-mwt-technology section">
      <div class="mwt-tech-wrap flex">
        <div class="mwt-tech-item">
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunport.details') }}<span>{{ __('sunport.technologies') }}</span></div>
          <div class="ess-section-suptitle_sunport visible-viewportchecker visibility--check">
            {{ __('sunport.advanced_technology') }}
          </div>
        </div>
        <div class="mwt-tech-item">
          <div class="nwt-tech_left">
            <div class="nwt-tech_present-panel-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/nwt-present-panels.png') }}" alt="">
            </div>
          </div>
          <div class="nwt-tech_right visible-viewportchecker visibility--check">
            <ul>
              <li>{{ __('sunport.shading_area') }}</li>
              <li>{{ __('sunport.output_power') }}</li>
              <li>{{ __('sunport.probability') }}</li>
              <li>{{ __('sunport.compatibility') }}
              </li>
            </ul>
          </div>
        </div>
        <div class="mwt-tech-item">

          <div class="bottom-mwt-item_left">
            <div class="bottom-mwt-tech-suptitle ess-section-title visible-viewportchecker visibility--check">
              {{ __('sunport.presentation') }}
            </div>
          </div>

          <div class="bottom-mwt-item_right">
            <button class="flex mwt-btn">
              <span>{{ __('sunport.look') }}</span>
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/play-button.svg') }}" alt="">
            </button>
          </div>

        </div>
      </div>
      <div class="modal-video-popap ess-modal">
        <div class="modal-content-wrap">
          <iframe
            src="https://www.youtube.com/embed/8cOH2-qANTY"
            width="560"
            height="315"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
          </iframe>
        </div>
        <div class="modal-overlay video-popap-overlay"></div>
      </div>
    </div>

    <div class="sunport-technology-comparison section">
      <div class="wrap-sunport-title">
        <div class="ess-section-title visible-viewportchecker visibility--check"> {{ __('sunport.comparison') }} <span>{{ __('sunport.comparison') }}</span></div>
        <div class="ess-section-suptitle_sunport visible-viewportchecker visibility--check">
          {{ __('sunport.regular_module') }}
        </div>
      </div>

      <div class="technology-comparison__panels-wrap flex">
        <div class="technology-comparison__panels-title ess-section-title visible-viewportchecker visibility--check">{{ __('sunport.structural_feature') }}</div>
        <div class="comparison__panels flex">
          <div class="comparison__panel-el">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Internal-Structure-mwt.jpg') }}" alt="">
            <div class="ess-section-title visible-viewportchecker visibility--check">MWT</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              {{ __('sunport.back_side') }}
            </div>
          </div>
          <div class="comparison__panel-el">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Internal-Structure-Conventional.jpg') }}" alt="">
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunport.regular_cell') }}</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              {{ __('sunport.negative_electrodes') }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sunport-structure-cell section">
      <div class="wrap-sunport-title">
        <div class="ess-section-title visible-viewportchecker visibility--check"> {{ __('sunport.cell_structure') }} <span> {{ __('sunport.cell_structure') }} </span></div>
      </div>

      <div class="technology-comparison__panels-wrap flex">

        <div class="comparison__panels flex">
          <div class="comparison__panel-el">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Cell-Structure-mwt.jpg') }}" alt="">
            <div class="ess-section-title visible-viewportchecker visibility--check">MWT</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              {{ __('sunport.higher') }}
            </div>
          </div>
          <div class="comparison__panel-el">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Cell-Structure-Conventional.jpg') }}" alt="">
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunport.regular_cell2') }}</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              {{ __('sunport.large_area') }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sunport-encapsulation section">
      <div class="wrap-sunport-title">
        <div class="ess-section-title visible-viewportchecker visibility--check"> {{ __('sunport.encapsulation') }} <span> {{ __('sunport.encapsulation') }} </span></div>
      </div>

      <div class="technology-comparison__panels-wrap flex">

        <div class="comparison__panels flex">
          <div class="comparison__panel-el">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Encapsulation-Method-mwt.jpg') }}" alt="">
            <div class="ess-section-title visible-viewportchecker visibility--check">MWT</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              {{ __('sunport.cells_connect') }}
            </div>
          </div>
          <div class="comparison__panel-el">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Encapsulation-Method-Conventional2.jpg') }}" alt="">
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('sunport.regular_cell3') }}</div>
            <div class="ess-section-text visible-viewportchecker visibility--check">
              {{ __('sunport.connected_ribbons') }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sunport-last-slide-panel section">
      <div class="thumbnail-sketch-product init-bottom-slide-sunport">

        @foreach($products as $product)
          <div class="item-sunport-slider visible-viewportchecker visibility--check">
            <div class="top-sketch-section">
              <div class="product-slider">
                <div class="product-slider-pannel">
                  @if(resourceGet($product, 'pictures'))
                    @foreach(resourceGet($product, 'pictures') as $picture)
                  <div class="wrap-img"
                       style="background-image:url({{ resourceFilledOutGet($picture, 'full_link')}});"></div>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="product-table">
                <div class="product-table-title">{{ resourceGet($product, 'title')}}</div>
                <div class="product-table-lines-wrapper">
                  @foreach(resourceGet($product, 'params', []) as $param)
                    <div class="product-table-line"><p>{{ resourceFilledOutGet($param, 'title') }}</p>
                      <span>{{ resourceFilledOutGet($param, 'value') }}</span></div>
                  @endforeach
                </div>
              </div>
              <div class="product-order">
                <div class="total-summ">{{ resourceGet($product, 'price') }} USD</div>
                <div class="ess-section-btn">
                  <button type="button"
                  class="modal_open_button"
                  data-btn-text="{{ __('sunport.order') }}?"
                  data-form-type="4"
                  data-form-target="modal_question_body_panel"
                  data-modal-target="modal_question_panel"
                  >{{ __('sunport.order') }}</button>
                </div>
                @if( resourceGet($product, 'xls_file_name') )
                  <a href="{{ resourceGet($product, 'xls_file_path') }}" target="blank">
                    <div class="product-btn-sheet">
                      <span>DATA SHEET</span>
                      <img class="" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/file-pdf-regular.svg') }}" alt=""
                           data-src="">
                    </div>
                  </a>
                @endif
              </div>
            </div>
            <div class="thumbnail-sketch__content">
              @if(resourceGet($product, 'sub_description'))
                <div class="bottom-message">
                  <p>{{ resourceGet($product, 'sub_description')}}</p>
                </div>
              @endif
            </div>
          </div>
        @endforeach

      </div>
      <div class="arrows">
        <ul>
          <li class="sunport-bottom-slide-prev"></li>
          <li class="sunport-bottom-slide-next"></li>
        </ul>
      </div>
    </div>

    <div class="project-cost-section s6 section">
      <div class="project-cost__banner">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/foto_fon.jpg') }}" alt="" data-src="lazyLoading_js">
        @include('includes.project-form')

      </div>
      @include('layouts.footers.footer')

    </div>
  </div>
@endsection