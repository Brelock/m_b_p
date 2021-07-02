@extends('site.layouts.app')

@section('content')
    <div id="feedbackPage" class="feedbackPage page">
        <section class="pageSection pageSection--big-padding white-bg">
            <div class="mcontainer">
              <div class="content-container ">
                <div class="img-container flex justifyCenter sectionBlock">
                  <div class="imgWrapper">
                    <img src="{{ asset('img/icons/wink--green.svg') }}" alt="wink">
                  </div>
                </div>
                <p class="text sectionBlock">{{ __('main.good_answer') }}</p>
              </div>
            </div>          
        </section>
    </div>
@endsection