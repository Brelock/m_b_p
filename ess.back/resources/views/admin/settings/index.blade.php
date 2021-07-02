<?php
/* @var App\Models\Settings $setting */
?>
@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Настройки</h3>
    <form method="POST"
          action="{{ isset($setting->id) ? route('admin.settings.update', ['setting' => $setting]) : route('admin.settings.store')}}"
          id="item-form" class="form-group">
      {{isset($setting->id) ? method_field('PUT') : method_field('POST') }}

      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      <div class="row">
        <div class="col-sm-9">
          <div class="form-group">
            <label><i class="fa fa-envelope-o" aria-hidden="true"></i>E-mail</label>
            <input type="email" name="email" class="form-control"
                   value="{{ isset($setting) ? $setting->email : '' }}">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
@endsection

