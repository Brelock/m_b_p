<div class="form-group col-sm-12 picture_params-form-group" hidden="true">
  <hr>
  <div class="row">
      <span class="admin-param-delete" style="margin-left:20px;color:#ff0000;">
        <i class="fa fa-times-circle-o admin-param-picture-delete" aria-hidden="true"></i>
      </span>
  </div>
  <div class="row">
    @component('admin.includes.text_input', [
     'name' => 'pictureParams[][title_ru]',
     'label' => 'Название параметра',
     'placeholder' => 'Введите название',
     'object' => !$sunport->isNew() ? $sunport : null,
     'width' => 'col-sm-6',
     'class' => 'picture-params-form-group__input--title_ru',
    ])@endcomponent
    @component('admin.includes.text_input', [
       'name' => 'pictureParams[][title_uk]',
       'label' => 'Название параметра (украинский вариант)',
       'placeholder' => 'Введите название',
       'object' => !$sunport->isNew() ? $sunport : null,
       'width' => 'col-sm-6',
       'class' => 'picture-params-form-group__input--title_uk',
   ])@endcomponent
    @component('admin.includes.fileFormGroup', ['errors' => $errors, 'property' => 'file', 'label' => '30х30'])
      <input type="file" name="pictureParams[][filePicture]" class="form-control-file picture-params-form-group__input--filePicture"
             id="param-image">
    @endcomponent
  </div>
  <div class="row"></div>

  <hr>
</div>