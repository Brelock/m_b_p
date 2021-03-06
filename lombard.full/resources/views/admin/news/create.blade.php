@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Новость</h3>
    <p>* - поля обязательные для заполнения</p>
    <form method="POST"
          @if(isset($news))
            action="{{ route('news.update', ['id' => $news->id]) }}"
          @else
            action="{{ route('news.store') }}"
          @endif
           class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}
        @if(isset($news))
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
                            <label>Заголовок новости</label>
                            <input type="text" name="title_ru" class="form-control"
                                   @isset($news)
                                        value="{{ old('title_ru') ? old('title_ru') : $news->title_ru }}"
                                   @else
                                        value="{{ old('title_ru') }}"
                                   @endisset
                            >
                        </div>

                        <div class="form-group">
                            <label>Описание новости</label>
                            <textarea name="description_ru" class="form-control" id="description_ru" rows="5">
                                @isset($news)
                                    {{ old('description_ru') ? old('description_ru') : $news->description_ru }}
                                @else
                                    {{ old('description_ru') }}
                                @endisset
                            </textarea>
                        </div>
                        @isset($news)
                            @include('admin.includes.seo_tags_ru', array('page' => $news ))
                        @else
                            @include('admin.includes.seo_tags_ru')
                        @endisset

                    </div>
                    <div class="tab-pane fade" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>

                        <div class="form-group">
                            <label>Заголовок новости <small>(украинский вариант)</small></label>
                            <input type="text" name="title_uk" class="form-control"
                               @isset($news)
                                   value="{{ old('title_uk') ? old('title_uk') : $news->title_uk }}"
                               @else
                                   value="{{ old('title_uk') }}"
                                @endisset
                            >
                        </div>

                        <div class="form-group">
                            <label>Описание новости <small>(украинский вариант)</small></label>
                            <textarea name="description_uk" class="form-control" id="description_uk" rows="5">
                                @isset($news)
                                    {{ old('description_uk') ? old('description_uk') : $news->description_uk }}
                                @else
                                    {{ old('description_uk') }}
                                @endisset
                            </textarea>
                        </div>

                        @isset($news)
                            @include('admin.includes.seo_tags_uk', array('page' => $news ))
                        @else
                            @include('admin.includes.seo_tags_uk')
                        @endisset

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <br>
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" id="" class="form-control">
                        <option value="1" @if(isset($news) &&  $news->published ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0" @if(isset($news) &&  !$news->published ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Алиас</label>
                    <input type="text" name="alias"  class="form-control" value="@isset($news) {{ $news->alias }} @endisset">
                    <small class="red">не заполнять если не уверены</small>
                </div>
                <div class="form-group">
                    <h5>Дата</h5>
                    <span><small>выберите дату</small></span>
                    <input name="date" class="datepicker form-control" value="
                        @if(old('date'))
                    {{ old('date') }}
                    @elseif(isset($news) && $news->date)
                    {{ date('d-m-Y', strtotime($news->date)) }}
                    @else
                    {{ '' }}
                    @endif
                            "/>
                </div>
                <div class="form-group">
                    <h5>Титульное изображение *</h5>
                    <span><small>будет отображаться на странице новости (1200 px по ширине)</small></span>
                    <input type="file" name="image" class="form-control" @if(!isset($news)) required @endif>
                </div>
                <div class="form-group">
                    @isset($news->image)
                        <div class="card card-body bg-light col-sm-4">
                            <img src="{{ asset('storage/images/news/'.$news->image) }}" alt=""   class="img-fluid">
                        </div>
                    @endisset
                </div>
                <div class="form-group">
                    <h5>Превью изображение</h5>
                    <span><small>будет отображаться в списке новостей, не обязательно  (378 * 227 px)</small></span>
                    <input type="file" name="image_small" class="form-control">
                </div>
                <div class="form-group">
                    @isset($news->image_small)
                        <div class="card card-body bg-light col-sm-4">
                            <img src="{{ asset('storage/images/news/'.$news->image_small) }}" alt="" class="img-fluid">
                        </div>
                    @endisset
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