@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Тариф</h3>
    <p>* - поля обязательные для заполнения</p>
    <form method="POST"
          @if(isset($tariff))
            action="{{ route('tariffs.update', ['id' => $tariff->id]) }}"
          @else
            action="{{ route('tariffs.store') }}"
          @endif
           class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}
        @if(isset($tariff))
            {{ method_field('put') }}
            <input type="hidden" name="url" value="{{ url()->previous() }}">
        @endif

        <div class="row">
            <div class="col-sm-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="true">русский <img src="/img/ru.svg" alt="" style="width: 1.5em;"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="uk-tab" data-toggle="tab" href="#uk" role="tab" aria-controls="uk" aria-selected="false">украинский <img src="/img/ua.svg" alt="" style="width: 1.5em;"></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Заголовок тарифа *</label>
                                    <input type="text" name="title_ru" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('title_ru') ? old('title_ru') : $tariff->title_ru }}"
                                           @else
                                           value="{{ old('title_ru') }}"
                                            @endisset
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Первый подзаголовок тарифа</label>
                                    <input type="text" name="sub_title_first_ru" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('sub_title_first_ru') ? old('sub_title_first_ru') : $tariff->sub_title_first_ru }}"
                                           @else
                                           value="{{ old('sub_title_first_ru') }}"
                                            @endisset
                                    >
                                    <small>( будет выделено жирным )</small>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Второй подзаголовок</label>
                                    <input type="text" name="sub_title_second_ru" class="form-control"
                                           value="{{ isset($tariff) ? $tariff->sub_title_second_ru : old('subtitle_second_ru') }}"
                                           @isset($tariff)
                                           value="{{ old('sub_title_second_ru') ? old('sub_title_second_ru') : $tariff->sub_title_second_ru }}"
                                           @else
                                           value="{{ old('sub_title_second_ru') }}"
                                            @endisset
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Срок ожидания</label>
                                    <input type="text" name="term_ru" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('term_ru') ? old('term_ru') : $tariff->term_ru }}"
                                           @else
                                           value="{{ old('term_ru') }}"
                                            @endisset
                                    >
                                    <small>(прописать полностью <strong> 14 дней</strong>)</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Описание тарифа *</label>
                                    <textarea name="description_ru" class="form-control"
                                              rows="5">@isset($tariff){{ old('description_ru') ? old('description_ru') : $tariff->description_ru }}@else{{ old('description_ru') }}@endisset</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ставка</label>
                                    <input type="text" name="rate_ru" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('rate_ru') ? old('rate_ru') : $tariff->rate_ru }}"
                                           @else
                                           value="{{ old('rate_ru') }}"
                                            @endisset
                                    >
                                    <small>(прописать полностью <strong>ставка 0,773 %</strong>)</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Дополнение</label>
                                    <input type="text" name="note_ru" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('note_ru') ? old('note_ru') : $tariff->note_ru }}"
                                           @else
                                           value="{{ old('note_ru') }}"
                                            @endisset
                                    >
                                    <small>(все что Вы еще хотели дописать)</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Ccылка на детали тарифа</label>
                                    <input name="link_ru" class="form-control"
                                        @isset($tariff)
                                            value="{{ old('link_ru') ? old('link_ru') : $tariff->link_ru }}"
                                        @else
                                            value="{{ old('link_ru') }}"
                                        @endisset>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{--ukrainian translation--}}

                    <div class="tab-pane fade" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Заголовок тарифа * <small>(украинский вариант)</small></label>
                                    <input type="text" name="title_uk" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('title_uk') ? old('title_uk') : $tariff->title_uk }}"
                                           @else
                                           value="{{ old('title_uk') }}"
                                            @endisset
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Первый подзаголовок тарифа <small>(украинский вариант)</small></label>
                                    <input type="text" name="sub_title_first_uk" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('sub_title_first_uk') ? old('sub_title_first_uk') : $tariff->sub_title_first_uk }}"
                                           @else
                                           value="{{ old('sub_title_first_uk') }}"
                                            @endisset
                                    >
                                    <small>( будет выделено жирным )</small>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Второй подзаголовок <small>(украинский вариант)</small></label>
                                    <input type="text" name="sub_title_second_uk" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('sub_title_second_uk') ? old('sub_title_second_uk') : $tariff->sub_title_second_uk }}"
                                           @else
                                           value="{{ old('sub_title_second_uk') }}"
                                            @endisset
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Срок ожидания  <small>(украинский вариант)</small></label>
                                    <input type="text" name="term_uk" class="form-control"
                                           value="{{ isset($tariff) ? $tariff->term_uk : old('term_uk') }}"
                                           @isset($tariff)
                                           value="{{ old('term_uk') ? old('term_uk') : $tariff->term_uk }}"
                                           @else
                                           value="{{ old('term_uk') }}"
                                            @endisset
                                    >
                                    <small>(прописать полностью <strong> 21 день</strong>)</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Описание тарифа * <small>(украинский вариант)</small></label>
                                    <textarea name="description_uk" class="form-control"
                                              rows="5">@isset($tariff){{ old('description_uk') ? old('description_uk') : $tariff->description_uk }}@else{{ old('description_uk') }}@endisset</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ставка</label>
                                    <input type="text" name="rate_uk" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('rate_uk') ? old('rate_uk') : $tariff->rate_uk }}"
                                           @else
                                           value="{{ old('rate_uk') }}"
                                            @endisset
                                    >
                                    <small>(прописать полностью <strong>ставка 0,773 %</strong>)</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Дополнение</label>
                                    <input type="text" name="note_uk" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('note_uk') ? old('note_uk') : $tariff->note_uk }}"
                                           @else
                                           value="{{ old('note_uk') }}"
                                            @endisset
                                    >
                                    <small>(все что Вы еще хотели дописать)</small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Ccылка на детали тарифа * <small>(украинский вариант)</small></label>
                                    <input name="link_uk" class="form-control"
                                           @isset($tariff)
                                           value="{{ old('link_uk') ? old('link_uk') : $tariff->link_uk }}"
                                           @else
                                           value="{{ old('link_uk') }}"
                                            @endisset>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <br>
                <br>
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" id="" class="form-control">
                        <option value="1" @if(isset($tariff) &&  $tariff->published ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0" @if(isset($tariff) &&  !$tariff->published ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Категория *</label>
                    <select name="tariff_category_id" class="form-control">
                        <option value="">Выберите категорию...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if(isset($tariff) && $tariff->tariff_category_id == $category->id)  {{ 'selected' }}@endif
                            >{{$category->title_ru}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12"><h5>Изображение (316 * 184 px)</h5></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="file" name="image" class="form-control"  data-buttonName="btn-primary">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-6">
                    @if(isset($tariff))
                        <div class="card card-body bg-light">
                            <img src="{{ asset('storage/images/tariffs/'.$tariff->image) }}" alt="" class="img-fluid">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

@endsection