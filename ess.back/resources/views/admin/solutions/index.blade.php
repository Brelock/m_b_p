<?php
/* @var \App\Models\Solution[] $solutions */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Готовые решения</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
                        'createButton' => true,
                        'routeName' => 'admin.solutions.create',
                        'deleteButton' => false
                    ])
        @endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Тип</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

            @foreach($solutions as $i => $solution)
              <tr data-index="{{ $i }}" data-id="{{ $solution->id }}" data-entity="{{ $solution->getTable() }}">
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ $solution->title_ru }}</td>
                <td>{{ $solution->type == 'private-person' ? 'Частным лицам' : 'Кредитование' }}</td>
                <td><a href="{{ route('admin.solutions.edit', ['solution' => $solution]) }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ route('admin.solutions.destroy', ['solution' => $solution]) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button><i class="fa fa-trash" onclick="return confirm('Вы действительно хотите удалить?')" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/sortable.js') }}"></script>
@endsection