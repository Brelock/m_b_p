<?php
/* @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
/* @var \App\Collection\ProductCollection|\App\Models\Product[] $products */
?>

@extends('layouts.app')

@section('content')
  <div id="productPage" class="productPage page">
    <div class="mcontainer">
      <div class="breadcrumbs">
        <ul class="breadcrumbs-wrap">
          <li class="breadcrumbs-link"><a href={{ route('main')}}>Главная</a></li>
          @if(resourceGet($category, 'parent.parent.parent'))
            <li class="breadcrumbs-link"><a href={{ route('products.index', ['categoryId' => resourceGet($category, 'parent.parent.id')])}}>{{resourceGet($category, 'parent.parent.name')}}</a></li>
          @endif
          @if(resourceGet($category, 'parent.parent'))
            <li class="breadcrumbs-link"><a href={{ route('products.index', ['categoryId' => resourceGet($category, 'parent.id')])}}>{{resourceGet($category, 'parent.name')}}</a></li>
          @endif
          @if(request()->has('categoryId'))
            <li class="breadcrumbs-link active-link"><a href="#">{{resourceGet($category, 'name')}}</a></li>
          @endif
          @if(request()->has('hasNew'))
            <li class="breadcrumbs-link active-link"><a href="#">Новинки</a></li>
          @endif
          @if(request()->has('hasDiscount'))
            <li class="breadcrumbs-link active-link"><a href="#">Скидки</a></li>
          @endif
          @if(request()->has('hasSale'))
            <li class="breadcrumbs-link active-link"><a href="#">Рапродажа</a></li>
          @endif
        </ul>
      </div>
      <div class="page-title">Товар</div>

      <div class="titul-info-block">
        <aside class="category-sidebar descMenu">
          @if(request()->has('categoryId') && !request()->has('hasDiscount') && !request()->has('hasNew') && !request()->has('hasSale'))
            @widget('categoriesParamsSidebar', ['categoryId' => request()->get('categoryId')])
          @endif
          @include('includes.footnotes-social')
        </aside>
        <div class="product-block">
          @component('layouts.product-alert-title') @endcomponent
          <div class="products-filters">
            <button data-alias="name-order" data-value="" class="products-filter-small"><span>По названию</span></button>
            <button data-alias="price-order" data-value="" class="products-filter-small"><span>По цене</span></button>
            <button data-alias="presence-order" data-value="" class="products-filter-small"><span>Есть в наличии</span></button>
            <button data-alias="date-order" data-value="" class="products-filter-small"><span>По дате</span></button>
           {{-- <input type="hidden" name="default" value="default"> --}}
          </div>
          <div class="product-card-block">

            @foreach($products as $product)
              @if(resourceGet($product, 'stock_quantity') == 0)
                <div class="card-product card-product-zero mcol-xs-6 mcol-xsm-4 mcol-sm-3 mcol-md-20">
                  @else
                    <div class="card-product mcol-xs-6 mcol-xsm-4 mcol-sm-3 mcol-md-20">
                      @endif
                      <div class=" border-produckt-block">
                        <div class="img-card">
                          <img src="{{ resourceFilledOutGet($product, 'backgroundThumbnail', '/img/not_photo.jpg') }}"
                               class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                          <div class="card-text__article">Артикул:<span>{{resourceFilledOutGet($product, 'art')}}</span>
                            @if(resourceGet($product, 'isNew'))
                              <span class="new-prod">NEW</span>
                            @endif
                            @if(resourceGet($product, 'isDiscount'))
                              <span class="action">DISCOUNT</span>
                            @endif
                            @if(resourceGet($product, 'isSale'))
                             <span class="big-action">BIG SALE</span>
                            @endif
                          </div>
                          <div class="card-text">{{ resourceGet($product, 'name') }}</div>
                        </div>
                        <div class="list-group list-group-flush">
                          <div class="list-group-item">
                            <div class="info-item">Наличие</div>
                            <div class="info-item-price">
                              {{ resourceGet($product, 'stock_quantity') }}<span> шт.</span>
                            </div>
                          </div>
                          <div class="list-group-item @if(resourceGet($product, 'discount_opt')) action-price @endif">
                            <div class="info-item">Опт</div>
                            <div class="info-item-price">
                              {{ resourceGet($product, 'old_price_opt') ? resourceGet($product, 'old_price_opt') : resourceGet($product, 'price') }}<span> грн</span>
                              <p class="action-item-price">{{ resourceGet($product, 'old_price_opt') ? resourceGet($product, 'price') : '' }}<span> грн</span></p>
                            </div>
                          </div>
                          <div class="list-group-item @if(resourceGet($product, 'discount_drop')) action-price @endif">
                            <div class="info-item">Дроп</div>
                            <div class="info-item-price">
                              {{ resourceGet($product, 'old_price_drop') ? resourceGet($product, 'old_price_drop') : resourceGet($product, 'price_old') }}<span> грн</span>
                              <p class="action-item-price">{{ resourceGet($product, 'old_price_drop') ? resourceGet($product, 'price_old') : '' }}<span> грн</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a class="link-product-item" href="{{ resourceGet($product, 'route') }}"></a>
                      <button class="btn btn-primary btn-basket btn-cart--order modal-custom-open-btn"
                              data-product-id="{{ resourceGet($product, 'id') }}">В корзину
                      </button>
                    </div>
                    @endforeach

                </div>
                {{ $paginator->links() }}
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

    @section('scripts')
      <script>

          $(document).ready(function () {
              $('input.param-checkbox').on("change", function () {
                  $('form.form-products-filters').trigger('submit');
              });
          });

      </script>


@endsection
