@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
       <li class="breadcrumbs-link"><a href="{{ route('news') }}">Новини</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">Графік роботи в період "локдауну" </li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check">Графік роботи в період "локдауну"</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
    <div class="banner visible-viewportchecker visibility--check">
      <img src="/img/one-news-banner.png" alt="">
    </div>
    <div class="wrap-description">
      <p class="data-news visible-viewportchecker visibility--check"> 05 березня 2021 </p>
      <p class="visible-viewportchecker visibility--check">Шановні клієнти!</p>
      <p class="visible-viewportchecker visibility--check">Доводимо до вашого відома, що всі відокремленні підрозділи мережі 
        «Євроломбард» в період «локдауну», з 8 січня 2021 р. до 25 січня 2021 р., 
        працюють у звичайному режимі, без змін у графіку робіт.</p>
        <br>
      <p class="visible-viewportchecker visibility--check">Відповідно до підпункту 4 пункту 3 Постанови КМУ № 1236 від 09.12.2020 р., 
        дозволено діяльність фінансових установ, в тому числі, 
        ломбардів, а отже останні продовжують працювати як і раніше.</p> 
        <br>
      <p class="important-info visible-viewportchecker visibility--check">
        Задля вашої безпеки обслуговування відбувається із дотриманням рекомендацій 
        МОЗ та необхідних заходів під час карантину:
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        Обслуговування клієнтів тільки в захисних масках
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        У відділенні одночасно має перебувати тільки один клієнт
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        Наявність дезінфекторів
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        Збереження безпечної дистанції спілкування з оцінювачем 1,5 м
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        Додаткова обробка поверхонь дезінфікуючими засобами
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        Забезпечення співробітників засобами захисту
      </p>
      <p class="visible-viewportchecker visibility--check">
        <span class="icon-bg-line"></span>
        Забезпечення централізованого збору використаних засобів 
        індивідуального захисту в окремі контейнери (урни)
      </p>
      <br>
      <p class="visible-viewportchecker visibility--check">Деякі відділення, які розташовані у приміщенні магазинів або ТРЦ, 
        що закриваються на період "локдауну" - тимчасово припиняють свою роботу,
        а обслуговування клієнтів переноситься до найближчого відділення Євроломбард.</p>
      <br>
      <p class="important-info visible-viewportchecker visibility--check">Зокрема:</p>
      <p>Ломбардне відділення №91, м. Марганець вул. Єдності, 50, з 07.01.21 по 24.01.21 
        не працює. Обслуговування та предмети застави перенесено до відділення №26, 
        вул. Лермонтова, буд.27.</p>
      <br>
      <p class="visible-viewportchecker visibility--check">Ломбардне відділення №369, м. Запоріжжя, пр-т Соборний, 149, прим. 2, 
        з 07.01.21 по 24.01.21 не працює. Обслуговування та 
        предмети застави перенесено до відділення №1, пр-т. Соборний буд.190.</p>
      <br>
      <p class="visible-viewportchecker visibility--check">Для уточнення інформації звертайтесь за телефоном гарячої лінії 0800 300 703.</p>
    </div>
  </div>
</section>

<section class="popular-news">
  <div class="mcontainer">
      <div class="title visible-viewportchecker visibility--check">Iншi новини</div>
      <div class="wrapper-news">

        <div class="el-card visible-viewportchecker visibility--check">
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

            <a href="{{ route('item-news')}}" class="link-news">
              <div class="btn-link">
                <span>Детальнiше</span>
                <span class="icon-arrow-l-secondColor"></span>
              </div>
            </a>
          </div>
        </div>

        <div class="el-card visible-viewportchecker visibility--check">
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

            <a href="{{ route('item-news')}}" class="link-news">
              <div class="btn-link">
                <span>Детальнiше</span>
                <span class="icon-arrow-l-secondColor"></span>
              </div>
            </a>
          </div>
        </div>

        <div class="el-card visible-viewportchecker visibility--check">
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

            <a href="{{ route('item-news')}}" class="link-news">
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

<section class="career-callback-form visible-viewportchecker visibility--check">
  <div class="mcontainer">
    @include('includes.callback-questions-form-front')
  </div>
</section>

@endsection
