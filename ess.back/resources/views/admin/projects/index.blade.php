<?php
/* @var \App\Models\Project[] $projects */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Проекты</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
                        'createButton' => true,
                        'routeName' => 'admin.projects.create',
                        'deleteButton' => false
                    ])
        @endcomponent

        <table id="sortable" class="table table-striped">
          <thead>
          <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Состояние</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>

            @foreach($projects as $i => $project)
              <tr data-index="{{ $i }}" data-id="{{ $project->id }}" data-entity="{{ $project->getTable() }}">
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ $project->title_ru }}</td>
                <td>{{ $project->is_main ? 'На главной' : '' }}</td>
                <td><a href="{{ route('admin.projects.edit', ['project' => $project]) }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ route('admin.projects.destroy', ['project' => $project]) }}" method="POST">
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