@extends('layouts.app')

@section('content')

  <div id="contactPage" class="contactPage page">
    <div class="contact-page-wrap">
      <div class="contact-page-body-wrap">
        @include('layouts.header.header')
        <div class="wrap-title">User Agreement</div>
        <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">User Agreement</a></li>
          </ul>
        </div>

        @include('layouts.footers.footer')
    </div>
  </div>


  <div class="overlay__hide"></div

@endsection