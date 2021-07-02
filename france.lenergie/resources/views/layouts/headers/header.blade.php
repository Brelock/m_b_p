<header class="mainHeader {{ Route::is('main', 'infos') ? 'primary' : '' }} ">
    <div class="mcontainer">
        <div class="nav_menu">
            <button class="hamburger hamburger--squeeze" type="button">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
            </button> 
            <div class="header_logo">
                <a href="{{ route('main')}}">
                </a> 
            </div>
            <div class="wrap_list">
                <ul class="nav_list">
                    <li class="upper_link item_desktop">
                        <div class="toggle_link">
                            <span class="nav_item_link">ÉVÈNEMENT</span>
                            <span class="icon-plus"></span>
                        </div>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="{{ Route::is('inoguration') ? 'active' : '' }}"
                                        href="{{ route('inoguration')}}">inauguration</a></li>
                                <li><a class="{{ Route::is('barragesDeMontezic') ? 'active' : '' }}"
                                        href="{{ route('barragesDeMontezic')}}">barrages de montézic golinhac et cambeyrac</a></li>
                                <li><a class="{{ Route::is('barragesDeCastelnau') ? 'active' : '' }}"
                                        href="{{ route('barragesDeCastelnau')}}">barrage de castelnau-lassouts</a></li>
                                <li><a class="{{ Route::is('barragesDeLanau') ? 'active' : '' }}"
                                        href="{{ route('barragesDeLanau')}}">barrages de lanau et grandval</a></li>
                                <li><a class="{{ Route::is('barragesDeSarrans') ? 'active' : '' }}"
                                        href="{{ route('barragesDeSarrans')}}">barrage de sarrans</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="upper_link item_desktop">
                        <a class="nav_item_link {{ Route::is('expositions') ? 'active' : '' }}" 
                            href="{{ route('expositions')}}">EXPOSITIONS</a>
                    </li>
                    <li class="upper_link item_desktop">
                        <a class="nav_item_link {{ Route::is('infos') ? 'active' : '' }}" 
                            href="{{ route('infos') }}">INFOS PRATIQUES</a>
                    </li>
                </ul>

                <div class="downloading_header_block">
                    <a class="telechargers" download href="/img/ProgRoutedeEnergie.pdf"></a>
                    <div class="btn_telechanger">
                        <span class="icon-arrow_download"></span>
                        <div class="description_btn">
                            <span>TÉLÉCHARGER</span>
                            <span>LE PROGRAMME</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>