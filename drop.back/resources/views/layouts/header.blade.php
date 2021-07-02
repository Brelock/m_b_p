<header class="mainHeader ">
  <div class="main-header-top">
		<div class="mcontainer">
			<div class="top-header-wrap flex">
				<ul class="top-header-links flex">
					<li> <a class="{{ \Route::is('unload.index') ? 'active' : '' }}" href="{{ route('unload.index') }}">Выгрузка</a> </li>
					<li> <a class="{{ \Route::is('deliveries') ? 'active' : '' }}" href="{{ route('deliveries') }}">Доставка и оплата</a> </li>
					<li> <a class="{{ \Route::is('contacts') ? 'active' : '' }}" href="{{ route('contacts') }}">Контакты</a> </li>
				</ul>
				<a href="tel:+380508549400" class="top-header-phone flex"> 
					<div class="top-header-phone_img"></div> 
					<span>050 854 94 00</span>
				</a>
			</div>
		</div>
	</div> 
  <div class="main-header-body"> 
    <div class="mcontainer">
      <nav class="flex navbar-menu spaceBetween">
        <div class="logo-nav">
          <a href="/" class="navbar-brand"><img class="logo-nav-img" src="/img/logo-city-a.png" alt=""></a>
        </div>

        @widget('categoryAccordionWidget')
        @include('includes.search-form')

        @widget('cartWidget')

      </nav>
    </div>
  </div> 
</header>