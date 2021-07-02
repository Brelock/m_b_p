@extends('site.layouts.index')
@include('site.includes.meta_tags')
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ __('main.actions') }}</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ __('main.actions') }}</div>
</div>

<section class="news-directory">
  <div class="mcontainer">
    <div class="wrapper-news">
      @forelse($actions as $action)
      <div class="el-card visible-viewportchecker visibility--check hidden">
        <div class="content-card">
          <div class="el-img">
            <img src="{{ '/storage/images/action/'. $action->photo }}" alt="">
          </div>
          @if($action->start_at or $action->finish_at)
          <div class="el-data">
              {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
              <p class="el-season">
                @if($action->start_at)
                  {{ trans('main.from') }} {{ \Jenssegers\Date\Date::parse($action->start_at)->format('d F') }}
                @endif
                @if($action->finish_at)
                  {{ trans('main.to') }} {{ \Jenssegers\Date\Date::parse($action->finish_at)->format('d F Y') }}
                @endif

              </p>
          </div>
          @endif
          <div class="el-title">{{ $action['title_'.$locale] }}</div>
          <div class="el-description">
            {!! str_limit(strip_tags($action['description_'.$locale]), 80, ' ...') !!}
          </div>
  
          <a href="{{ route('actions.show', ['actions' => $action->alias]) }}" class="link-news">
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



    {{ $actions->appends($request)->links('site.includes.pagination') }}
  </div>

</section>

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('site.includes.callback-questions-form-front')
  </div>
</section>

@endsection
