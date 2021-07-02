<?php
/* @var \App\Models\FileUnload[] $fileUnloads */
?>

@extends('admin.layouts.app')

@section('content')
  <div id="adminLink" class="adminLink page">

    <div id="sortable" class="mcontainer">
      <form action="{{ route('admin.links.create') }}" method="POST"
            enctype='multipart/form-data' id="form-unloading">
        @csrf
        <div class="form-row">
          <div class="flex-cols">
            <div class="col-amd-3 add-file_admin">
              <label for="icon-image" placeholder="Добавить иконку"> <span class="add-icon_js">Добавить иконку</span>
              </label>
              <input name="icon" type="file" class="add-icon" id="icon-image">
              <img class="img-data" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/plus.svg') }}" alt="">
            </div>

            <div class="icon-container" hidden="true" id="showFile">
              <div class="options-overlay-content">
                <span class="admin-icon-delete" style="margin-right: 10px;">
                  <i class="fa fa-times-circle delete-action-photo" aria-hidden="true"></i>
                </span>
              </div>
              <img class="img-fluid icon-item" src="">
            </div>

            <div class="col-amd-3 @error('icon_title') has-error @enderror">
              <label for="v03"></label>
              <input type="text"
                     name="icon_title"
                     class="form-control"
                     id="v03"
                     placeholder="Название иконки">
              @error('icon_title')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-amd-3 @error('format') has-error @enderror">
            <label for="vs"></label>
              <select name="format" id="vs" class="inputSearch form-control form-control-sm filter-select">
                <option value>Выберите формат</option>
                @foreach($formats as $key => $format)
                  <option value="{{ $format }}"
                          @if ($format == \App\Enums\FileFormat::XML) selected @endif>
                    {{ $key }}
                  </option>
                @endforeach
              </select>
              @error('format')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-amd-3 @error('title') has-error @enderror">
              <label for="v01"></label>

              <input name="title"
                     type="text"
                     class="form-control"
                     id="v01"
                     placeholder="Название XML ссылки"
                     required/>

              @error('title')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-amd-3 @error('file_url') has-error @enderror">
              <label for="v02"></label>
              <input name="file_url"
                     type="text"
                     class="form-control"
                     id="v02"
                     placeholder="Сама XML ссылка"
                     required/>

              @error('file_url')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-amd-3 @error('description') has-error @enderror">
              <label for="iv01"></label>

              <input name="description"
                     type="text"
                     class="form-control"
                     id="iv01"
                     placeholder="Комментарий"/>

              @error('description')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-amd-3 quantity @error('quantity') has-error @enderror">
              <label for="v04"></label>

              <input name="quantity"
                     type="text"
                     class="form-control"
                     id="v04"
                     placeholder="Кол."/>

              @error('quantity')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="btn-admin-link">
            <button type="submit" class="btn btn-primary btn-lg">OK</button>
          </div>
        </div>
      </form>
      <div id="tbody">
        @foreach($fileUnloads as $i => $fileUnload)
          <div class="information-form flex" data-index="{{ $i }}" data-id="{{ $fileUnload->id }}"
               data-entity="links">
            <div class="icon"><img
                      src="{{ $fileUnload->icon_name ? $fileUnload->assetAbsolute($fileUnload->icon_name) : \EscapeWork\Assets\Facades\Asset::v('img/no_foto.svg') }}"
                      alt="" width="38" height="38"></div>
            <div class="icon-title">{{ $fileUnload->icon_title }}</div>
            <div class="format"
                 data-option-id="{{ $fileUnload->format }}">{{ $formatLabels[$fileUnload->format] }}</div>
            <div class="name-xml">{{ $fileUnload->title }}</div>
            <div class="link-xml">{{ $fileUnload->file_url }}</div>
            <div class="comment-xml">{{ $fileUnload->description }}</div>
            <div class="quantity">{{ $fileUnload->quantity ?: 0 }}</div>
            <div>
              <a class="btn-edit" title="Редактировать">
                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </a>
            </div>
            <div class="close-btn">
              <a href="{{ route('admin.links.delete', ['link' => $fileUnload]) }}" class="btn-close"></a>
            </div>
          </div>
        @endforeach
      </div>


    </div>

  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/sortable.js') }}"></script>
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/editXml.js') }}"></script>
@endsection