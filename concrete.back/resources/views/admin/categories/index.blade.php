@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Categories list</h1>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">

        <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">type</th>
            <th scope="col">formula</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>

          @foreach($categories as $category)
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              <td>{{ $category->title }}</td>
              <td>{{ \App\Enums\CategoryTypes::$LABELS[$category->type] }}</td>
              <td>{{ $category->formula }}</td>
              <td>
                <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn">Edit</a>
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection
