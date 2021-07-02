@extends('layouts.app')

@section('content')
  <div id="insurancePage" class="insurancePage page {{ $locale }}">
    <div class="insurance-top-section section">
      <div class="insurance-top-slider visible-viewportchecker visibility--check">
        <div class="insurance-slide-wrapper init-ins-slide">
          <div class="item-img-banner">
            <div class="img-el"
                 style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceGroup5.png') }});"></div>
          </div>
          <div class="item-img-banner">
            <div class="img-el"
                 style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceFires.png') }});"></div>
          </div>
          <div class="item-img-banner">
            <div class="img-el"
                 style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceGrads.png') }});"></div>
          </div>
          <div class="item-img-banner">
            <div class="img-el"
                 style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceGroup4.png') }});"></div>
          </div>
          <div class="item-img-banner">
            <div class="img-el"
                 style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceHands.png') }});"></div>
          </div>
        </div>
      </div>

      <div class="content-top-section-slide">
        <div class="content-slide-title visible-viewportchecker visibility--check">
          {{ __('insurance.we_insure') }}
          <br>
          {{ __('insurance.solar') }}
          <br>
          {{ __('insurance.power_plants') }}
          <br>
          {{ __('insurance.from') }} <span class="visible-viewportchecker visibility--check" id="typeItInsuranceInit"></span></div>
        <div class="content-slide-text visible-viewportchecker visibility--check">
          <p>{{ __('insurance.policy_cost') }}</p>
          <p>{{ __('insurance.you_want') }}</p>
        </div>
        <div class="ess-section-btn visible-viewportchecker visibility--check">
          <button
            class="modal_open_button"
            data-btn-text="{{ __('insurance-form.insure') }}?"
            data-form-type="7"
            data-form-target="modal_insurance_form"
            data-modal-target="modal_insurance"
          >{{ __('insurance.insure') }}</button>
        </div>

      </div>

      <div class="ess-section-btn hidden-ess-btn visible-viewportchecker visibility--check">
        <button>{{ __('insurance.insure') }}</button>
      </div>
      <div class="top-section__arrow-down">
        <button></button>
      </div>
    </div>

    <div class="page-insurance-reliability section">
      <div class="ins-reliability_left">
        <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('insurance.reliability') }}</div>
        <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('insurance.best_protection') }} <span>{{ __('insurance.reliability') }}</span>
        </div>
        <div class="ess-section-text visible-viewportchecker visibility--check">
          {{ __('insurance.disasters') }}
        </div>
      </div>
      <div class="ins-reliability_right pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceBanner1.jpg') }}" alt="" class="lazyLoading_js">
      </div>
    </div>

    <div class="page-insurance-damage section">
      <div class="ins-damage_banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceDamage.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="ins-damage_content">

        <div class="ins-damage_content-left">
          <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('insurance.damage') }}</div>
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('insurance.refers') }}
            <span>{{ __('insurance.insured_events') }}</span>
          </div>
        </div>
        <div class="ins-damage_content-right">
          <div class="ess-section-text visible-viewportchecker visibility--check">
            {{ __('insurance.property_damage') }}
          </div>
        </div>
      </div>
    </div>

    <div class="page-insurance-offer section pattern">
      <img class="ins-offer-img lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceBannerOffer.jpg') }}" alt="">

      <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('insurance.your_station') }}</div>
      <div class="flex wrap-offer_content">
        <div class="ins-offer_content">
          <div class="ins-offer_el">
            <div class="ins-offer_el-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ins-icon_1.svg') }}" alt="">
            </div>
            <div class="ins-offer_el-title visible-viewportchecker visibility--check">{{ __('insurance.influence_fire') }}</div>
            <div class="ins-offer_el-text visible-viewportchecker visibility--check">
              {{ __('insurance.lightning_strike') }}
            </div>
          </div>
          <div class="ins-offer_el">
            <div class="ins-offer_el-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ins-icon_2.svg') }}" alt="">
            </div>
            <div class="ins-offer_el-title visible-viewportchecker visibility--check">{{ __('insurance.bang') }}</div>
            <div class="ins-offer_el-text visible-viewportchecker visibility--check">
              {{ __('insurance.process') }}
            </div>
          </div>
          <div class="ins-offer_el">
            <div class="ins-offer_el-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/ins-icon_3.svg') }}" alt="">
            </div>
            <div class="ins-offer_el-title visible-viewportchecker visibility--check">{{ __('insurance.fall') }}</div>
            <div class="ins-offer_el-text visible-viewportchecker visibility--check">
              {{ __('insurance.trees') }}
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="page-insurance-sky section pattern">
      <img class="ins-offer-img lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/insuranceBanner5.jpg') }}" alt="">
      <div class="flex ins-sky-wrap-content">

        <div class="ess-section-title visible-viewportchecker visibility--check">
          {{ __('insurance.weather') }}
        </div>

        <div class="ess-section-title visible-viewportchecker visibility--check">
          {{ __('insurance.bad_weather') }}
        </div>

        <div class="ess-section-title visible-viewportchecker visibility--check">
          {{ __('insurance.protect') }}
          <br>
          EnergoSave Systems!
        </div>

        <div class="ess-section-btn visible-viewportchecker visibility--check">
          <button
              class="modal_open_button"
              data-btn-text="{{ __('insurance-form.insure') }}?"
              data-form-type="7"
              data-form-target="modal_insurance_form"
              data-modal-target="modal_insurance"
          >{{ __('insurance.insure') }}</button>
        </div>

      </div>
    </div>

    <div class="project-cost-section s5 section">
      <div class="project-cost__banner">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/foto_fon.jpg') }}" alt="" data-src="lazyLoading_js">
        @include('includes.project-form')

      </div>
      @include('layouts.footers.footer')

    </div>
  </div>
@endsection