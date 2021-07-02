<?php
/* @var \App\Models\FileUnload $xls */
?>

@extends('admin.layouts.app')

@section('content')
  <div id="adminLink" class="adminLink page">

    <div class="mcontainer">
      <form method="POST"
            @if(!empty($xls))
            action="{{ route('admin.xls.update', ['xls' => $xls]) }}"
            @else
            action="{{ route('admin.xls.create') }}"
            @endif
            enctype='multipart/form-data' id="form-unloading">
        @csrf

        @if(!empty($xls))
          @method('PUT')
        @endif

        <div class="form-row">
          <div class="flex-cols">
            <div class="col-amd-3 add-file_admin">
              <label for="icon-image" placeholder="Добавить иконку"> <span class="add-icon_js">Добавить иконку</span> </label>
              <input name="icon" type="file" class="add-icon" id="icon-image">
              <img class="img-data" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/plus.svg') }}" alt="">
            </div>
            <div class="icon-container" id="showFile">
              @if(!empty($xls) && $xls->icon_name)
              <div class="options-overlay-content">
                <span class="admin-icon-delete" style="margin-right: 10px;">
                  <i class="fa fa-times-circle delete-action-photo" aria-hidden="true"></i>
                </span>
              </div>
              <img class="img-fluid icon-item" src="{{ $xls->assetAbsolute($xls->icon_name) }}">
              @endif
            </div> 
            <div class="col-amd-1">
              <label for="v02"></label>
              <input type="text" name="icon_title" class="form-control" id="v02"
                     placeholder="Название иконки" required
                     value="{{ old('icon_title') ? old('icon_title') : ((!empty($xls)) ? $xls->icon_title : '') }}">
            </div>
            <div class="col-amd-3 @error('format') has-error @enderror">
            <label for="vs"></label>
              <select name="format" id="vs" class="inputSearch form-control form-control-sm filter-select">
                <option value>Выберите формат</option>
                @foreach($formats as $key => $format)
                  <option value="{{ $format }}"
                          @if($format == old('format'))
                          selected
                          @elseif(!empty($xls) && $format == $xls->format)
                          selected
                          @endif>
                    {{ $key }}
                  </option>
                @endforeach
              </select>
              @error('format')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-amd-1">
              <label for="v01"></label>
              <input type="text" name="title" class="form-control" id="v01"
                     placeholder="Название файла" required
                     value="{{ old('title') ? old('title') : ((!empty($xls)) ? $xls->title : '') }}">
            </div>
            <div class="col-amd-1 datepicker">
              <label for="date"></label>
              <input type="text" class="form-control input-datepicker" id="date" name="date_unloaded"
                     placeholder="Дата" required
                     value="{{ old('date_unloaded') ? old('date_unloaded') : ((!empty($xls)) ? $xls->date_unloaded : '') }}">
              <img class="img-data" src="{{ \EscapeWork\Assets\Facades\Asset::v('/img/calendar.svg') }}" alt="">
            </div>
            <div class="col-amd-3 add-file_admin">
              <label for="adminFile" placeholder="Добавить файл"> <span class="add-file_js">Добавить файл</span> </label>
              <input name="file" type="file" class="add-file" id="adminFile" @if(empty($xls)) required @endif>
              <img class="img-data" src="{{ \EscapeWork\Assets\Facades\Asset::v('img/plus.svg') }}" alt="">
            </div>
            <div class="col-amd-3 quantity @error('quantity') has-error @enderror">
              <label for="v04"></label>
  
              <input name="quantity"
                     type="text"
                     class="form-control"
                     id="v04"
                     placeholder="Кол."
                     value="{{ old('quantity') ? old('quantity') : ((!empty($xls)) ? $xls->quantity : '') }}"/>
  
              @error('quantity')
              <div class="help-block">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="btn-admin-xls">
            <button type="submit" class="btn btn-primary btn-lg">OK</button>
          </div>

        </div>
      </form>

    </div>

  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/sortable.js') }}"></script>
@endsection
