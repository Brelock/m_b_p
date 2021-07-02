<?php
/* @var \App\Models\FileUnload[] $fileUploadsXml */
/* @var \App\Models\FileUnload[] $fileUploadsXls */
?>
@extends('layouts.app')

@section('content')

<div id="unloadingPage" class="unloadingPage page">
  <div class="mcontainer">
    <div class="breadcrumbs">
      <ul class="breadcrumbs-wrap">
        <li class="breadcrumbs-link"><a href="/">Главная</a></li>
        <li class="breadcrumbs-link active-link"><a href="#">Выгрузки</a></li>
      </ul>
    </div>
    <div class="page-title">Выгрузки</div>

    <div class="unloading-table-wrap">
      <div class="unloading-table-head unloading-section flex">
        <div class="th">Маркет</div>
        <div class="th">Icon</div>
        <div class="th">Название</div>
        <div class="th">Кол-во</div>
        <div class="th">Коментарий</div>
        <div class="th">Кнопка</div>
      </div>
      @include('xml.index')
      @include('xls.index')
    </div>

    @include('subscription.index')
  </div>
</div>

@endsection
