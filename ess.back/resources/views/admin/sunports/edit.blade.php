<?php
/* @var App\Models\Sunport $sunport */
?>

@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$sunport->isNew() ? $sunport->title_ru : 'Добавление sunport продукта' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-sunport"
              @if(!$sunport->isNew())
              action="{{ route('admin.sunports.update', ['sunport' => $sunport]) }}"
              @else
              action="{{ route('admin.sunports.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$sunport->isNew())
            @method('PUT')
          @endif

          <div class="block-content">
            <div class="row">

              <div class="col-sm-8">
                <br>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="ru-tab-link" data-toggle="tab" href="#ru-tab" role="tab"
                       aria-controls="ru-tab" aria-selected="true">Вариант <img src="/img/ru.svg" style="width: 1.5em;">
                    </a>
                    <a class="nav-item nav-link" id="uk-tab-link" data-toggle="tab" href="#uk-tab" role="tab"
                       aria-controls="uk-tab" aria-selected="false">Вариант <img src="/img/ua.svg" style="width: 1.5em;">
                    </a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="ru-tab" role="tabpanel" aria-labelledby="ru-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_ru',
                        'label' => 'Название sunport продукта',
                        'placeholder' => 'Введите название',
                        'object' => !$sunport->isNew() ? $sunport : null,
                        'width' => 'col-sm-12',
                        'attributes' => 'required'
                    ])@endcomponent
                    @component('admin.includes.text_input', [
                            'name' => 'sub_title_ru',
                            'label' => 'Подназвание sunport продукта',
                            'placeholder' => 'Введите описание',
                            'object' => !$sunport->isNew() ? $sunport : null,
                            'width' => 'col-sm-12'
                     ])@endcomponent

                    <div class="form-group" style="padding-left: 15px; padding-top: 10px;">
                      <h6>Seo теги</h6>
                    </div>
                    @component('admin.includes.text_input', [
                        'name' => 'seo_title_ru',
                        'label' => 'Seo title',
                        'placeholder' => 'Введите seo title',
                        'object' => !$sunport->isNew() ? $sunport : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent
                  </div>
                  <div class="tab-pane fade" id="uk-tab" role="tabpanel" aria-labelledby="uk-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_uk',
                        'label' => 'Название sunport продукта <small>украинский вариант</small>',
                        'placeholder' => 'Введите название',
                        'object' => !$sunport->isNew() ? $sunport : null,
                        'width' => 'col-sm-12',
                        'attributes' => 'required'
                    ])@endcomponent
                    @component('admin.includes.text_input', [
                          'name' => 'sub_title_uk',
                          'label' => 'Подназввание sunport продукта <small>украинский вариант</small>',
                          'placeholder' => 'Введите описание',
                          'object' => !$sunport->isNew() ? $sunport : null,
                          'width' => 'col-sm-12'
                   ])@endcomponent

                    <div class="form-group" style="padding-left: 15px; padding-top: 10px;">
                      <h6>Seo теги</h6>
                    </div>
                    @component('admin.includes.text_input', [
                        'name' => 'seo_title_uk',
                        'label' => 'Seo title <small>украинский вариант</small>',
                        'placeholder' => 'Введите seo title',
                        'object' => !$sunport->isNew() ? $sunport : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent
                  </div>
                </div>

                {{--                Create params--}}
                @if(!$sunport->isNew())
                  @include('admin.sunports.params_tab')
                  @include('admin.sunports.picture_params_tab')
                @else
                  <button type='button' class="add-params btn">Добавить характеристику</button>
                  <button type='button' class="add-picture_params btn">Добавить характеристику изображения</button>
                @endif
                {{--                end create params--}}

              </div>
              <div class="col-sm-4">
                @component('admin.includes.text_input', [
                        'name' => 'alias',
                        'label' => 'Alias',
                        'object' => !$sunport->isNew() ? $sunport : null,
                        'width' => 'col-sm-12',
                        'help' => 'Будет сформирован автоматически'
                ])@endcomponent
                @component('admin.includes.text_input', [
                        'name' => 'price',
                        'label' => 'Цена',
                        'object' => !$sunport->isNew() ? $sunport : null,
                        'width' => 'col-sm-12',
                ])@endcomponent

                <div class="form-group col-sm-12">
                  Загрузить PDF файл <small></small>
                </div>
                <div class="form-group col-sm-12">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" id="main-file"
                           name="fileXls" data-toggle="custom-file-input">
                    <label class="custom-file-label" for="projects-small-image">Выберите фаил</label>
                  </div>
                </div>
                <div class="form-group col-sm-8">
                  <div id="showXls" class="options-container">
                    @if(!$sunport->isNew() && ($xlsFile = $sunport->getXlsFileName()))
                      <p>{{ $xlsFile}}</p>
                      <span class="admin-xls-delete" style="margin-right: 10px;">
                        <i class="fa fa-times-circle-o delete-action-photo" aria-hidden="true"
                           id="{{ $sunport->id }}"></i>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group col-sm-12">
                  Загрузить картинку <small></small>
                </div>
                <div class="form-group col-sm-12">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" id="main-image"
                           name="filePicture" data-toggle="custom-file-input">
                    <label class="custom-file-label" for="projects-small-image">Выберите изображение</label>
                  </div>
                </div>
                <div class="form-group col-sm-8">
                  <div id="showFile" class="options-container">
                    @if(!$sunport->isNew() && ($pictureFile = $sunport->getPictureFileName()))
                      <img class="img-fluid icon-item" src="{{$sunport->assetAbsolute($pictureFile)}}">
                      <span class="admin-image-delete" style="margin-right: 10px;">
                         <i class="fa fa-times-circle-o delete-action-photo" aria-hidden="true"
                            id="{{ $sunport->id }}"></i>
                      </span>
                    @endif
                  </div>
                </div>

              </div>
            </div>
            <br>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{--        hidden block for extra params--}}
  @include('admin.sunports.hidden_params_block')
  @include('admin.sunports.hidden_picture_params_block')
  {{--        end hidden extra params block--}}
@endsection

@section('scripts')
  <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.js') }}"></script>
  <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
  <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('js/wysiwyg.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/deleteRestorePicture.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/sortablePictures.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/preloadPicture.js') }}"></script>
  <script>
    $(document).ready(function () {

      window.onkeydown = function (e) {
        if (e.keyCode === 13) {
          e.preventDefault()
        }
      }

      let $formSunport = $('#form-sunport'),
        $formSunportBtn = $formSunport.find('button[type=submit]');

      $formSunportBtn.on('click', function (e) {
        setTimeout(() => {
          window.flash('Необходимо указать "Название продукта" и "Характеристики" для всех версий языков', 'danger');
        }, 500);
      });

      let $body = $('body');

      $body.on('click', '.add-params', function() {
        let $formParam = $('.params-form-group[hidden="true"]');

        let $formParamClone = $formParam.clone().attr('hidden', false);

        let index = $('.params-form-group:not([hidden])').length;

        $formParamClone.find('.params-form-group__input--title_ru').attr('name', 'params[' + index + '][title_ru]');
        $formParamClone.find('.params-form-group__input--title_uk').attr('name', 'params[' + index + '][title_uk]');
        $formParamClone.find('.params-form-group__input--value_ru').attr('name', 'params[' + index + '][value_ru]');
        $formParamClone.find('.params-form-group__input--value_uk').attr('name', 'params[' + index + '][value_uk]');

        $formParamClone.insertBefore($(this));
      });

      $body.on('click', '.add-picture_params', function() {
        let $formPictureParam = $('.picture_params-form-group[hidden="true"]');

        let $formPictureParamClone = $formPictureParam.clone().attr('hidden', false);

        let index = $('.picture_params-form-group:not([hidden])').length;

        $formPictureParamClone.find('.picture-params-form-group__input--title_ru').attr('name', 'pictureParams[' + index + '][title_ru]');
        $formPictureParamClone.find('.picture-params-form-group__input--title_uk').attr('name', 'pictureParams[' + index + '][title_uk]');
        $formPictureParamClone.find('.picture-params-form-group__input--filePicture').attr('name', 'pictureParams[' + index + '][filePicture]');

        $formPictureParamClone.insertBefore($(this));
      });

      $body.on('click', '.admin-param-delete', function () {
        $(this).closest('.params-form-group').remove();
      });

      $body.on('click', '.admin-param-picture-delete', function () {
        $(this).closest('.picture_params-form-group').remove();
      });
    });
  </script>
@endsection