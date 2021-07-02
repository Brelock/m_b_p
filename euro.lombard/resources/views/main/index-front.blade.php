@extends('layouts.index')

@section('content')

<div class="wrap-content-banners">
  <div class="init-banner-slick">

    <div class="item-banner">
        <picture>
            <source srcset="/img/bgi-baner-necklace-gold-mob.jpg" media="(max-width: 665px)" type="image/jpg">
            <source srcset="/img/bgi-baner-necklace-gold.jpg" media="(min-width: 666px)" type="image/jpg">
            <img srcset="" alt="">
        </picture>
        <div class="wrap-descript-content-banner">
            <div class="title-content-banner">Грошi кожному <br> під заставу золота</div>
            <div class="subtitle-content-banner">
                Оцiночна вартiсть золота залежить в першу чергу вiд проби металу i стану виробу
            </div>
            <button class="button">Замовити</button>
        </div>
    </div>

    <div class="item-banner">
        <picture>
            <source srcset="/img/bgi-baner-necklace-silver-mob.jpg" media="(max-width: 665px)" type="image/jpg">
            <source srcset="/img/bgi-baner-necklace-silver.jpg" media="(min-width: 666px)" type="image/jpg">
            <img srcset="" alt="">
        </picture>
        <div class="wrap-descript-content-banner">
            <div class="title-content-banner">Грошi кожному <br> під заставу срiбла</div>
            <div class="subtitle-content-banner">
                Оцiночна вартiсть срiбла залежить в першу чергу вiд проби металу i стану виробу
            </div>
            <button class="button">Замовити</button>
        </div>
    </div>

    <div class="item-banner">
        <picture>
            <source srcset="/img/bgi-baner-phone-mob.jpg" media="(max-width: 665px)" type="image/jpg">
            <source srcset="/img/bgi-baner-phone.jpg" media="(min-width: 666px)" type="image/jpg">
            <img srcset="" alt="">
        </picture>
        <div class="wrap-descript-content-banner">
            <div class="title-content-banner">Грошi кожному <br> під заставу технiки</div>
            <div class="subtitle-content-banner">
                Кредит під заставу електронної, побутової, кухонної, великої і дрібної техніки
            </div>
            <button class="button">Замовити</button>
        </div>
    </div>

  </div>

  <div class="control-slide">
    <div class="interface-widget">
        <ul class="arrow-list">
            <li class="next-main-banner">
                <span class="icon-arrow-l-primaryColor"></span>
            </li>
            <li class="prev-main-banner">
                <span class="icon-arrow-r-pimaryColor"></span>
            </li>
        </ul>
        <div class="slick__nav">
            <span class="total-dots"></span>
        </div>
        <div class="slider-progress">
            <div class="progress"></div>
        </div>
    </div>
  </div>
</div>

<div>
    <credit-calculator-container
        :show-tabs="true"
    >
</div>

<section class="pictorial-section">
    <div class="mcontainer">
        @include('includes.pictorial-value-front')
    </div>
</section>

<section class="advantages-section">
    <div class="mcontainer">
        @include('includes.advantages-company-front')
    </div>
</section>

<section class="new-action-section small-slide-section">
    <div class="mcontainer">
        @include('includes.main-smail-slide-front')
    </div>
</section>

<section class="common-questions">
    <div class="mcontainer">
        @include('includes.common-questions-front')
    </div>
</section>

<section class="new-news-section small-slide-section">
    <div class="mcontainer">
        @include('includes.main-smail-slide-front')
    </div>
</section>

<section class="review-submission small-slide-section visible-viewportchecker visibility--check">
    <div class="mcontainer">
      <div class="review-wrap-section">
          <span class="icon-bg-line"></span>
          <div class="title">Відгуки клієнтів</div>
          <div class="init-review-slide">

            <div class="el-review">
              Пришлось заложить бабушкины серьги на карантине. 
              Очень переживала чтобы с ними ничего не случилось 
              и не знала в какой ломбард лучше пойти. 
              Зашла в Капитал, девушка оценщица меня успокоила и 
              объяснила, что с моим имуществом всё будет впорядке. 
              Она проверила на пробу золота при мне и спрятала в сейф серёжки. 
              По условиям всё просто и понятно. 
              <span>Сергей, Мелитополь</span>
            </div>

            <div class="el-review">
              Пришлось заложить бабушкины серьги на карантине. 
              Очень переживала чтобы с ними ничего не случилось 
              и не знала в какой ломбард лучше пойти. 
              Зашла в Капитал, девушка оценщица меня успокоила и 
              объяснила, что с моим имуществом всё будет впорядке. 
              Она проверила на пробу золота при мне и спрятала в сейф серёжки. 
              По условиям всё просто и понятно. 
              <span>Сергей, Мелитополь</span>
            </div>

             <div class="el-review">
              Пришлось заложить бабушкины серьги на карантине. 
              Очень переживала чтобы с ними ничего не случилось 
              и не знала в какой ломбард лучше пойти. 
              Зашла в Капитал, девушка оценщица меня успокоила и 
              объяснила, что с моим имуществом всё будет впорядке. 
              Она проверила на пробу золота при мне и спрятала в сейф серёжки. 
              По условиям всё просто и понятно.
              <span>Сергей, Мелитополь</span>
            </div>

             <div class="el-review">
              Пришлось заложить бабушкины серьги на карантине. 
              Очень переживала чтобы с ними ничего не случилось 
              и не знала в какой ломбард лучше пойти. 
              Зашла в Капитал, девушка оценщица меня успокоила и 
              объяснила, что с моим имуществом всё будет впорядке. 
              Она проверила на пробу золота при мне и спрятала в сейф серёжки. 
              По условиям всё просто и понятно.
              <span>Сергей, Мелитополь</span>
            </div>

             <div class="el-review">
              Пришлось заложить бабушкины серьги на карантине. 
              Очень переживала чтобы с ними ничего не случилось 
              и не знала в какой ломбард лучше пойти. 
              Зашла в Капитал, девушка оценщица меня успокоила и 
              объяснила, что с моим имуществом всё будет впорядке. 
              Она проверила на пробу золота при мне и спрятала в сейф серёжки. 
              По условиям всё просто и понятно.
              <span>Сергей, Мелитополь</span>
            </div>

          </div>
          <div class="control-slide">
            <div class="interface-widget">
                <ul class="arrow-list">
                    <li class="next-card">
                        <span class="icon-arrow-l-primaryColor"></span>
                    </li>
                    <li class="prev-card">
                        <span class="icon-arrow-r-pimaryColor"></span>
                    </li>
                </ul>
                <div class="slick__nav">
                    <span class="total-dots"></span>
                </div>
                <div class="slider-progress">
                    <div class="progress"></div>
                </div>
            </div>
            <button class="button btn-modal_review"> Залишити вiдгук </button>
          </div>
        </div>
    </div>
</section>

@endsection