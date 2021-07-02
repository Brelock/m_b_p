@extends('admin.layouts.app')

@section('content')

    <h3>Заявки на оценку техники</h3>

    <div class="table">

        <form action="{{ route('gadget.requests.destroyAll') }}" method="post">
            {{ csrf_field() }}

            @if(count($requests))
                <div class="button-group form-group">
                    <button type="submit" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash-o"></i>Удалить</button>
                    {{--<a href="{{ route('callbacks.create') }}">--}}
                    {{--<button type="button" class="btn btn-sm btn-success">Создать</button>--}}
                    {{--</a>--}}
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="total" class="all" data-id="d1">
                        </th>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Телефон</th>


                        {{--<th>Модель</th>--}}
                        {{--<th>Бренд</th>--}}
                        {{--<th>Категория</th>--}}
                        {{--<th>Тариф</th>--}}
                        {{--<th>Срок</th>--}}
                        {{--<th>Цена</th>--}}



                        <th>Отправлено</th>
                        <th>Состояние</th>
                        <th>Изменить состояние</th>
                        {{--<th>Изображение</th>--}}
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($requests as $request)
                        <tr  data-element-id="{{ $request->id }}">
                            <td>
                                <input type="checkbox" name="requests[]" value="{{ $request->id }}" class="one" data-id="d1">
                            </td>
                            <td>{{ $loop->iteration+$page }}</td>
                            <td><a href="{{ route('gadget.requests.show', ['request' => $request->id]) }}">{{ $request->name }}</a></td>
                            <td>{{ $request->phone }}</td>


                            {{--<td>{{ $request->model }}</td>--}}
                            {{--<td>{{ $request->brand }}</td>--}}
                            {{--<td>{{ $request->category }}</td>--}}
                            {{--<td>{{ $request->tariff }}</td>--}}
                            {{--<td>{{ $request->term }}</td>--}}
                            {{--<td>{{ $request->price }}</td>--}}



                            <td>
                                {{ $request->created_at->format('d/m H-i-s') }}
                                {{--{{ $request->created_at->diffForHumans() }}--}}
                            </td>
                            <td>
                                @if( $request->status == 1)
                                    <span class="badge badge-success" id="status-badge-{{ $request->id }}">Обработано</span>
                                @else
                                    <span class="badge badge-warning" id="status-badge-{{ $request->id }}">Не обработано</span>
                                @endif
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-switcher" data-change-url="/admin/calculator/gadgets/requests/{{ $request->id }}"  data-change-id="{{ $request->id }}"  @if($request->status == 0) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            {{--<td>--}}
                                {{--<img src="/img/phone.jpg" alt="ring" style="height: 60px; width: 60px;">--}}
                            {{--</td>--}}
                            <td>
                                <a href=""  class="delete" data-delete-url="/admin/calculator/gadgets/requests/{{ $request->id }}" data-element-id="{{ $request->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                Не создано ни одной заявки
            @endif

        </form>

    </div>

    @if(count($requests)) {{ $requests->links() }} @endif

@endsection