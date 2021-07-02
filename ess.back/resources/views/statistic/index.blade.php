
@extends('layouts.app')

@section('content')
  <div class="mainWrapper">
    <div class="contentWrapper static-header">
    @include('layouts.header.header')
      <div id="analitics" class="statisticPage page">
          <div class="mcontainer">
            <div class="wrap-content-statistic">
              <div class="top-section-statistic">
                <div class="statistic-title">{{ __('statistic-page.thanks') }}</div>
                <div class="statistic-suptitle"> {{ __('statistic-page.description') }} </div>
              </div>
              <div class="bg-img-statistic">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/sun_ess.svg') }}" alt="">
              </div>
            </div>
        </div>
      </div>
    </div>
    @include('layouts.footers.footer')
  </div>
@endsection