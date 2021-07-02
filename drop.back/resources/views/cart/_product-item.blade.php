<?php
/* @var array $orderProduct */
?>

<ul class="flex tb-block-form"
    @if(!empty($orderProduct)) data-server-render="true" @endif

    @if(empty($orderProduct)) style="display: none" @endif
    @if(empty($orderProduct)) v-for="item in order.orderProducts" @endif
    @if(empty($orderProduct)) v-show="item" @endif>
  <li class="or-one">
    <img class="img-order"
         @if(empty($orderProduct)) :src="item.product.backgroundPicture" @endif
         @if(!empty($orderProduct)) src="{{ resourceFilledOutGet($orderProduct, 'product.backgroundPicture', '/img/not_photo.jpg') }}" @endif
         alt="" />
  </li>

  <li class="or-two"
      @if(empty($orderProduct)) v-text="item.product.name" @endif>{{ resourceGet($orderProduct, 'product.name') }}</li>

  <li class="or-three">
    <div class="or-quantity">
      <button class="minus-btn" type="button" name="button" @click="quantityDown($event, item)"></button>

      <input type="number"
             min="0"
             @if(empty($orderProduct)) :value="item.quantity" @endif
             @if(empty($orderProduct)) @keypress="isNumber($event)" @endif
             @if(empty($orderProduct)) @change="changeQuantity($event, item)" @endif
             value="{{ resourceGet($orderProduct, 'quantity') }}" />

      <button class="plus-btn" type="button" name="button" @click="quantityUp($event, item)"></button>
    </div>

  </li>

  <li class="or-four" @if(empty($orderProduct)) :class="{ 'active': !isUseTradePrice(tradeTotalAmount) }" @endif>
    <p class="price-or-product-all">
      <span @if(empty($orderProduct)) v-text="item.amount_drop" @endif>{{ resourceGet($orderProduct, 'amount_drop') }}</span>
      <span>грн</span>
    </p>
    <p class="price-or-product-one">
      <span @if(empty($orderProduct)) v-text="item.price_drop" @endif>{{ resourceGet($orderProduct, 'price_drop') }}</span>
      <span>грн / шт.</span>
    </p>
  </li>

  <li class="or-five" @if(empty($orderProduct)) :class="{ 'active': isUseTradePrice(tradeTotalAmount) }" @endif>
    <p class="price-or-product-all">
      <span @if(empty($orderProduct)) v-text="item.amount_trade" @endif>{{ resourceGet($orderProduct, 'amount_trade') }}</span>
      <span>грн</span>
    </p>
    <p class="price-or-product-one">
      <span @if(empty($orderProduct)) v-text="item.price_trade" @endif>{{ resourceGet($orderProduct, 'price_trade') }}</span>
      <span>грн / шт.</span>
    </p>
  </li>

  <li class="or-six close-btn">
    <button @if(empty($orderProduct)) @click="deleteItem(item)" @endif class="btn-close"></button>
  </li>
</ul>
