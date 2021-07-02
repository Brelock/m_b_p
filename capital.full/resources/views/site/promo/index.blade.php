@extends('site.layouts.app')

@include('site.includes.meta_tags', ['meta_tags' => $promo])

@section('content')

    <!-- Start of page code insertion here -->
    <div id="promoPage" class="promoPage page">

        <section class="pageSection white-bg">
            <div class="mcontainer">

                <div class="sectionBlock headerBlock">
                    <div class="sectionHeader">
                        <div class="animated-border-block section-title sectionHeaderItem">
                            <div class="svg-container">
                                <svg class="rect-container">
                                    <rect x="0" y="0" class="animatedBlock"/>
                                    <rect x="0" y="0" stroke-width="4" class="overlappingBlock"/>
                                </svg>
                                <h1 class="title">{{ $promo['title_'.$locale] }}</h1>
                            </div>
                        </div>

                        {{ Breadcrumbs::render('promo.show', $promo->id) }}
                    </div>
                </div>

                <div class="flex wrap">

                    <div id="contentBlock" class="content-block mcol-xs-12 mcol-md-9">
                        <div class="content-container">
                            <div class="banner-block sectionBlock">
                                @if($locale == 'ru')
                                    @isset( $promo['wide_photo'] )
                                        <img src="{{ '/storage/images/promo/'.$promo['wide_photo'] }}" alt="banner">
                                    @else
                                        <img src="{{ asset('img/no_image_news.jpg') }}" alt="img">
                                    @endisset
                                @endif
                                @if($locale== 'uk')
                                    @isset( $promo["wide_photo_$locale"] )
                                        <img src="{{ '/storage/images/promo/'.$promo["wide_photo_$locale"] }}" alt="banner">
                                    @else
                                        <img src="{{ asset('img/no_image_news.jpg') }}" alt="img">
                                    @endisset
                                @endif


                            </div>

                            <div class="description-section sectionBlock">
                                <div class="description">
                                    <p>{!! $promo['description_'.$locale] !!}</p>
                                </div>
                            </div>

                            @isset($promo->link)
                                <div class="more-button credit-button inversed sectionBlock">
                                    <div class="more-button-wrapper">
                                        <div class="more-button-container">
                                            <a href="{{ $promo->link }}" class="title semi-bold">Оцени тут</a>
                                            <i class="icomoon standard-arrow-icon inversed"></i>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>

                    <div class="aside-gallery mcol-xs-12 mcol-md-3 sticky" data-stick-to="contentBlock">
                        <div class="aside-container flex">

                            @foreach( $promos as $promo )
                                <div class="imgWrapper mcol-xs-4 mcol-md-12">
                                    <a href="{{ route('promo.show', ['promo' => $promo->alias]) }}">
                                        @if($locale == 'ru')
                                            <img src="{{ '/storage/images/promo/'.$promo['photo'] }}" alt="banner">
                                        @endif
                                        @if($locale == 'uk')
                                            <img src="{{ '/storage/images/promo/'.$promo["photo_$locale"] }}" alt="banner">
                                        @endif

                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <!-- End of page code insertion here -->

@endsection