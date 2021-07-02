@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link">Розрахувати кредит</li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link"> Пiд Срiбло </li>
    </ul>
  </div>
</div>

<section class="credit-tab">
  <div class="mcontainer">
    @include('includes.toggle-tab-credits-front')
  </div>
</section>

<div class="wrap-page-credit-calculator">
    <credit-calculator-container
      :active-tab="'showSilver'"
      :show-tabs="false"
    />
</div>

<section class="visible-viewportchecker visibility--check">
  <div class="mcontainer">
      @include('includes.asides-banner-front')
  </div>
</section>

<section class="visible-viewportchecker visibility--check">
  <div class="mcontainer">
      @include('includes.credit-checkpoints-front')
  </div>
</section>

<section class="visible-viewportchecker visibility--check">
  <div class="mcontainer">
      @include('includes.list-credit-documents-front')
  </div>
</section>

<section class="career-callback-form visible-viewportchecker visibility--check visible animated bounceInLeft">
    <div class="mcontainer">
        @include('includes.callback-questions-form-front')
    </div>
</section>

@endsection