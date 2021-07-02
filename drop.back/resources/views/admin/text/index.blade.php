@extends('admin.layouts.app')

@section('content')

  <div id="adminText" class="adminText page">
    <div class="mcontainer">
      <form action="{{ route('admin.texts.update') }}" method="POST"
            class="flex wrap window-block">
        @csrf
        @method("PUT")

        @foreach($staticPages as $staticPage)
          <div class="window-item">
            <div class="title-window">{{ $staticPage->title }}</div>

            <input type="hidden" name="types[]" value="{{ $staticPage->type }}"/>

            <textarea name="descriptions[{{ $staticPage->type }}]" class="text-window"
                      data-setting-id="{{ $staticPage->id }}">
              {{ old('description') ? old('description') : $staticPage->description }}
            </textarea>
          </div>
        @endforeach

        <div class="admit-text-btn">
          <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
  <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('js/wysiwyg.js')}}"></script>
@endsection
