
<header class="mainHeader">
       <div class="header-content-wrap">
           <div class="header-logo">
               <a href="{{ route('site.home') }}"> <img src="/img/logoEuroLombard.svg" alt=""></a>
           </div>
           <nav class="nav">
                <div class="menu-btn">
                  <div class="line line--1"></div>
                  <div class="line line--2"></div>
                  <div class="line line--3"></div>   
              </div>

              <ul class="header-nav-list">
                  <li class="lang-btn">

                      <span {{ $locale === 'uk' ? 'class=active' : '' }}>
                          <a href="{{ route('setlocale', ['lang' => 'uk']) }}">UA</a>
                      </span>
                      <span {{ $locale === 'ru' ? 'class=active' : '' }}>
                          <a href="{{ route('setlocale', ['lang' => 'ru']) }}">RU</a>
                      </span>
                  </li>
                  <li class="nav-item">
                    <a href="#">
                        <span>{{ trans('main.Rosrahuvati_loan') }}</span> 
                        <span class="icon-arrow-down-gray"></span>
                    </a>
                    <ul class="nav-item_submenu">
                        <li><a href="{{ route('calculator.gold') }}">{{ trans('main.bail_gold') }}</a></li>
                        <li><a href="{{ route('calculator.silver') }}">{{ trans('main.bail_silver') }}</a></li>
                        <li><a href="{{ route('calculator.technics') }}">{{ trans('main.bail_gadget') }}</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pages.show', ['page' => 'about']) }}">
                        <span>{{ trans('main.company') }}</span>
                        <span class="icon-arrow-down-gray"></span>
                    </a>
                    <ul class="nav-item_submenu">
                        <li><a href="{{ route('pages.show', ['page' => 'about']) }}">{{ trans('main.about') }}</a></li>
                        <li><a href="{{ route('pages.show', ['page' => 'requisites']) }}">{{ trans('main.financial') }}</a></li>
                        <li><a href="{{ route('pages.show', ['page' => 'сareer']) }}">{{ trans('main.career') }}</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a href="{{ route('news') }}">{{ trans('main.news') }}</a></li>
                  <li class="nav-item"><a href="{{ route('actions') }}">{{ trans('main.actions') }}</a></li>
                  <li class="nav-item"><a href="{{ route('departments' )}}">{{ trans('main.departments') }}</a></li>
                  <li class="callback-section-header">
                       <div class="callback-phone">
                           <div class="callback-item-phone">
                               <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                               <div class="callback-drop-box"> <span class="call-drop-title">{{ trans('main.call_drop_title') }}</span> 
                                    <div class="callback-dropdown-phone">
                                        @include('site.includes.callback-questions-form-front')
                                        <div class="social-mobile-form">
                                             <ul class="social-mobile-list">
                                                 <li>
                                                     <span class="icon-social-fb"></span>
                                                     <a target="blank" href="{{ $settings->facebook }}" class="social-item-link"></a>
                                                 </li>
                                                 <li>
                                                     <span class="icon-social-inst"></span>
                                                     <a target="blank" href="{{ $settings->instagram }}" class="social-item-link"></a>
                                                 </li>
                                                 <!-- <li>
                                                     <span class="icon-social-yt"></span>
                                                     <a href="#" class="social-item-link"></a>
                                                 </li> -->
                                                 <li>
                                                     <span class="icon-social-telegram"></span>
                                                     <a  target="blank" href="{{ $settings->telegram }}" class="social-item-link"></a>
                                                 </li>
                                             </ul>
                                        </div>
                                    </div>
                               </div>
                           </div>
                       </div>
         
                  </li>
              </ul>

           </nav> 

       </div>
</header>