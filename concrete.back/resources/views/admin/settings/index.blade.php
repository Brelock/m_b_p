@extends('admin.layouts.app')

@section('content')

    <form method="POST" action="{{ isset($setting->id) ? route('settings.update', ['setting' => $setting]) : route('settings.store')}}"
          id="item-form" class="form-group">
        {{isset($setting->id) ? method_field('PUT') : method_field('POST') }}

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label><i class="fa fa-envelope-o" aria-hidden="true"></i>Title</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ isset($setting) ? $setting->title : '' }}">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope-o" aria-hidden="true"></i>Subtitle</label>
                    <input type="text" name="subtitle" class="form-control"
                           value="{{ isset($setting) ? $setting->subtitle : '' }}">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope-o" aria-hidden="true"></i>E-mail</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ isset($setting) ? $setting->email : '' }}">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope-o" aria-hidden="true"></i>Footer text</label>
                    <input type="text" name="footer" class="form-control"
                           value="{{ isset($setting) ? $setting->footer : '' }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>

@endsection

