<div class="modal-insurance modal-block ess-modal" id="modal_insurance">
  <div class="modal-content-wrap" tabindex="-1" role="dialog">
    <div class="modal__content">
      <div class="modal__content-title modal_title">{{ __('insurance-form.insure') }}</div>
      <div class="modal-close__btn">
        <button type="button" class="modal-close-button"></button>
      </div>
      <form class="modal-body" id="modal_insurance_form">
        <div class="modal-inputs-wrap">
          <fieldset class="formRow">
            <div class="formRow--item">
              <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                <input name="name" type="text" class="formRow--input js-input" id="firstname"
                   placeholder="{{ __('insurance-form.your_name_surname') }}" autocomplete="off"
                   data-doptext=""
                   required
                   data-error-text="{{ __('insurance-form.whole_field') }}"
                   initial-scale=1.0 
                   maximum-scale=1.0
                >
              </label>
            </div>
          </fieldset>
          <fieldset class="formRow">
            <div class="formRow--item">
              <label class="formRow--input-wrapper js-inputWrapper">
                <input name="phone" type="text" class="formRow--input js-input"
                  placeholder="{{ __('insurance-form.your_phone_number') }}" autocomplete="off"
                  data-doptext=""
                  required
                  data-error-text="{{ __('insurance-form.whole_field') }}"
                  initial-scale=1.0
                  maximum-scale=1.0
                >
              </label>
            </div>
          </fieldset>

            <fieldset class="formRow">
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
            </fieldset>

          {{-- <fieldset class="formRow">
            <div class="formRow--item">
              <label  class="formRow--input-wrapper js-inputWrapper">
                <input name="region" type="text" class="formRow--input js-input"
                  placeholder="{{ __('question-modal.region') }}" autocomplete="off" data-doptext=""
                  required
                  data-error-text="{{ __('insurance-form.whole_field') }}"
                  initial-scale=1.0
                  maximum-scale=1.0
                >
              </label>
            </div>
          </fieldset> --}}

          <fieldset class="formRow">
            <div class="formRow--item">
              <label class="formRow--input-wrapper js-inputWrapper">
                <input name="station-power" type="text" class="formRow--input js-input for_message_field" 
                  placeholder="{{ __('insurance-form.station_power') }}" autocomplete="off" data-doptext=""
                  data-label-name="{{ __('insurance-form.station_power') }}"
                  initial-scale=1.0 
                  maximum-scale=1.0
                >
              </label>
            </div>
          </fieldset>
{{--          <fieldset class="formRow">--}}
{{--            <div class="formRow--item">--}}
{{--              <label class="formRow--input-wrapper js-inputWrapper">--}}
{{--                <input name="city" type="text" class="formRow--input js-input for_message_field"--}}
{{--                  placeholder="{{ __('insurance-form.locality') }}" autocomplete="off" data-doptext=""--}}
{{--                  required--}}
{{--                  data-error-text="{{ __('insurance-form.whole_field') }}"--}}
{{--                  data-label-name="{{ __('insurance-form.locality') }}"--}}
{{--                  initial-scale=1.0 --}}
{{--                  maximum-scale=1.0--}}
{{--                >--}}
{{--              </label>--}}
{{--            </div>--}}
{{--          </fieldset>--}}
          <div class="input-checkbox">
            <input type="checkbox" id="check3"
              required not-send
              data-error-text="{{ __('insurance-form.needed_your') }}"
              initial-scale=1.0 
              maximum-scale=1.0
            >
            <label for="check3"></label>
            <span>{{ __('insurance-form.i_agree') }} <a href="#">{{ __('insurance-form.user_agreement') }}</a> {{ __('insurance-form.and') }} <a href="#">{{ __('insurance-form.privacy_policy') }}</a></span>
          </div>
        </div>
        <div class="submit-modal-form disabled">
           <div class="spinner">
            <div class="lds-dual-ring small"></div>
          </div>
          <button disabled>{{ __('insurance-form.submit') }}</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-overlay modal_overlay"></div>
</div>