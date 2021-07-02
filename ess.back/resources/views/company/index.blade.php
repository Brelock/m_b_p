@extends('layouts.app')

@section('content')
  <div id="companyPage" class="companyPage page">

    <div class="company-top section">
      @include('layouts.header.header')

      <div class="wrap-title">{{ __('header.for_enterprises') }}</div>
      <div class="breadcrumbs">
        <ul class="breadcrumbs-wrap">
          <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
          <li class="breadcrumbs-link active-link"><a href="#">{{ __('header.for_enterprises') }}</a></li>
        </ul>
      </div>

      <div class="company-top-banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast1.jpg') }}" alt="" class="lazyLoading_js">
        <div class="wrap-content-top-banner">
          <div class="content-top-banner__title visible-viewportchecker visibility--check">{{ __('company.energy_of_sun') }}</div>
          <p class="visible-viewportchecker visibility--check">{{ __('company.electricity_bills') }}</p>
        </div>
      </div>
      <div class="company-two-top-banner">
        <div class="mcontainer">
          <div class="two-top-banner__title visible-viewportchecker visibility--check"> {{ __('company.fix_your_energy_rate') }}</div>
          <div class="wrap-table-two-banner flex">
            <div class="left-argument visible-viewportchecker visibility--check">{{ __('company.0.65') }}
              <span>{{ __('company.kWh') }}</span></div>
              <div class="btn-scroll ess-section-btn visible-viewportchecker visibility--check">{{ __('company.fixed_tarif') }}</div>
            <div class="right-argument visible-viewportchecker visibility--check"> {{ __('company.until_2045') }}
              <span>{{ __('company.of_the_year') }}</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="company-panel-energy pattern section">
      <img class="company-panel-energy__img lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast2.jpg') }}" alt="">
      <div class="content-panel-energy">
        <div class="mcontainer">
          <div class="content-panel-energy-wraper">
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.and_decide_today') }}
              <span> {{ __('company.solve_all_energy_problems') }}</span>
            </div>
            <div class="wrap-items-punkt-panel flex">
              <div class="items-punkt-panel visible-viewportchecker visibility--check">
                <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chas_icon1.svg') }}" alt="">
                <h4 class="items-punkt-panel__title">{{ __('company.get_enough_power') }}</h4>
              </div>
              <div class="items-punkt-panel visible-viewportchecker visibility--check">
                <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast_icon2.svg') }}" alt="">
                <h4 class="items-punkt-panel__title">{{ __('company.possible_now') }}</h4>
              </div>
              <div class="items-punkt-panel visible-viewportchecker visibility--check">
                <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast_icon3.svg') }}" alt="">
                <h4 class="items-punkt-panel__title">{{ __('company.not_pay_for_electricity') }}</h4>
              </div>
              <div class="items-punkt-panel visible-viewportchecker visibility--check">
                <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast_icon4.svg') }}" alt="">
                <h4 class="items-punkt-panel__title">{{ __('company.despite_the_constant_growth') }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="company-section-delivery section">
      <div class="delivery-left">
        <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.energy_of_the_Sun_with_delivery') }}</div>
        <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.we_provide_services') }} <span>{{ __('company.services') }}</span>
        </div>
        <div class="item-deliv paddings-t flex visible-viewportchecker visibility--check">
          <div class="item-deliv-icon"></div>
          <p class="item-deliv-text">{{ __('company.construction_solar_plants') }}</p>
        </div>
        <div class="item-deliv flex visible-viewportchecker visibility--check">
          <div class="item-deliv-icon icon2"></div>
          <p class="item-deliv-text">{{ __('company.network_construction') }}</p>
        </div>
        <div class="item-deliv flex visible-viewportchecker visibility--check">
          <div class="item-deliv-icon icon3"></div>
          <p class="item-deliv-text">{{ __('company.systems_guaranteed') }}</p>
        </div>
        <div class="btn-scroll ess-section-btn visible-viewportchecker visibility--check">{{ __('company.buy_payment') }}</div>
      </div>
      <div class="delivery-right pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast3.jpg') }}" alt="" class="lazyLoading_js">
      </div>
    </div>
    <div class="company-own-generation section">

      <div class="banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast4.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="content-own-gen-wrapper">
        <div class="mcontainer">
          <div class="content-own-gen">
            <div class="content-own-gen__left">
              <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.truly_the_right_decision') }}</div>
              <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.own_solar_generation') }}
                <span>{{ __('company.own_solar') }}</span></div>
              <div class="ess-section-text visible-viewportchecker visibility--check">
                <p>{{ __('company.consume_in_light') }}</p>
                <p>{{ __('company.generate_electricity') }}</p>
              </div>
            </div>
            <div class="content-own-gen__right">
              <div class="ess-section-text visible-viewportchecker visibility--check">
                <p>{{ __('company.production_cycle') }}</p>{{ __('company.consumption_peaks') }}
                <p>{{ __('company.no_intervention') }}</p>{{ __('company.interference_structure') }}
              </div>
              <div class="content-own-gen__grafic-icon">
                <img class="grafic__click" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/grafics.jpg') }}" alt="">
                <img class="grafic__click" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/elktro.jpg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-image ess-modal">
        <div class="modal-image-container">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/pattern.jpg') }}" alt="">
        </div>
        <div class="modal-overlay"></div>
      </div>
    </div>
    <div class="company-economic-banner pattern section">
      <img class="company-economic-banner__img lazyLoading_js" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast5.jpg') }}"
           alt="">
      <div class="company-economic">
        <div class="mcontainer">
          <div class="wrap-top-content">
            <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.save_how_much') }} <span>{{ __('company.save') }}</span></div>
            <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.compensated_part') }}</div>
          </div>
          <div class="company-economic-wrap">
            <div class="company-economic-content-wrap flex">

              <div class="eco-item visible-viewportchecker visibility--check">
                <div class="eco-item__icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/icon7.svg') }}" alt="">
                </div>
                <div class="eco-item__title">{{ __('company.minimum_power') }}</div>
                <div class="eco-item__text">{{ __('company.maximum') }}</div>
              </div>

              <div class="eco-item visible-viewportchecker visibility--check">
                <div class="eco-item__icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/icon8.svg') }}" alt="">
                </div>
                <div class="eco-item__title">{{ __('company.warranty') }}</div>
                <div class="eco-item__text">{{ __('company.all_equipment') }}</div>
              </div>

              <div class="eco-item visible-viewportchecker visibility--check">
                <div class="eco-item__icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/icon9.svg') }}" alt="">
                </div>
                <div class="eco-item__title">{{ __('company.scaling') }}</div>
                <div class="eco-item__text">{{ __('company.increase_power') }}</div>
              </div>

              <div class="eco-item visible-viewportchecker visibility--check">
                <div class="eco-item__icon">
                  <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/icon10.svg') }}" alt="">
                </div>
                <div class="eco-item__title">{{ __('company.optimal_price') }}</div>
                <div class="eco-item__text">{{ __('company.station_cost') }}</div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="company-video-banner section">

      <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.get_energy') }} <span>{{ __('company.energy') }}</span></div>
      <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.video_from_objects') }}</div>
      <div class="video-block-wrapper">
        <div class="video-block">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/gImo3i6-AjA" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
        </div>
      </div>

    </div>
    <div class="company-object section">
      <div class="mcontainer">
        <div class="ess-section-title visible-viewportchecker visibility--check"> {{ __('company.gallery_of_employees') }}
          <span>{{ __('company.gallery') }}</span>
        </div>
        <div class="object-wrap obj-slide">
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el1.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el2.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el3.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el4.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el5.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el6.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el7.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el8.jpg') }}" alt="">
          </div>
          <div class="company-object-item">
            <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/obj-el9.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="company-green-rite section">
      <div class="wrap-section-green-rite flex">
        <div class="left-content-rite">
          <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.green_tariff') }}</div>
          <div class="ess-section-title visible-viewportchecker visibility--check"> {{ __('company.legal_green_tariff') }}<span>{{ __('company.legal') }}</span>
          </div>
          <div class="ess-section-text visible-viewportchecker visibility--check">
            <p>{{ __('company.ukrainian_entrepreneurs') }}</p>
            <p>
              <span>{{ __('company.0.1228') }}</span>
              {{ __('company.roof_stations') }}
            </p>
            <p>
              <span>{{ __('company.0.1126') }}</span>
              {{ __('company.ground_stations') }}
            </p>
            <p>
              {{ __('company.tariff_value') }}
              <br>
              <span>{{ __('company.about_electricity') }}</span>
            </p>
          </div>
        </div>
        <div class="right-content-rite pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast6.jpg') }}" alt="" class="lazyLoading_js">
        </div>
      </div>
    </div>
    <div class="company-new-bisnes section">
      <div class="banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast7.jpg') }}" alt="" class="lazyLoading_js">
      </div>
      <div class="content-new-bisnes-wrapper">
        <div class="mcontainer">
          <div class="content-new-bisnes">
            <div class="content-new-bisnes__left">
              <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.eco_friendly') }}</div>
              <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.new_business') }}
                <span>{{ __('company.new_business') }}</span></div>
              <div class="ess-section-text visible-viewportchecker visibility--check">
                <p>{{ __('company.solar_power_plant_today') }}</p>
              </div>
            </div>
            <div class="content-new-bisnes__right">
              <div class="ess-section-text visible-viewportchecker visibility--check">
                <p>{{ __('company.exactly_today') }}</p>
                <br>
                <br>
                <p class="font-weight-bisnes-section visible-viewportchecker visibility--check">{{ __('company.net_profit') }}
                  <span>{{ __('company.up_to_2') }}</span> <br>
                  {{ __('company.utility_areas') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="company-economic-bottom-grafic section">
      <div class="bottom-flex-conteiner">
        <div class="economic-grafic-left">
          <div class="">
            <div class="grafic-left-title-wrap">
              <div class="grafic-left-static-title">
                <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('company.want_to_know') }}</div>
                <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('company.how_much_can_you') }}
                  <span>{{ __('company.save_2') }}</span></div>
              </div>
              <div class="grafic-left-absolute-text">
                <div class="left-absolute-text visible-viewportchecker visibility--check">{{ __('company.business_consumes') }}
                </div>
              </div>
            </div>
            @include('includes.question-company-form')
          </div>
          <!-- <div class="ess-section-btn desktop-btn visible-viewportchecker visibility--check">
             <div class="spinner">
               <div class="lds-dual-ring small"></div>
             </div>
             <button type="button"
              data-form-target="modal_question_body"
             >{{ __('company.get_an_offer') }}</button>
          </div> -->
        </div>
        <div class="economic-grafic-right pattern">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/chast8.jpg') }}" alt="" class="lazyLoading_js">
        </div>
      </div>

      @include('layouts.footers.footer')
    </div>
  </div>

  <div class="overlay__hide"></div>
@endsection
