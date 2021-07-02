@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">

        <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Category</th>
            <th scope="col">Length</th>
            <th scope="col">Width</th>
            <th scope="col">Height</th>
            <th scope="col">Diameter</th>
            <th scope="col">Depth</th>
            <th scope="col">Result</th>
          </tr>
          </thead>
          <tbody>

          @foreach($results as $result)
            <tr>
              <th scope="row">{{ $loop -> index + 1 }}</th>
              <td>{{ $result->created_at->format('j M Y') }}</td>
              <td>{{ $result->category->title }}</td>
              <td>{{ $result->length }}</td>
              <td>{{ $result->width }}</td>
              <td>{{ $result->height }}</td>
              <td>{{ $result->diameter }}</td>
              <td>{{ $result->depth }}</td>
              <td>{{ $result->result }}</td>
            </tr>
          @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>

@endsection
