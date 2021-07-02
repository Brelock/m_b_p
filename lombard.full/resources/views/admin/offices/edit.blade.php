@extends('admin.layouts.app')

@section('content')

    <form method="POST" action="{{ isset($office->id) ? route('offices.update') : route('offices.store')}}"
          id="item-form" class="form-group" enctype="multipart/form-data">
        {{isset($office->id) ? method_field('PUT') : method_field('POST') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="id" type="hidden" value="{{ $office->id ? $office->id : old('id') }}"/>
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Номер отделения *</label>
                    <input type="text" name="number" class="form-control"
                           value="{{ $office->id ? $office->number : old('number') }}">
                </div>

                <div class="form-row d-flex justify-content-between">
                    <div class="form-group col-md-6">
                        <label for="">Область *</label>
                        <select name="region_id" id="region" class="form-control"
                                data-selected="{{ $office->id ? $office->region_id : old('region_id') }}" data-placeholder="Выберите регион">
                            @foreach($regions as $region)
                                <option value="{{$region->id}}">{{ $region->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Город *</label>
                        <select name="city_id" id="city" class="form-control"
                                data-selected="{{ $office->id ? $office->city_id : old('city_id') }}" data-placeholder="Выберите город">
                        </select>
                    </div>
                </div>

                <div class="form-row d-flex justify-content-between">
                    <div class="form-group col-md-4">
                        <label>Адрес (RU) *</label>
                        <input type="text" name="address_ru" class="form-control"
                               value="{{ $office->id ? $office->address_ru : old('address_ru') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Адрес (UA) *</label>
                        <input type="text" name="address_uk" class="form-control"
                               value="{{ $office->id ? $office->address_uk : old('address_uk') }}">
                    </div>
                </div>
                <div id="map"></div>
                <input id="pac-input" class="controls input" type="text" placeholder="Поиск адреса">
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h5>Изображение</h5>
                            <span><small>будет отображаться в списке отделений (350 * 210 px)</small></span>
                            <input type="file" name="image" class="form-control-file border" @if(!isset($office)) required @endif>
                        </div>

                        @isset($office->image)
                            <div class="card card-body bg-light">
                                <img src="{{ asset('/storage/images/offices/'.$office->image) }}" alt=""   class="img-fluid">
                            </div>
                        @endisset

                    </div>

                </div>

                <hr>



            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" id="" class="form-control">
                        <option value="{{ $office::PUBLISHED }}" @if($office->published == $office::PUBLISHED ) {{ 'selected' }} @endif >
                            Активен
                        </option>
                        <option value="{{ $office::UNPUBLISHED }}" @if(isset($office->published) && $office->published == $office::UNPUBLISHED) {{ 'selected' }} @endif >
                            Не активен
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Телефон *</label>
                    <input type="tel" name="phone" class="form-control"
                           {{--value="{{ isset($office) ? $office->phone : old('phone') }}">--}}
                           value="@if(old('phone')) {{ old('phone') }}@elseif(isset($office)){{ $office->phone }}@endif">
                </div>


                <div class="form-group">
                    <label>График работы</label>
                    <div>
                        <label for="twenty-four">Круглосуточно</label>
                        <input id="twenty-four" type="checkbox" name="full_day" value="1"
                               @if(old('full_day'))
                                   checked
                               @elseif(isset($office) and $office->full_day)
                                   checked
                               @endif
                        >
                    </div>
                    <div id="worktime" class="d-flex align-items-center"
                         @if(old('full_day'))
                            style="visibility: hidden;"
                         @elseif(isset($office) and $office->full_day)
                            style="visibility: hidden;"
                         @endif
                    >
                        <input type="text" name="time_start" class="form-control time_start"
                               value="{{ isset($office) ? $office->time_start : old('time_start') }}"><span style="padding: 0 8px">До</span>
                        <input type="text" name="time_end" class="form-control time_end"
                               value="{{ isset($office) ? $office->time_end : old('time_end') }}">
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="lng" name="lng" value="{{ $office->id ? $office->lng : old('lng') }}"/>
        <input type="hidden" id="lat" name="lat" value="{{ $office->id ? $office->lat : old('lat') }}"/>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAor2gAXYMTj3AqHp0fBM0EjTKXrlEDavw&libraries=places&language=ru-RU&region=UA"></script>
@endsection
