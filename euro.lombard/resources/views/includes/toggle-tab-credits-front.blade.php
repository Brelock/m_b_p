<div class="toggle-tab-flex ">
      <div class="tab-item visible-viewportchecker visibility--check {{ Route::is('gold') ? ' actived' : '' }}" >
        <span class="title-tab">Пiд Золото</span>
        <span class="icon-bg-line"></span>
        <img class="image-def" src="/img/icon-gold-tab-def.png" alt="">
        <img class="image-actived" src="/img/icon-gold-tab.png" alt="">
        <a class="btn-actived-tabs" href="{{ route('gold')}}"></a>
      </div>
      <div class="tab-item visible-viewportchecker visibility--check {{ Route::is('silver') ? ' actived' : '' }}" >
        <span class="title-tab">Пiд Срiбло</span>
        <span class="icon-bg-line"></span>
        <img class="image-def" src="/img/icon-silver-tab-def.png" alt="">
        <img class="image-actived" src="/img/icon-silver-tab.png" alt="">
        <a class="btn-actived-tabs" href="{{ route('silver')}}"></a>
      </div>
      <div class="tab-item visible-viewportchecker visibility--check {{ Route::is('technics') ? ' actived' : '' }}" >
        <span class="title-tab">Пiд Технiку</span>
        <span class="icon-bg-line"></span>
        <img class="image-def" src="/img/icon-technicks-tab-def.png" alt="">
        <img class="image-actived" src="/img/icon-technicks-tab.png" alt="">
        <a class="btn-actived-tabs" href="{{ route('technics')}}"></a>
      </div>
</div>