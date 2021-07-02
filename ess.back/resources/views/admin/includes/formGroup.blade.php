<div class="form-group col-sm-12 @if($errors->has($property)) has-error @endif">
  <div>
    {{ $slot }}
    @if($errors->has($property))
      <div class="help-block">{{ $errors->first($property) }}</div>
    @endif
  </div>
  <label>{{ \Illuminate\Support\Str::ucfirst($label) }}</label>
</div>

