@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">

        <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Question</th>
            <th scope="col">Date</th>
          </tr>
          </thead>
          <tbody>

          @foreach($requests as $request)
            <tr>
              <th scope="row">{{ $loop -> index + 1 }}</th>
              <td>{{ $request->name }}</td>
              <td>{{ $request->email }}</td>
              <td>{{ $request->question }}</td>
              <td>{{ $request->created_at->format('j M Y') }}</td>
            </tr>
          @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>

@endsection
