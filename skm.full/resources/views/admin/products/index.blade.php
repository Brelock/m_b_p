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

        <!-- Breadcrumb -->
        {{--<div class="bg-body-light border-b">
            <div class="content py-5 text-center">
                <nav class="breadcrumb bg-body-light mb-0">
                    <a class="breadcrumb-item" href="#">Сайт</a>
                    <span class="breadcrumb-item active">Продукты</span>
                </nav>
            </div>
        </div>--}}
        <!-- END Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->
            <h2 class="content-heading">Товары</h2>

            <div class="block">
                <a href="{{ route('admin.products.create') }}" class="btn btn-square btn-outline-primary border-0 py-3">
                    Добавить новый товар <i class="fa fa-plus"></i>
                </a>
            </div>
            <!-- Products -->

            <div class="block block-rounded">
                <div class="block-content">
                    <!-- Products Table -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full"
                           data-language = "['url' : 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json']"
                           data-length-menu ="[15,20,30,50]"
                           data-page-length = "15"
                           data-order='[[4, "desc"]]'>
                        <thead>
                        <tr>
                            <th style="width: 100px;">ФОТО</th>
                            <th class="">Название</th>
                            <th class="">Категория</th>
                            <th class="text-right">Слаг</th>
                            <th class="d-none d-sm-table-cell">Обновлен</th>
                            <th class="d-none d-sm-table-cell">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <img class="img-fluid"
                                         src="{{ $product->getMedia('main_image')->first() ?
                                         $product->getMedia('main_image')->first()->getUrl() :
                                          asset('img/zaglushka.png') }}" />
                                </td>
                                <td class="">
                                    {{ $product->title }}
                                </td>
                                <td>
                                    {{ $product->category ? $product->category->title : '' }}
                                </td>
                                <td class="text-right">
                                    <span class="text-black">{{ $product->slug }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $product->updated_at }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <form class="delete_approved" action="{{ route('admin.products.destroy', $product->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-square btn-danger w-100">Удалить</button>
                                    </form>
                                    <a type="button" href="{{ route('admin.products.edit', $product->slug) }}" class="btn btn-square btn-warning btn-block mt-1">
                                        Редакт.
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- END Products Table -->

                </div>
            </div>
            <!-- END Products -->
        </div>
        <!-- END Page Content -->

    </main>
@endsection
