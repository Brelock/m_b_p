@extends('admin.layouts.app')

@section('content')
    <form method="POST" action="{{ route('calc_hallmarks.save') }}" class="form-group">
        {{ csrf_field() }}
    <calculator-price :hallmarks="{{$hallmark}}"></calculator-price>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Сохранить">
            {{--<button type="submit" class="btn btn-success">Сохранить</button>--}}
        </div>
    </form>

@endsection

