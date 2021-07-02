<form action="#" class="form-project" id="project-cost-calculacte__form" data-form-type="4">
  <div class="mcontainer">

    <div class="project-cost__form-wrap visible-viewportchecker visibility--check">
      <div class="project-cost__content">
        <div class="ess-section-title">{{ __('project-form.know') }}
          <br> {{ __('project-form.project') }}
          <span>{{ __('project-form.cost') }}</span>
        </div>
        <div class="ess-section-text">
          {{ __('project-form.request') }}
        </div>
      </div>
      <div class="project-cost__form">
        <label for="#">
          <input type="text" name="name" placeholder="{{ __('project-form.name') }}" autocomplete="off"
            required 
            data-error-text="{{ __('project-form.whole_field') }}"
          >
        </label>
        <label for="#">
          <input type="number" name="phone" placeholder="{{ __('project-form.phone') }}" autocomplete="off"
            required
            data-error-text="{{ __('project-form.whole_field') }}"
          >
        </label>
        {{-- <label for="#" >
          <input type="text" name="region" placeholder="{{ __('question-partner-form.region') }}" autocomplete="off" required>
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
      </div>
    </div>

    <div class="project-cost-slide wrap-ui-section-slide sliders-data visible-viewportchecker visibility--check">
      <div class="flex slide-block">
        <div class="top-slider slider-data-item">
          <div class="mslider-title label-name">{{ __('project-form.budget') }}</div>
          <div id="bottom-slide-panel31" data-name="slide-panel" class="item-slide slider-common31"></div>
          <div class="mslider-marking">
            <p class="mark-hide mark-active">5000 $</p>
            <p class="mark-hide">10000 $</p>
            <p class="mark-hide">15000 $</p>
            <p class="mark-hide">20000 $</p>
            <p class="mark-hide">{{ __('project-form.more') }}</p>
          </div>
        </div>

        <div class="top-slider slider-data-item">
          <div class="mslider-title label-name">{{ __('project-form.power_2') }}</div>
          <div id="bottom-slide-panel32" data-name="slide-panel" class="item-slide slider-common31"></div>
          <div class="mslider-marking">
            <p class="mark-hide mark-active">5 кВт</p>
            <p class="mark-hide">10 кВт</p>
            <p class="mark-hide">20 кВт</p>
            <p class="mark-hide">30 кВт</p>
            <p class="mark-hide">{{ __('project-form.more') }}</p>
          </div>
        </div>

        <div class="top-slider slider-data-item">
          <div class="mslider-title label-name">{{__('private-person.type') }}</div>
          <div id="bottom-slide-panel33" data-name="slide-panel" class="item-slide slider-common31"></div>
          <div class="mslider-marking">
            <p class="mark-hide mark-active">{{__('private-person.network_2') }}</p>
            <p class="mark-hide">{{__('private-person.hybrid_2') }}</p>
            <p class="mark-hide">{{__('private-person.autonomous_2') }}</p>
          </div>
        </div>

        <div class="top-slider slider-data-item">
          <div class="mslider-title label-name">{{ __('project-form.accommodation') }}</div>
          <div id="bottom-slide-panel34" data-name="slide-panel" class="item-slide slider-common31"></div>
          <div class="mslider-marking">
            <p class="mark-hide mark-active">{{ __('project-form.roof') }}</p>
            <p class="mr23 mark-hide">{{ __('project-form.earth') }}</p>
            <p class="mr27 mark-hide">{{ __('project-form.roof_earth') }}</p>
          </div>
        </div>
      </div>

      <div class="ess-section-btn calculate_cost_btn" >
        <div class="spinner">
          <div class="lds-dual-ring small"></div>
        </div>
        <button type="submit" data-form-target="project-cost-calculacte__form">{{ __('project-form.order') }}</button>
      </div>
    </div>
  </div>
</form>
