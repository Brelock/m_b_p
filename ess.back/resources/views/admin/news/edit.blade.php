<?php
/* @var App\Models\News $news */
?>
@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$news->isNew() ? $news->title_ru : 'Добавление новости' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-projects"
              @if(!$news->isNew())
              action="{{ route('admin.news.update', ['news' => $news]) }}"
              @else
              action="{{ route('admin.news.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$news->isNew())
            @method('PUT')
          @endif

          <div class="block-content">
            <div class="row">

              <div class="col-sm-8">
                <br>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="ru-tab-link" data-toggle="tab" href="#ru-tab" role="tab" aria-controls="ru-tab" aria-selected="true">Вариант <img src="/img/ru.svg" style="width: 1.5em;"></a>
                    <a class="nav-item nav-link" id="uk-tab-link" data-toggle="tab" href="#uk-tab" role="tab" aria-controls="uk-tab" aria-selected="false">Вариант <img src="/img/ua.svg" style="width: 1.5em;"></a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="ru-tab" role="tabpanel" aria-labelledby="ru-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_ru',
                        'label' => 'Название новости',
                        'placeholder' => 'Введите название',
                        'object' => !$news->isNew() ? $news : null,
                        'width' => 'col-sm-12',
                    ])@endcomponent

                    @component('admin.includes.textarea_input', [
                        'name' => 'text_ru',
                        'label' => 'Содержание новости',
                        'placeholder' => 'Введите описание',
                        'object' => !$news->isNew() ? $news : null,
                        'rows' => 12,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                    <div class="form-group" style="padding-left: 15px; padding-top: 10px;">
                      <h6>Seo теги</h6>
                    </div>
                    @component('admin.includes.text_input', [
                        'name' => 'seo_title_ru',
                        'label' => 'Seo title',
                        'placeholder' => 'Введите seo title',
                        'object' => !$news->isNew() ? $news : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent
                    @component('admin.includes.textarea_input', [
                        'name' => 'seo_description_ru',
                        'label' => 'Seo description',
                        'placeholder' => 'Введите seo description',
                        'object' => !$news->isNew() ? $news : null,
                        'rows' => 5,
                        'width' => 'col-sm-12'
                    ])@endcomponent
                  </div>
                  <div class="tab-pane fade" id="uk-tab" role="tabpanel" aria-labelledby="uk-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_uk',
                        'label' => 'Название проекта <small>украинский вариант</small>',
                        'placeholder' => 'Введите название',
                        'object' => !$news->isNew() ? $news : null,
                        'width' => 'col-sm-12',
                        'attributes' => 'required'
                    ])@endcomponent

                    @component('admin.includes.textarea_input', [
                        'name' => 'text_uk',
                        'label' => 'Содержание новости <small>украинский вариант</small>',
                        'placeholder' => 'Введите описание',
                        'object' => !$news->isNew() ? $news : null,
                        'rows' => 12,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                    <div class="form-group" style="padding-left: 15px; padding-top: 10px;">
                      <h6>Seo теги</h6>
                    </div>
                    @component('admin.includes.text_input', [
                        'name' => 'seo_title_uk',
                        'label' => 'Seo title <small>украинский вариант</small>',
                        'placeholder' => 'Введите seo title',
                        'object' => !$news->isNew() ? $news : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent
                    @component('admin.includes.textarea_input', [
                        'name' => 'seo_description_uk',
                        'label' => 'Seo description <small>украинский вариант</small>',
                        'placeholder' => 'Введите seo description',
                        'object' => !$news->isNew() ? $news : null,
                        'rows' => 5,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <hr>
                  <h6>Изображения для страницы новостей <small>(1920х430px)</small></h6>
                </div>

                <div class="form-group col-sm-12">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" multiple
                           id="project-images" name="files[]" data-toggle="custom-file-input">
                    <label class="custom-file-label" for="project-images">Выберите изображения</label>
                  </div>
                </div>

                <div class="row items-push">
                  <ul id="sortable" class="col-12 d-flex flex-wrap " data-entity="{{ $news->getTable() }}">
                    @if(!$news->isNew() && $news->pictures)
                      @forelse($news->pictures as $i => $picture)
                        <li class="ui-state-default"
                            data-index="{{ $i }}"
                            data-id="{{ $picture->id }}"
                            data-projectId="{{ $news->id }}"
                            @if($picture->is_main == 1) style="display:none;" @endif>
                          <div class="col-sm-3 animated fadeIn">
                            <div class="options-container">
                              <div class="options-overlay-content">
                                  <span class="admin-image-delete" style="margin-right: 10px;">
                                    <i class="fa fa-times-circle-o delete-action-photo" aria-hidden="true"
                                       id="{{ $picture->id }}"></i>
                                  </span>
                                <span class="admin-image-restore">
                                    <i class="fa fa-window-restore restore-action-photo" aria-hidden="true"
                                       data-id="{{ $picture->id }}"></i>
                                  </span>
                              </div>
                              <img class="img-fluid options-item" src="{{ $picture->getThumbImagePath() }}">
                            </div>
                          </div>
                        </li>
                      @empty
                      @endforelse
                    @endif
                  </ul>
                </div>

              </div>
              <div class="col-sm-4">

                <div class="form-group col-sm-12">
                  <br>
                  <label class="css-control css-control-sm css-control-primary css-switch">
                    <input type="checkbox" name="is_published" value="1" class="css-control-input"
                           @if(old('is_published') == $news::IS_PUBLISHED || (!$news->isNew() && $news->isPublished())) checked
                           @endif>
                    <span class="css-control-indicator"></span> Опубликовано
                  </label>
                </div>

                @component('admin.includes.date_input', [
                          'name' => 'publication_date',
                          'label' => 'Дата публикации',
                          'placeholder' => 'Введите дату публикаци',
                          'object' => !$news->isNew() ? $news : null,
                          'width' => 'col-sm-12'
                ])@endcomponent

                @component('admin.includes.text_input', [
                        'name' => 'alias',
                        'label' => 'Alias',
                        'object' => !$news->isNew() ? $news : null,
                        'width' => 'col-sm-12',
                        'help' => 'Будет сформирован автоматически'
                ])@endcomponent

                <div class="form-group col-sm-12">
                  Изображение для списка новостей <small>(650х430px)</small>
                </div>

                <div class="form-group col-sm-12">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" id="main-image" name="mainFile" data-toggle="custom-file-input">
                    <label class="custom-file-label" for="projects-small-image">Выберите изображение</label>
                  </div>
                </div>
                  <div class="form-group col-sm-8">
                    <div id="showFile" class="options-container">
                      @if(!$news->isNew() && ($backgroundImage = $news->getBackgroundImagePath()))
                        <img width="400" height="300" src="{{ $backgroundImage }}">
                      @endif
                    </div>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


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

          let $formProj = $('#form-projects'),
              $formProjBtn = $formProj.find('button[type=submit]');

          $formProjBtn.on('click', function(e) {
              setTimeout(() => {
                  window.flash('Необходимо указать "Название проекта" и "Характеристики" для всех версий языков', 'danger');
              }, 500);
          });

      });

  </script>

@endsection