@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Заявка на оценку техники от {{ $request->name }}</h3>
    <br>

        <div class="row">
            <div class="col-sm-7">
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>Имя</th>
                        <td>{{ $request->name }}</td>
                    </tr>
                    <tr>
                        <th>Телефон</th>
                        <td>{{ $request->phone }}</td>
                    </tr>

                    <tr>
                        <th>Категория</th>
                        <td>{{ $request->category }}</td>
                    </tr>

                    <tr>
                        <th>Бренд</th>
                        <td>{{ $request->brand  or 'Не указано'}}</td>
                    </tr>
                    <tr>
                        <th>Модель</th>
                        <td>{{ $request->model  or 'Не указано'}}</td>
                    </tr>

                    <tr>
                        <th>Комплектация</th>
                        <td>{{ $request->set }}</td>
                    </tr>
                    <tr>
                        <th>Состояние</th>
                        <td>{{ $request->condition }}</td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>Срок</th>--}}
                        {{--<td>{{ $request->term }}</td>--}}
                    {{--</tr>--}}


                </table>
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку заявок</a>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <h6>Изображения</h6>
                    @forelse($request->images as $image)
                        <div class="card card-body bg-light col-sm-10">
                            <img src="{{ asset('storage/images/gadget_request/'.$image->path) }}" alt=""   class="img-fluid">
                        </div>
                    @empty
                        Нет изображений
                    @endforelse
                </div>
            </div>
        </div>

@endsection