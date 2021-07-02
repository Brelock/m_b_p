<?php
/* @var App\Models\Solution $solution */
?>
@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$solution->isNew() ? $solution->title_ru : 'Добавление решения' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-projects"
              @if(!$solution->isNew())
              action="{{ route('admin.solutions.update', ['solution' => $solution]) }}"
              @else
              action="{{ route('admin.solutions.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$solution->isNew())
            @method('PUT')
          @endif

          <div class="block-content">
            <div class="row">

              <div class="col-sm-8">
                <br>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="ru-tab-link" data-toggle="tab" href="#ru-tab" role="tab"
                       aria-controls="ru-tab" aria-selected="true">Вариант <img src="/img/ru.svg" style="width: 1.5em;"></a>
                    <a class="nav-item nav-link" id="uk-tab-link" data-toggle="tab" href="#uk-tab" role="tab"
                       aria-controls="uk-tab" aria-selected="false">Вариант <img src="/img/ua.svg"
                                                                                 style="width: 1.5em;"></a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="ru-tab" role="tabpanel" aria-labelledby="ru-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_ru',
                        'label' => 'Название решения',
                        'placeholder' => 'Введите название',
                        'object' => !$solution->isNew() ? $solution : null,
                        'width' => 'col-sm-12',
                    ])@endcomponent

                  </div>
                  <div class="tab-pane fade" id="uk-tab" role="tabpanel" aria-labelledby="uk-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_uk',
                        'label' => 'Название проекта <small>украинский вариант</small>',
                        'placeholder' => 'Введите название',
                        'object' => !$solution->isNew() ? $solution : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent


                  </div>
                </div>

              </div>
              <div class="col-sm-4">

                @component('admin.includes.formGroup', ['errors' => $errors, 'property' => 'type', 'label' => 'Тип'])
                  <select class="form-control" id="solution_id" name="type">
                    <option value="">Выберите тип</option>
                    @foreach($solutionType as $typeName)
                      <option value="{{ $typeName }}"
                              @if($typeName == old('type'))
                              selected
                              @elseif(isset($solution) && $typeName == $solution->type)
                              selected
                        @endif
                      >{{ \App\Enums\SolutionsType::$LABELS[$typeName] }}</option>
                      @endforeach
                      </option>
                  </select>
                @endcomponent

                @component('admin.includes.text_input', [
                        'name' => 'alias',
                        'label' => 'Alias',
                        'object' => !$solution->isNew() ? $solution : null,
                        'width' => 'col-sm-12',
                        'help' => 'Будет сформирован автоматически'
                ])@endcomponent
                @component('admin.includes.text_input', [
                        'name' => 'power',
                        'label' => 'Мощность',
                        'object' => !$solution->isNew() ? $solution : null,
                        'width' => 'col-sm-12',
                ])@endcomponent

                <div class="form-group col-sm-12">
                  Изображение для готового решения <small>(436х390px)</small>
                </div>

                <div class="form-group col-sm-12">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" id="main-image"
                           name="file" data-toggle="custom-file-input">
                    <label class="custom-file-label" for="projects-small-image">Выберите изображение</label>
                  </div>
                </div>
                <div class="form-group col-sm-8">
                  <div id="showFile" class="options-container">
                    @if(!$solution->isNew() && ($backgroundImage = $solution->getBackgroundImagePath()))
                      <img src="{{ $backgroundImage }}">
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

      $formProjBtn.on('click', function (e) {
        setTimeout(() => {
          window.flash('Необходимо указать "Название pешения"', 'danger');
        }, 500);
      });

    });

  </script>

@endsection