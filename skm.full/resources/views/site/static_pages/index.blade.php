@extends('site.layouts.app')

@section('title', $page->title)

@section('content')

    <!-- Start of page code insertion here -->
    <div id="staticPage" class="staticPage page">
        <div class="page-container">
            <div class="page-content-container">
                <div class="mcontainer">
                    <div class="static-page-content">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>
        @include('site.includes.footer-nav-menu')
    </div>

@endsection
