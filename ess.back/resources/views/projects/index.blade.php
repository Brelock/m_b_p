<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\Project[]|\Illuminate\Support\Collection $projects */
?>

@extends('layouts.app')

@section('content')
  <div id="projectPage" class="projectPage page">
    @include('layouts.header.header')
    <div class="wrap-title">{{ __('header.our_work') }}</div>
    <div class="breadcrumbs">
      <ul class="breadcrumbs-wrap">
        <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
        <li class="breadcrumbs-link active-link"><a href="#">{{ __('header.our_work') }}</a></li>
      </ul>
    </div>
    <div class="container-slide">
      <div class="project-items-wrap flex flexbox-slider flexbox-slider-1">

        @foreach($projects as $i=>$project)
          <div class="project-column flex">
            <div class="flexbox-slide">
              <a href="{{ resourceGet($project, 'routeShow')}}">
                @if($mainPicture = resourceGet($project, 'mainPicture'))
                  <img src="{{ resourceFilledOutGet($mainPicture, 'full_link') }}" alt=""></a>
                @endif
              <div class="slider-link-wrap visible-viewportchecker visibility--check">
                <span class="visible-viewportchecker visibility--check">
                    {{count($projects) - $i}}
                </span>
                <a href="{{ resourceGet($project, 'routeShow')}}"
                   class="slider-link__content visible-viewportchecker visibility--check">{{ resourceGet($project, 'title')}}</a>
                <a href="{{ resourceGet($project, 'routeShow')}}" class="slider-link__befored"></a>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>

  </div>

  @include('layouts.footers.no-section-footer')

@endsection