@extends('layouts.app')

@section('content')
  <div id="productPage" class="productPage page">
    <div class="mcontainer">

      <div class="breadcrumbs">
        <ul class="breadcrumbs-wrap">
          <li class="breadcrumbs-link"><a href={{ route('main')}}>Главная</a></li>
          @if(resourceGet($product, 'category.parent.parent.parent'))
            <li class="breadcrumbs-link"><a href={{ route('products.index', ['categoryId' => resourceGet($product, 'category.parent.parent.id')]) }}>{{resourceGet($product, 'category.parent.parent.name')}}</a></li>
          @endif
          @if(resourceGet($product, 'category.parent.parent'))
            <li class="breadcrumbs-link"><a href={{ route('products.index', ['categoryId' => resourceGet($product, 'category.parent.id')]) }}>{{resourceGet($product, 'category.parent.name')}}</a></li>
          @endif
          <li class="breadcrumbs-link"><a href={{ route('products.index', ['categoryId' => resourceGet($product, 'category.id')]) }}>{{resourceGet($product, 'category.name')}}</a></li>
          <li class="breadcrumbs-link active-link"><a href="#">{{resourceGet($product, 'name')}}</a></li>
        </ul>
      </div> 
      <div class="titul-info-block">
       {{-- <aside class="category-sidebar descMenu">
          @widget('categoryWidget')
        </aside> --}}
        @if(resourceGet($product, 'stock_quantity') == 0)
          <div class="product-item-block product-item-block-zero">
        @else
          <div class="product-item-block">
        @endif
          <div class="product-item_title">{{ resourceGet($product, 'name') }}</div>
          <div class="product-item-content">
            <div class="img-container">
              @if(count(resourceGet($product, 'pictures', [])) > 0)
              <div class="mobile-img-block slider">
                @foreach(resourceGet($product, 'pictures', []) as $picture)
                  <a data-thumb="{{ resourceFilledOutGet($picture, 'thumbnail_full_link', '/img/blaser.jpg') }}"
                     href="{{ resourceFilledOutGet($picture, 'full_link', '/img/blaser.jpg') }}">
                    <img src="{{ resourceFilledOutGet($picture, 'full_link', '/img/blaser.jpg') }}" alt="">
                  </a>
                @endforeach
              </div>
              <a href="{{ resourceGet($product, 'routeDownloadPictures') }}">
                <button class="btn-duwnload">Скачать все фото</button>
              </a>
              @endif
            </div>
            <div class="info-form-section">
              <div class="form-price flex">
                <div class="basket-block">
                  <div class="i-prod @if(resourceGet($product, 'discount_opt')) action-price @endif">
                    <p class="i-prod-property"> Опт
                      <span>{{ resourceGet($product, 'discount_opt') }} %</span>
                    </p>
                    @if(resourceGet($product, 'discount_opt'))
                      <p class="i-prod-value-action">{{ resourceGet($product, 'price') }}<span> грн</span></p>
                    @endif
                    <p class="i-prod-value">{{ resourceGet($product, 'old_price_opt') ?: resourceGet($product, 'price') }}<span> грн</span></p>
                  </div>

                  <div class="i-prod @if(resourceGet($product, 'discount_drop')) action-price @endif">
                    <p class="i-prod-property"> Дроп
                      <span>{{ resourceGet($product, 'discount_drop') }} %</span>
                    </p>
                    @if(resourceGet($product, 'discount_drop'))
                      <p class="i-prod-value-action">{{ resourceGet($product, 'price_old') }}<span> грн</span></p>
                    @endif
                    <p class="i-prod-value">{{ resourceGet($product, 'old_price_drop') ?: resourceGet($product, 'price_old') }}<span> грн</span></p>
                  </div>
                  <div class="i-prod">
                    <p class="i-prod-property"> Наличие </p>
                    <p class="i-prod-value">{{ resourceGet($product, 'stock_quantity') }} <span> шт.</span></p>
                  </div>
                </div>
                <div class="btn-basket-item">
                  <button class="btn btn-primary btn-cart--order modal-custom-open-btn" data-product-id="{{ resourceGet($product, 'id') }}">В корзину</button>
                </div>
              </div>
              <div class="info-item-product">
                <div class="article-prod i-prod">
                  <div class="article-prod_left">
                    <p class="i-prod-property"> Артикул: </p>
                    <p class="i-prod-value">{{ resourceGet($product, 'art') }}</p>
                  </div>
                  <div class="article-prod_right">
                    @if(resourceGet($product, 'isSale'))
                      <span class="big-action">BIG SALE</span>
                    @endif
                    @if(resourceGet($product, 'isDiscount'))
                      <span class="action">DISCOUNT</span>
                    @endif
                    @if(resourceGet($product, 'isNew'))
                      <span class="new-prod">NEW</span>
                    @endif
                  </div>
                </div>
                @foreach(resourceGet($product, 'params', []) as $param)
                  <div class="i-prod-color i-prod">
                    <p class="i-prod-property"> {{ resourceGet($param, 'title') }} </p>
                    <p class="i-prod-value">{{ resourceGet($param, 'value') }}</p>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="product-description-block">
            <div class="product-description-info">
              <p class="product-description_text">{!! resourceGet($product, 'description') !!}
              </p>
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