@extends('admin.layouts.app')

@section('content')
    <h3>Комментарии по отделению {{ $office->number or '' }}</h3>
    <br>
    <div class="row">
        <div class="col-sm-12">
            @forelse($comments as $comment)
                <div class="card border-danger mb-3">
                    <div class="card-body">
                        <p class="card-text text-danger">{{ $comment->comment }}</p>
                        <p class="card-text">номер телефона {{ $comment->phone }}</p>
                        <p>{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>

            @empty
                нет комментариев
            @endforelse
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку отделений</a>
        </div>
    </div>

@endsection
