@extends('site.layouts.app')

@include('site.includes.meta_tags', array('meta_tags' => $action))

@section('content')

    <!-- Start of page code insertion here -->
    <div id="actionPage" class="actionPage page">

        <section class="pageSection white-bg">
            <div class="mcontainer">

                <div class="sectionBlock">
                    <div class="sectionHeader">
                        <h1 class="title article-title">{{ $action['title_'.$locale] }}</h1>

                        {{ Breadcrumbs::render('actions.show', $action->id) }}

                    </div>
                </div>

                <div class="sectionBlock contentBlock">

                    <?php if ($action->id == 26) { ?>
                        
                        <div class="title actionTitle">До розіграшу головного подарунку залишилось:</div>

                        <div class="downCounterWrap">
                          <div class="row">
                            <div id="container">
                                <div id="knob-countdown" class="hide"></div>
                                <div class="knob-progress">
                                    <div class="progress-count">
                                      <label>
                                        <input type="text" id="countdown-ds"
                                               data-width="100"
                                               data-height="100"
                                               data-max="365"
                                               data-thickness=".06"
                                               data-fgcolor="#de1f18"
                                               data-bgcolor="rgba(0,0,0, .0)"
                                               data-min="0"
                                               class="knob"
                                               data-readonly="true" />
                                      </label>
                                    </div>
                                    <div class="progress-count">
                                      <label>
                                        <input type="text" id="countdown-hr"
                                               data-width="100"
                                               data-height="100"
                                               data-max="24"
                                               data-thickness=".06"
                                               data-fgcolor="#de1f18"
                                               data-bgcolor="rgba(0,0,0, .0)"
                                               data-min="0"
                                               class="knob"
                                               data-readonly="true" />
                                      </label>
                                    </div>
                                    <div class="progress-count">
                                      <label>
                                        <input type="text" id="countdown-min"
                                               data-width="100"
                                               data-height="100"
                                               data-max="60"
                                               data-thickness=".06"
                                               data-fgcolor="#de1f18"
                                               data-bgcolor="rgba(0,0,0, .0)"
                                               data-min="0"
                                               class="knob"
                                               data-readonly="true" />
                                      </label>
                                    </div>
                                    <div class="progress-count">
                                      <label>
                                          <input type="text" id="countdown-sec"
                                                 data-width="100"
                                                 data-height="100"
                                                 data-max="60"
                                                 data-thickness=".06"
                                                 data-fgcolor="#de1f18"
                                                 data-bgcolor="rgba(0,0,0, .0)"
                                                 data-min="0"
                                                 class="knob"
                                                 data-readonly="true" />
                                          </label>
                                    </div>
                                </div>
                            </div>
                            <div class="suptitleCounter">
                              <span class="count-supTitle">днів</span>
                              <span class="count-supTitle"> годин</span>
                              <span class="count-supTitle"> хвилин</span>
                              <span class="count-supTitle"> секунд</span>
                            </div>
                          </div>
                        </div>

                        <div class="grandGiftBanner">
                          <div class="contentBannerGift">
                            <div class="left-cont-gift">
                              <img src="/img/new_drawing_title.png" alt="">
                            </div>
                            <div class="right-cont-gift">
                              <video autoplay muted playsinline loop class="video-banner" id="video" onloadedmetadata="this.muted = true" width="100%" height="100%">
                                <source type="video/mp4" autoplay="" src="/img/gold.mp4"> 
                              </video>
                            </div>
                          </div>
                          <div class="backgroundMatte"></div>
                        </div>

                        <div class="inner-container">
                          <div class="innerTopBanner">
                            <h4>щомісяця</h4>
                            <img class="hundred" src="/img/100@1X.png" alt="">
                            <h3>подарунків</h3>
                          </div>
                          <div class="ofTheDate"></div>
                          <div class="animate__arrow"></div>
                          <div class="wrapPromotionalOffers">
                            <div class="promotionalOffers-title">подарунковий фонд акції</div>
                            <div class="positioningSandwich">
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-gold.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Ювелірний виріб із золота </h3>
                                  <span class="offersCont-suptitle">585 проба, 25 грам</span>
                                  <div class="offerQuantity">3 шт.</div>
                                </div>
                              </div>
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-tv.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Телевізор  </h3>
                                  <span class="offersCont-suptitle">Xiaomi 43”</span>
                                  <div class="offerQuantity">10 шт.</div>
                                </div>
                              </div>
                            </div>
                            <div class="positioningSandwich">
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-phone.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Смартфон</h3>
                                  <span class="offersCont-suptitle">Xiaomi Redmi 9 3/32</span>
                                  <div class="offerQuantity">20 шт.</div>
                                </div>
                              </div>
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-miband.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Фітнес браслет</h3>
                                  <span class="offersCont-suptitle">Mi Band 5</span>
                                  <div class="offerQuantity">40 шт.</div>
                                </div>
                              </div>
                            </div>
                            <div class="positioningSandwich">
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-speaker.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Портативна колонка </h3>
                                  <span class="offersCont-suptitle">JBL Go 2</span>
                                  <div class="offerQuantity">50 шт.</div>
                                </div>
                              </div>
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-acum5.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Мобільна батарея</h3>
                                  <span class="offersCont-suptitle">5 000 mAh</span>
                                  <div class="offerQuantity">25 шт.</div>
                                </div>
                              </div>
                            </div>
                            <div class="positioningSandwich">
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-acum10.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Мобільна батарея</h3>
                                  <span class="offersCont-suptitle">10 000 mAh</span>
                                  <div class="offerQuantity">50 шт.</div>
                                </div>
                              </div>
                              <div class="itemPromotionalOffers">
                                <div class="imgCont">
                                  <img src="/img/offers-certificate.png" alt="">
                                </div>
                                <div class="offersCont">
                                  <h3 class="offersCont-title">Сертифікати</h3>
                                  <span class="offersCont-suptitle">магазину “Цитрус” на 250 грн.</span>
                                  <div class="offerQuantity">102 шт.</div>
                                </div>
                              </div>
                            </div> 
                          </div>
                        </div>

                    <?php } else { ?>
                        <div class="contentRow relative">
                            @if(!empty($action->wide_photo))
                            <div class="main-image imgWrapper">
                                <img src="{{ '/storage/images/action/'.$action->wide_photo }}" alt="img">
                            </div>
                            @endif
                        </div>                        
                        @include('site.includes.share')
                    <?php } ?>




                    <div class="contentRow">
                        {{--<h2 class="title">{{ __('main.from') }} {{ \Jenssegers\Date\Date::parse($action->start_at)->format('d F ') }} {{ __('main.to') }} {{ \Jenssegers\Date\Date::parse($action->finish_at)->format('d F Y') }}</h2>--}}
                        @if($action->start_at or $action->finish_at)
                            <h2 class="title">
                                @if($action->start_at)
                                    {{ __('main.from') }} {{ \Jenssegers\Date\Date::parse($action->start_at)->format('d F ') }}
                                @endif
                                @if($action->finish_at)
                                    {{ __('main.to') }} {{ \Jenssegers\Date\Date::parse($action->finish_at)->format('d F ') }}
                                @endif
                            </h2>
                        @endif
                        {{--<h2 class="title">--}}
                            {{--{{ __('main.from') }} {{ \Jenssegers\Date\Date::parse($action->start_at)->format('d F ') }} {{ __('main.to') }} {{ \Jenssegers\Date\Date::parse($action->finish_at)->format('d F Y') }}--}}
                        {{--</h2>--}}
                        <div class="description wysiwyg mcol-xs-12 mcol-md-7">
                            {!! $action['description_'.$locale] !!}
                        </div>
                    </div>

                    @isset($action->link)
                    <div class="contentRow">
                        <h3 class="title">{{ __('main.action_conditions') }}</h3>
                            <a href="{{ $action->link }}" target="_blank" class="link-with-icon"><i class="icomoon icon-link"></i> <span>@if($action->link_title) {{ $action->link_title }}  @else {{ 'https://www.youtube.com/' }} @endif</span></a>
                    </div>
                    @endisset

                    <div class="contentRow images-row mrow flex wrap ">
                        @forelse($action->images as $image)
                        <div class="imgWrapper mcol-xs-6 mcol-sm-4 mcol-md-3">
                            <a class="colorbox" href="{{ '/storage/images/action/'.$image->path }}" data-rel="group{{$loop->iteration}}">
                                <img src="{{ '/storage/images/action/'.$image->path }}" alt="img">
                            </a>
                        </div>
                            @empty
                        @endforelse
                    </div>
                </div>

                <div class="sectionBlock">

                    @include('site.includes.calculate_button')

                </div>
            </div>
        </section>
    </div>

    <!-- End of page code insertion here -->
@endsection
