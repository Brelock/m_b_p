@extends('site.layouts.index')
@include('site.includes.meta_tags', array('meta_tags' => $action))
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
       <li class="breadcrumbs-link"><a href="{{ route('actions') }}">{{ __('main.actions') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ $action['title_'.$locale] }}</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ $action['title_'.$locale] }}</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
    <div class="banner visible-viewportchecker visibility--check hidden">
      @if(!empty($action->wide_photo))
        <img src="{{ '/storage/images/action/'.$action->wide_photo }}" alt="img">
      @endif
    </div>
    <div class="wrap-description">
      <p class="data-news visible-viewportchecker visibility--check hidden">
        @if($action->start_at)
          {{ trans('main.from') }} {{ \Jenssegers\Date\Date::parse($action->start_at)->format('d F') }}
        @endif
        @if($action->finish_at)
          {{ trans('main.to') }} {{ \Jenssegers\Date\Date::parse($action->finish_at)->format('d F Y') }}
        @endif
      </p>
       <div class="visible-viewportchecker visibility--check hidden">
          {!! $action['description_'.$locale] !!}
      </div>
    </div>
  </div>
</section>

<section class="popular-news">
  <div class="mcontainer">
      <div class="title visible-viewportchecker visibility--check hidden">{{ trans('main.other_actions') }}</div>
      <div class="wrapper-news">

        @forelse($moreAction as $moreActionItem)
        <div class="el-card visible-viewportchecker visibility--check hidden">
          <div class="content-card">
            <div class="el-img">
              <img src="{{ '/storage/images/action/'. $moreActionItem->photo }}" alt="">
            </div>
            @if($moreActionItem->start_at or $moreActionItem->finish_at)
              <div class="el-data">
              {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
                <p class="el-season">
                  @if($moreActionItem->start_at)
                    c {{ \Jenssegers\Date\Date::parse($moreActionItem->start_at)->format('d F') }}
                  @endif
                  @if($moreActionItem->finish_at)
                    по {{ \Jenssegers\Date\Date::parse($moreActionItem->finish_at)->format('d F Y') }}
                  @endif

                </p>
              </div>
            @endif
            <div class="el-title">{{ $moreActionItem['title_'.$locale] }}</div>
            <div class="el-description">
              {!! str_limit(strip_tags($moreActionItem['description_'.$locale]), 80, ' ...') !!}
            </div>

            <a href="{{ route('actions.show', ['actions' => $moreActionItem->alias]) }}" class="link-news">
              <div class="btn-link">
                <span>{{ trans('main.details') }}</span>
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

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('site.includes.callback-questions-form-front')
  </div>
</section>

@endsection
