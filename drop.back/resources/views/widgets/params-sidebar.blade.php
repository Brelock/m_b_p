<?php
/* @var \App\Models\Param[] $params */
/* @var array $selected */
?>
<div class="filter-mobile-buttom">Показать фильтры</div>
<div class="form--block">
  <form method="GET" action="{{ url()->full() }}" class="form form-products-filters">
    @foreach(request()->all() as $key => $value)
      @if(!is_array($value))
        <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
      @elseif($key != 'paramsValues')
        @foreach($value as $item)
          <input type="hidden" name="{{ $key }}[]" value="{{ $item }}" />
        @endforeach
      @endif
    @endforeach

    <div class="products-filters__container">

      @foreach($params as $param)
        <div class="acc-item products-filter">
          <button type="button" class="acc-button title-common button-filter">
            {{ $param->title }}
            <i class="icomoon icon-arrow"></i>
          </button>
          <div class="acc-content">
            <div class="products-filter-wrap">
              @if($param->paramValues)
                @foreach($param->paramValues as $paramValue)
                  <div class="form-row-secondary">
                    <div class="checkbox-item">
                      <label class="checkbox-label">
                        <input name="paramsValues[]"
                               type="checkbox"
                               class="form-checkbox form-checkbox--hidden param-checkbox"
                               @if(in_array($paramValue->id, $selected)) checked @endif
                               value="{{ $paramValue->id }}"
                        >
                        <span class="form-checkbox-subtitle">
                          <span class="products-filter__subtitle">{{ $paramValue->value }}</span>
                          {{--<span class="products-filter__quantity">(45)</span>--}}
                        </span>
                      </label>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
            <button type="button" class="button-show-all">
              Показать все
              <i class="icomoon icon-arrow"></i>
            </button>
          </div>
        </div>
      @endforeach

    </div>

    <button id="refreshParamsSidebar" type="submit" style="display: none"></button>
  </form>
</div>

