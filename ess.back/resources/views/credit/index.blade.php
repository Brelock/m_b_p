<?php
/* @var \App\Models\Solution[] $solutions */
?>

@extends('layouts.app')

@section('content')
  <div id="creditPage" class="creditPage page">
    <!-- <div class="container"> -->
    <div class="credit-page-wrap-section">

      <div class="top-banner-credit-page section">

        @include('layouts.header.header')

        <div class="wrap-title">{{ __('header.crediting') }}</div>
        <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">{{ __('header.crediting') }}</a></li>
          </ul>
        </div>

        <div class="banner-img-credit pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/banner_credit1.jpg') }}" alt="" class="lazyLoading_js">
          <div class="top-banner-credit-title visible-viewportchecker visibility--check">{{ __('credit.green_tariff_will_cover_the_loan') }}</div>
          <div class="ess-section-btn">
                <button
                  class="modal_open_button"
                  data-btn-text="{{ __('credit.calculate') }}?"
                  data-form-type="6"
                  data-form-target="modal_companies_form"
                  data-modal-target="modal_companies"
                >{{ __('common.calculate') }}</button>
              </div>
        </div>
        <div class="content-top-banner">
          <div class="mcontainer">
            <div class="info-fo-bank visible-viewportchecker visibility--check">
              <p>{{ __('credit.ess_offers_a_comfortable_loan_solution') }}</p>
              <p>{{ __('credit.with_us_you_can_get_a_loan_for_solar_power_plant') }}</p>

              <div class="acred-bank-title">{{ __('credit.we_are_accredited_in_the_following_banks') }}</div>
              <div class="acred-bank-icon flex">
                <div class="bank-icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/logo-ukrgazbank.jpg') }}" alt="">
                </div>
                <div class="bank-icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Oschadbank_(uk).jpg') }}" alt="">
                </div>
                <div class="bank-icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/radabank_300x115-291x115.jpg') }}" alt="">
                </div>
              </div>
              <div class="ess-section-btn">
                <button
                  class="modal_open_button"
                  data-btn-text="{{ __('credit.calculate') }}?"
                  data-form-type="6"
                  data-form-target="modal_companies_form"
                  data-modal-target="modal_companies"
                >{{ __('common.calculate') }}</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section-inform-credit section">
        <div class="inform-credit-content">
          <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('credit.solar_power_plants_in_credit') }}</div>
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('credit.why_a_credit') }}</div>
          <div class="ess-section-text visible-viewportchecker visibility--check">{{ __('credit.obtaining_a_loan_to_invest_in_an_asset') }}
          </div>
          <div class="paragraph-credit-list">
            <div class="paragraph-item item1 visible-viewportchecker visibility--check">
              <div class="paragraph-item-bgc"></div>
              <div class="paragraph-item-text">{{ __('credit.loan_terms') }}
                <span>{{ __('credit.up_to_5_years') }}</span></div>
            </div>
            <div class="paragraph-item item2 visible-viewportchecker visibility--check">
              <div class="paragraph-item-bgc"></div>
              <div class="paragraph-item-text">{{ __('credit.first_installment') }}
                <span>{{ __('credit.from_15%_of_the_cost') }} </span></div>
            </div>
            <div class="paragraph-item item3 visible-viewportchecker visibility--check">
              <div class="paragraph-item-bgc"></div>
              <div class="paragraph-item-text">{{ __('credit.interest_rate') }}
                <span>{{ __('credit.from_4.19%_per') }}</span></div>
            </div>


          </div>
          <div class="document-credit-list">
            <div class="document-credit-list-suptitle visible-viewportchecker visibility--check">{{ __('credit.getting_a_loan_is_easy') }}</div>
            <div class="visible-viewportchecker visibility--check">
              <p>{{ __('credit.this_requires_the_following_documents') }}</p>
              <ul>
                <li>{{ __('credit.ukrainian_passport') }}</li>
                <li>{{ __('credit.identification_code') }}</li>
                <li>{{ __('credit.certificate_of_income_for_the_last_six_months') }}</li>
                <li>{{ __('credit.marriage_certificate') }}
                </li>
              </ul>
            </div>
            <div class="document-credit-list-suptitle visible-viewportchecker visibility--check">{{ __('credit.getting_a_loan_is_easy_2') }}</div>
            <p class="visible-viewportchecker visibility--check">{{ __('credit.solar_power_plant_insurance') }}</p>
          </div>
        </div>
        <div class="inform-credit-img pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/solar_panels-cred.jpg') }}" alt="" class="lazyLoading_js">
        </div>
      </div>

      <div class="banner-terms-credit pattern section">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Group.jpg') }}" alt="" class="lazyLoading_js">
        <div class="wrap-terms-content">
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('credit.general_loan_conditions') }}</div>
          <div class="banner-terms-credit-table flex wrap">
            <div class="terms-item mcol-xs-12 mcol-sm-6 mcol-md-4 visible-viewportchecker visibility--check">
              <h4>{{ __('credit.type') }} {{ __('credit.credit') }}</h4>
              <p>
                {{ __('credit.custom_credit') }}<br>
                {{ __('credit.for_up_to_5_years') }}
              </p>
            </div>
            <div class="terms-item mcol-xs-12 mcol-sm-6 mcol-md-4 visible-viewportchecker visibility--check">
              <h4>{{ __('credit.goal') }}  {{ __('credit.obtaining_a_loan') }}</h4>
              <p>
                {{ __('credit.for_the_purchase_and_installation') }} <br>
                • {{ __('credit.purchase_of_equipment') }}<br>
                • {{ __('credit.consumables') }}<br>
                • {{ __('credit.design_and_installation_work') }}<br>
                {{ __('credit.at_condition_of_equipment_purchase') }}<br>
              </p>
            </div>
            <div class="terms-item mcol-xs-12 mcol-sm-6 mcol-md-4 visible-viewportchecker visibility--check">
              <h4>{{ __('credit.way') }}  {{ __('credit.granting_a_loan') }}</h4>
              <p>{{ __('credit.loans_are_provided') }}
                <br>
                {{ __('credit.more_detailed_information') }}</p>
              <a class="inputfile" href="{{\EscapeWork\Assets\Facades\Asset::v('/storage/files/Pasport-ECO-energy.xlsx')}}" download>
                  <p>{{ __('credit.download') }}</p> 
              </a>
            </div>
            <div class="terms-item mcol-xs-12 mcol-sm-6 mcol-md-4 visible-viewportchecker visibility--check">
              <h4>{{ __('credit.without') }}  {{ __('credit.collateral') }}</h4>
              <p> {{ __('credit.the_collateral_value_is_set') }}</p>
            </div>
            <div class="terms-item mcol-xs-12 mcol-sm-6 mcol-md-4 visible-viewportchecker visibility--check">
              <h4>{{ __('credit.loan_repayment') }}<br> {{ __('credit.equal_payments') }}</h4>
              <p>{{ __('credit.cash') }}</p>
            </div>
            <div class="terms-item mcol-xs-12 mcol-sm-6 mcol-md-4 visible-viewportchecker visibility--check">
              <h4>{{ __('credit.no_commission') }}<br> {{ __('credit.upon_loan_repayment') }}</h4>
              <p>{{ __('credit.when_depositing_cash') }}</p>
            </div>
          </div>
          <div class="ess-section-btn visible-viewportchecker visibility--check">
            <button type="button" class="modal_open_button"
                    data-btn-text="{{ __('credit.calculate') }}?"
                    data-form-type="2"
                    data-form-target="modal_companies_form"
                    data-modal-target="modal_companies"
            >{{ __('credit.calculate') }}</button>
          </div>
        </div>
      </div>

      <div class="creit-ready-made-solutions section">
        <div class="mcontainer">
          <div class="ess-section-title visible-viewportchecker visibility--check"> {{ __('credit.we_offer_ready-made_solutions') }}
            <span>{{ __('credit.turnkey_solutions') }}</span>
          </div>
          <div class="ready-made-solutions-wrap flex wrap">
            @foreach( $solutions as $solution)
              <div class="solution-item mcol-xs-12 mcol-sm-6 mcol-md-4">
                <a href="{{ resourceGet($solution, 'solution_url')}}" class="window-solution" target="_blank">
                  <img src="{{ resourceGet($solution, 'backgroundPicture')}}" alt="">
                  <div class="window-solution-content-wrap">
                    <div class="window-solution-title">{{ resourceGet($solution, 'title')}}</div>
                    <div class="value-item-solution"><p class="value-num">{{ resourceGet($solution, 'power')}}</p>
                      <p>кВт</p></div>
                  </div>
                </a>
                <div class="secondary-window-solution">

                </div>
              </div>
            @endforeach
            <div class="solution-item mcol-xs-12 mcol-sm-6 mcol-md-4">
              <div class="window-solution last-item-solution">
                <div class="last-item-solution-content-wrap flex">
                  <p class="last-item-solution-content__text">{{ __('credit.you_can_also_buy_from_us') }}</p>
                  <a href="#">{{ __('credit.on-grid_inverter') }}</a>
                  <a href="#">{{ __('credit.hybrid_inverter') }}</a>
                  <a href="#">{{ __('credit.solar_panels') }}</a>
                </div>
              </div>
            </div>

          </div>
        </div>
       {{--  @include('layouts.footers.footer') --}}
      </div>

      @include('layouts.footers.main-footer')
    </div>
    <!-- </div> -->
  </div>


@endsection