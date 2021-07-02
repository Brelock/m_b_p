@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">Про нас </li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">Про нас</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
    <div class="banner visible-viewportchecker visibility--check hidden">
      <img src="/img/about-top-banner.png" alt="">
    </div>
    <div class="sup-title visible-viewportchecker visibility--check hidden">
      <p> Євроломбард – національна мережа ломбардів. Більше 20 відділень по всій країні.</p>
      <p> Вже 10 років надаємо фінансову підтримку у кредитуванні. 
          На кращих умовах і з надійним сервісом. 
          Понад 1 000 000 задоволених клієнтів.</p>
    </div>
  </div>
</section>

<section class="pictorial-section">
    <div class="mcontainer">
        @include('includes.pictorial-value-front')
    </div>
</section>

<section class="advantages-section">
    <div class="mcontainer">
        @include('includes.advantages-company-front')
    </div>
</section>

<section class="common-questions">
    <div class="mcontainer">
        @include('includes.common-questions-front')
    </div>
</section>

@endsection