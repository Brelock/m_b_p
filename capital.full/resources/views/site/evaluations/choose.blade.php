@extends('site.layouts.app')

@section('content')
    <div id="feedbackPage" class="feedbackPage page">
        <section class="pageSection pageSection--big-padding white-bg">
            <div class="mcontainer">
                <div class="content-container ">
                    <div class="feedback-reviews flex justifyCenter">
                        <div class="feedback-review-item">
                          <a href="{{ route('departments.goodEvaluation', ['office' => $office]) }}" class="feedback-review-item__link">
                            <div class="feedback-review-item__img-container">
                              <img src="{{ asset('img/icons/like_icon.svg')}}" alt="" class="feedback-review-item__img">
                            </div>
                            <span class="feedback-review-item__descr">{{ trans('main.good') }}</span>
                          </a>
                        </div>
        
                        <div class="feedback-review-item">
                          <a href="{{ route('departments.evaluate', ['office' => $office, 'request' => $request]) }}" class="feedback-review-item__link">
                            <div class="feedback-review-item__img-container feedback-review-item__img-container--bad">
                              <img src="{{ asset('img/icons/like_icon.svg')}}" alt="" class="feedback-review-item__img">
                            </div>
                            <span class="feedback-review-item__descr">{{ trans('main.sad') }}</span>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection