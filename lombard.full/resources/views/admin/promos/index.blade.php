@extends('admin.layouts.app')

@section('content')

    <h3>Промо</h3>

    <form action="{{ route('promos.destroyAll') }}" method="post">
        {{ csrf_field() }}
        <div class="button-group form-group">
            <a href="{{ route('promos.create') }}">
                <button type="button" class="btn btn-success"><i aria-hidden="true" class="fa fa-pencil"></i>Создать</button>
            </a>
            <button type="submit" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash-o"></i>Удалить</button>
        </div>
        <div class="table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="total" class="all" data-id="d1">
                    </th>
                    <th>№</th>
                    <th>Название промо</th>
                    <th>Описание</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($promos as $promo)
                    <tr data-element-id="{{ $promo->id }}">
                        <td>
                            <input type="checkbox" name="promos[]" value="{{ $promo->id }}" class="one" data-id="d1">
                        </td>
                        <td>{{ $loop->iteration + $counter }}</td>
                        <td><a href="{{ route('promos.edit', ['id' => $promo->id]) }}">{{ $promo->title_ru }}</a></td>
                        <td><a href="{{ route('promos.edit', ['id' => $promo->id]) }}">{{ strip_tags($promo->description_ru) }}</a></td>
                        <td><a href="{{ route('promos.edit', ['id' => $promo->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td>
                            <a href="" class="delete" data-delete-url="/admin/promo/delete/{{ $promo->id }}" data-element-id="{{ $promo->id }}" >
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </form>

@endsection