
<header class="mainHeader">
       <div class="header-content-wrap">
           <div class="header-logo">
               <a href="{{ route('main') }}"> <img src="img/logoEuroLombard.svg" alt=""></a>
           </div>
           <nav class="nav">
                <div class="menu-btn">
                  <div class="line line--1"></div>
                  <div class="line line--2"></div>
                  <div class="line line--3"></div>   
              </div>

              <ul class="header-nav-list">
                  <li class="lang-btn">
                      <span class="active">UA</span>
                      <span >RU</span>
                  </li>
                  <li class="nav-item">
                    <a href="#">
                        <span>Розрахувати кредит</span> 
                        <span class="icon-arrow-down-gray"></span>
                    </a>
                    <ul class="nav-item_submenu">
                        <li><a href="{{ route('gold')}}">Пiд Золото</a></li>
                        <li><a href="{{ route('silver')}}">Пiд Срiбло</a></li>
                        <li><a href="{{ route('technics')}}">Пiд Технiку</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#">
                        <span>Про компанiю</span>
                        <span class="icon-arrow-down-gray"></span>
                    </a>
                    <ul class="nav-item_submenu">
                        <li><a href="{{ route('about') }}">Про нас</a></li>
                        <li><a href="{{ route('requisite') }}">Реквiзити</a></li>
                        <li><a href="{{ route('career') }}">Кар'єра</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a href="{{ route('news') }}">Новини</a></li>
                  <li class="nav-item"><a href="{{ route('action')}}">Акції</a></li>
                  <li class="nav-item"><a href="{{ route('departments')}}">Вiддiлення</a></li>
                  <li class="callback-section-header">
                       <div class="callback-phone">
                           <div class="callback-item-phone">
                               <a href="tel:+380731010000">073 101 00 00</a>
                               <div class="callback-drop-box"> <span class="call-drop-title">Зворотнiй зв’язок</span> 
                                    <div class="callback-dropdown-phone">
                                        @include('includes.callback-questions-form-front')
                                        <div class="social-mobile-form">
                                             <ul class="social-mobile-list">
                                                 <li>
                                                     <span class="icon-social-fb"></span>
                                                     <a href="#" class="social-item-link"></a>
                                                 </li>
                                                 <li>
                                                     <span class="icon-social-inst"></span>
                                                     <a href="#" class="social-item-link"></a>
                                                 </li>
                                                 <!-- <li>
                                                     <span class="icon-social-yt"></span>
                                                     <a href="#" class="social-item-link"></a>
                                                 </li> -->
                                                 <li>
                                                     <span class="icon-social-telegram"></span>
                                                     <a href="#" class="social-item-link"></a>
                                                 </li>
                                             </ul>
                                        </div>
                                    </div>
                               </div>
                           </div>
                       </div>
         
                  </li>
              </ul>

           </nav> 

       </div>
</header>