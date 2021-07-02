<div class="form-group col-sm-12 params-form-group" hidden="true">
  <hr>
  <div class="row">
      <span class="admin-param-delete" style="margin-left:20px;color:#ff0000;">
        <i class="fa fa-times-circle-o delete-action-param" aria-hidden="true"></i>
      </span>
  </div>
  <div class="row">
    @component('admin.includes.text_input', [
     'name' => 'params[][title_ru]',
     'label' => 'Название параметра',
     'placeholder' => 'Введите название',
     'object' => !$sunport->isNew() ? $sunport : null,
     'width' => 'col-sm-6',
     'class' => 'params-form-group__input--title_ru',
    ])@endcomponent
    @component('admin.includes.text_input', [
       'name' => 'params[][title_uk]',
       'label' => 'Название параметра (украинский вариант)',
       'placeholder' => 'Введите название',
       'object' => !$sunport->isNew() ? $sunport : null,
       'width' => 'col-sm-6',
       'class' => 'params-form-group__input--title_uk',
   ])@endcomponent
  </div>
  <div class="row">
    @component('admin.includes.text_input', [
     'name' => 'params[][value_ru]',
     'label' => 'Значение параметра',
     'placeholder' => 'Введите значение',
     'object' => !$sunport->isNew() ? $sunport : null,
     'width' => 'col-sm-6',
     'class' => 'params-form-group__input--value_ru',
    ])@endcomponent
    @component('admin.includes.text_input', [
       'name' => 'params[][value_uk]',
       'label' => 'Значение параметра (украинский вариант)',
       'placeholder' => 'Введите значение',
       'object' => !$sunport->isNew() ? $sunport : null,
       'width' => 'col-sm-6',
       'class' => 'params-form-group__input--value_uk',
    ])@endcomponent
  </div>
  <hr>

</div>