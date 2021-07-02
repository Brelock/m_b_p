<div id="mySidenav" class="sidenav">
  <ul>
    <li @if(Route::is('admin.projects.index')) class="current" @endif>
      <a href="{{ route('admin.projects.index') }}">
        <i class="fa fa-gavel" aria-hidden="true"></i>Проекты
      </a>
    </li>
    <li @if(Route::is('admin.products*')) class="nav-item dropdown current" @endif>
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-product-hunt"></i><span class="sidebar-mini-hide">Продукты</span></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('admin.products.index') }}">Общие продукты</a>
        <a class="dropdown-item" href="{{ route('admin.sunports.index') }}">SUNPORT</a>
      </div>
    </li>
    <li @if(Route::is('admin.news.index')) class="current" @endif>
      <a href="{{ route('admin.news.index') }}">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>Новости
      </a>
    </li>
    <li @if(Route::is('admin.seo.index')) class="current" @endif>
      <a href="{{ route('admin.seo.index') }}">
        <i class="fa fa-globe" aria-hidden="true"></i>Seo раздел
      </a>
    </li>
    <li @if(Route::is('admin.language.lines.edit')) class="current" @endif>
      <a href="{{ route('admin.language.lines.edit') }}">
        <i class="fa fa-book" aria-hidden="true"></i>Словари
      </a>
    </li>
    <li @if(Route::is('admin.solutions.index')) class="current" @endif>
      <a href="{{ route('admin.solutions.index') }}">
        <i class="fa fa-user-plus" aria-hidden="true"></i>Готовые решения
      </a>
    </li>
    <li @if(Route::is('admin.settings')) class="current" @endif>
      <a href="{{ route('admin.settings') }}">
        <i class="fa fa-cog" aria-hidden="true"></i>Настройки
      </a>
    </li>
    <li @if(Route::is('admin.callbacks')) class="current" @endif>
      <a href="{{ route('admin.callbacks') }}">
        <i class="fa fa-phone" aria-hidden="true"></i>Заявки
      </a>
    </li>

    <li @if(Route::is('admin.review*')) class="nav-item dropdown current" @endif>
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-paperclip"></i><span class="sidebar-mini-hide">Отзывы</span></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('admin.review-texts.index') }}">Текстовые отзывы</a>
        <a class="dropdown-item" href="{{ route('admin.review-videos.index') }}">Видео отзывы</a>
        <a class="dropdown-item" href="{{ route('admin.review-fotos.index') }}">Фото отзывы</a>
      </div>
    </li>

    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
    <!-- Authentication Links -->
    <li class="nav-item dropdown">
      <a class="nav-link " href="{{ route('logout') }}"
         onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out" aria-hidden="true"></i>Выйти ({{ Auth::user()->name }})
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
  <ul>
    <li><a href="{{ route('site.home') }}" target="_blank"><i class="fa fa-share" aria-hidden="true"></i>На сайт</a>
    </li>
  </ul>
</div>

<span onclick="openNav()" class="bars-btn">
    <i class="fa fa-bars" aria-hidden="true"></i>
</span>
