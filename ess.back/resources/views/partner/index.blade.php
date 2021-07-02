@extends('layouts.app')

@section('content')
  <div id="partnerPage" class="partnerPage page">
    <div class="top-banner-partner section">
      @include('layouts.header.header')
      
      <div class="wrap-title">{{ __('partner.partner') }}</div>
      <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">{{ __('partner.partner') }}</a></li>
          </ul>
      </div>

      <div class="banner-partner-img pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/partners.jpg') }}" alt="" class="lazyLoading_js">
        <div class="top-banner-partner-text visible-viewportchecker visibility--check">{{ __('partner.work_with_the_best') }}</div>
      </div>    
      <div class="partners-text visible-viewportchecker visibility--check">
        <p>{{ __('partner.official_distributor_of_SunPower') }}</p>
        <br>
        <p>{{ __('partner.we_believe_in_a_better_future') }} </p>
       {{--  <div class="ess-section-btn visible-viewportchecker visibility--check">
          <button type="button"
            class="modal_open_button"
            data-btn-text="{{ __('partner.become_a_partner') }}"
            data-form-type="3"
            data-form-target="modal_question_body_partner"
            data-modal-target="modal_question_partner"
          >{{ __('partner.become_a_partner') }}</button>
        </div> --}}
      </div>
    </div>

    <div class="bottom-container section">
      <div class="bottom-banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/partners-back.jpg') }}" alt="" class="lazyLoading_js">
        <div class="mcontainer">
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('partner.we_offer_two_types_of_partnership') }} <span>{{ __('partner.two_kinds_of_partnership') }}</span></div>
          <div class="bottom-content-wrap">
            <div class="content-section">
              <div class="bottom-content-left visible-viewportchecker visibility--check">
                <div class="bottom-content-left-title">{{ __('partner.for_shops_and_installers') }}
                  <br><span>{{ __('partner.bulk_prices') }}</span></div>
                  <div class="wrap-bottom-content-text flex">
                    <div class="bottom-content-title-text">{{ __('partner.what_do_you_get') }}</div>
                    <div class="bottom-content-text">
                      <p><span class="visible-ul-style"></span> {{ __('partner.high-margin_product') }}</p>
                      <p><span class="visible-ul-style"></span> {{ __('partner.best_guaranteed_product') }}</p>
                      <p><span class="visible-ul-style"></span> {{ __('partner.premium_product') }}</p>
                      <p><span class="visible-ul-style"></span> {{ __('partner.the_ability_to_give_the_client') }}</p>
                      <p><span class="visible-ul-style"></span> {{ __('partner.information_and_marketing_support') }}</p>
                      <p><span class="visible-ul-style"></span> {{ __('partner.print_advertisements') }}</p>
                    </div>
                    <div class="ess-section-btn visible-viewportchecker visibility--check">
                      <button type="button"
                        class="modal_open_button"
                        data-btn-text="{{ __('partner.become_a_partner') }}"
                        data-form-type="3"
                        data-form-target="modal_question_body"
                        data-modal-target="modal_question"
                      >{{ __('partner.become_a_partner') }}</button>
                    </div>
                  </div>

              </div>
              <div class="bottom-content-right visible-viewportchecker visibility--check">
                <div class="bottom-content-right-title">{{ __('partner.for_individuals') }} <br><span>{{ __('partner.referral_system') }}</span></div>
                <div class="wrap-bottom-content-text flex">

                  <div class="bottom-content-text">
                    <p>{{ __('partner.we_are_now_addressing') }}</p>
                    <p>{{ __('partner.you_know_us_personally') }} </p>
                    <p class="fw-bold">{{ __('partner.do_you_recommend_us') }}</p>
                    <p class="primaryColor">{{ __('partner.for_1_station') }}</p>
                    <p>{{ __('partner.in_this_case_your_friend_will_receive') }}</p>
                  </div>
                  <div class="ess-section-btn visible-viewportchecker visibility--check">
                      <button type="button"
                        class="modal_open_button"
                        {{-- data-btn-text="{{ __('partner.become_a_partner') }}" --}}
                        data-form-type="3"
                        data-form-target="modal_question_body"
                        data-modal-target="modal_question"
                      >{{ __('partner.client') }}</button>
                    </div>
                </div>

              </div>
            </div>
            
          </div>
        </div>
      </div>
     {{--  @include('layouts.footers.footer')  --}}
    </div>

    @include('layouts.footers.main-footer')
  </div>


@endsection