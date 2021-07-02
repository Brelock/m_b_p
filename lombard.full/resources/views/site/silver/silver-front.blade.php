@extends('site.layouts.index')
@include('site.includes.meta_tags')
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link">{{ trans('main.calculate_credit') }}</li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ trans('main.bail_silver') }}</li>
    </ul>
  </div>
</div>

<section class="credit-tab">
  <div class="mcontainer">
    @include('site.includes.toggle-tab-credits-front')
  </div>
</section>

<div class="wrap-page-credit-calculator">
    <credit-calculator-container
      :active-tab="'showSilver'"
      :show-tabs="false"
    />
</div>

<section class="visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
      @include('site.includes.asides-banner-front')
  </div>
</section>

<section class="visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
      @include('site.includes.credit-checkpoints-front')
  </div>
</section>

<section class="visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
      @include('site.includes.list-credit-documents-front')
  </div>
</section>

<section class="career-callback-form visible-viewportchecker visibility--check visible animated bounceInLeft">
    <div class="mcontainer">
        @include('site.includes.callback-questions-form-front')
    </div>
</section>

@endsection