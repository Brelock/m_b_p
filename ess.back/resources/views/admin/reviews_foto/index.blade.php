<?php
/* @var \App\Models\Review[] $reviewFotos */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Фото отзывы</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
            'createButton' => true,
            'routeName' => 'admin.review-fotos.create',
            'deleteButton' => false
        ])@endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Изображение</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

            @foreach($reviewFotos as $i => $reviewFoto)
              <tr data-index="{{ $i }}" data-id="{{ $reviewFoto->id }}" data-entity="reviews-foto">
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ $reviewFoto->title }}</td>
                <td>
                    @isset($reviewFoto->picture_file_name)
                      <img src="{{ $reviewFoto->assetAbsolute($reviewFoto->picture_file_name) }}" alt=""
                           class="img-fluid">
                    @endisset
                </td>
                <td><a href="{{ route('admin.review-fotos.edit', ['review_foto' => $reviewFoto]) }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ route('admin.review-fotos.destroy', ['review_foto' => $reviewFoto]) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button><i class="fa fa-trash" onclick="return confirm('Вы действительно хотите удалить?')" aria-hidden="true"></i></button>
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