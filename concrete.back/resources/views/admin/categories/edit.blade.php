<?php /* @var array $errors */ ?>

@extends('admin.layouts.app')

@section('content')

  <div class="container">
    <br>
    <div class="row">
      <div class="col-12">
        <a href="{{ route('categories') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <form method="POST"
              @if($category->exists)
              action="{{ route('categories.update', ['category' => $category]) }}"
              @endif
              enctype='multipart/form-data'>
          @csrf
          @if($category->exists)
            @method('PUT')
          @endif
          @component('admin.includes.formGroup', ['errors' => $errors, 'property' => 'title', 'label' => 'Title'])
            <input type="text" class="form-control" name="title" id="inputTitle"
                   value="{{ old('title') ? old('title') : $category->title }}">
          @endcomponent

          @component('admin.includes.formGroup', ['errors' => $errors, 'property' => 'type', 'label' => 'Type'])
            <select class="form-control" id="type" name="type">
              <option value="">Chose type</option>
              @forelse($labelsType as $indexType => $typeName)
                <option value="{{ $indexType }}"
                        @if($typeName == old('type'))
                        selected
                        @elseif(isset($category) && $indexType == $category->type)
                        selected
                        @endif
                >{{ $typeName }}</option>
              @empty
              @endforelse
            </select>
          @endcomponent

          @component('admin.includes.formGroup', ['errors' => $errors, 'property' => 'formula', 'label' => 'Formula'])
            <input type="text" class="form-control" name="formula"
                   value="{{ old('formula') ? old('formula') : $category->formula }}">
          @endcomponent

          @if(old('type') ? old('type') : $category->type)
            @foreach($typePictures[old('type') ? old('type') : $category->type] as $typePicture)
              <div class="row">
                @component('admin.includes.fileFormGroup', ['errors' => $errors, 'property' => "files[$typePicture]", 'label' => "{$picturesType[$typePicture]} picture "])
                  <input type="file" name="files[{{ $typePicture }}]" class="form-control-file"
                  @if(!isset($category->pictures()->where('type', $typePicture)->file_name))  @endif/>
                @endcomponent
                  <div class="col-sm-4">
                    <div class="card card-body bg-light">
                      @if(!empty($pictures))
                        @foreach($pictures as $picture)
                          @if($picture->type == $typePicture)
                            <img src="{{ $picture->assetAbsolute($picture->file_name) }}" alt="" class="img-fluid">
                          @endif
                        @endforeach
                      @endif
                    </div>
                  </div>
              </div>
              <br>
            @endforeach
          @endif
          <br>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

