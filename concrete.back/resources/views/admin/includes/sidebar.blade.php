<div id="mySidenav" class="sidenav">
    <ul>
{{--        @can('auth')--}}
        <li @if(Route::is('settings')) class="current" @endif>
          <a href="{{ route('settings') }}">
            <i class="fa fa-cog" aria-hidden="true"></i>Settings
          </a>
        </li>
        <li @if(Route::is('requests')) class="current" @endif>
          <a href="{{ route('requests') }}">
            <i class="fa fa-question" aria-hidden="true"></i>Requests
          </a>
        </li>
        <li @if(Route::is('categories')) class="current" @endif>
          <a href="{{ route('categories') }}">
            <i class="fa fa-calculator" aria-hidden="true"></i>Categories
          </a>
        </li>
        <li @if(Route::is('results')) class="current" @endif>
          <a href="{{ route('results') }}">
            <i class="fa fa-calculator" aria-hidden="true"></i>Results
          </a>
        </li>
{{--        @endcan--}}
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
