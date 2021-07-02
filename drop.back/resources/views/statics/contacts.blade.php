<?php
/** @var App\Models\StaticPage $contacts */
/** @var App\Models\StaticPage $schedule */
/** @var App\Models\StaticPage $pickUp */
?>
@extends('layouts.app')

@section('content')
  <div id="contactPage" class="contactPage page">
    <div class="mcontainer">
      <div class="breadcrumbs">
        <ul class="breadcrumbs-wrap">
          <li class="breadcrumbs-link"><a href="/">Главная</a></li>
          <li class="breadcrumbs-link active-link"><a href="#">Контакты</a></li>
        </ul>
      </div>

      <div class="page-title">{{ $contacts->title }}</div>
      <div class="contact-table-wrap">
        {!! $contacts->description !!}
      </div>

      <div class="additional-contact-section get-section flex">
        <div class="additional-section">
          <div class="additional-content">
            <div class="additional-title">{{ $schedule->title }}</div>
            {!! $schedule->description !!}
          </div>
        </div>
        <div class="additional-section">
          <div class="additional-content">
            <div class="additional-title">{{ $pickUp->title }}</div>
            {!! $pickUp->description !!}
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection