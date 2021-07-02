@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">Реквiзити</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check">Реквiзити</div>
</div>

<section class="bank-property">
  <div class="mcontainer">
    <div class="prop-item-wrapper">
      <p class="visible-viewportchecker visibility--check"><span class="important-info">ЕГРПОУ:</span> 32934592 </p>
      <p class="visible-viewportchecker visibility--check"><span class="important-info">КОАТУУ:</span> 2310137200 </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="important-info">Юридический адрес:</span> 
        69035, Запорожская обл., город Запорожье, Вознесеновский район, улица Сталеваров, дом 1. 
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="important-info">Перечень услуг, предоставляемых учреждением:</span>
        предоставление средств взаймы, в том числе и на условиях финансового кредита.
      </p>
      <p class="visible-viewportchecker visibility--check">
        Власники істотної участі (в тому числі особи, які здійснюють контроль за фінансовою установою, 
        та інші пов'язані особи фінансової установи):
      </p> 
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        <span class="important-info">Климчук Петро Миколайович:</span>
      </p>
      <p class="visible-viewportchecker visibility--check">Розмір внеску до статутного фонду (грн.): 5000160.00</p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        <span class="important-info">ТОВ "КЛИМКО" :</span>
      </p>
      <p class="visible-viewportchecker visibility--check">Код ЄДРПОУ засновника: 41828158</p>
      <p class="visible-viewportchecker visibility--check">Адреса засновника: 69035, Запорізька обл., місто Запоріжжя, Вознесенівський район, ВУЛИЦЯ СТАЛЕВАРІВ, будинок 1</p>
      <p class="visible-viewportchecker visibility--check">Розмір внеску до статутного фонду (грн.): 4979326.00</p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        <span class="important-info">ТОВ "АН-НІКА":</span>
      </p>
      <p class="visible-viewportchecker visibility--check">Код ЄДРПОУ засновника: 41771044</p>
      <p class="visible-viewportchecker visibility--check">Адреса засновника: 69035, Запорізька обл., місто Запоріжжя, Вознесенівський район, ВУЛИЦЯ СТАЛЕВАРІВ, будинок 1</p>
      <p class="visible-viewportchecker visibility--check">Розмір внеску до статутного фонду (грн.): 437514.00</p>

    </div>
  </div>
</section>

<section class="document-form"> 
  <div class="mcontainer">
    <div class="shell-form form-document-list">
      <span class="icon-bg-line"></span>
      <div class="title visible-viewportchecker visibility--check">Перелiк документiв</div>
      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Аудиторський висновок 2015 рік</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Фінансова звітність за 2016 рік</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Довідка про фінансове положення 2016 року</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Аудиторський висновок за 2016 рік</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Фінансова звітність за 2017 рік</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Розпорядження про надання ліцензії фінансової установи</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Управлінський звіт 2018 рік</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Аудиторський висновок за 2018 рік</p> 
      </a>

      <a href="#" download class="document-item visible-viewportchecker visibility--check">
        <span class="icon-file"></span>
        <p>Фінансова звітність за 2018 рік</p> 
      </a>
    </div>
  </div>
</section>

<section class="requisite-callback-form visible-viewportchecker visibility--check">
  <div class="mcontainer">
    @include('includes.callback-questions-form-front')
  </div>
</section>
@endsection
