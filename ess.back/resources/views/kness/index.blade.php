<?php
/* @var \App\Models\Product $product */
?>

@extends('layouts.app')

@section('content')
  <div id="knessPage" class="knessPage page">

    <div class="top-banner-kness section">
      @include('layouts.header.header')

      <div class="container">
        <div class="news-page-wrap-section">
          <div class="wrap-title">KNESS</div>
          <div class="breadcrumbs">
            <ul class="breadcrumbs-wrap">
              <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
              <li class="breadcrumbs-link active-link"><a href="#">KNESS</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="banner-img pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Kness-poster.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="top-banner-text visible-viewportchecker visibility--check">
        {{ __('kness.solar_technology') }}
        <br>
        {{ __('kness.for_your_clients') }}
        <br>
        {{ __('kness.reduce_impact') }}
        <br>
        <br>
        {{ __('kness.their_work') }}
        <br>
        {{ __('kness.high_standards') }}
        <br>
        {{ __('kness.reflect_positively') }}
        <div class="top-banner-btn ess-section-btn">
          <button type="button" class="modal_open_button"
                  data-btn-text="{{ __('kness.calculate') }}"
                  data-form-type="5"
                  data-form-target="modal_companies_form"
                  data-modal-target="modal_companies"
          >{{ __('kness.calculate') }}</button>
        </div>
      </div>
    </div>
    <div class="valuation-kness pattern section">
      <img class="banner-valuation-kness lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/kness_2.jpg') }}" alt="">
      <img class="position-orgament lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ukrainian_ornament.svg') }}"
           alt="">
      <div class="valuation-kness-title visible-viewportchecker visibility--check"><p>{{ __('kness.values') }}</p><span>{{ __('kness.values') }}</span></div>
      <div class="progress-list">
        <div class="innovation visible-viewportchecker visibility--check">
          <div class="innovation-icon">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/knowledge_icon.svg') }}" alt="">
          </div>
          <div class="innovation-title">{{ __('kness.innovativeness') }}</div>
          <div class="innovation-text">{{ __('kness.our_success') }}</div>
        </div>
        <div class="reputation visible-viewportchecker visibility--check">
          <div class="reputation-icon">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/confidence_icon.svg') }}" alt="">
          </div>
          <div class="reputation-title">{{ __('kness.reputation') }}</div>
          <div class="reputation-text"> {{ __('kness.honesty') }}
            <br>
            {{ __('kness.awareness') }}
          </div>
        </div>
      </div>
    </div>
    <div class="social-company section">
      <div class="social-company-content">
        <div class="ess-section-suptitle visible-viewportchecker visibility--check">KNESS <span>{{ __('kness.socially') }}</span></div>
        <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('kness.socially_responsible') }}</div>
        <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('kness.company') }}
        </div>
      </div>
      <div class="social-company-banner">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/kness3.jpg') }}" alt="">
      </div>
    </div>
    <div class="thumbnail-sketch-product section">
      <div class="mcontainer">
        <div class="top-sketch-section visible-viewportchecker visibility--check">
          <div class="product-slider">
            <div class="kness-slider-for">
              @foreach(resourceGet($product, 'pictures', []) as $picture)
                <div class="wrap-img"
                     style="background-image:url({{ resourceFilledOutGet($picture, 'full_link') }});"></div>
              @endforeach
            </div>
            <div class="kness-slider-nav">
              @foreach(resourceGet($product, 'pictures', []) as $picture)
                <div class="nav-wrap-img"><img src="{{ resourceFilledOutGet($picture, 'full_link') }}" alt=""></div>
              @endforeach
            </div>
            <div class="arrows">
              <ul>
                <li class="knes-prev"></li>
                <li class="knes-next"></li>
              </ul>
            </div>
          </div>
          <div class="product-table">
            <div class="product-table-title">{{ resourceGet($product, 'title')}}</div>
            @foreach(resourceGet($product, 'params', []) as $param)
              <div class="product-table-line"><p>{{ resourceFilledOutGet($param, 'title') }}</p>
                <span>{{ resourceFilledOutGet($param, 'value') }}</span></div>
            @endforeach
          </div>
          <div class="product-order">
            <div class="total-summ">{{ resourceGet($product, 'price') }} USD</div>
            <div class="ess-section-btn">
              <button type="button"
                      class="modal_open_button"
                      data-btn-text="{{ __('kness.order') }}?"
                      data-form-type="1"
                      data-form-target="modal_question_body_panel"
                      data-modal-target="modal_question_panel"
              >{{ __('kness.order') }}</button>
            </div>
            @if( resourceGet($product, 'xls_file_name') )
              <a href="{{ resourceGet($product, 'xls_file_path') }}" target="blank">
                <div class="product-btn-sheet">
                  <span>DATA SHEET</span>
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/file-pdf-regular.svg') }}" alt="">
                </div>
              </a>
            @endif
          </div>
        </div>
        <div class="thumbnail-sketch__content visible-viewportchecker visibility--check">
          @if(resourceGet($product, 'sub_description'))
            <div class="bottom-message">
              <p>{{ resourceGet($product, 'sub_description')}}</p>
            </div>
          @endif
        </div>
      </div>

    </div>
    <div class="project-cost-section s4 section">
      <div class="project-cost__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/foto_fon.jpg') }}" alt="" class="lazyLoading_js">

        @include('includes.project-form')
        
      </div>
      
      @include('layouts.footers.footer')

    </div>
  </div>

@endsection
