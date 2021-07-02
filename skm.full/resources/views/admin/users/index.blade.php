@extends('admin.layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/admin/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/admin/pages/tables_datatables.js') }}"></script>

    <script>
        $('#user-modal').on('show.bs.modal', function(e) {

            var name = $(e.relatedTarget).data('user-name');
            var userId = $(e.relatedTarget).data('user-id');
            var userEmail = $(e.relatedTarget).data('user-email');

            var formAction = "/admin/users/";

            if( !name && !userId && !userEmail){
                $(e.currentTarget).find('input[name="_method"]').val('post');
                $(e.currentTarget).find('button[type="submit"]').text('Создать');
                $(e.currentTarget).find('form').attr( 'action',  formAction);
            }
            else{
                $(e.currentTarget).find('input[name="_method"]').val('put');
                $(e.currentTarget).find('button[type="submit"]').text('Обновить');
                $(e.currentTarget).find('form').attr( 'action',  formAction + userId);
            }

            $(e.currentTarget).find('input[name="name"]').val(name);
            $(e.currentTarget).find('input[name="email"]').val(userEmail);
            $(e.currentTarget).find('input[name="password"]').val('');
            $(e.currentTarget).find('input[name="confirm_password"]').val('');


        });
    </script>
@endsection

@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->
            <h2 class="content-heading">Пользователи</h2>

            <div class="block">
                <button class="btn btn-square btn-outline-primary border-0 py-3"
                        data-toggle="modal"
                        data-target="#user-modal">Добавить пользователя <i class="fa fa-plus"></i></button>
            </div>
            <!-- Users -->

            <div class="block block-rounded">
                <div class="block-content">
                    <!-- Users Table -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full"
                           data-language = "['url' : 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json']"
                           data-length-menu ="[15,20,30,50]"
                           data-page-length = "15"
                           data-order='[[2, "desc"]]'>
                        <thead>
                        <tr>
                            <th class="">Имя</th>
                            <th class="">email</th>
                            <th class="d-none d-sm-table-cell">Обновлен</th>
                            <th class="d-none d-sm-table-cell">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="">
                                    {{ $user->name }}
                                </td>
                                <td class="">
                                    {{ $user->email }}
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $user->updated_at }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <form class="delete_approved" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-square btn-danger w-100">Удалить</button>
                                    </form>
                                    <button type="button"
                                            class="btn btn-square btn-warning btn-block mt-1"
                                            data-user-name="{{ $user->name }}"
                                            data-user-email="{{ $user->email }}"
                                            data-user-id="{{ $user->id }}"
                                            data-toggle="modal"
                                            data-target="#user-modal">Редакт.</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- END Users Table -->

                </div>
            </div>
            <!-- END Users -->
        </div>
        <!-- END Page Content -->

    </main>

    <!-- Pop Out Modal -->
    <div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="category-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-slideleft modal" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-info">
                        <h3 class="block-title">Пользователь :</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center pb-20">
                            <div class="col-xl-12">
                                <form class="js-validation-material" action="/admin/users/" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="form-material">
                                                <input type="text" class="form-control" id="user-name" name="name" required>
                                                <label for="user-name">Имя пользователя</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="form-material">
                                                <input type="email" class="form-control" id="user-email" name="email" required>
                                                <label for="user-email">Почта пользователя</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="form-material">
                                                <input type="password" class="form-control" id="user-password" name="password" required min="6">
                                                <label for="user-password">Пароль</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-25 text-center">
                                        <button type="submit" class="btn btn-square btn-success px-30">Обновить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Pop Out Modal -->
@endsection
