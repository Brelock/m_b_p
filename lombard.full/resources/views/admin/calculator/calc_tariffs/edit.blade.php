@extends('admin.layouts.app')

@section('content')
    <h2>{{ $tariff->title_ru }}</h2>
    {{--<p>* - поля обязательные для заполнения</p>--}}
    <form method="POST" action="{{ route('calc_tariffs.update', ['tariff' => $tariff->id]) }}" class="form-group">

        {{ method_field('patch') }}
        {{ csrf_field() }}

        <hr>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Название тарифа * <img src="{{ asset('img/ru.svg') }}" alt="" style="width: 1.5em;"></label>
                    <input type="text" name="title_ru" class="form-control" value="{{ $tariff->title_ru }}" required>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Название тарифа * <img src="{{ asset('img/ua.svg') }}" alt="" style="width: 1.5em;"> <small>(украинский вариант)</small></label>
                    <input type="text" name="title_uk" class="form-control" value="{{ $tariff->title_uk }}" required>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" class="form-control">
                        <option value="1" @if($tariff->published == 1 ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0"  @if($tariff->published == 0 ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Связанное отделение</label>
                    <select name="related_office" id="related_office" class="form-control">
                        <option value="">Выберите отделение</option>
                        @forelse($offices as $item)
                            <option value="{{ $item->id }}" @if($tariff->related_office == $item->id ) selected @endif @if($item->tarif) disabled="disabled" @endif>Отделение №{{ $item->number }} - {{ $item->address_ru }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>

        </div>
        <hr>

        <calculator-tariff :tariff="{{$tariff}}" :categories="{{$categories}}"></calculator-tariff>
        {{--<calculator-price :tariff="{{$tariff}}"></calculator-price>--}}


        {{--Добавление ставок по тарифу--}}
        {{--<calculator-rates :status="{{ $statuses }}" :tariff="{{$tariff}}"></calculator-rates>--}}

        <hr>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Сохранить">
            {{--<button type="submit" class="btn btn-success">Сохранить</button>--}}
        </div>

    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            function initChosen() {
                var el = $('#related_office');
                el.chosen({
                    no_results_text: "Ничего не найдено!"
                });
            }
            initChosen();
        });
    </script>

@endsection