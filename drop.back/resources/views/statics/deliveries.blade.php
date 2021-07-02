<?php
/** @var App\Models\StaticPage $payment */
/** @var App\Models\StaticPage $schedule */
/** @var App\Models\StaticPage $delivery */
/** @var App\Models\StaticPage $pickUp */
?>
@extends('layouts.app')

@section('content')
  <div id="deliveryPage" class="deliveryPage page">
    <div class="mcontainer">
      <div class="breadcrumbs">
        <ul class="breadcrumbs-wrap">
          <li class="breadcrumbs-link"><a href="/">Главная</a></li>
          <li class="breadcrumbs-link active-link"><a href="#">Доставка и оплата</a></li>
        </ul>
      </div>
      <div class="page-title">Доставка и оплата</div>

      <div class="delivery-section-wrap get-section flex">

        <div class="additional-section">
          <div class="additional-content">
            <div class="additional-title">{{ $payment->title }}</div>
            {!! $payment->description !!}
          </div>
        </div>

        <div class="additional-section">
          <div class="additional-content">
            <div class="additional-title">{{ $schedule->title }}</div>
            {!! $schedule->description !!}
          </div>
        </div>

        <div class="additional-section">
          <div class="additional-content">
            <div class="additional-title">{{ $delivery->title }}</div>
            {!! $delivery->description !!}
          </div>
        </div>

        <div class="additional-section">
          <div class="additional-content">
            <div class="additional-title">{{ $pickUp->title }}</div>
            {!!  $pickUp->description!!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection