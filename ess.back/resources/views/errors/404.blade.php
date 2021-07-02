@extends('layouts.app')
@section('content')
  <div id="errorPage" class="errorPage-404 page">
    <div class="error-wrap-section">
      <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/404_foto.jpg') }}" alt="">
      <div class="wrap-error-content">
        <div class="error__title">{{ __('page-404.page_was_not_found') }}.</div>
        <div class="error__error-num">404</div>
        <div class="error__btn">
          <a href="{{ route('site.home') }}" class="error-btn">{{ __('page-404.on_main') }}</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  @include('layouts.footers.footer')

@endsection