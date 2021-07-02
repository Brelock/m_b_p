<?php
/* @var App\Models\Seo $seo */
?>
@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$seo->isNew() ? $seo->title_ru : 'Добавление Seo данных' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-projects"
              @if(!$seo->isNew())
              action="{{ route('admin.seo.update', ['seo' => $seo]) }}"
              @else
              action="{{ route('admin.seo.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$seo->isNew())
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
                        'label' => 'Seo title',
                        'placeholder' => 'Введите seo title',
                        'object' => !$seo->isNew() ? $seo : null,
                        'width' => 'col-sm-12',
                    ])@endcomponent
                    @component('admin.includes.textarea_input', [
                        'name' => 'description_ru',
                        'label' => 'Seo description',
                        'placeholder' => 'Введите description',
                        'object' => !$seo->isNew() ? $seo : null,
                        'rows' => 5,
                        'width' => 'col-sm-12'
                    ])@endcomponent
                  </div>
                  <div class="tab-pane fade" id="uk-tab" role="tabpanel" aria-labelledby="uk-tab-link">
                    <br>
                    @component('admin.includes.text_input', [
                        'name' => 'title_uk',
                        'label' => 'Seo title <small>украинский вариант</small>',
                        'placeholder' => 'Введите seo title',
                        'object' => !$seo->isNew() ? $seo : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent


                    @component('admin.includes.textarea_input', [
                        'name' => 'description_uk',
                        'label' => 'Seo description <small>украинский вариант</small>',
                        'placeholder' => 'Введите description',
                        'object' => !$seo->isNew() ? $seo : null,
                        'rows' => 5,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                  </div>
                </div>

                @component('admin.includes.text_input', [
                    'name' => 'redirect_uri',
                    'label' => 'URL страницы',
                    'placeholder' => 'Введите ссылку',
                    'object' => !$seo->isNew() ? $seo : null,
                    'width' => 'col-sm-12'
                ])@endcomponent
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