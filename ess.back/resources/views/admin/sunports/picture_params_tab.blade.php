<?php
/* @var App\Models\Sunport $sunport */
?>

<div class="row items-push picture-params-form-group-main">
  <div class="form-group col-sm-12">
    <hr>
    <h6>Характеристики изображений sunport продукта <small></small></h6>
  </div>

  @if(!$sunport->isNew())
    @if($sunport->paramsPicture)
      @foreach($sunport->paramsPicture as $i => $pictureParam)
        <div class="form-group col-sm-12 picture_params-form-group">
          <input type="hidden" name="pictureParams[{{ $i }}][id]" value="{{ $pictureParam->id }}" />

          <hr>

          <div class="row">
            <span class="admin-param-delete" style="margin-left:20px;color:red;">
              <i class="fa fa-times-circle-o admin-param-picture-delete" aria-hidden="true"
                 id="{{ $pictureParam->id }}"></i>
            </span>
          </div>
          <div class="row">

            <div class="form-group{{ $errors->has('pictureParams[title_ru][]') ? ' is-invalid' : '' }} col-sm-6">
              <div class="form-material form-material-primary">
                <input id="pictureParamName{{ $pictureParam->id }}"
                       type="text"
                       class="form-control"
                       name="pictureParams[{{ $i }}][title_ru]"
                       placeholder="Введите название"
                       value="{{ $pictureParam->title_ru }}">
                <label for="pictureParams[title_ru][]">Название параметра</label>
              </div>

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset

              @if ($errors->has('pictureParams[title_ru][]'))
                <div class="invalid-feedback">{{ $errors->first('pictureParams[title_ru][]') }}</div>
              @endif
            </div>

            <div class="form-group{{ $errors->has('pictureParams[title_uk][]') ? ' is-invalid' : '' }} col-sm-6">
              <div class="form-material form-material-primary">
                <input id="pictureParamName{{ $pictureParam->id }}"
                       type="text"
                       class="form-control"
                       name="pictureParams[{{ $i }}][title_uk]"
                       placeholder="Введите название (украинский вариант)"
                       value="{{ $pictureParam->title_uk }}">
                <label for="pictureParams[title_uk][]">Название параметра (украинский вариант)</label>
              </div>

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset

              @if ($errors->has('pictureParams[title_uk][]'))
                <div class="invalid-feedback">{{ $errors->first('pictureParams[title_uk][]') }}</div>
              @endif
            </div>

            <div class="form-group{{ $errors->has('pictureParams[filePicture][]') ? ' is-invalid' : '' }} col-sm-6">
              <div class="form-material form-material-primary">
                <input id="pictureParamName{{ $pictureParam->id }}"
                       type="file"
                       class="form-control"
                       name="pictureParams[{{ $i }}][filePicture]"
                       placeholder="Выберите изображение"
                       value="{{ $pictureParam->picture_file_name }}">
                <label for="pictureParams[filePicture][]">Изображение</label>
              </div>

              <img src="{{ $pictureParam->assetAbsolute($pictureParam->picture_file_name) }}"
                   width="100"
                   height="100"
                   alt="pp{{ $pictureParam->id }}" />

              @isset($help)
                <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
              @endisset

              @if ($errors->has('pictureParams[filePicture][]'))
                <div class="invalid-feedback">{{ $errors->first('pictureParams[filePicture][]') }}</div>
              @endif
            </div>

          </div>
          <hr>

        </div>
      @endforeach
    @endif
  @else
    <div class="form-group col-sm-12 picture_params-form-group">
      <hr>
      <div class="row">
        @component('admin.includes.text_input', [
         'name' => "pictureParams[{{ $i }}][title_ru]",
         'label' => 'Название параметра изображения',
         'placeholder' => 'Введите название',
         'object' => !$sunport->isNew() ? $sunport : null,
         'width' => 'col-sm-6',
         'attributes' => 'required'
        ])@endcomponent
        @component('admin.includes.text_input', [
           'name' => "pictureParams[{{ $i }}][title_uk]",
           'label' => 'Название параметра изображения(украинский вариант)',
           'placeholder' => 'Введите название',
           'object' => !$sunport->isNew() ? $sunport : null,
           'width' => 'col-sm-6',
           'attributes' => 'required'
       ])@endcomponent
      </div>

      <div class="row">
        @component('admin.includes.fileFormGroup', ['errors' => $errors, 'property' => 'file', 'label' => '30х30'])
          <input type="file" name="pictureParams[{{ $i }}][filePicture]" class="form-control-file"
                 id="param-image">
        @endcomponent
      </div>

      <hr>
    </div>
  @endif

  <button type='button' class="add-picture_params btn">Добавить характеристику изображения</button>
</div>
