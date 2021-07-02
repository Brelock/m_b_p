<div id="cartQuantity" class="basket-nav basket__actived">
    <a href="{{ route('cart.index') }}">
        <img src="/img/basket.svg" alt="" />
        <span id="quantity"
              class="basket-products-quantity"
              @if($vue) v-text="ordersCount" @endif>{{ $count }}</span>
    </a>
</div>