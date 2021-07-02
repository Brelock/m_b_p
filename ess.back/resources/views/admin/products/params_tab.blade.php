<div class="row items-push params-form-group-main">
  <div class="form-group col-sm-12">
    <hr>
    <h6>Характеристики товара <small></small></h6>
  </div>

  @if(!$product->isNew())
    @if($product->params)
      @foreach($product->params as $param)
        <div class="form-group col-sm-12 params-form-group">
          <hr>
          <div class="row">
            <span class="admin-param-delete" style="margin-left:20px;color:red;">
              <i class="fa fa-times-circle-o delete-action-param" aria-hidden="true"
                 id="{{ $param->id }}"></i>
            </span>
          </div>
          <div class="row">
            <div class="form-group{{ $errors->has('params[title_ru][]') ? ' is-invalid' : '' }} col-sm-6">


              <div class="form-material form-material-primary">

                <input id="{{ $param->title_ru }}"
                       type="text"
                       class="form-control"
                       name="params[title_ru][]"
                       placeholder="Введите название"
                       value="{{ $param->title_ru }}">

                <label for="params[title_ru][]">Название параметра</label>

              </div>

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset


              @if ($errors->has('params[title_ru][]'))
                <div class="invalid-feedback">{{ $errors->first('params[title_ru][]') }}</div>
              @endif

            </div>
            <div class="form-group{{ $errors->has('params[title_uk][]') ? ' is-invalid' : '' }} col-sm-6">

              <div class="form-material form-material-primary">

                <input id="{{ $param->title_uk }}"
                       type="text"
                       class="form-control"
                       name="params[title_uk][]"
                       placeholder="Введите название (украинский вариант)"
                       value="{{ $param->title_uk }}">

                <label for="params[title_uk][]">Название параметра (украинский вариант)</label>

              </div>

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset


              @if ($errors->has('params[title_uk][]'))
                <div class="invalid-feedback">{{ $errors->first('params[title_uk][]') }}</div>
              @endif

            </div>
          </div>
          <div class="row">
            <div class="form-group{{ $errors->has('params[value_ru][]') ? ' is-invalid' : '' }} col-sm-6">

              <div class="form-material form-material-primary">

                <input id="{{ $param->value_ru }}"
                       type="text"
                       class="form-control"
                       name="params[value_ru][]"
                       placeholder="Введите значение"
                       value="{{ $param->value_ru }}">

                <label for="params[value_ru][]">Значение параметра</label>
              </div>

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset


              @if ($errors->has('params[value_ru][]'))
                <div class="invalid-feedback">{{ $errors->first('params[value_ru][]') }}</div>
              @endif

            </div>

            <div class="form-group{{ $errors->has('params[value_uk][]') ? ' is-invalid' : '' }} col-sm-6">

              <div class="form-material form-material-primary">

                <input id="{{ $param->value_uk }}"
                       type="text"
                       class="form-control"
                       name="params[value_uk][]"
                       placeholder="Введите значение"
                       value="{{ $param->value_uk }}">

                <label for="params[value_uk][]">Значение параметра (украинский вариант)</label>
              </div>

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset


              @if ($errors->has('params[value_uk][]'))
                <div class="invalid-feedback">{{ $errors->first('params[value_uk][]') }}</div>
              @endif

            </div>
          </div>
          <hr>

        </div>
      @endforeach
    @endif
  @else
    <div class="form-group col-sm-12 params-form-group">
      <hr>
      <div class="row">
        @component('admin.includes.text_input', [
         'name' => 'params[title_ru][]',
         'label' => 'Название параметра',
         'placeholder' => 'Введите название',
         'object' => !$product->isNew() ? $product : null,
         'width' => 'col-sm-6',
         'attributes' => 'required'
        ])@endcomponent
        @component('admin.includes.text_input', [
           'name' => 'params[title_uk][]',
           'label' => 'Название параметра (украинский вариант)',
           'placeholder' => 'Введите название',
           'object' => !$product->isNew() ? $product : null,
           'width' => 'col-sm-6',
           'attributes' => 'required'
       ])@endcomponent
      </div>
      <div class="row">
        @component('admin.includes.text_input', [
         'name' => 'params[value_ru][]',
         'label' => 'Значение параметра',
         'placeholder' => 'Введите значение',
         'object' => !$product->isNew() ? $product : null,
         'width' => 'col-sm-6',
         'attributes' => 'required'
        ])@endcomponent
        @component('admin.includes.text_input', [
           'name' => 'params[value_uk][]',
           'label' => 'Значение параметра (украинский вариант)',
           'placeholder' => 'Введите значение',
           'object' => !$product->isNew() ? $product : null,
           'width' => 'col-sm-6',
           'attributes' => 'required'
       ])@endcomponent
      </div>
      <hr>
    </div>
  @endif

  <button type='button' class="add-params btn">Добавить характеристику</button>

</div>
