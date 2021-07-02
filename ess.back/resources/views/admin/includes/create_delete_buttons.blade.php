<div class="buttons">
    <div class="button-group form-group">
        @if($createButton)
            <a href="{{ route($routeName) }}">
                <button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Создать</button>
            </a>
        @endif

        @if($deleteButton)
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
        @endif
    </div>
</div>