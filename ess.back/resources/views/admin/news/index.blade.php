<?php
/* @var \App\Models\News[] $news */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Новости</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
                        'createButton' => true,
                        'routeName' => 'admin.news.create',
                        'deleteButton' => false
                    ])
        @endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Состояние</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

            @foreach($news as $i => $item)
              <tr>
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ $item->title_ru }}</td>
                <td>{{ $item->is_published ? 'Опубликовано' : 'Не опубликовано' }}</td>
                <td><a href="{{ route('admin.news.edit', ['news' => $item]) }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ route('admin.news.destroy', ['news' => $item]) }}" method="POST">
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