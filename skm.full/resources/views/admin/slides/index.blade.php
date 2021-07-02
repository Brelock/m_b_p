@extends('admin.layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/admin/plugins/datatables/dataTables.bootstrap4.css') }}">
    <!-- DROP-ZONE -->
    {{--<link rel="stylesheet" href="{{ asset('js/admin/plugins/dropzonejs/dist/dropzone.css') }}">--}}
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/admin/pages/tables_datatables.js') }}"></script>

    <!-- DROP-ZONE -->
    {{--<script src="{{ asset('/js/admin/plugins/dropzonejs/dropzone.min.js') }}"></script>--}}

    <script>
        $('#slide-modal').on('show.bs.modal', function(e) {

            var id = $(e.relatedTarget).data('id');
            var url = $(e.relatedTarget).data('url');
            var status = $(e.relatedTarget).data('status');
            var order = $(e.relatedTarget).data('order');
            var image = $(e.relatedTarget).data('photo');

            if( status != 1 ) status = false;

            var createAction = "{{ route('admin.slides.store') }}";

            if( !image){
                $(e.relatedTarget).find('input[name="image"]').attr('required', true);
                $(e.currentTarget).find('#titleModal').text('Создать слайд :');
                $(e.currentTarget).find('input[name="_method"]').val('post');
                $(e.currentTarget).find('#upload_image').text('Выбрать Фото');
                $(e.currentTarget).find('button[type="submit"]').text('Создать');
                $(e.currentTarget).find('form').attr( 'action',  createAction);
            } else {
                $(e.currentTarget).find('input[name="image"]').attr('required', false);
                $(e.currentTarget).find('#titleModal').text('Редактировать слайд :');
                $(e.currentTarget).find('#preview').attr("src", image);
                $(e.currentTarget).find('input[name="_method"]').val('put');
                $(e.currentTarget).find('#upload_image').text('Изменить Фото');
                $(e.currentTarget).find('button[type="submit"]').text('Обновить');
                $(e.currentTarget).find('form').attr( 'action',  createAction +'/'+ id);
                $(e.currentTarget).find('input[name="status"]').prop('checked', status);
            }

            $(e.currentTarget).find('input[name="url"]').val(url);
            $(e.currentTarget).find('input[name="order"]').val(order);

        });
        /// Upload image
        $('input[type="file"]').change(function(e){
            let fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
        /// Show Upload image
        $('input[type="file"]').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection

@section('content')
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <!-- Display message -->
            @if (Session::has('message'))
                <div class="alert alert-warning">{{ Session::get('message') }}</div>
            @endif
            <!-- Overview -->
            <h2 class="content-heading">Слайды</h2>

            <div class="block">
                <button class="btn btn-square btn-outline-primary border-0 py-3"
                        data-toggle="modal"
                        data-target="#slide-modal">Добавить новый слайд <i class="fa fa-plus"></i></button>
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
                            <th class="">Урл</th>
                            <th class="">Порядок</th>
                            <th class="">Статус</th>
                            <th class="d-none d-sm-table-cell">Обновлен</th>
                            <th class="d-none d-sm-table-cell">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slides as $slide)
                            <tr>
                                <td>
                                    <img class="img-fluid"
                                         src="{{ $slide->getMedia('images')->first() ? $slide->getMedia('images')->first()->getUrl() : asset('img/zaglushka.png') }}"/>
                                </td>
                                <td class="">
                                    <span class="text-black">{{ $slide->url }}</span>
                                </td>
                                <td class="">
                                    <span class="text-black">{{ $slide->order }}</span>
                                </td>
                                <td class="">
                                    @if($slide->status)
                                        <h5>
                                            <span class="badge badge-success">Активный</span>
                                        </h5>
                                    @else
                                        <h5>
                                            <span class="badge badge-warning">Неактивный</span>
                                        </h5>
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $slide->updated_at }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <form class="delete_approved" action="{{ route('admin.slides.destroy', $slide->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-square btn-danger w-100">Удалить</button>
                                    </form>
                                    {{--@dd($category->getMedia('images'))--}}
                                    <button type="button"
                                            class="btn btn-square btn-warning btn-block mt-1"
                                            data-id="{{ $slide->id }}"
                                            data-url="{{ $slide->url }}"
                                            data-order="{{ $slide->order }}"
                                            data-status="{{$slide->status}}"
                                            data-photo="{{$slide->getMedia('images')->first() ?
                                                          $slide->getMedia('images')->first()->getUrl() :
                                                          asset('img/zaglushka.png')
                                                         }}"
                                            data-toggle="modal"
                                            data-target="#slide-modal">Редакт.
                                    </button>
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

    <!-- Pop Out Modal -->
    <div class="modal fade" id="slide-modal" tabindex="-1" role="dialog" aria-labelledby="category-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-slideleft modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-info">
                        <h3 class="block-title"><span id="titleModal">Редактировать слайд :</span></h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center pb-20">
                            <div class="col-xl-12">
                                <form class="js-validation-material" action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-material">
                                                <input type="text" class="form-control" id="url" name="url">
                                                <label for="url">Урл</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-material">
                                                <input type="number" min="0" class="form-control" id="order" name="order">
                                                <label for="order">Порядок</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" class="checkbox-inp" id="status" name="status" checked>
                                                <label class="p-2 mb-0" for="status">Активный статус</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" required>
                                                <label id="upload_image" class="upload_image custom-file-label" for="inputGroupFile01">Выбрать Фото</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="image">
                                        <img src="{{asset('img/zaglushka.png')}}" id="preview" class="img-form img-thumbnail">
                                    </div>

                                    <div class="form-group mt-25">
                                        <button type="submit" class="btn btn-square btn-success float-right px-30">Обновить</button>
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
