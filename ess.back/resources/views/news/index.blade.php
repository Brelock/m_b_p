<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\News[] $news */
?>

@extends('layouts.app')

@section('content')
  <div id="newsPage" class="newsPage page">
    @include('layouts.header.header')
    <div class="container">
      <div class="news-page-wrap-section">
        <div class="wrap-title">{{ __('header.news') }}</div>
        <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">{{ __('header.news') }}</a></li>
          </ul>
        </div>
      </div>
      <div class="new-item-blocks">
        @foreach($news as $new)
          <div class="item-news">
            <div class="item-news__obj pattern">
              <a href="{{ resourceGet($new, 'routeShow') }}">
                @if($mainPicture = resourceGet($new, 'mainPicture'))
                  <img src="{{ resourceFilledOutGet($mainPicture, 'full_link') }}" alt="" class="lazyLoading_js">
                @endif
              </a>
            </div>
            <div class="item-news__contant-block">
              <div class="item-news__contant visible-viewportchecker visibility--check">
                <div class="item-news__contant-date">{{resourceGet($new, 'publication_date')}}</div>
                <div class="item-news__contant-title">
                  <a href="{{resourceGet($new, 'routeShow')}}">{{ resourceGet($new, 'title') }}</a>
                </div>
                <div class="item-news__contant-text">
                  {!! (resourceGet($new, 'text_index')) !!}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  @include('layouts.footers.no-section-footer')

@endsection
