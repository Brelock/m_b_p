@extends('admin.layouts.app')

@section('content')
  <h2 class="content-heading">Словари</h2>
  <div class="row">
    <div class="col-sm-12">
      <div class="block">
        <form method="post" id="form-language-lines" action="{{ route('admin.language.lines.update') }}">
          @method('PUT')
          @csrf
          <div class="block-content">
            <div class="row">
              <div class="col-sm-12">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @forelse($lines as $group => $line)
                      <a class="nav-item nav-link @if($loop->first) active @endif" id="{{ $group }}-link"
                         data-toggle="tab" href="#{{ $group }}" role="tab" aria-controls="{{ $group }}"
                         aria-selected="true">{{ $group }}</a>
                    @empty
                    @endforelse
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                  @forelse($lines as $group => $langLines)
                    <div class="tab-pane fade show @if($loop->first) active @endif" id="{{ $group }}" role="tabpanel"
                         aria-labelledby="{{ $group }}-link">
                      <br>

                      @forelse($langLines as $line)
                        <div class="row">
                          @component('admin.includes.textarea_lang_input', [
                              'name' => $group.'['.$line->key.'][ru]',
                              'label' => $line->key. ' ru',
                              'placeholder' => 'Введите meta description',
                              'object' => $line,
                              'rows' => 2,
                              'lang' => 'ru',
                              'width' => 'col-sm-4'
                          ])@endcomponent
                          @component('admin.includes.textarea_lang_input', [
                              'name' => $group.'['.$line->key.'][uk]',
                              'label' => $line->key. ' uk',
                              'placeholder' => 'Введите meta description',
                              'object' => $line,
                              'rows' => 2,
                              'lang' => 'uk',
                              'width' => 'col-sm-4'
                          ])@endcomponent
                        </div>

                      @empty
                      @endforelse

                    </div>
                  @empty
                    <h5>Еще не создано ни одной языковой переменной</h5>
                  @endforelse

                </div>
              </div>


            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection

@section('scripts')

  <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.js') }}"></script>

@endsection