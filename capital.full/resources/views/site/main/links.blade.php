<?php
/* @var \App\Models\Admin\Link[] $links */
?>

@extends('site.layouts.app')


@section('content')
  <div id="homePage" class="homePage page page-links">
    <section class="pageSection white-bg">
      <div class="mcontainer">
        <div class="links-section">
        @foreach($links as $link)
          <div class="link-btn">
            <a href="{{$link->url}}">{{ $link['title_'.$locale] }}</a>
          </div>
        @endforeach
        </div>
      </div>
    </section>
  </div>
@endsection

