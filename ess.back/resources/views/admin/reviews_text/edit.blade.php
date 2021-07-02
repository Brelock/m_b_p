<?php
/* @var App\Models\Review $reviewText */
?>
@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$reviewText->isNew() ? $reviewText->title : 'Добавление отзыва' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-projects"
              @if(!$reviewText->isNew())
              action="{{ route('admin.review-texts.update', ['review_text' => $reviewText]) }}"
              @else
              action="{{ route('admin.review-texts.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$reviewText->isNew())
            @method('PUT')
          @endif

            <input type="hidden" name="type" value="1">

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
                    @component('admin.includes.textarea_input', [
                        'name' => 'text_ru',
                        'label' => 'Содержание отзыва',
                        'placeholder' => 'Введите описание',
                        'object' => !$reviewText->isNew() ? $reviewText : null,
                        'rows' => 6,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                    @component('admin.includes.text_input', [
                        'name' => 'author_name_ru',
                        'label' => 'Автор',
                        'placeholder' => 'Введите автора',
                        'object' => !$reviewText->isNew() ? $reviewText : null,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                  </div>
                  <div class="tab-pane fade" id="uk-tab" role="tabpanel" aria-labelledby="uk-tab-link">
                    <br>
                    @component('admin.includes.textarea_input', [
                        'name' => 'text_uk',
                        'label' => 'Содержание отзыва <small>украинский вариант</small>',
                        'placeholder' => 'Введите описание',
                        'object' => !$reviewText->isNew() ? $reviewText : null,
                        'rows' => 6,
                        'width' => 'col-sm-12'
                    ])@endcomponent

                      @component('admin.includes.text_input', [
                          'name' => 'author_name_uk',
                          'label' => 'Автор <small>украинский вариант</small>',
                          'placeholder' => 'Введите автора',
                          'object' => !$reviewText->isNew() ? $reviewText : null,
                          'width' => 'col-sm-12',
                      ])@endcomponent

                  </div>
                </div>
              </div>

                <div class="col-sm-4">
                    @component('admin.includes.text_input', [
                      'name' => 'title',
                      'label' => 'Название',
                      'placeholder' => 'Введите название',
                      'object' => !$reviewText->isNew() ? $reviewText : null,
                      'width' => 'col-sm-12'
                    ])@endcomponent

                    @component('admin.includes.text_input', [
                      'name' => 'work_url',
                      'label' => 'Url работ',
                      'placeholder' => 'Введите url',
                      'object' => !$reviewText->isNew() ? $reviewText : null,
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
@endsection
