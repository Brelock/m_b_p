<div class="section-pictorial-val-wrap">
  <span class="icon-bg-line"></span>
  <div class="title visible-viewportchecker visibility--check hidden">{{ trans('main.achievements') }}</div>
  <div class="pictorial-wrap-content">

    <div class="pictorial-item visible-viewportchecker visibility--check hidden">
      <span class="i-num" data-count="{{ $achievements->offices }}">0</span>
      <span class="i-val">{{ trans('main.offices_amount') }}</span>
    </div>
    <div class="pictorial-item visible-viewportchecker visibility--check hidden">
      <span class="i-num" data-count="{{ $achievements->cities }}">0</span>
      <span class="i-val">{{ trans('main.cities') }}</span>
    </div>
    <div class="pictorial-item visible-viewportchecker visibility--check hidden">
      <span class="i-num" data-count="{{ $achievements->years }}">0</span>
      <span class="i-val">{{ trans('main.years_on_market') }}</span>
    </div>
    <div class="pictorial-item visible-viewportchecker visibility--check hidden">
      <span class="i-num" data-count="{{ $achievements->clients }}">0</span>
      <span class="i-val">{{ trans('main.happy_clients') }}</span>
    </div>
  </div>
</div>