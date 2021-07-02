<?php
/* @var App\Models\Review $reviewVideo */
?>
@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">{{ !$reviewVideo->isNew() ? $reviewVideo->title : 'Добавление отзыва' }}</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-projects"
              @if(!$reviewVideo->isNew())
              action="{{ route('admin.review-videos.update', ['review_video' => $reviewVideo]) }}"
              @else
              action="{{ route('admin.review-videos.store') }}"
              @endif
              enctype="multipart/form-data">
          @csrf

          @if(!$reviewVideo->isNew())
            @method('PUT')
          @endif

            <input type="hidden" name="type" value="2">

          <div class="block-content">
            <div class="row">
                <div class="col-sm-4">
                    @component('admin.includes.text_input', [
                      'name' => 'title',
                      'label' => 'Название',
                      'placeholder' => 'Введите название',
                      'object' => !$reviewVideo->isNew() ? $reviewVideo : null,
                      'width' => 'col-sm-12'
                    ])@endcomponent

                    @component('admin.includes.text_input', [
                      'name' => 'work_url',
                      'label' => 'Url работ',
                      'placeholder' => 'Введите url',
                      'object' => !$reviewVideo->isNew() ? $reviewVideo : null,
                      'width' => 'col-sm-12'
                    ])@endcomponent

                    @component('admin.includes.text_input', [
                      'name' => 'video_url',
                      'label' => 'Url video',
                      'placeholder' => 'Введите url',
                      'object' => !$reviewVideo->isNew() ? $reviewVideo : null,
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


