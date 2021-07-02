<?php
/** @var \App\Models\Banner[] $banners */
?>

@extends('layouts.app')

@section('content')
  <div id="homePage" class="homePage page">


    <div class="mcontainer">
      <div class="titul-info-block">
        <aside class="category-sidebar descMenu">
          @widget('categoryWidget')
          @include('includes.footnotes-social')
        </aside>

        <div class="sliders-section">
          <div class="banner-slide-wrap">
            <div class="banner-sliders">
              @foreach($banners as $banner)
                <div class="slide-item">
                  <img src="{{ $banner->fileExists($banner->picture_file_name) ? $banner->assetAbsolute($banner->picture_file_name) : '' }}" alt="">
                </div>
              @endforeach
            </div>
            <div class="arrows">
              <ul>
                <li class="prev"></li>
                <li class="next"></li>
              </ul>
            </div>
          </div>

          <div class="sale-slide-wrap slide-section">
            <div class="slide-title flex">
              <h2>Новинки</h2>
              <div class="all-prod-button">
                <a href="{{ route('products.index', ['hasNew' => true]) }}">Все Новинки</a>
              </div>
            </div>
            <div class="sale-sliders">
              @foreach($productsNew as $productNew)
              <div class="card-product mcol-xs-6 mcol-xsm-4 mcol-sm-3 mcol-md-20">
                <div class=" border-produckt-block">
                  <div class="img-card">
                    <img src="{{ resourceFilledOutGet($productNew, 'backgroundThumbnail', '/img/not_photo.jpg') }}"
                         class="card-img-top" alt="...">
                  </div>
                  <div class="card-body">
                    <div class="card-text__article">Артикул:
                      <span>{{resourceFilledOutGet($productNew, 'art')}}</span>
                      <span class="new-prod">NEW</span>
                    </div>
                    <div class="card-text">{{ resourceGet($productNew, 'name') }}</div>
                  </div>
                  <div class="list-group list-group-flush">
                    <div class="list-group-item">
                      <p class="info-item">Наличие</p>
                      <p class="info-item-price">{{ resourceGet($productNew, 'stock_quantity') }}<span> шт.</span></p>
                    </div>
                    <div class="list-group-item">
                      <p class="info-item"> Опт</p>
                      <p class="info-item-price">{{ resourceGet($productNew, 'price') }}<span> грн</span></p>
                    </div>
                    <div class="list-group-item">
                      <p class="info-item">Дроп</p>
                      <p class="info-item-price">{{ resourceGet($productNew, 'price_old') }}<span> грн</span></p>
                    </div>
                  </div>
                </div>
                <a class="link-product-item" href="{{ resourceGet($productNew, 'route') }}"></a>
                <button class="btn btn-primary btn-basket btn-cart--order modal-custom-open-btn"
                        data-product-id="{{ resourceGet($productNew, 'id') }}">В корзину
                </button>
              </div>
              @endforeach

            </div>
            <div class="arrows">
              <ul>
                <li class="sale-prev"></li>
                <li class="sale-next"></li>
              </ul>
            </div>
          </div>

          <div class="new-slide-wrap slide-section">
            <div class="slide-title flex">
              <h2>Скидки</h2>
              <div class="all-prod-button">
                <a href="{{ route('products.index', ['hasDiscount' => true]) }}">Все скидки</a>
              </div>
            </div>
            <div class="new-prod-sliders">
              @foreach($productsDiscount as $productDiscount)
              <div class="card-product mcol-xs-6 mcol-xsm-4 mcol-sm-3 mcol-md-20">
                <div class=" border-produckt-block">
                  <div class="img-card">
                    <img src="{{ resourceFilledOutGet($productDiscount, 'backgroundThumbnail', '/img/not_photo.jpg') }}" class="card-img-top" alt="...">
                  </div>
                  <div class="card-body">
                    <div class="card-text__article">Артикул:
                      <span>{{resourceFilledOutGet($productDiscount, 'art')}}</span>
                      <span class="action">DISCOUNT</span>
                    </div>
                    <div class="card-text">{{ resourceGet($productDiscount, 'name') }}</div>
                  </div>
                  <div class="list-group list-group-flush">
                    <div class="list-group-item">
                      <p class="info-item">Наличие</p>
                      <p class="info-item-price">{{ resourceGet($productDiscount, 'stock_quantity') }}<span> шт.</span></p>
                    </div>
                    <div class="list-group-item @if(resourceGet($productDiscount, 'discount_opt')) action-price @endif">
                      <div class="info-item">Опт</div>
                      <div class="info-item-price">
                        {{ resourceGet($productDiscount, 'old_price_opt') ? resourceGet($productDiscount, 'old_price_opt') : resourceGet($productDiscount, 'price') }}<span> грн</span>
                        <p class="action-item-price">{{ resourceGet($productDiscount, 'old_price_opt') ? resourceGet($productDiscount, 'price') : '' }}<span> грн</span></p>
                      </div>
                    </div>
                    <div class="list-group-item @if(resourceGet($productDiscount, 'discount_drop')) action-price @endif">
                      <div class="info-item">Дроп</div>
                      <div class="info-item-price">
                        {{ resourceGet($productDiscount, 'old_price_drop') ? resourceGet($productDiscount, 'old_price_drop') : resourceGet($productDiscount, 'price_old') }}<span> грн</span>
                        <p class="action-item-price">{{ resourceGet($productDiscount, 'old_price_drop') ? resourceGet($productDiscount, 'price_old') : '' }}<span> грн</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="link-product-item" href="{{ resourceGet($productDiscount, 'route') }}"></a>
                <button class="btn btn-primary btn-basket btn-cart--order modal-custom-open-btn"
                        data-product-id="{{ resourceGet($productDiscount, 'id') }}">В корзину
                </button>
              </div>
              @endforeach

            </div>
            <div class="arrows">
              <ul>
                <li class="new-prev"></li>
                <li class="new-next"></li>
              </ul>
            </div>
          </div>

          <div class="hot-slide-wrap slide-section">
            <div class="slide-title flex">
              <h2>Распродажа</h2>
              <div class="all-prod-button">
                <a href="{{ route('products.index', ['hasSale' => true]) }}">Все распродажи</a>
              </div>
            </div>
            <div class="hot-prod-sliders">
              @foreach($productsSale as $productSale)
              <div class="card-product mcol-xs-6 mcol-xsm-4 mcol-sm-3 mcol-md-20">
                <div class=" border-produckt-block">
                  <div class="img-card">
                    <img src="{{ resourceFilledOutGet($productSale, 'backgroundThumbnail', '/img/not_photo.jpg') }}" class="card-img-top" alt="...">
                  </div>
                  <div class="card-body">
                    <div class="card-text__article">Артикул:
                      <span>{{resourceFilledOutGet($productSale, 'art')}}</span>
                      <span class="big-action">BIG SALE</span>
                    </div>
                    <div class="card-text">{{ resourceGet($productSale, 'name') }}</div>
                  </div>
                  <div class="list-group list-group-flush">
                    <div class="list-group-item">
                      <p class="info-item">Наличие</p>
                      <p class="info-item-price">{{ resourceGet($productSale, 'stock_quantity') }}<span> шт.</span></p>
                    </div>
                    <div class="list-group-item @if(resourceGet($productSale, 'discount_opt')) action-price @endif">
                      <div class="info-item">Опт</div>
                      <div class="info-item-price">
                        {{ resourceGet($productSale, 'old_price_opt') ? resourceGet($productSale, 'old_price_opt') : resourceGet($productSale, 'price') }}<span> грн</span>
                        <p class="action-item-price">{{ resourceGet($productSale, 'old_price_opt') ? resourceGet($productSale, 'price') : '' }}<span> грн</span></p>
                      </div>
                    </div>
                    <div class="list-group-item @if(resourceGet($productSale, 'discount_drop')) action-price @endif">
                      <div class="info-item">Дроп</div>
                      <div class="info-item-price">
                        {{ resourceGet($productSale, 'old_price_drop') ? resourceGet($productSale, 'old_price_drop') : resourceGet($productSale, 'price_old') }}<span> грн</span>
                        <p class="action-item-price">{{ resourceGet($productSale, 'old_price_drop') ? resourceGet($productSale, 'price_old') : '' }}<span> грн</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="link-product-item" href="{{ resourceGet($productSale, 'route') }}"></a>
                <button class="btn btn-primary btn-basket btn-cart--order modal-custom-open-btn"
                        data-product-id="{{ resourceGet($productSale, 'id') }}">В корзину</button>
              </div>
              @endforeach
            </div>
            <div class="arrows">
              <ul>
                <li class="hot-prev"></li>
                <li class="hot-next"></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-custom">
          <div class="modal-custom__content" tabindex="-1" role="dialog">
            <div class="modal-custom_content">
              <div class="modal-custom_header">
                <h5 class="modal-custom_title">Товар добавлен в корзину</h5>
              </div>
              <div class="modal-custom_footer">
                <a class="modal-custom_buttom" href="{{ route('cart.index') }}">Перейти в корзину</a>
                <button type="button" class="modal-custom_buttom modal-custom__close-btn">Продолжить покупку</button>
              </div>
            </div>
          </div>
          <div class="modal-custom__overlay"></div>
        </div>
      @include('feedback.index')
    </div>

  </div>
@endsection