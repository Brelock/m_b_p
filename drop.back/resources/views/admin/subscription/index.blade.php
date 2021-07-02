<?php
/* @var \App\Models\Subscription[] $subscriptions */
?>

@extends('admin.layouts.app')

@section('content')
  <div id="adminSubscription" class="adminSubscription page">
    <div id="sortable" class="mcontainer">

      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>

        @foreach($subscriptions as $subscription)
          <tr>
            <th scope="row">{{ $loop -> index + 1 }}</th>
            <td>{{ $subscription->email ?: '' }}</td>
            <td>{{ $subscription->created_at ? $subscription->created_at->format('j M Y') : '' }}</td>
          </tr>
        @endforeach

        </tbody>
      </table>

    </div>
  </div>
@endsection
