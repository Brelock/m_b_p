<header class="mainHeader">
  <div class="mcontainer">
    <nav class="navbar light-blue lighten-4 ">

      <!-- Navbar brand -->
      <!-- Collapse button -->
      <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent1"
              aria-controls="navbarSupportedContent1" aria-expanded="false"
              aria-label="Toggle navigation"><span class="dark-blue-text"><i
            class="fas fa-bars fa-1x"></i></span></button>


      <a @if(\Illuminate\Support\Facades\Auth::check()) style="right: 90px;" @endif
         href="{{ \App\Providers\RouteServiceProvider::HOME }}"
         class="btn btn-outline-primary">К сайту</a>

      @if(\Illuminate\Support\Facades\Auth::check())
      <a href="{{ route('admin.logout') }}" class="btn btn-outline-primary">Выйти</a>
      @endif

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <!-- Links -->
        <div class="flex spaceBetween nav-header">
          <ul class="navbar-nav mr-auto nav">
            @if(\Illuminate\Support\Facades\Auth::check())

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.orders.index') ? ' active' : '' }}" href="{{ route('admin.orders.index') }}">Заказы</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.orders.archived') ? ' active' : '' }}" href="{{ route('admin.orders.archived') }}">Архив</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.texts.index') ? ' active' : '' }}" href="{{ route('admin.texts.index') }}">Текст</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.links.index') ? ' active' : '' }}" href="{{ route('admin.links.index') }}">Ссылки</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.xls.index') ? ' active' : '' }}" href="{{ route('admin.xls.index') }}">XLS</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.subscriptions.index') ? ' active' : '' }}" href="{{ route('admin.subscriptions.index') }}">Заявки</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.banners.index') ? ' active' : '' }}" href="{{ route('admin.banners.index') }}">Банеры</a>
            </li>

            @else
            <li class="nav-item"><a style="padding: 20px;" class="nav-link" href="#"></a></li>
            @endif
          </ul>
        </div>
        <!-- Links -->
      </div>
      <!-- Collapsible content -->
    </nav>
  </div>


</header>
