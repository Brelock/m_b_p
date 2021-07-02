<footer class="mainFooter">
  <div class="discussion-question">
    <div class="discussion-question__bgc">
      <div class="discussion-question__form-wrap">
        <div class="discussion-question__baner visible-viewportchecker visibility--check">
          <img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/panels.png') }}" alt="">
        </div>
        <div class="form-wraper">
          <div class="ess-section-title visible-viewportchecker visibility--check">{{ __('main-footer.want_to_discuss') }} <span>{{ __('main-footer.discuss') }}</span></div>
          <form action="#" class="project-cost__form visible-viewportchecker visibility--check" id="footer_project_cost__form"
            data-form-type="2">
            <label for="#">
              <input type="text" name="name" placeholder="{{ __('main-footer.your_name') }}" autocomplete="off"
                required
                data-error-text="{{ __('main-footer.whole_field') }}"
              >
            </label>
            <label for="#">
              <input type="number" name="phone" placeholder="{{ __('main-footer.phone') }}" autocomplete="off"
                required
                data-error-text="{{ __('main-footer.whole_field') }}"
              >
            </label>
           {{-- <label for="#">
              <input type="text" name="region" placeholder="{{ __('question-partner-form.region') }}" autocomplete="off"
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
            <div class="ess-section-btn">
              <div class="spinner">
                <div class="lds-dual-ring small"></div>
              </div>
              <button type="submit" data-form-target="footer_project_cost__form"
              >{{ __('main-footer.find_cost') }}</button>
            </div>
            <div class="calculator-links">
              <div class="calc-link__title">{{ __('main-footer.calculate_yourself') }}</div>
              <div class="calc-btn">
                <a href="https://ses.kr.ua/#/" target="_blank">{{ __('main-footer.calculate') }}</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="bottom-footer">
        <div class="footer-content-wrap">
          <p class="footer-copirate">{{ __('main-footer.rights_reserved') }}</p>
          <p class="footer-dev-company">{{ __('main-footer.designed') }} <a class="footer-dev-company__link"
           href="https://zengineers.company/">Zengineers.company</a></p>
        </div>
      </div>
  </div>
</footer>