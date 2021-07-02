@extends('site.layouts.index')
@include('site.includes.meta_tags')
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ __('main.news') }} </li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ __('main.news') }}</div>
</div>

<section class="news-directory">
  <div class="mcontainer">
    <div class="wrapper-news">
      @forelse($news as $newsItem)
      <div class="el-card visible-viewportchecker visibility--check hidden">
        <div class="content-card">
          <div class="el-img">
            @isset($newsItem->image_small)
              <img src="{{ '/storage/images/news/'.$newsItem->image_small }}" alt="{{ $newsItem->title_ru }}">
              @elseif($newsItem->image)
                <img src="{{ '/storage/images/news/thumbnails/'.$newsItem->image }}" alt="{{ $newsItem->title_ru }}">
              @else
                <img src="{{ asset('img/no_image_news.jpg') }}" alt="{{ $newsItem->title_ru }}">
                @endisset
          </div>
          <div class="el-data">
              {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
              <p class="el-season">{{ \Jenssegers\Date\Date::parse($newsItem->date)->format('d F Y') }}</p>
          </div>
          <div class="el-title">{{ html_entity_decode($newsItem['title_'.$locale]) }}</div>
          <div class="el-description">
            {!! str_limit(strip_tags($newsItem['description_'.$locale]), 80, ' ...') !!}
          </div>
  
          <a href="{{ route('news.show',  $newsItem->alias) }}" class="link-news">
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



    {{ $news->appends($request)->links('site.includes.pagination') }}
  </div>

</section>

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('site.includes.callback-questions-form-front')
  </div>
</section>

@endsection
