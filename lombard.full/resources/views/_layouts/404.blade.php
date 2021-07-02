@extends('site.layouts.index')

@section('content')
    <div class="mcontainer">
        <div class="wrapper-error-contant">
            <div class="title-error">
                <p>{{ trans('main.not_found1') }}</p>
                <p>{{ trans('main.not_found2') }}</p>
            </div>

            <div class="banner-er">
                <img src="/img/er-banner.png" alt="">
            </div>

            <div class="to-back">
                <a href="{{ route('site.home') }}">{{ trans('main.back_to_main') }}</a>
            </div>
        </div>
    </div>

@endsection