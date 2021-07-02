<div id="modal_question" class="modal-question modal-block ess-modal">
  <div class="modal-content-wrap" tabindex="-1" role="dialog">
    <div class="modal__content">
      <div class="modal__content-title modal_title">{{ __('question-form.question') }}</div>
      <div class="modal-close__btn">
        <button type="button" class="modal-close-button"></button>
      </div>
      <form class="modal-body modal_body standard-form" id="modal_question_body" data-form-type="1">
        <div class="modal-inputs-wrap">

        <fieldset class="formRow">
          <div class="formRow--item">
            <label for="#" class="formRow--input-wrapper js-inputWrapper">
              <input type="text" placeholder="{{ __('question-form.your_name') }}" autocomplete="off" data-doptext=""
                class="formRow--input js-input"
                name="name" 
                required 
                data-error-text="{{ __('question-form.whole_field') }}"
                initial-scale=1.0 
                maximum-scale=1.0
              >
            </label>
          </div>
        </fieldset>
        <fieldset class="formRow">
          <div class="formRow--item">
            <label for="#" class="formRow--input-wrapper js-inputWrapper">
              <input type="number" placeholder="{{ __('question-form.your_phone') }}" autocomplete="off" data-doptext=""
                class="formRow--input js-input"
                name="phone"
                required
                data-error-text="{{ __('question-form.whole_field') }}"
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
              <label for="#" class="formRow--input-wrapper js-inputWrapper">
                <input type="text" placeholder="{{ __('question-modal.region') }}" autocomplete="off" data-doptext=""
                       class="formRow--input js-input"
                       required
                       data-error-text="{{ __('question-form.whole_field') }}"
                       name="region"
                       initial-scale=1.0
                       maximum-scale=1.0
                >
              </label>
            </div>
          </fieldset> --}}
        <fieldset class="formRow">
          <div class="formRow--item">
            <label for="#" class="formRow--input-wrapper js-inputWrapper">
              <input type="text" placeholder="{{ __('question-form.message_text') }}" autocomplete="off" data-doptext=""
                class="formRow--input js-input"
                name="message"
                initial-scale=1.0
                maximum-scale=1.0
              >
            </label>
          </div>
        </fieldset>

          <div class="formRow input-checkbox">

            <input type="checkbox" id="check1"
              required not-send
              data-error-text="{{ __('question-form.needed_your') }}"
              initial-scale=1.0 
              maximum-scale=1.0
            >
            <label for="check1"></label>
            <span>{{ __('question-form.see') }} <a href="#">{{ __('question-form.user_agreement') }}</a> {{ __('question-form.and') }} <a href="#">{{ __('question-form.privacy_policy') }}</a></span>
          </div>
        </div>
        <div class="submit-modal-form disabled">
          <div class="spinner">
            <div class="lds-dual-ring small"></div>
          </div>
          <button disabled type="submit">{{ __('question-form.send_message') }}</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-overlay modal_overlay"></div>
</div>

<div id="question_notification" class="modal-question notification-modal ess-modal">
  <div class="modal-content-wrap" tabindex="-1" role="dialog">
    <div class="modal__content">
      <div class="modal__content-title modal_title">{{ __('question-form.thanks') }}</div>
      <div class="modal-close__btn">
        <button type="button" class="notification-close-button"></button>
      </div>
    </div>
  </div>

  <div class="modal-overlay modal_overlay"></div>
</div>

