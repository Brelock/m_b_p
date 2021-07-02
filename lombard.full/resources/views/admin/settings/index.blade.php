@extends('admin.layouts.app')

@section('content')

    <form method="POST" action="{{ isset($settings->id) ? route('settings.update') : route('settings.store')}}"
          id="item-form" class="form-group" enctype="multipart/form-data">
        {{isset($settings->id) ? method_field('PUT') : method_field('POST') }}

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="id" type="hidden" value="{{ isset($settings) ? $settings->id : '' }}"/>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label><i class="fa fa-envelope-o" aria-hidden="true"></i>E-mail</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ isset($settings) ? $settings->email : '' }}">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope-o" aria-hidden="true"></i>E-mail для получения заявок</label>
                    <input type="email" name="admin_email" class="form-control"
                           value="{{ isset($settings) ? $settings->admin_email : '' }}">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-phone" aria-hidden="true"></i>Телефон</label>
                    <input type="tel" name="phone" class="form-control"
                           value="{{ isset($settings) ? $settings->phone : '' }}">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</label>
                    <input type="text" name="instagram" class="form-control"
                           value="{{ isset($settings) ? $settings->instagram : '' }}">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</label>
                    <input type="text" name="facebook" class="form-control"
                           value="{{ isset($settings) ? $settings->facebook : '' }}">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-telegram" aria-hidden="true"></i>Telegram</label>
                    <input type="text" name="telegram" class="form-control"
                           value="{{ isset($settings) ? $settings->telegram : '' }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Наши контакти</label>
                    <textarea name="our_contact_ru" class="form-control" rows="5">
                        {{ isset($settings) ? $settings->our_contact_ru : '' }}
                    </textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Нашi контакти *<small>(украинский вариант)</small></label>
                    <textarea name="our_contact_uk" class="form-control" rows="5">
                        {{ isset($settings) ? $settings->our_contact_uk : '' }}
                    </textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

@endsection

@section('scripts')
    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/wysiwyg.js')}}"></script>
@endsection
