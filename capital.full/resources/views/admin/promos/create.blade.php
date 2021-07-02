@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')

    <h2>Промо</h2>
    <p>* - поля обязательные для заполнения</p>
    <form method="POST"
          @if($promo->id)
          action="{{ route('promo.update', ['id' => $promo->id]) }}"
          @else
          action="{{ route('promo.store') }}"
          @endif
          class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}

        @if($promo->id)
            {{ method_field('put') }}
            <input type="hidden" name="url" value="{{ url()->previous() }}">
        @endif

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="true">русский <img src="/img/ru.svg" alt="" style="width: 1.5em;"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="uk-tab" data-toggle="tab" href="#uk" role="tab" aria-controls="uk" aria-selected="false">украинский <img src="/img/ua.svg" alt="" style="width: 1.5em;"></a>
            </li>
        </ul>
        <div class="row">
            <div class="col-sm-8">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>
                        <div class="form-group">
                            <label>Заголовок промо *</label>
                            <input type="text" name="title_ru" class="form-control" value="{{ old('title_ru') ? old('title_ru') : $promo->title_ru }}">
                        </div>
                        <div class="form-group">
                            <label>Описание промо *</label>
                            <textarea name="description_ru" class="form-control" rows="5" >{{ old('description_ru') ? old('description_ru') : $promo->description_ru }}</textarea>
                        </div>
                        @isset($promo)
                            @include('admin.includes.seo_tags_ru', array('page' => $promo ))
                        @else
                            @include('admin.includes.seo_tags_ru')
                        @endisset

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Миниатюра для списка *</h5>
                                    <span><small>будет отображаться в списке промо (350 * 237 px)</small></span>
                                    <input type="file" name="photo" class="form-control-file border" @if(!isset($promo->photo))  @endif/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h5>Изображение на странице промо *</h5>
                                <span><small>будет отображаться на странице промо (960 * 650 px)</small></span>
                                <input class="form-control-file border " type="file" name="wide_photo" @if(!isset($promo->wide_photo))  @endif/>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    @isset($promo->photo)
                                        <div class="card card-body bg-light">
                                            <img src="{{ asset('storage/images/promo/'.$promo->photo) }}" alt="" class="img-fluid">
                                        </div>
                                    @endisset
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    @if($promo->wide_photo)
                                        <div class="card card-body bg-light">
                                            <img src="{{ asset('storage/images/promo/'.$promo->wide_photo) }}" alt="" class="img-fluid">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Изображение на странице Клиентам *</h5>
                                <span><small>будет отображаться на странице клиентам (418 * 320 px)</small></span>
                                <input class="form-control-file border " type="file" name="client_photo" @if(!isset($promo->client_photo))  @endif/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    @if($promo->client_photo)
                                        <div class="card card-body bg-light">
                                            <img src="{{ asset('storage/images/promo/'.$promo->client_photo) }}" alt="" class="img-fluid">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>
                        <div class="form-group">
                            <label>Заголовок промо *<small>(украинский вариант)</small></label>
                            <input type="text" name="title_uk" class="form-control"
                                   value="{{ old('title_uk') ? old('title_uk') : $promo->title_uk }}">
                        </div>

                        <div class="form-group">
                            <label>Описание промо *<small>(украинский вариант)</small></label>
                            <textarea name="description_uk" class="form-control"
                                      rows="5">{{ old('description_uk') ? old('description_uk') : $promo->description_uk }}</textarea>
                        </div>
                        @isset($promo)
                            @include('admin.includes.seo_tags_uk', array('page' => $promo ))
                        @else
                            @include('admin.includes.seo_tags_uk')
                        @endisset

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Миниатюра для списка *<small>(украинский вариант)</small></h5>
                                    <span><small>будет отображаться в списке промо (350 * 237 px)</small></span>
                                    <input type="file" name="photo_uk" class="form-control-file border" @if(!isset($promo->photo_uk))  @endif/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h5>Изображение на странице промо *<small>(украинский вариант)</small></h5>
                                <span><small>будет отображаться на странице промо (960 * 650 px)</small></span>
                                <input class="form-control-file border " type="file" name="wide_photo_uk" @if(!isset($promo->wide_photo_uk))  @endif/>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    @isset($promo->photo_uk)
                                        <div class="card card-body bg-light">
                                            <img src="{{ asset('storage/images/promo/'.$promo->photo_uk) }}" alt="" class="img-fluid">
                                        </div>
                                    @endisset
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    @if($promo->wide_photo_uk)
                                        <div class="card card-body bg-light">
                                            <img src="{{ asset('storage/images/promo/'.$promo->wide_photo_uk) }}" alt="" class="img-fluid">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Изображение на странице Клиентам *<small>(украинский вариант)</small></h5>
                                <span><small>будет отображаться на странице клиентам (418 * 320 px)</small></span>
                                <input class="form-control-file border " type="file" name="client_photo_uk" @if(!isset($promo->client_photo_uk))  @endif/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    @if($promo->client_photo_uk)
                                        <div class="card card-body bg-light">
                                            <img src="{{ asset('storage/images/promo/'.$promo->client_photo_uk) }}" alt="" class="img-fluid">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <br>
                <div class="form-group">
                    <label for="">Алиас</label>
                    <input type="text" name="alias"  class="form-control" value="{{ old('alias') ? old('alias') : $promo->alias }}">
                    <small class="red">не заполнять если не уверены</small>
                </div>
            </div>
        </div>

        <br>
        <div class="form-group">
            <h5>Ссылка</h5>
        </div>
        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label><small>https://example.com (не обязателньо для заполнения)</small></label>
                    <input type="text" name="link" class="form-control"
                           value="{{ old('link') ? old('link') : $promo->link }}" />
                </div>
            </div>
        </div>


        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/wysiwyg.js')}}"></script>
@endsection