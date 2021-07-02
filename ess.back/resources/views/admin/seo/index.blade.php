<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Models\Seo[] $seo */
?>

@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <h3>Управление Seo страниц</h3>

    <div class="row">
      <div class="col-12">
        @component('admin.includes.create_delete_buttons', [
                        'createButton' => true,
                        'routeName' => 'admin.seo.create',
                        'deleteButton' => false
                    ])
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

            @foreach($seo as $i => $seoItem)
              <tr>
                <th scope="row">{{ $loop -> index + 1 }}</th>
                <td>{{ resourceGet($seoItem, 'title_ru') }}</td>
                <td><a href="{{ resourceGet($seoItem, 'routeEdit') }}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td>
                  <form action="{{ resourceGet($seoItem, 'routeDestroy')}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach

            {{ $paginator->links() }}

          </tbody>
        </table>

      </div>
    </div>
  </div>

@endsection