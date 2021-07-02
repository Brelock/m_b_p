<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\Product[] $products */
?>

@extends('layouts.app')

@section('content')
  <div id="privatPersonPage" class="privatPersonPage page {{ $locale }}">

    <div class="person-top-banner section" id="projectCostCalculacte_sliders" >
      <div class="person-top-img-section slider visible-viewportchecker visibility--check">

        <div class="item-img-banner two-section">
          <div class="img-el" style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/house1.png') }});"></div>
        </div>

        <div class="item-img-banner three-section">
          <div class="img-el" style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/house2.png') }});"></div>
        </div>

        <div class="item-img-banner one-section">
          <div class="img-el" style="background-image: url({{ \EscapeWork\Assets\Facades\Asset::v('img/house3.png') }});"></div>
        </div>

      </div>

      <div class="content-top-section-slide">
        <div class="content-slide-title visible-viewportchecker visibility--check">{{ __('private-person.we_build') }}
          <br>
          <span id="typeItInit"></span></div>
        <div class="content-slide-text visible-viewportchecker visibility--check">
          <p>{{ __('private-person.network') }}</p>
          <br>
          <p>{{ __('private-person.hybrid') }}</p>
          <br>
          <p>{{ __('private-person.autonomous') }}</p>
        </div>
        <div class="ess-section-btn content-slide-btn visible-viewportchecker visibility--check">
          <button type="button">{{ __('private-person.payment') }}</button>
        </div>
      </div>

      <div class="wrap-ui-section-slide sliders-data visible-viewportchecker visibility--check">
        <div class="flex slide-block">
          <div class="top-slider slider-data-item">
            <div class="mslider-title label-name">{{ __('private-person.budget') }}</div>
            <div id="top-slide-panel11" data-name="slide-panel" class="item-slide slider-common"></div>
            <div class="mslider-marking">
              <p class="mark-hide mark-active">5000 $</p>
              <p class="mark-hide">10000 $</p>
              <p class="mark-hide">15000 $</p>
              <p class="mark-hide">20000 $</p>
              <p class="mark-hide">{{ __('private-person.more') }}</p>
            </div>
          </div>

          <div class="top-slider slider-data-item">
            <div class="mslider-title label-name">{{ __('private-person.power') }}</div>
            <div id="top-slide-panel12" data-name="slide-panel" class="item-slide slider-common"></div>
            <div class="mslider-marking">
              <p class="mark-hide mark-active">5 кВт</p>
              <p class="mark-hide">10 кВт</p>
              <p class="mark-hide">20 кВт</p>
              <p class="mark-hide">30 кВт</p>
              <p class="mark-hide">{{ __('private-person.more') }}</p>
            </div>
          </div>

          <div class="top-slider slider-data-item">
            <div class="mslider-title label-name">{{ __('private-person.type') }}</div>
            <div id="top-slide-panel13" data-name="slide-panel" class="item-slide slider-common"></div>
            <div class="mslider-marking">
              <p class="mark-hide mark-active">{{ __('private-person.network_2') }}</p>
              <p class="mark-hide">{{ __('private-person.hybrid_2') }}</p>
              <p class="mark-hide">{{ __('private-person.autonomous_2') }}</p>
            </div>
          </div>

          <div class="top-slider slider-data-item">
            <div class="mslider-title label-name">{{ __('private-person.accommodation') }}</div>
            <div id="top-slide-panel14" data-name="slide-panel" class="item-slide slider-common"></div>
            <div class="mslider-marking">
              <p class="mark-hide mark-active">{{ __('private-person.roof') }}</p>
              <p class="mr23 mark-hide">{{ __('private-person.earth') }}</p>
              <p class="mr27 mark-hide">{{ __('private-person.roof_earth') }}</p>
            </div>
          </div>
        </div>

        <div class="ess-section-btn">
          <!-- <button type="submit" data-form-target="project-cost-calculacte__form_private" -->
          <button type="button"
            class="modal_open_button"
            data-btn-text="{{ __('private-person.order') }}?"
            data-form-type="4"
            data-form-target="modal_question_body"
            data-modal-target="modal_question"
            data-sliders-target="projectCostCalculacte_sliders"
          >{{ __('private-person.order') }}</button>
        </div>

      </div>

      @include('includes.arrow-down')
    </div>

    <div class="person-advantages pattern section">
      <img class="person-advantages-img-banner lazyLoading_js"
           src="{{ \EscapeWork\Assets\Facades\Asset::v('img/persone-group6.jpg') }}" alt="">

      <div class="person-advantages-content">
        <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('private-person.our_advantages') }}
          <span>{{ __('private-person.our_advantages') }}</span></div>
        <div class="person-advantages__content-wrap flex">

          <div class="person-advantages-item mcol-xs-12 mcol-md-4 visible-viewportchecker visibility--check">
            <div class="person-advantages-item-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/business-and-finance.svg') }}" alt="">
            </div>
            <div class="person-advantages-item-title">{{ __('private-person.annual_income') }}</div>
            <div class="person-advantages-item-value"><p>≈ 200000</p>
              <p>грн</p></div>
          </div>

          <div class="person-advantages-item mcol-xs-12 mcol-md-4 visible-viewportchecker visibility--check">
            <div class="person-advantages-item-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/guarantee.svg') }}" alt="">
            </div>
            <div class="person-advantages-item-title">{{ __('private-person.warranty') }}</div>
            <div class="person-advantages-item-value"><p>25</p>
              <p>{{ __('private-person.years') }}</p></div>
          </div>

          <div class="person-advantages-item mcol-xs-12 mcol-md-4 visible-viewportchecker visibility--check">
            <div class="person-advantages-item-icon">
              <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/support.svg') }}" alt="">
            </div>
            <div class="person-advantages-item-title">{{ __('private-person.energy_monitoring') }}</div>
            <div class="person-advantages-item-value"><p>24/7</p>
              <p></p></div>
          </div>

        </div>
        <div class="btn-container visible-viewportchecker visibility--check">
          <div class="ess-section-btn">
            <button class="modal_open_button"
              data-btn-text="{{ __('private-person.questions') }}"
              data-form-type="1"
              data-form-target="modal_question_body"
              data-modal-target="modal_question"
            >{{ __('private-person.questions') }}</button>
          </div>
        </div>
      </div>
    </div>

    <div class="person-video-section section">
      <div class="video-banner">
        <video muted width="100%" height="100%" loop autoplay playsinline
        onloadedmetadata="this.muted = true">
          <source type="video/mp4"
                  src="{{ \EscapeWork\Assets\Facades\Asset::v('img/solar-assessment-desktop.mp4') }}">
        </video>
      </div>
      <div class="person-content">
        <div class="mcontainer">
          <div class="person-content-wrap flex">
            <div class="person-content-left">
              <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('private-person.annual_income') }}
                <span>{{ __('private-person.annual_income') }}</span></div>
              <div class="ess-section-title visible-viewportchecker visibility--check">~200 000 грн</div>
              <div class="ess-section-btn visible-viewportchecker visibility--check">
                <button type="button"  class="modal_open_button"
                  data-form-type="2"
                  data-form-target="modal_companies_form"
                  data-modal-target="modal_companies"
                >{{ __('private-person.calculate') }}</button>
              </div>
            </div>
            <div class="person-content-right visible-viewportchecker visibility--check">
              <div class="person-text">
                {{ __('private-person.helped_to_earn') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="person-controls section">
      <div class="person-control-grafics">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/person-group5.png') }}" alt="">
      </div>
      <div class="person-content">
        <div class="mcontainer">
          <div class="person-content-wrap flex">
            <div class="person-content-left">
              <div class="ess-section-suptitle visible-viewportchecker visibility--check">{{ __('private-person.control_and_access') }}
                <span>{{ __('private-person.control_and_access') }}</span></div>
              <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('private-person.monitoring') }}</div>
              <div class="ess-section-btn visible-viewportchecker visibility--check">
               <button type="button"  class="modal_open_button"
                 data-form-type="2"
                 data-form-target="modal_companies_form"
                 data-modal-target="modal_companies"
                >{{ __('private-person.calculate') }}</button>
              </div>
            </div>
            <div class="person-content-right visible-viewportchecker visibility--check">
              <div class="person-text">
                {{ __('private-person.after_launch') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Solution--}}

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
    </div>

    {{-- Solution--}}

    <div class="project-cost-section s3 section">
      <div class="project-cost__banner pattern">
        <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/foto_fon.jpg') }}" alt="" class="lazyLoading_js">
        <form action="#" class="form-project" id="project-cost-calculacte__form"
          data-form-type="4"
        >
          <div class="mcontainer">
            <div class="project-cost__form-wrap visible-viewportchecker visibility--check">
              <div class="project-cost__content">
                <div class="ess-section-title">{{ __('private-person.want_to_know') }}
                  <br> {{ __('private-person.your_project') }}
                  <span>{{ __('private-person.project_cost') }}</span>
                </div>
                <div class="ess-section-text">
                  {{ __('private-person.leave_request') }}
                </div>
              </div>
              <div class="project-cost__form">
                <label for="#">
                  <input type="text" name="name" id="" placeholder="{{ __('private-person.your_name') }}"
                    autocomplete="off"
                    required
                    data-error-text="{{ __('private-person.field_required') }}"
                  >
                </label>
                <label for="#">
                  <input type="number" name="phone" id="" placeholder="{{ __('private-person.phone') }}"
                    autocomplete="off"
                    required
                    data-replace-required-for="email"
                    data-error-text="{{ __('private-person.field_required') }}"
                  >
                </label>
               {{-- <label for="#">
                  <input type="text" name="region" id="" placeholder="{{ __('question-partner-form.region') }}"
                    autocomplete="off"
                    required
                  >
                </label> --}}
                <div class="formRow">
                    <label class="formRow--input-wrapper js-inputWrapper region-modals">
                        <select name="region" required >
                            <option value="">{{ __('question-modal.region') }}</option>
                            <option value="{{ __('region-modal.donetsk') }}">{{ __('region-modal.donetsk') }}</option>
                            <option value="{{ __('region-modal.dnepr') }}">{{ __('region-modal.dnepr') }}</option>
                            <option value="{{ __('region-modal.harkov') }}">{{ __('region-modal.harkov') }}</option>
                            <option value="{{ __('region-modal.lviv') }}">{{ __('region-modal.lviv') }}</option>
                            <option value="{{ __('region-modal.odessa') }}">{{ __('region-modal.odessa') }}</option>
                            <option value="{{ __('region-modal.lugansk') }}">{{ __('region-modal.lugansk') }}</option>
                            <option value="{{ __('region-modal.kiev') }}">{{ __('region-modal.kiev') }}</option>
                            <option value="{{ __('region-modal.zaporijya') }}">{{ __('region-modal.zaporijya') }}</option>
                            <option value="{{ __('region-modal.vinnitca') }}">{{ __('region-modal.vinnitca') }}</option>
                            <option value="{{ __('region-modal.poltava') }}">{{ __('region-modal.poltava') }}</option>
                            <option value="{{ __('region-modal.frankovsk') }}">{{ __('region-modal.frankovsk') }}</option>
                            <option value="{{ __('region-modal.hmelnitsk') }}">{{ __('region-modal.hmelnitsk') }}</option>
                            <option value="{{ __('region-modal.zakarpatye') }}">{{ __('region-modal.zakarpatye') }}</option>
                            <option value="{{ __('region-modal.jitomir') }}">{{ __('region-modal.jitomir') }}</option>
                            <option value="{{ __('region-modal.cherkasskaya') }}">{{ __('region-modal.cherkasskaya') }}</option>
                            <option value="{{ __('region-modal.rovny') }}">{{ __('region-modal.rovny') }}</option>
                            <option value="{{ __('region-modal.nikolayev') }}">{{ __('region-modal.nikolayev') }}</option>
                            <option value="{{ __('region-modal.summy') }}">{{ __('region-modal.summy') }}</option>
                            <option value="{{ __('region-modal.ternopol') }}">{{ __('region-modal.ternopol') }}</option>
                            <option value="{{ __('region-modal.volinska') }}">{{ __('region-modal.volinska') }}</option>
                            <option value="{{ __('region-modal.herson') }}">{{ __('region-modal.herson') }}</option>
                            <option value="{{ __('region-modal.chernigov') }}">{{ __('region-modal.chernigov') }}</option>
                            <option value="{{ __('region-modal.kirovograd') }}">{{ __('region-modal.kirovograd') }}</option>
                            <option value="{{ __('region-modal.chernovetskaya') }}">{{ __('region-modal.chernovetskaya') }}</option>
                        </select>
                    </label>
                </div>
                <!-- <div class="project-cost__form-btn">
                  <button>Узнать стоимость</button>
                </div> -->

              </div>
            </div>

            <div class="project-cost-slide wrap-ui-section-slide sliders-data visible-viewportchecker visibility--check">
              <div class="flex slide-block">
                <div class="top-slider slider-data-item">
                  <div class="mslider-title label-name">{{ __('private-person.budget') }}</div>
                  <div id="bottom-slide-panel21" data-name="slide-panel" class="item-slide slider-common2"></div>
                  <div class="mslider-marking">
                    <p class="mark-hide mark-active">5000 $</p>
                    <p class="mark-hide">10000 $</p>
                    <p class="mark-hide">15000 $</p>
                    <p class="mark-hide">20000 $</p>
                    <p class="mark-hide">{{ __('private-person.more') }}</p>
                  </div>
                </div>

                <div class="top-slider slider-data-item">
                  <div class="mslider-title label-name">{{ __('private-person.power') }}</div>
                  <div id="bottom-slide-panel22" data-name="slide-panel" class="item-slide slider-common2"></div>
                  <div class="mslider-marking">
                    <p class="mark-hide mark-active">5 кВт</p>
                    <p class="mark-hide">10 кВт</p>
                    <p class="mark-hide">20 кВт</p>
                    <p class="mark-hide">30 кВт</p>
                    <p class="mark-hide">{{ __('private-person.more') }}</p>
                  </div>
                </div>

                <div class="top-slider slider-data-item">
                  <div class="mslider-title label-name">{{ __('private-person.type') }}</div>
                  <div id="bottom-slide-panel23" data-name="slide-panel" class="item-slide slider-common2"></div>
                  <div class="mslider-marking">
                    <p class="mark-hide mark-active">{{ __('private-person.network_2') }}</p>
                    <p class="mark-hide">{{ __('private-person.hybrid_2') }}</p>
                    <p class="mark-hide">{{ __('private-person.autonomous_2') }}</p>
                  </div>
                </div>

                <div class="top-slider slider-data-item">
                  <div class="mslider-title label-name">{{ __('private-person.accommodation') }}</div>
                  <div id="bottom-slide-panel24" data-name="slide-panel" class="item-slide slider-common2"></div>
                  <div class="mslider-marking">
                    <p class="mark-hide mark-active">{{ __('private-person.roof') }}</p>
                    <p class="mr23 mark-hide">{{ __('private-person.earth') }}</p>
                    <p class="mr27 mark-hide">{{ __('private-person.roof_earth') }}</p>
                  </div>
                </div>
              </div>

              <div class="ess-section-btn">
                <div class="spinner">
                  <div class="lds-dual-ring small"></div>
                </div>
                <button type="submit" >{{ __('private-person.order') }}</button>
              </div>
            </div>
          </div>
        </form>

      </div>

      @include('layouts.footers.footer')
    </div>

</div>


@endsection