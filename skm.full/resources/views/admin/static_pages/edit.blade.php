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

    <script src="{{ asset('/js/admin/pages/be_forms_wizard.js') }}"></script>

    <script>jQuery(function(){ Codebase.helpers(['ckeditor','dropzonejs']); });</script>

    <script src="{{asset('/js/admin/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('/js/admin/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/js/admin/wysiwyg.js')}}"></script>

@endsection

@section('content')
    <!-- Page Content -->
    <div class="content" style="max-width: 90%">
        {{--<h2 class="content-heading">Редактировать товар</h2>--}}
        <div class="content-heading border-0"></div>

        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-white">
                    <h3 class="block-title"><span id="titleModal">Редактировать статическую страницу :</span></h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center pb-20">
                        <div class="col-xl-12">
                            <form class="js-validation-material" action="{{ route('admin.static-pages.update', $static_page->slug) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <input type="text" value="{{ $static_page->title }}" class="form-control" id="category-title-ru" name="title" required>
                                            <label for="category-title-ru">Название страницы</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="form-material">
                                            <textarea rows="5" class="form-control" id="content-ru" name="description">{{ $static_page->description }}</textarea>
                                            <label for="content-ru">Содержание страницы</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $static_page->slug }}">
                                            <label for="slug">СЛАГ</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-material">
                                            <input type="text" value="{{ $static_page->meta_title }}" class="form-control" id="metaTitle" name="metaTitle" required>
                                            <label for="metaTitle">Meta title</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="form-material">
                                            <textarea rows="5" class="form-control" id="metaDescription" name="metaDescription">{{ $static_page->meta_description }}</textarea>
                                            <label for="metaDescription">Meta description</label>
                                        </div>
                                    </div>
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

    <!-- END Page Content -->
@endsection
