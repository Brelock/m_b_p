@extends('site.layouts.index')
@include('site.includes.meta_tags', array('meta_tags' => $page))
@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ trans('main.main') }}</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">{{ $page['title_'.$locale] or trans('main.financial') }}</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">{{ $page['title_'.$locale] or trans('main.financial') }}</div>
</div>

<section class="bank-property">
  <div class="mcontainer">
    <div class="prop-item-wrapper visible-viewportchecker visibility--check hidden">
      {!! $page['description_'.$locale] !!}
    </div>
  </div>
</section>
@if(count($documents))
  <section class="document-form">
    <div class="mcontainer">
      <div class="shell-form form-document-list">
        <span class="icon-bg-line"></span>
        <div class="title visible-viewportchecker visibility--check hidden">{{ trans('main.list_of_documents') }}</div>
        @foreach($documents as $document)
          <a href="{{ route('reports.download', ['document' => $document->path]) }}" class="document-item visible-viewportchecker visibility--check hidden">
            <span class="icon-file"></span>
            <p>{{ $document->title or $document->path }}</p>
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endif




<section class="requisite-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('site.includes.callback-questions-form-front')
  </div>
</section>
@endsection
