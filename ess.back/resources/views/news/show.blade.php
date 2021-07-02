<?php
/* @var \App\Models\News $news */
?>

@extends('layouts.app')

@section('content')
  <div id="newsPageItem" class="newsPage page">
    <!-- <div class="container"> -->
    @include('layouts.header.header')
    <div class="news-page-wrap-section">
      <div class="wrap-title">{{ resourceGet($news, 'title') }}</div>
      <div class="breadcrumbs">
        <ul class="breadcrumbs-wrap">
          <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
          <li class="breadcrumbs-link"><a href="{{ route('news.index') }}">{{ __('header.news') }}</a></li>
          <li class="breadcrumbs-link active-link"><a href="#">{{ resourceGet($news, 'title') }}</a></li>
        </ul>
      </div>
      <div class="banner-item-news">
        <img src="{{ resourceFilledOutGet($news, 'picture.full_link') }}" alt="">
      </div>
      <div class="mcontainer">
        <div class="content-item-news visible-viewportchecker visibility--check">
          <div class="item-news__contant-date">{{resourceGet($news, 'publication_date')}}</div>
          <div class="text-item-news">
            {!! resourceGet($news, 'text') !!}
          </div>
        </div>
      </div>

    </div>
    <!-- </div> -->
  </div>

  @include('layouts.footers.no-section-footer')

@endsection