<?php
/* @var \App\Models\Admin\Link[] $links */
?>

@extends('admin.layouts.app')

@section('content')

  <h3>Ссылки</h3>
    <div class="button-group form-group">
      <a href="{{ route('links.create') }}">
        <button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>Создать</button>
      </a>
    </div>
    <div class="table">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Название (RU)</th>
          <th>Название (UA)</th>
          <th>url</th>
          <th>Порядок</th>
          <th></th>
          <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($links as $link)
          <tr data-element-id="{{ $link->id }}">
            <td>{{ $link->id }}</td>
            <td>{{ $link->title_ru }}</td>
            <td>{{ $link->title_uk }}</td>
            <td>{{ $link->url }}</td>
            <td>{{ $link->ordering }}</td>

            <td><a href="{{ route('links.edit', ['id' => $link->id]) }}"><i class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i></a></td>
            <td>
              <a href="" class="delete" data-delete-url="/admin/links/delete/{{ $link->id }}"
                 data-element-id="{{ $link->id }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

@endsection

