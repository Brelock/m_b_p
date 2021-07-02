@extends('site.layouts.index')
@include('site.includes.meta_tags', array('meta_tags' => $page))
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ $page['title_'.$locale] or trans('main.about_us') }}</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ $page['title_'.$locale] or trans('main.about_us') }}</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
      <div class="banner visible-viewportchecker visibility--check hidden">
      <img src="{{ asset('storage/images/page/'.$page->image) }}" alt="{{ $page->title_ru or '' }}">
    </div>
    <div class="sup-title visible-viewportchecker visibility--check hidden">
        {!! $page['description_'.$locale] !!}
    </div>
  </div>
</section>

<section class="pictorial-section">
    <div class="mcontainer">
        @include('site.includes.pictorial-value-front')
    </div>
</section>

<section class="advantages-section">
    <div class="mcontainer">
        @include('site.includes.advantages-company-front')
    </div>
</section>

<section class="common-questions">
    <div class="mcontainer">
        @include('site.includes.common-questions-front')
    </div>
</section>

@endsection