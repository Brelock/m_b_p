<?php
/* @var App\Models\Review $reviewFoto */
?>
@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$reviewFoto->isNew() ? $reviewFoto->title : 'Добавление отзыва' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-projects"
              @if(!$reviewFoto->isNew())
              action="{{ route('admin.review-fotos.update', ['review_foto' => $reviewFoto]) }}"
              @else
              action="{{ route('admin.review-fotos.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$reviewFoto->isNew())
            @method('PUT')
          @endif

          <input type="hidden" name="type" value="3">

          <div class="block-content">
            <div class="row">

                <div class="col-sm-4">
                    @component('admin.includes.text_input', [
                      'name' => 'title',
                      'label' => 'Название',
                      'placeholder' => 'Введите название',
                      'object' => !$reviewFoto->isNew() ? $reviewFoto : null,
                      'width' => 'col-sm-12'
                    ])@endcomponent

                    <div class="form-group col-sm-12">
                        Изображение для отзыва решения <small>(436х390px)</small>
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
                            @if(!$reviewFoto->isNew() && ($backgroundImage = $reviewFoto->getBackgroundImagePath()))
                                <img src="{{ $backgroundImage }}">
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
    <script type="text/javascript" src="{{ asset('js/sortablePictures.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/preloadPicture.js') }}"></script>

@endsection
