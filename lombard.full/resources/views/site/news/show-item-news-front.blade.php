@extends('site.layouts.index')
@include('site.includes.meta_tags', array('meta_tags' => $news))
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
       <li class="breadcrumbs-link"><a href="{{ route('news') }}">{{ __('main.news') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ $news['title_'.$locale] }}</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ $news['title_'.$locale] }}</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
      <div class="banner visible-viewportchecker visibility--check hidden">
      @isset($news->image)
        <img src="{{ '/storage/images/news/'.$news->image }}" alt="img">
        @else
          <img src="{{ asset('img/no_image_news.jpg') }}" alt="img">
          @endisset
    </div>
    <div class="wrap-description">
      <p class="data-news visible-viewportchecker visibility--check hidden"> {{ \Jenssegers\Date\Date::parse($news->date)->format('d F Y') }} </p>
      <div class="visible-viewportchecker visibility--check hidden">
          {!! $news['description_'.$locale] !!}
      </div>
    </div>
  </div>
</section>

<section class="popular-news">
  <div class="mcontainer">
      <div class="title visible-viewportchecker visibility--check">{{ trans('main.other_news') }}</div>
      <div class="wrapper-news">

          @forelse($moreNews as $moreNewsItem)
        <div class="el-card visible-viewportchecker visibility--check">
          <div class="content-card">
            <div class="el-img">
                @isset($moreNewsItem->image_small)
                    <img src="{{ '/storage/images/news/'.$moreNewsItem->image_small }}" alt="{{ $moreNewsItem->title_ru }}">
                    @elseif($moreNewsItem->image)
                        <img src="{{ '/storage/images/news/thumbnails/'.$moreNewsItem->image }}" alt="{{ $moreNewsItem->title_ru }}">
                    @else
                        <img src="{{ asset('img/no_image_news.jpg') }}" alt="{{ $moreNewsItem->title_ru }}">
                        @endisset
            </div>
            <div class="el-data">
                {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
                    <p class="el-season">{{ \Jenssegers\Date\Date::parse($moreNewsItem->date)->format('d F Y') }}</p>
            </div>
            <div class="el-title">{{ html_entity_decode($moreNewsItem['title_'.$locale]) }}</div>
            <div class="el-description">
                {!! str_limit(strip_tags($moreNewsItem['description_'.$locale]), 80, ' ...') !!}
            </div>

            <a href="{{ route('news.show',  $moreNewsItem->alias) }}" class="link-news">
              <div class="btn-link">
                <span>{{ __('main.details') }}</span>
                <span class="icon-arrow-l-secondColor"></span>
              </div>
            </a>
          </div>
        </div>
          @empty
              Нет записей!
          @endforelse
      </div>
  </div>
</section>

<section class="career-callback-form visible-viewportchecker visibility--check">
  <div class="mcontainer">
    @include('site.includes.callback-questions-form-front')
  </div>
</section>

@endsection
