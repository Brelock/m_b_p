@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h2>Реквизиты и отчетность</h2>
    <form method="POST" action="{{ route('reports.update') }}" class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-4">
                <h5>Прикрепленные документы</h5>
                <input class="form-control" type="file" name="documents[]" multiple />
            </div>
        </div>
        <div class="row">

            <div class="col-sm-4">
                @if(isset($documents))
                    <h6>Вы можете добавить названия документам для красивого отображения</h6>
                    <ul class="list-group">
                        @foreach($documents as $document)
                            <li class="list-group-item" data-element-id="{{ $document->id }}">
                                <div class="row admin-document">
                                    <span class="col-xs-10">{{ $document->path }}</span>
                                    <a href="" class="delete col-xs-2" data-delete-url="/admin/documents/{{ $document->id }}" data-element-id="{{ $document->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <br>
                                <div class="row">
                                    <input class="form-control col-xs-12" name="document_titles[{{ $document->id }}]" type="text" value="{{ $document->title or '' }}" placeholder="введите имя документа">
                                </div>

                            </li>
                            <br>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/wysiwyg.js')}}"></script>
@endsection