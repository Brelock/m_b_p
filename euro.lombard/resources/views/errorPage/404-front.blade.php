@extends('layouts.index')

@section('content')
<div class="mcontainer">
    <div class="wrapper-error-contant">
        <div class="title-error">
            <p>На жаль, запитувана вами сторінка не знайдена.</p> 
            <p>Можливо, вона була видалена або ви перейшли по застарілому посиланню.</p> 
        </div>

        <div class="banner-er">
          <img src="/img/er-banner.png" alt="">
        </div>

        <div class="to-back">
          <a href="{{ route('main') }}">Повернутись на головну</a>
        </div>
    </div>
</div>

@endsection