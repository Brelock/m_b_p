<?php
/* @var \App\Models\Project $project */
?>

@extends('layouts.app')

@section('content')
  <div id="projectPageItem" class="projectPageItem page">
    @include('layouts.header.header')
    <div class="wrap-title">{{ resourceGet($project, ['title_'.$locale])}}</div>
    <div class="breadcrumbs">
      <ul class="breadcrumbs-wrap">
        <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
        <li class="breadcrumbs-link"><a href="{{ route('projects.index') }}">{{ __('header.our_work') }}</a></li>
        <li class="breadcrumbs-link active-link"><a href="#">{{ resourceGet($project, ['title_'.$locale]) }}</a></li>
      </ul>
    </div>

    <div class="project-item">
      <div class="project-item__slider">
        <div class="slider-for pattern">
          @foreach(resourceGet($project, 'pictures', []) as $picture)
            <img src="{{ resourceFilledOutGet($picture, 'full_link') }}" alt="" class="lazyLoading_js">
          @endforeach
        </div>
        <div class="slider-nav">
          @foreach(resourceGet($project, 'pictures', []) as $picture)
            <img src="{{ resourceFilledOutGet($picture, 'full_link') }}" class="actived-img" alt="">
          @endforeach
        </div>
        <div class="arrows">
          <ul>
            <li class="prev"></li>
            <li class="next"></li>
          </ul>
        </div>
      </div>
      <div class="project-item__info">
        <div class="project-item__info-parameter">
          <div class="el-parameter">
            <p class="el-parameter__title visible-viewportchecker visibility--check">{{ __('project.address') }}</p>
            <p class="el-parameter__context visible-viewportchecker visibility--check">{{ resourceGet($project, 'address') }}</p>
          </div>
          @if(resourceGet($project, 'options'))
            <div class="el-parameter">
              <p class="el-parameter__title visible-viewportchecker visibility--check">{{ __('project.specifications') }}</p>
              <div class="el-parameter__context visible-viewportchecker visibility--check">{!! resourceGet($project, 'options') !!}</div>
            </div>
          @endif
          <div class="el-parameter">
            <p class="el-parameter__title visible-viewportchecker visibility--check">{{ __('project.commissioning') }}</p>
            <p class="el-parameter__context visible-viewportchecker visibility--check">{{ resourceGet($project, 'exploitation') }}</p>
          </div>
        </div>
        <div class="project-item__info-submit visible-viewportchecker visibility--check">
          <a href="{{ route('projects.index') }}">{{ __('project.other_jobs') }}</a>
        </div>
      </div>
    </div>

  </div>

  @include('layouts.footers.no-section-footer')

@endsection