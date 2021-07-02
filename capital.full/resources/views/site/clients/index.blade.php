@extends('site.layouts.app')

@include('site.includes.meta_tags')

@section('content')

    <!-- Start of page code insertion here -->
    <div id="clientsInfoList" class="clientsInfoList page">

        <section class="pageSection white-bg">
            <div class="mcontainer">

                <div class="sectionBlock sectionHeader">
                    <div class="animated-border-block section-title sectionHeaderItem">
                        <div class="svg-container">
                            <svg class="rect-container">
                                <rect x="0" y="0" class="animatedBlock"/>
                                <rect x="0" y="0" stroke-width="4" class="overlappingBlock"/>
                            </svg>
                            <h1 class="title">{{ __('main.for_clients') }}</h1>
                        </div>
                    </div>

                    {{ Breadcrumbs::render('clients') }}

                </div>

                <div class="sectionBlock">
                    <div class="clients-info-list mrow flex wrap">
                        @if(isset($promos))
                            @foreach($promos as $promo)

                                <article class="clients-item mcol-xs-12 mcol-md-4">
                                    <div class="item-container flex column">
                                        <div class="imgWrapper relative more-button overlayed">
                                            <a href="{{ route('promo.show',  $promo->alias) }}" class="absolute stretch overlay-link"></a>
                                            <div class="darkOverlay"></div>

                                            <div class="more-button-wrapper">
                                                <div class="more-button-container">
                                                    <a href="{{ route('promo.show',  $promo->alias) }}" class="title semi-bold">{{ __('main.details') }}</a>
                                                    <i class="icomoon standard-arrow-icon"></i>
                                                </div>
                                            </div>

                                            @if($locale == 'ru')
                                                <img src="{{ '/storage/images/promo/'.$promo['client_photo'] }}" alt="action">
                                            @endif

                                            @if($locale == 'uk')
                                                <img src="{{ '/storage/images/promo/'.$promo["client_photo_$locale"] }}" alt="action">
                                            @endif

                                        </div>

                                        <div class="description-container flex column">
                                            <h2 class="title article-title"><a href="{{ route('promo.show',  $promo->alias) }}">{{ $promo['title_'.$locale] }}</a></h2>
                                            <div class="description">
                                                <p class="">
                                                    {!! substr(strip_tags($promo['description_'.$locale]), 0, strrpos(substr(strip_tags($promo['description_'.$locale]), 0, 300), ' ')); !!} ...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                            @endforeach
                        @endif
                        @if(isset($clients))

                            @foreach($clients as $client)
                                <article class="clients-item mcol-xs-12 mcol-md-4">
                                    <div class="item-container flex column">
                                        <div class="imgWrapper relative more-button overlayed">
                                            <a href="{{ route('clients.show',  $client->alias) }}" class="absolute stretch overlay-link"></a>
                                            <div class="darkOverlay"></div>

                                            <div class="more-button-wrapper">
                                                <div class="more-button-container">
                                                    <a href="{{ route('clients.show',  $client->alias) }}" class="title semi-bold">{{ __('main.details') }}</a>
                                                    <i class="icomoon standard-arrow-icon"></i>
                                                </div>
                                            </div>

                                            <img src="{{ '/storage/images/client/'. $client->photo }}" alt="action">
                                        </div>

                                        <div class="description-container flex column">
                                            <h2 class="title article-title"><a href="{{ route('clients.show',  $client->alias) }}">{{ $client['title_'.$locale] }}</a></h2>
                                            <div class="description">
                                                <p class="">
                                                    {{--{!! mb_strimwidth(strip_tags($client['description_'.$locale]), 0, 155) !!} ...--}}
                                                    {{--{!! mb_strimwidth(strip_tags($client['description_'.$locale]), 0, 155) !!} ...--}}
                                                    {!! substr(strip_tags($client['description_'.$locale]), 0, strrpos(substr(strip_tags($client['description_'.$locale]), 0, 300), ' ')); !!} ...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                        @if (!isset($promos) and !isset($clients))
                            Нет записей!
                        @endif

                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- End of page code insertion here -->

@endsection