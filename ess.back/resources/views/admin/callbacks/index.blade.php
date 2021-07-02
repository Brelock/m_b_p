<?php
use App\Enums\CallbacksType;
use Illuminate\Support\Arr;

/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\Callback[] $callbacks */

?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Заявки</h3>

    <div class="row">
      <div class="col-12">

        <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Email</th>
            <th scope="col">Регион</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Тип заявки</th>
            <th scope="col">Дата</th>
            <th></th>
          </tr>
          </thead>
          <tbody>

          @foreach($callbacks as $callback)
            <tr>
              <th scope="row">{{$loop->index+1+(Arr::get($paginator->toArray(), 'per_page') * (Arr::get($paginator->toArray(), 'current_page')-1))}}</th>
              <td>{{ resourceGet($callback, 'name') }}</td>
              <td>{{ resourceGet($callback, 'phone') }}</td>
              <td>{{ resourceGet($callback, 'email') }}</td>
              <td>{{ resourceGet($callback, 'region') }}</td>
              <td>{{ resourceGet($callback, 'message') }}</td>
              <td>{{ CallbacksType::$LABELS[resourceGet($callback, 'type')] }}</td>
              <td>{{ resourceGet($callback, 'created_at') }}</td>
              <td>
                <form action="{{ resourceGet($callback, 'routeDelete') }}" method="POST">
                  @method("DELETE")
                  @csrf
                  <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
        {{ $paginator->links() }}
      </div>
    </div>
  </div>

@endsection

