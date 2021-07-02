<?php
/* @var \App\Models\Banner[] $banners */
?>

@extends('admin.layouts.app')

@section('content')
  <div id="adminLink" class="adminLink page">

    <div id="sortable" class="mcontainer">
      <form action="{{ route('admin.banners.create') }}" method="POST"
            enctype='multipart/form-data' id="form-unloading">
        @csrf
        <div class="form-row">
          <div class="flex-cols">
            <div class="col-amd-3 add-file_admin">
              <label for="icon-image" placeholder="Добавить изображение"> <span class="add-file_js">Добавить изображение</span>
              </label>
              <input name="file" type="file" class="add-file" id="icon-image">
              <img class="img-data" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/plus.svg') }}" alt="">
            </div>
  
            <div class="icon-container" hidden="true" id="showFile">
              <div class="options-overlay-content">
                <span class="admin-icon-delete" style="margin-right: 10px;">
                  <i class="fa fa-times-circle delete-action-photo" aria-hidden="true"></i>
                </span>
              </div>
              <img class="img-fluid file-item" src="">
            </div>  
  
            <div class="col-amd-3 @error('url') has-error @enderror">
              <label for="v01"></label>
              <input type="text"
                     name="url"
                     class="form-control"
                     id="v01"
                     placeholder="Ссылка">
              @error('url')
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
        @foreach($banners as $i => $banner)
          <div class="information-form flex" data-index="{{ $i }}" data-id="{{ $banner->id }}"
               data-entity="banners">
            <div class="file"><img
                      src="{{ $banner->picture_file_name ? $banner->assetAbsolute($banner->picture_file_name) : \EscapeWork\Assets\Facades\Asset::v('img/no_foto.svg') }}"
                      alt="" width="38" height="38"></div>
            <div class="url">{{ $banner->url }}</div>
            <div>
              <a class="btn-edit" title="Редактировать">
                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </a>
            </div>
            <div class="close-btn">
              <a href="{{ route('admin.banners.delete', ['banner' => $banner]) }}" class="btn-close"></a>
            </div>
          </div>
        @endforeach
      </div>


    </div>

  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/sortable.js') }}"></script>
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/editBanner.js') }}"></script>
@endsection