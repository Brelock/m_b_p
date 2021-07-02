<?php
/* @var \App\Models\Review[] $reviewTexts */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Текстовые отзывы</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
            'createButton' => true,
            'routeName' => 'admin.review-texts.create',
            'deleteButton' => false
        ])@endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
{{--            <th scope="col">Текст</th>--}}
            <th scope="col">Автор</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

            @foreach($reviewTexts as $i => $reviewText)
              <tr data-index="{{ $i }}" data-id="{{ $reviewText->id }}" data-entity="reviews-text">
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ $reviewText->title }}</td>
{{--                <td>{{ $reviewText->text_ru }}</td>--}}
                <td>{{ $reviewText->author_name_ru }}</td>
                <td><a href="{{ route('admin.review-texts.edit', ['review_text' => $reviewText]) }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ route('admin.review-texts.destroy', ['review_text' => $reviewText]) }}" method="POST">
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