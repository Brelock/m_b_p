@extends('admin.layouts.app')

@section('content')

    <h2>Бренды часов</h2>

    <div class="">

        <div class="button-group form-group">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" id="addStatusButton">
                <i class="fa fa-pencil" aria-hidden="true"></i>Новый бренд
            </button>
            <!-- Button trigger modal -->

            {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="addStatusButton">--}}
                {{--Добавить статус--}}
            {{--</button>--}}

        </div>
        <watches :attributes="{{ $watches }}" v-cloak></watches>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="createStatusModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createStatusModal">Добавить бренд</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('watches.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Названи </label>
                            <input name="brand" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection