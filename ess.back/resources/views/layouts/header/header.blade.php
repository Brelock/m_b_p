<header class="mainHeader">
  <div class="mcontainer">
    <div class="main-header-wrap flex">

      <div class="main-header__left-content">
        <div class="logo-header">
          <a href="{{ route('site.home') }}">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ESS-logo-new.svg') }}" alt="">
          </a>
        </div>
        <div class="header-lang">
          <a class="lang-ua
           @if(LaravelLocalization::getCurrentLocale() == 'uk')
            lang__active
           @endif"
             href="{{ LaravelLocalization::getLocalizedURL('uk', null, [], true) }}">UA</a>
          <a class="lang-ru
            @if(LaravelLocalization::getCurrentLocale() == 'ru')
              lang__active
            @endif"
             href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}">RU</a>
        </div>
      </div>

      <div class="navs-wrap">

        <div class="desktop-nav">
          <ul class="desctop-nav-list">
            <li class="desctop-nav-item"><a class="link {{ Route::is('private-person') ? ' active' : '' }}" href="{{ route('private-person') }}">{{ __('header.for_individuals') }}</a></li>
            <li class="desctop-nav-item"><a class="link {{ Route::is('company') ? ' active' : '' }}" href="{{ route('company') }}">{{ __('header.for_enterprises') }}</a></li>
            <li class="desctop-nav-item"><a class="link {{ Route::is('credit') ? ' active' : '' }}" href="{{ route('credit') }}">{{ __('header.crediting') }}</a></li>
            <li class="desctop-nav-item"><a class="link {{ Route::is('contact') ? ' active' : '' }}" href="{{ route('contact') }}">{{ __('header.contacts') }}</a></li>
          </ul>
        </div>
        <div class="mobile-feedback">
               <a href="tel:0681537303"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/phone-call.svg') }}" alt=""></a>
        </div>
        <div class="feedback-header-desktop feedback-header">
          <div class="feedback-header__phone">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/phone-call.svg') }}" alt="">
            <a href="tel:0681537303">068 153 73 03</a>
          </div>
          <div class="feedback-header__question">
            <button class="feedback-header__btn modal_open_button" type="button"
              data-btn-text="{{ __('header.have_questions') }}?"
              data-form-type="1"
              data-form-target="modal_question_body"
              data-modal-target="modal_question"
            >{{ __('header.have_questions') }}?</button>
          </div>
        </div>
        <div class="nav">
          <div class="menu-btn">
            <div class="line line--1"></div>
            <div class="line line--2"></div>
            <div class="line line--3"></div>
          </div>


          <div class="nav-links">
            <div class="top-section-mobile-menu">
              <div class="mobile-menu__logo-wrap">
                <div class="mobile-menu__logo">
                  <a href="{{ route('site.home') }}"><img
                      src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ESS-logo-new-black.svg') }}" alt=""></a>
                </div>
                <div class="mobile-menu__lang">
                  <a class="lang-ua
                  @if(LaravelLocalization::getCurrentLocale() == 'uk')
                    lang__active
                  @endif"
                     href="{{ LaravelLocalization::getLocalizedURL('uk', null, [], true) }}">UA</a>
                  <a class="lang-ru
                  @if(LaravelLocalization::getCurrentLocale() == 'ru')
                    lang__active
                  @endif"
                     href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}">RU</a>
                </div>
              </div>
              <div class="item-list-wrap">
                <ul class="item-list">
                  <li class="item-menu"><a class="link {{ Route::is('private-person') ? ' active' : '' }}" href="{{ route('private-person') }}">{{ __('header.for_individuals') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('company') ? ' active' : '' }}" href="{{ route('company') }}">{{ __('header.for_enterprises') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('credit') ? ' active' : '' }}" href="{{ route('credit') }}">{{ __('header.crediting') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('insurance') ? ' active' : '' }}" href="{{ route('insurance') }}">{{ __('header.insurance') }}</a></li>
                  <li class="item-menu"><a class="link" href="https://ses.kr.ua/#/" target="_blank">{{ __('header.calculator') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('about') ? ' active' : '' }}" href="{{ route('about') }}">{{ __('header.about_as') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('projects.index') ? ' active' : '' }}" href="{{ route('projects.index') }}">{{ __('header.our_work') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('news.index') ? ' active' : '' }}" href="{{ route('news.index') }}">{{ __('header.news') }}</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('partner') ? ' active' : '' }}" href="{{ route('partner') }}">{{ __('header.partners') }}</a></li>
                </ul>
                <ul class="item-list">
                  <li class="item-menu"><a class="link {{ Route::is('sunpower') ? ' active' : '' }}" href="{{ route('sunpower') }}">SUNPOWER</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('kness') ? ' active' : '' }}" href="{{ route('kness') }}">KNESS</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('sunport') ? ' active' : '' }}" href="{{ route('sunport') }}">SUNPORT</a></li>
                  <li class="item-menu"><a class="link {{ Route::is('review') ? ' active' : '' }}" href="{{ route('review') }}">{{ __('header.reviews') }}</a></li>
                </ul>
                <ul class="item-list contact-ul">
                  <li class="item-menu"><a class="link {{ Route::is('contact') ? ' active' : '' }}" href="{{ route('contact') }}">{{ __('header.contacts') }}</a></li>
                </ul>

              </div>
            </div>

            <div class="botom-section-mobile-menu">
              <div class="feedback-header-mobile feedback-header">
                <div class="feedback-header__phone">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/phone-call.svg') }}" alt="">
                  <a href="tel:0681537303">0681537303</a>
                </div>
              </div>

              <div class="mobile-menu__social">
                <div class="mobile-menu__social-wrap flex">
                  <a target="_blank" href="https://www.youtube.com/channel/UCXhRXWtWHfWeldYvt8afaiA">
                    <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/youtube-icon.svg') }}" alt="">
                  </a>
                  <a target="_blank" href="https://www.facebook.com/energosaves">
                    <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/fb-icon.svg') }}" alt="">
                  </a>
                  <a target="_blank" href="https://instagram.com/energosavesystems?igshid=1tzzh7h5qoyqk">
                    <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/instagram.svg') }}" alt="">
                  </a>
                  <a target="_blank" href="https://twitter.com/ESSEnergoSaveS1?s=09">
                    <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/twitter.svg') }}" alt="">
                  </a>
                  <a target="_blank" title="Viber" href="viber://chat?number=%2B380681537303">
                    <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/viber.svg') }}" alt="">
                  </a>
                  <a target="_blank" class="tg_link" title="Telegram" href="tg://resolve?domain=@ESS_Ukraine">
                    <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/telegram-logo.svg') }}" alt="">
                  </a>
                 
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

  <div class="modal-custom">
    <div class="modal-custom__overlay"></div>
  </div>
</header>
