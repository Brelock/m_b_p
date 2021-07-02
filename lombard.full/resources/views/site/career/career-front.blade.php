@extends('site.layouts.index')
@include('site.includes.meta_tags', array('meta_tags' => $page))
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ $page['title_'.$locale] or trans('main.career') }}</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ $page['title_'.$locale] or trans('main.career') }}</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
    <div class="banner visible-viewportchecker visibility--check hidden">
      <img src="{{ asset('storage/images/page/'.$page->image) }}" alt="{{ $page->title_ru or '' }}">
    </div>
    <div class="visible-viewportchecker visibility--check hidden">
        {!! $page['description_'.$locale] !!}
    </div>
  </div>
</section>

<section class="vacancies-form">
  <div class="mcontainer">
    <div class="common-questions-wrap-list shell-form">
      <div class="title visible-viewportchecker visibility--check hidden">{{ trans('main.vacancies_of_the_company') }}</div>

      @forelse($vacancies as $vacanci)
      <div class="questions-item visible-viewportchecker visibility--check hidden">
        <div class="header-item vacancies-header">
          <div class="name-vacancies">{{$vacanci->name}}</div>
          <div class="region-vacancies">{{$citiesArray[$vacanci->cityId]}}</div>
          <div class="rate-vacancies">@if($vacanci->salary){{$vacanci->salary}} грн@endif</div>

        </div>
        <div class="info-drop-questions">
          {!! $vacanci->description !!}

        <div class="get-summary">
          <label>

            <a href="https://rabota.ua/company3358929/vacancy{{ $vacanci->id }}" target="_blank"><span>{{ trans('main.send_resume') }}</span></a>
          </label>
        </div>
        </div>
        <div class="icon-wrap-block">
          <span class="icon-questions-plus"></span>
        </div>
      </div>
      @empty
        Нет записей!
      @endforelse
    </div>
  </div>
</section>

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('site.includes.callback-questions-form-front')
  </div>
</section>

@endsection




