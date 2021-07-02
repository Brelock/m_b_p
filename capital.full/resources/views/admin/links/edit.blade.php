<?php
/* @var \App\Models\Admin\Link $link */
?>

@extends('admin.layouts.app')

@section('content')
  <h3>Ссылка</h3>
    <form method="POST" action="{{ isset($link->id) ? route('links.update') : route('links.store')}}"
          id="item-form" class="form-group" enctype="multipart/form-data">
        {{isset($link->id) ? method_field('PUT') : method_field('POST') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="id" type="hidden" value="{{ isset($link) ? $link->id : '' }}"/>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Название (RU)</label>
                    <input type="text" name="title_ru" class="form-control"
                           value="{{ isset($link) ? $link->title_ru : '' }}" required>
                </div>
                <div class="form-group">
                    <label>Название (UA)</label>
                    <input type="text" name="title_uk" class="form-control" value="{{ isset($link) ? $link->title_uk : '' }}" required>
                </div>
                <div class="form-group">
                  <label>URL</label>
                  <input type="text" name="url" class="form-control" value="{{ $link->url }}" required>
                  </div>
                <div class="form-group">
                  <label>Порядок</label>
                  <input type="text" name="ordering" class="form-control" value="{{ $link->ordering }}" required>
                </div>
              </div>

        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
