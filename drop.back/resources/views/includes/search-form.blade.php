<form action="{{ route('products.index') }}" method="GET" class="form-block ">
    <input name="q" class="input-search mr-sm-2" type="search" placeholder="Что вы ищете?"
           aria-label="Search" value="{{ $q ?? '' }}">
    <button class="btn btn-primary my-sm-0" type="submit">Найти</button>
</form>
