@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if (session('message_404'))
          <div class="alert alert-danger" role="alert">
            {{ session('message_404') }}
          </div>
        @endif
        <div class="card">
          <div class="card-header"><h3>Admin panel.</h3></div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            You are successfully logged in, select the section.
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
