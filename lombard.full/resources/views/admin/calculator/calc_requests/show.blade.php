@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Заявка на оценку от {{ $request->name }}</h3>
    <br>

        <div class="row">
            <div class="col-sm-7">
                <br>
                <table class="table table-striped">
                    <tr>
                        <td><strong>Имя</strong></td>
                        <td>{{ $request->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Телефон</strong></td>
                        <td>{{ $request->phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Категория</strong></td>
                        <td>@if($category) {{ $category[0]['title_ru'] }} @else Нет категории @endif</td>
                    </tr>
                    <tr>
                        <td><strong>Вес</strong></td>
                        <td>{{ $request->weight }}</td>
                    </tr>
                    <tr>
                        <td><strong>Проба</strong></td>
                        <td>{{ $hallmark[0]['hallmark']}}</td>
                    </tr>
                    <tr>
                        <td><strong>Камень</strong></td>
                        <td>
                            @if($request->stone == 1)
                                Есть
                            @else
                                Нет
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Отдление</strong></td>
                        <td>@if($tariff) Отдление №{{ $tariff[0]['number'] }}, г. {{ $tariff[0]['city']['title_ru'] }} , {{ $tariff[0]['address_ru'] }} @else Нет отдления @endif</td>
                    </tr>
                    <tr>
                        <td><strong>Статус</strong></td>
                        <td>@if($status) {{ $status[0]['title_ru'] }} @else Нет статуса @endif</td>
                    </tr>
                    <tr>
                        <td><strong>Срок</strong></td>
                        <td>{{ $request->term }}</td>
                    </tr>
                    <tr>
                        <td><strong>Сумма</strong></td>
                        <td>{{ $request->amount }} грн</td>
                    </tr>
                    <tr>
                        <td><strong>Переплата</strong></td>
                        <td>{{ $request->overpayment }} грн</td>
                    </tr>
                </table>
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку заявок</a>
            </div>
            <div class="col-sm-5">
                {{--<div class="form-group">--}}
                    {{--<label for="">Состояние</label>--}}
                    {{--<select name="status" id="" class="form-control">--}}
                        {{--<option value="1" @if(isset($request) &&  $request->status ) {{ 'selected' }} @endif >--}}
                            {{--Обработано--}}
                        {{--</option>--}}
                        {{--<option value="0" @if(isset($request) &&  !$request->status ) {{ 'selected' }} @endif >--}}
                            {{--Не обработано--}}
                        {{--</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                <div class="form-group">
                    <h6>Изображения</h6>
                    @forelse($request->images as $image)
                        <div class="card card-body bg-light col-sm-10">
                            <img src="{{ asset('storage/images/request/'.$image->path) }}" alt=""   class="img-fluid">
                        </div>
                    @empty
                        Нет изображений
                    @endforelse
                </div>
            </div>
        </div>

@endsection