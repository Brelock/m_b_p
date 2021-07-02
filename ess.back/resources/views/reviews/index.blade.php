<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\Review[] $reviews */
?>


@extends('layouts.app')

@section('content')
  <div class="mainWrapper">
    <div class="contentWrapper static-header">
      <div id="reviewsPage" class="reviewsPage page">
        <div class="top-reviews-slide section">
          @include('layouts.header.header')
          <div class="sunpower-page-wrap-section">
            <div class="wrap-title">{{ __('reviews.name') }}</div>
            <div class="breadcrumbs">
              <ul class="breadcrumbs-wrap">
                <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
                <li class="breadcrumbs-link active-link"><a href="#">{{ __('reviews.name') }}</a></li>
              </ul>
            </div>
          </div>
          <div class="top-reviews-wrap">
            <div class="reviews-title">
              <div class="ess-section-title">{{ __('reviews.about_us') }}<span>{{ __('reviews.about_us') }}</span></div>
            </div>
            <div class="reviews-text-slide">
              <div class="review-quotes"></div>
              <div class="init-text-slide">
                @foreach( $reviews as $i => $review )
                  @if( resourceGet($review, 'type') == 1 )
                    <div class="reviews-text-item">
                      <div class="reviews-text">
                        {{ resourceGet($review, 'text') }}
                      </div>
                      <span class="reviews-author">{{resourceGet($review, 'author_name')}}</span>
                      @if(resourceGet($review, 'work_url'))
                        <div class="ess-section-btn">
                          <a href="{{resourceGet($review, 'work_url')}}">{{ __('reviews.watch_work') }}</a>
                        </div>
                      @endif
                    </div>
                  @endif
                @endforeach
              </div>
              <div class="arrows-reviews">
                <ul>
                  <li class="text-prev"></li>
                  <li class="text-next"></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="video-reviews-slide section">
          <div class="video-review-wraps">
            <div class="reviews-title">
              <div class="ess-section-title">{{ __('reviews.video') }}<span>{{ __('reviews.video') }}</span></div>
            </div>

            <div class="video-review-slide">
              <div class="init-video-slider">
                @foreach( $reviews as $i => $review )
                  @if( resourceGet($review, 'type') == 2 )
                    <div class="reviews-video-item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/{{resourceGet($review, 'video_id')}}" frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen>
                      </iframe>
                      @if(resourceGet($review, 'work_url'))
                        <div class="ess-section-btn">
                          <a href="{{resourceGet($review, 'work_url')}}">{{ __('reviews.watch_work') }}</a>
                        </div>
                      @endif
                    </div>
                  @endif
                @endforeach
              </div>
              <div class="arrows-reviews">
                <ul>
                  <li class="video-prev"></li>
                  <li class="video-next"></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="message-reviews-slide section">
          <div class="message-review-wraps">
            <div class="reviews-title">
              <div class="ess-section-title">{{ __('reviews.messengers') }}<span>{{ __('reviews.messengers') }}</span></div>
            </div>
            <div class="message-review-slide">
              <div class="init-message-slide">
                @foreach( $reviews as $i => $review )
                  @if( resourceGet($review, 'type') == 3 )
                    <div class="reviews-message-item">
                      <a href="{{resourceGet($review, 'backgroundPicture')}}">
                        <img src="{{resourceGet($review, 'backgroundPicture')}}" alt="">
                      </a>
                    </div>
                  @endif
                @endforeach
              </div>
              <div class="arrows-reviews">
                <ul>
                  <li class="m-prev"></li>
                  <li class="m-next"></li>
                </ul>
              </div>
            </div>

          </div>
          @include('layouts.footers.footer')
        </div>
      </div>

    </div>
  </div>

@endsection