@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
       <li class="breadcrumbs-link"><a href="{{ route('action') }}">Акції</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">Акція "Півкіло золота" та ще 300 подарунків! Золота лихоманка в Ломбардах!</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">Акція "Півкіло золота" та ще 300 подарунків! Золота лихоманка в Ломбардах!</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
    <div class="banner visible-viewportchecker visibility--check hidden">
      <img src="/img/one-action-banner.png" alt="">
    </div>
    <div class="wrap-description">
      <p class="data-news visible-viewportchecker visibility--check hidden"> з 01 квітня по 30 червня 2021 </p>
      <p class="visible-viewportchecker visibility--check hidden">
        Оформи договір Про надання фінансового кредиту 
        та застави від 7 днів/діб, виконай всі умови Акції та бери участь 
        у розіграші чудових подарунків. Серед яких:
      </p>
      <br>
      <p class="visible-viewportchecker visibility--check hidden">
        Головний подарунок Акції -
        ювелірний виріб із золота 585 проби вагою 500 грам! - 1 шт
      </p>
      <p class="visible-viewportchecker visibility--check hidden">Телевізор Xiaomi 43” - 10 шт</p> 
      <p class="visible-viewportchecker visibility--check hidden">Смартфон Xiaomi Redmi 9 3/32 - 20 шт</p>
      <p class="visible-viewportchecker visibility--check hidden">Фітнес браслет Mi Band 5 - 40 шт</p>
      <p class="visible-viewportchecker visibility--check hidden">Портативна колонка JBL Go 2 - 50 шт</p>
      <p class="visible-viewportchecker visibility--check hidden">Мобільна батарея 10000 mAh - 50 шт</p>
      <p class="visible-viewportchecker visibility--check hidden">Мобільна батарея 5000 mAh - 25 шт</p>
      <p class="visible-viewportchecker visibility--check hidden">Сертифікати на покупку техніки в магазині "Цитрус" номіналом 250 грн - 102 шт.</p>
      <br>
      <p class="important-info visible-viewportchecker visibility--check hidden">Як стати учасником Акції</p>
      <br>
      <p class="visible-viewportchecker visibility--check hidden">Учасником Акції є клієнти, які виконали наступні умови:</p> 
      <p class="visible-viewportchecker visibility--check hidden">Повністю згодні з Офіційними Правилами.</p>
      <p class="visible-viewportchecker visibility--check hidden">
        Уклали договір про надання фінансового кредиту та застави (ДФКЗ), під заставу майна (золото, срібло, техніка), 
        терміном не менше 7 діб / днів з процентною ставкою від 0,2% до 1,999% на добу / день і автопролонгацією від 0,7% 
        до 2,549% на добу / день, на умовах всіх тарифних планів (ТП), крім ТП «Одноденний» і «Справжній 0,01%», і здійснив 
        повернення кредиту в період проведення Акції;
      </p>
      <p class="visible-viewportchecker visibility--check hidden">
        Або в період Акції подовжили термін дії ДФКЗ строком не менше 7 діб / днів з процентною ставкою від 0,2% до 1,999 % в 
        добу / день і автопролонгацією від 0,7% до 2,549% на добу / день, на умовах всіх тарифних планів (ТП), крім ТП «Одноденний» 
        і «Справжній 0,01%».
      </p>
    </div>
  </div>
</section>

<section class="popular-news">
  <div class="mcontainer">
      <div class="title visible-viewportchecker visibility--check hidden">Iншi Акції</div>
      <div class="wrapper-news">

        <div class="el-card visible-viewportchecker visibility--check hidden">
          <div class="content-card">
            <div class="el-img">
              <img src="/img/Rectangle1.png" alt="">
            </div>
            <div class="el-data">
                {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
                <p class="el-season">з 01 квітня по 30 червня 2021</p>
            </div>
            <div class="el-title">Графік роботи 8 березня</div>
            <div class="el-description">
                Акція "Півкіло золота" та ще 300 подарунків! 
                Золота лихоманка в Євроломбард!
            </div>

            <a href="{{ route('item-action')}}" class="link-news">
              <div class="btn-link">
                <span>Детальнiше</span>
                <span class="icon-arrow-l-secondColor"></span>
              </div>
            </a>
          </div>
        </div>

        <div class="el-card visible-viewportchecker visibility--check hidden">
          <div class="content-card">
            <div class="el-img">
              <img src="/img/Rectangle2.png" alt="">
            </div>
            <div class="el-data">
                {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
                <p class="el-season">з 01 квітня по 30 червня 2021</p>
            </div>
            <div class="el-title">Графік роботи 8 березня</div>
            <div class="el-description">
                Акція "Півкіло золота" та ще 300 подарунків! 
                Золота лихоманка в Євроломбард!
            </div>

            <a href="{{ route('item-action')}}" class="link-news">
              <div class="btn-link">
                <span>Детальнiше</span>
                <span class="icon-arrow-l-secondColor"></span>
              </div>
            </a>
          </div>
        </div>

        <div class="el-card visible-viewportchecker visibility--check hidden">
          <div class="content-card">
            <div class="el-img">
              <img src="/img/Rectangle3.png" alt="">
            </div>
            <div class="el-data">
                {{--<span class="icon-calendar"></span>--}} <!-- только на главной эта иконка -->
                <p class="el-season">з 01 квітня по 30 червня 2021</p>
            </div>
            <div class="el-title">Графік роботи 8 березня</div>
            <div class="el-description">
                Акція "Півкіло золота" та ще 300 подарунків! 
                Золота лихоманка в Євроломбард!
            </div>

            <a href="{{ route('item-action')}}" class="link-news">
              <div class="btn-link">
                <span>Детальнiше</span>
                <span class="icon-arrow-l-secondColor"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
  </div>
</section>

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('includes.callback-questions-form-front')
  </div>
</section>

@endsection
