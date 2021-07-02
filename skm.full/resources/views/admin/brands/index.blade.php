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
    <script>
        Dropzone.autoDiscover = false
        var uploadedDocumentMap = {}

        $("div#photo-collect-dropzone").dropzone({
            url: '{{ route('admin.media.store') }}',
            dictDefaultMessage : 'Добавьте фотографии брендов',
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
                    }
                });
            },
            init: function () {
                @if( isset($brand->media) )
                    var files = {!! json_encode($brand->getMedia('images')) !!};
                    for (var i in files) {
                        var file = files[i];
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file,'/storage/'+file.id+'/'+file.file_name);
                        file.previewElement.classList.add('dz-complete');
                        this.files.push(file);
                        $('form').append('<input type="hidden" name="photo-collection[]" value="' + file.file_name + '">');
                    }
                @endif
            }
        });
    </script>

@endsection

@section('content')
    <!-- Page Content -->
    <div class="content" style="max-width: 90%">
        {{--<h2 class="content-heading">Бренды</h2>--}}
        <div class="content-heading border-0"></div>

        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-white">
                    <h3 class="block-title"><span id="titleModal">Бренды :</span></h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center pb-20">
                        <div class="col-xl-12">
                            <form class="js-validation-material" action="{{ route('admin.brands.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
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
                                        <div class="needsclick dropzone" id="photo-collect-dropzone"></div>
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
