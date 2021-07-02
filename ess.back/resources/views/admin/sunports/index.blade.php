<?php
/* @var \App\Models\Sunport[] $sunports */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Sunports</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons',
        ['createButton' => true,
          'routeName' => 'admin.sunports.create',
          'deleteButton' => false])
        @endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

          @foreach($sunports as $i => $sunport)
            <tr data-index="{{ $i }}" data-id="{{ $sunport->id }}" data-entity="{{ $sunport->getTable() }}">
              <th scope="row">{{ $loop -> index + 1 }}</th>
              <td>{{ $sunport->title_ru }}</td>
              <td><a href="{{ route('admin.sunports.edit', ['sunport' => $sunport]) }}" data-toggle="tooltip"
                     title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
              <td>
                <form action="{{ route('admin.sunports.destroy', ['sunport' => $sunport]) }}" method="POST">
                  @method("DELETE")
                  @csrf
                  <button><i class="fa fa-trash" aria-hidden="true"></i></button>
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