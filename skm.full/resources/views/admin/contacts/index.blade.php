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
        function search(word) {
            console.log(word);
            $('#myTable').DataTable().search( word )
                .draw();
        }
        function clearSearch() {
            $('#myTable').DataTable().search('').draw();
        }
    </script>
@endsection

@section('content')
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->
            <h2 class="content-heading">Заявки</h2>
            <!-- StaticPage -->

            <div class="block block-rounded">
                <div class="block-content">
                    <!-- StaticPage Table -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full"
                           data-language = "['url' : 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json']"
                           data-length-menu ="[15,20,30,50]"
                           data-page-length = "15"
                           data-order='[[1, "desc"]]'>
                        <thead>
                        <tr>
                            <th class="">Имя</th>
                            <th class="">Електронная почта</th>
                            <th class="">Сообщение</th>
                            <th class="">Дата</th>
                            <th class="">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td class="">{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td class="">
                                    <form class="delete_approved" action="{{ route('admin.contact.destroy', $contact->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-square btn-danger w-100">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- END StaticPage Table -->

                </div>
            </div>
            <!-- END StaticPage -->
        </div>
        <!-- END Page Content -->

    </main>
@endsection


