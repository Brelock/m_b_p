@extends('admin.layouts.app')

@section('content')

    <h3>Заявки на звонок</h3>

    <div class="table">

        <form action="{{ route('callbacks.destroyAll') }}" method="post">
            {{ csrf_field() }}

            @if(count($callbacks))
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
                        <th>Телефон</th>
                        <th>Имя</th>
                        <th>Отправлено</th>
                        <th>Состояние</th>
                        <th>Изменить состояние</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($callbacks as $callback)
                        <tr  data-element-id="{{ $callback->id }}">
                            <td>
                                <input type="checkbox" name="callbacks[]" value="{{ $callback->id }}" class="one" data-id="d1">
                            </td>
                            <td>{{ $loop->iteration+$page }}</td>
                            <td>{{ $callback->phone }}</td>
                            <td>{{ $callback->name or '' }}</td>
                            <td>
                                {{ $callback->created_at->diffForHumans() }}
                            </td>
                            <td>
                                @if( $callback->status == 1)
                                    <span class="badge badge-success" id="status-badge-{{ $callback->id }}">Обработано</span>
                                @else
                                    <span class="badge badge-warning" id="status-badge-{{ $callback->id }}">Не обработано</span>
                                @endif
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-switcher" data-change-url="/admin/callbacks/{{ $callback->id }}"  data-change-id="{{ $callback->id }}"  @if($callback->status == 0) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td></td>
                            <td>
                                <a href=""  class="delete" data-delete-url="/admin/callbacks/{{ $callback->id }}" data-element-id="{{ $callback->id }}">
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

    @if(count($callbacks)) {{ $callbacks->links() }} @endif

@endsection