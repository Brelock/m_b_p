<div class="form-group{{ $errors->has($name) ? ' is-invalid' : '' }} {{ isset($width) ? $width : ' col-sm-12' }}">

    <div class="form-material form-material-primary">

        <input id="{{ $name }}"
               type="{{ isset($type) ? $type : 'text' }}"
               class="form-control {{ $class ?? '' }}"
               name="{{ $name }}"
               placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
               value="{{old($name) ?: (isset($object) ? $object->{$name} : '')}}"
                {{ isset($attributes) ? $attributes : '' }}>
        @isset($label)
            <label for="{{ $name }}">{!! $label !!}</label>
        @endisset
    </div>

    @isset($help)
        <div class="form-text text-muted text-right"><small>{{ $help }}</small></div>
    @endisset


    @if ($errors->has($name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif

</div>