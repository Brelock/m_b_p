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
            <h2 class="content-heading">Статические страницы</h2>
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
                            <th class="">Название</th>
                            <th class="">СЛАГ</th>
                            <th class="w-25">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td class="">
                                    {{ $page->title }}
                                </td>
                                <td>
                                    {{ $page->slug }}
                                </td>
                                <td class="d-sm-table-cell">
                                    <a type="button" href="{{ route('admin.static-pages.edit', $page->slug) }}" class="btn ml-auto btn-square btn-warning btn-block mt-1">
                                        Редакт.
                                    </a>
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


