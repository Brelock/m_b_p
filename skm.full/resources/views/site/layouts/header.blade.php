<header class="mainHeader">
    <div class="topHeader">
        <div class="mcontainer">
            <div class="header-content-container">
                <div class="advantage-item">
				 <div class="advantage-item-icon">
					 <img src="/img/icons/truck.svg" alt="">
				 </div>
				 <div class="advantage-item-title">Бесплатная доставка в регионы</div>
			   </div>
			   <div class="advantage-item">
				 <div class="advantage-item-icon">
					 <img src="/img/icons/furniture.svg" alt="">
				 </div>
				 <div class="advantage-item-title">Огромный ассортимент товаров: более 10 000 наименований</div>
			   </div>
			   <div class="advantage-item">
				 <div class="advantage-item-icon">
					 <img src="/img/icons/pay.svg" alt="">
				 </div>
				 <div class="advantage-item-title">Удобное оформление заказа и система оплаты</div>
			   </div>
			   <div class="advantage-item">
				 <div class="advantage-item-icon">
					 <img src="/img/icons/garanty.svg" alt="">
				 </div>
				 <div class="advantage-item-title">Гарантия качества на все товары</div>
			   </div>
            </div>
        </div>
    </div>

    <div class="bottomHeader">
        <div class="mcontainer">
            <div class="header-content-container">

                <div class="logo-block mcol-xs-6 mcol-sm-4 relative">
                    <a href="{{ route('main') }}" class="absolute stretch"></a>
                    <div class="imgWrapper">
                        <img src="/img/skm_logo.png" alt="logo">
                    </div>
                </div>
                <div class="mainNavigation mcol-xs-hide mcol-sm-show">
                        <div class="content-container">
                            <ul class="nav-list">
                                <li class="nav-item"><a href="{{ route('static.page', 'cooperation') }}">СОТРУДНИЧЕСТВО</a></li>
                                <li class="nav-item"><a href="{{ route('static.page', 'preimus') }}">ПРЕИМУЩЕСТВА</a></li>
                                <li class="nav-item"><a href="{{ route('static.page', 'about') }}">О НАС</a></li>
                                <li class="nav-item @@contactUs"><a href="{{ route('contacts.index') }}">КОНТАКТЫ</a></li>
                            </ul>
                        </div>
                </div>
                {{-- <div class="right-part mcol-xs-6 mcol-sm-4">
                    <div class="search-block part-block">
                        <div id="headerSearchInput" class="hiddenContent width">
                            <input type="text" class="" placeholder="Search...">
                        </div>
                        <i class="fas fa-search searchButton" data-target="headerSearchInput"></i>
                    </div>
                </div>

                <div class="mokeBlock mcol-xs-hide mcol-sm-show mcol-sm-4"></div>--}}
            </div>
        </div>
    </div>

    
</header>
