<div class="form-group{{ $errors->has($name) ? ' is-invalid' : '' }} {{ isset($width) ? $width : ' col-sm-12' }}">
    <div class="form-material form-material-primary">

        <label for="{{ $name }}">{!! $label !!}</label>
        <textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="Введите описание"
        {{ isset($attributes) ? $attributes : '' }}>{!! old($name) ?: (isset($object) ? $object->{$name} : '') !!}</textarea>

    </div>
    @if ($errors->has($name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>

