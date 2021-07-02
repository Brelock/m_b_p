<?php
/* @var \App\Models\Review[] $reviewVideos */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Видео отзывы</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
            'createButton' => true,
            'routeName' => 'admin.review-videos.create',
            'deleteButton' => false
        ])@endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Url работ</th>
            <th scope="col">Url video</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

            @foreach($reviewVideos as $i => $reviewVideo)
              <tr data-index="{{ $i }}" data-id="{{ $reviewVideo->id }}" data-entity="reviews-video">
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ $reviewVideo->title }}</td>
                <td>{{ $reviewVideo->work_url }}</td>
                <td>{{ $reviewVideo->video_url }}</td>
                <td><a href="{{ route('admin.review-videos.edit', ['review_video' => $reviewVideo]) }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ route('admin.review-videos.destroy', ['review_video' => $reviewVideo]) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/sortable.js') }}"></script>
@endsection