@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">Акції </li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">Акції</div>
</div>

<section class="news-directory">
  <div class="mcontainer">
    <div class="wrapper-news">

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

      <div class="el-card hidden visible-viewportchecker visibility--check">
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

    </div>



    @include('includes.pagination')
  </div>

</section>

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('includes.callback-questions-form-front')
  </div>
</section>

@endsection
