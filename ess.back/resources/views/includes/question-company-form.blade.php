<div class="form-slide flex">
  <form action="#" id="question_company_form" data-form-type="5">

    <div class="form-top-slide visible-viewportchecker visibility--check">
      <label  class="economic-form-label">
        <input type="text" name="name" autocomplete="off" placeholder="{{ __('company.your_name') }}"
          required 
          data-error-text="{{ __('company.whole_field') }}"
        >
      </label>
      <label for="tel" class="economic-form-label">
        <input type="number" name="phone" autocomplete="off" placeholder="{{ __('company.your_phone') }}"
          required
          data-replace-required-for="email"
          data-error-text="{{ __('company.whole_field') }}"
        >
      </label>
    </div>

    <div class="form-body-slide">
      <label class="visible-viewportchecker visibility--check economic-form-label">
        <input type="email" name="email" autocomplete="off" placeholder="{{ __('company.your_mail') }}"
          required
          data-replace-required-for="phone"
          data-error-text="{{ __('company.valid_email') }}"
        >
      </label>
      <div class="economic-form-select region-select visible-viewportchecker visibility--check">
        <select name="region" class="for_message_field" data-label-name="{{ __('company.region') }}" required>
          <option value="" disabled selected>{{ __('company.region') }}</option>
          <option value="{{ __('company.zp') }}">{{ __('company.zp') }} {{ __('company.zaporiz_obl') }}</option>
          <option value="{{ __('company.dn') }}">{{ __('company.dn') }} {{ __('company.dnipro_obl') }}</option>
          <option value="#">{{ __('company.odessa_obl') }}</option>
          <option value="#">{{ __('company.chernihiv_obl') }}</option>
          <option value="#">{{ __('company.kharkiv_obl') }}</option>
          <option value="#">{{ __('company.zhytomyr_obl') }}</option>
          <option value="#">{{ __('company.poltava_obl') }}</option>
          <option value="#">{{ __('company.kherson_obl') }}</option>
          <option value="#">{{ __('company.kiev_obl') }}</option>
          <option value="#">{{ __('company.donetsk_obl') }}</option>
          <option value="#">{{ __('company.vinnitsa_obl') }}</option>
          <option value="#">{{ __('company.kirovograd_obl') }}</option>
          <option value="#">{{ __('company.nikolaev_obl') }}</option>
          <option value="#">{{ __('company.sumy_obl') }}</option>
          <option value="#">{{ __('company.lviv_obl') }}</option>
          <option value="#">{{ __('company.kas_obl') }}</option>
          <option value="#">{{ __('company.khmelnitsk_obl') }}</option>
          <option value="#">{{ __('company.volynsk_obl') }}</option>
          <option value="#">{{ __('company.rivne_obl') }}</option>
          <option value="#">{{ __('company.ivan_obl') }}</option>
          <option value="#">{{ __('company.tern_obl') }}</option>
          <option value="#">{{ __('company.carpat_obl') }}</option>
          <option value="#">{{ __('company.chernivet_obl') }}</option>
        </select>
      </div>
      <div class="economic-grafic-slide-wrap sliders-data visible-viewportchecker visibility--check">
       <div class="economic-grafic-slide-l">
          <div class="economic-form-select">
            <select name="station_view" class="for_message_field" data-label-name="{{ __('company.station_view') }}" required>
              <option value="" disabled selected>{{ __('company.station_view') }}</option>
              <option value="{{ __('company.own_consumption') }}">{{ __('company.own_consumption') }}</option>
              <option value="{{ __('company.green_tariff') }}">{{ __('company.green_tariff') }}</option>
            </select>
          </div>
          <label class="economic-form-label">
            <input type="text" name="powerbisnes" autocomplete="off" placeholder="{{ __('company.average_daily_volume') }}"
            class="for_message_field" data-label-name="{{ __('company.average_daily_volume') }}" required>
          </label>
          <label class="economic-form-label">
            <input type="text" name="consumption" autocomplete="off" placeholder="{{ __('company.consumption') }}"
            class="for_message_field" data-label-name="{{ __('company.consumption') }}" required>
          </label>
       </div>
        <div class="economic-grafic-slide-r">
          <label class="economic-form-label">
            <input type="text" name="price" autocomplete="off" placeholder="{{ __('company.current_price') }}"
            class="for_message_field" data-label-name="{{ __('company.current_price') }}" required>
          </label>
          <label class="economic-form-label">
            <input type="text" name="square" autocomplete="off" placeholder="{{ __('company.available_area') }}"
            class="for_message_field" data-label-name="{{ __('company.available_area') }}" required>
          </label>
          <div class="economic-form-select">
            <select name="accommodation" class="for_message_field" data-label-name="{{ __('company.accommodation') }}" required>
              <option value="" disabled selected>{{ __('company.accommodation') }}</option>
              <option value="{{ __('company.roof') }}">{{ __('company.roof') }}</option>
              <option value="{{ __('company.earth') }}">{{ __('company.earth') }}</option>
              <option value="{{ __('company.roof') }} + {{ __('company.earth') }}">{{ __('company.roof') }} + {{ __('company.earth') }}</option>
            </select>
          </div>
        </div>

      </div>
    </div>

    <div class="ess-section-btn visible-viewportchecker visibility--check">
      <div class="spinner">
        <div class="lds-dual-ring small"></div>
      </div>
      <button type="submit">{{ __('company.get_an_offer') }}</button>
    </div>
  </form>
</div>