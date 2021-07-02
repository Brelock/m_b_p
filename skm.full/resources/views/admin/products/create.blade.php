@extends('admin.layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/admin/plugins/dropzonejs/dist/dropzone.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/admin/plugins/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('/js/admin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('/js/admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/admin/plugins/jquery-validation/additional-methods.js') }}"></script>

    <script src="{{ asset('/js/admin/plugins/dropzonejs/dropzone.min.js') }}"></script>

    <script>jQuery(function(){ Codebase.helpers(['ckeditor','dropzonejs']); });</script>
    <script>
        Dropzone.autoDiscover = false
        var uploadedDocumentMap = {}

        $("div#photo-dropzone").dropzone({
            url: '{{ route('admin.media.store') }}',
            dictDefaultMessage : 'Добавьте главное фото товара',
            dictRemoveFile : 'Удалить',
            dictMaxFilesExceeded : 'Главное фото может бить только одно!',
            maxFiles: 1,
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="photo[]"][value="' + name + '"]').remove()

                $.ajax({
                    dataType: 'json',
                    type: "DELETE",
                    url: '{{ route('admin.media.deleteTmp') }}',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'fileName' : name,
                    },
                    success: function (response) {
                        //console.log(response);
                    },
                    error: function (xhr) {
                        //console.log(xhr);
                        //window.flash(xhr.responseJSON.message, xhr.responseJSON.class);
                    }
                });
            },
            init: function () {
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }
        });

        $("div#photo-collect-dropzone").dropzone({
            url: '{{ route('admin.media.store') }}',
            dictDefaultMessage : 'Добавьте фотографии товара',
            dictRemoveFile : 'Удалить',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="photo-collection[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="photo-collection[]"][value="' + name + '"]').remove()

                $.ajax({
                    dataType: 'json',
                    type: "DELETE",
                    url: '{{ route('admin.media.deleteTmp') }}',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'fileName' : name,
                    },
                    success: function (response) {
                        //console.log(response);
                    },
                    error: function (xhr) {
                        //console.log(xhr);
                        //window.flash(xhr.responseJSON.message, xhr.responseJSON.class);
                    }
                });
            },
            init: function () {}
        });
    </script>

@endsection

@section('content')
    <!-- Page Content -->
    <div class="content" style="max-width: 90%">
        {{--<h2 class="content-heading">Новый товар</h2>--}}
        <div class="content-heading border-0"></div>

        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-white">
                    <h3 class="block-title"><span id="titleModal">Создать товар :</span></h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center pb-20">
                        <div class="col-xl-12">
                            <form class="js-validation-material" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="category-title-ru" name="title" required>
                                            <label for="category-title-ru">Название</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <select class="form-control" id="product-category_id" name="category_id">
                                               {{-- @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>--}}
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{$category->title}}
                                                        </option>
                                                        @foreach($category->childs as $child)
                                                            <option value="{{ $child->id }}">
                                                                -- {{$child->title}}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                               {{-- @endforeach--}}
                                            </select>
                                            <label for="category-title-ru">Категория</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="form-material">
                                            <textarea rows="5" class="form-control" id="description" name="description"></textarea>
                                            <label for="category-title-ru">Описание</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="slug" name="slug">
                                            <label for="slug">Слаг</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <input type="number" min="0" class="form-control" id="price" name="price">
                                            <label for="price">Цена, <span class="font-italic font-weight-normal">грн</span></label>
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
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" class="checkbox-inp" id="new" name="new">
                                            <label class="p-2 mb-0" for="new">Новый товар</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" class="checkbox-inp" id="popular" name="popular">
                                            <label class="p-2 mb-0" for="popular">Популярный товар</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Upload Image --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <label for="">Фото</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="wizard-validation-material-step4" role="tabpanel">
                                    <div class="form-group">
                                        <div class="needsclick dropzone" id="photo-dropzone"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="needsclick dropzone" id="photo-collect-dropzone"></div>
                                    </div>
                                </div>

                                <div class="form-group mt-25">
                                    <button type="submit" class="btn btn-square btn-success float-right px-30">Создать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- END Page Content -->
@endsection
