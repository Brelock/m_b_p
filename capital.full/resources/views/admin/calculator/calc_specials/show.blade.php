<?php
use Carbon\Carbon;
?>
@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Заявка на оценку от {{ $request->name }}</h3>
    <br>

        <div class="row">
            <div class="col-sm-7">
                <br>
                <table class="table table-striped">
                    <tr>
                        <td><strong>Имя</strong></td>
                        <td>{{ $request->name or 'не указано' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Телефон</strong></td>
                        <td>{{ $request->phone or 'не указано' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $request->email or 'не указано' }}</td>
                    </tr>

                    @include('admin.calculator.calc_specials._'.$request->type)

                </table>
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку заявок</a>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <h6>Изображения</h6>
                    @forelse($request->images as $image)
                      @if($image->created_at <= Carbon::parse($request->created_at)->addDay()->toDateTimeString() &&
                          $image->created_at >= Carbon::parse($request->created_at)->subDay()->toDateTimeString())
                        <div class="card card-body bg-light col-sm-10">
                            <img src="{{ asset('storage/images/special_request/'.$image->path) }}" alt=""   class="img-fluid">
                        </div>
                      @endif
                    @empty
                        Нет изображений
                    @endforelse
                </div>
            </div>
        </div>

@endsection