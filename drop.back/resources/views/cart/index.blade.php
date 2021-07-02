@extends('layouts.app')

@section('content')
  <div id="basketPage" class="basketPage page">
    <div class="mcontainer">
      <div class="basketPage-block">
        <div class="order-data">
          <div class="basket-block-title">Оформление заказа</div>

          @component('layouts.product-alert-title') @endcomponent

          <div class="form-order">
            <div class="form-order-head">
              <ul class="flex th-block-form">
                <li class="or-one">Фото</li>
                <li class="or-two">Название</li>
                <li class="or-three">Количество</li>
                <li class="or-four">Цена Дроп</li>
                <li class="or-five">Цена Опт</li>
                <li class="or-six">Удалить</li>
              </ul>
            </div>

            <div class="form-order-body">
              {{-- TEMPLATE ORDER ITEM --}}
              @component('cart._product-item', ['orderProduct' => null]) @endcomponent
              {{-- TEMPLATE ORDER ITEM --}}

              @foreach(resourceGet($order, 'orderProducts', []) as $orderProduct)
                {{-- TEMPLATE ORDER ITEM --}}
                @component('cart._product-item', ['orderProduct' => $orderProduct]) @endcomponent
                {{-- TEMPLATE ORDER ITEM --}}
              @endforeach
            </div>
          </div>
        </div>
        <div class="payment-data">
          <div class="basket-block-title">Данные по оплате</div>
          <div class="check-block-payment">
            <form action="#" class="form-check flex">
              <label for="blankRadio1" class="flex check-label">
                <input id="blankRadio1"
                       class="form-check-in position-static"
                       type="radio"
                       name="blankRadio"
                       value="{{ \App\Enums\PaymentTypes::CASH_PAYMENT }}"
                       aria-label="..."
                       checked
                       v-model="confirmData.payment_type" />

                <p class="input-text">Наложенный платеж</p>
              </label>
              <label for="blankRadio2" class="flex check-label">
                <input id="blankRadio2"
                       class="form-check-in position-static"
                       type="radio"
                       name="blankRadio"
                       value="{{ \App\Enums\PaymentTypes::CARD }}"
                       aria-label="..."
                       v-model="confirmData.payment_type" />

                <p class="input-text">Оплата картой</p>
              </label>
            </form>
          </div>

          <div class="order-price-block" :class="{ 'hidePayment_js' : confirmData.payment_type == PAYMENT_TYPES.CASH_PAYMENT }">
            <div class="or-price">
              <p class="or-price-contant">Сумма заказа:</p>
              <p class="or-price-item">
                <span v-text="totalAmount">{{ resourceGet($order, 'total_amount') }}</span>
                <span>грн</span>
              </p>
            </div>

            <div class="or-price input-or-price" :class="{ 'has-error': hasError(checkoutErrors, 'amount_cash_delivery') }">
              <p class="label amount-imposed-contant">Сумма наложенного платежа:</p>

              <input class="or-imposed-item"
                     @change="isEmptyResetDefaultValue($event, 0)"
                     @keypress="isNumber($event)" v-model="confirmData.amount_cash_delivery" />

              <p><span>грн</span></p>

              <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'amount_cash_delivery')"></div>
            </div>

            <div class="or-price">
              <p class="balance-amount-contant">Ваш заработок:</p>
              <p class="or-price-item">
                <span v-text="earningsAmount">{{ resourceGet($order, 'amount_dropshipper_earnings') }}</span>
                <span>грн</span>
              </p>
            </div>
          </div>

          <div class="card-payment-block" :class="{ 'hidePayment_js' : confirmData.payment_type == PAYMENT_TYPES.CARD }">
            <div class="card-payment-title flex">Ваш заказ на сумму: <p v-text="totalAmount">{{ resourceGet($order, 'total_amount') }}</p> <span>грн</span></div>
            <div class="payment-block-all">
              <div class="flex payment-block spaceBetween center">
                <div class="one-name-payment">Приват Банк / Гуйтан Марина Миколаївна</div>
                <div class="num-payment-card">5169 3305 1971 6648</div>
                <div class="appointment-payment">Назначение платежа: <span>Оплата за «Фамилия Покупателя»</span></div>
              </div>
              <div class="flex payment-block spaceBetween center">
                <div class="one-name-payment">Mono Банк / Гуйтан Максим</div>
                <div class="num-payment-card">5375 4141 0178 1069</div>
                <div class="appointment-payment">Назначение платежа: <span>Оплата за «Фамилия Покупателя»</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="drop-data">
          <div class="basket-block-title">Данные о дропшипере</div>
          <div class="drop-input-form i-form-cell-group">
            <div class="i-form-col-sm-6" :class="{ 'has-error': hasError(checkoutErrors, 'dropshipper_full_name') }">
              <input class="i-form-control" type="text" placeholder="Фамилия Имя" v-model="confirmData.dropshipper_full_name" />
              <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'dropshipper_full_name')"></div>
            </div>

            <div class="i-form-col-sm-6" :class="{ 'has-error': hasError(checkoutErrors, 'dropshipper_phone_number') }">
              <input class="i-form-control" type="tel" placeholder="Телефон" v-model="confirmData.dropshipper_phone_number" />
              <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'dropshipper_phone_number')"></div>
            </div>
          </div>
        </div>
        <div class="data-delivery">
          <div class="basket-block-title">Данные о доставке</div>
          <div class="check-block-payment">
            <form class="form-check form-check-delivery flex wrap" @submit.prevent="checkout">
              <label for="blankRadio3" class="flex check-label">
                <input class="form-check-deliv position-static"
                       type="radio"
                       name="blankRadio"
                       id="blankRadio3"
                       value="{{ \App\Enums\DeliveryTypes::NOVA_POSHTA }}"
                       v-model="confirmData.delivery_type"
                       checked />

                <p class="input-text">Новая почта</p>
              </label>

              <label for="blankRadio4" class="flex check-label">
                <input class="form-check-deliv position-static radio_js"
                       type="radio"
                       name="blankRadio"
                       value="{{ \App\Enums\DeliveryTypes::JUSTIN }}"
                       v-model="confirmData.delivery_type"
                       id="blankRadio4" />

                <p class="input-text">Justin</p>
              </label>

              <label for="blankRadio5" class="flex check-label">
                <input class="form-check-deliv position-static radio_js"
                       type="radio"
                       name="blankRadio"
                       value="{{ \App\Enums\DeliveryTypes::UKR_POSHTA }}"
                       v-model="confirmData.delivery_type"
                       id="blankRadio5" />

                <p class="input-text">Укрпочта</p>
              </label>

              <label for="blankRadio6" class="flex check-label">
                <input class="form-check-deliv position-static radio_js"
                       type="radio"
                       name="blankRadio"
                       value="{{ \App\Enums\DeliveryTypes::PICKUP }}"
                       v-model="confirmData.delivery_type"
                       id="blankRadio6" />

                <p class="input-text">Самовывоз</p>
              </label>

              <div class="input-delivery-new-post i-form-cell-group"
                   :class="{ 'hidePayment_js' : confirmData.delivery_type == DELIVERY_TYPES.NOVA_POSHTA }">

                <div class="i-form-col-sm-3" :class="{ 'has-error': hasError(checkoutErrors, 'novaposhta_last_name') }">
                  <label for="blankInput1" class="check-input i-form-control">
                    <input class="form-check-deliv position-static"
                           type="text"
                           name="blankRadio"
                           id="blankInput1"
                           v-model="confirmData.novaposhta_last_name"
                           placeholder="Фамилия" />
                  </label>

                  <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'novaposhta_last_name')"></div>
                </div>

                <div class="i-form-col-sm-3" :class="{ 'has-error': hasError(checkoutErrors, 'novaposhta_first_name') }">
                  <label for="blankInput2" class="check-input i-form-control">
                    <input class="form-check-deliv position-static"
                           type="text"
                           name="blankRadio"
                           id="blankInput2"
                           v-model="confirmData.novaposhta_first_name"
                           placeholder="Имя" />
                  </label>

                  <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'novaposhta_first_name')"></div>
                </div>

                <div class="i-form-col-sm-3" :class="{ 'has-error': hasError(checkoutErrors, 'novaposhta_middle_name') }">
                  <label for="blankInput3" class="check-input i-form-control">
                    <input class="form-check-deliv position-static"
                           type="text"
                           name="blankRadio"
                           id="blankInput3"
                           v-model="confirmData.novaposhta_middle_name"
                           placeholder="Отчетство" />
                  </label>

                  <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'novaposhta_middle_name')"></div>
                </div>

                <div class="i-form-col-sm-3" :class="{ 'has-error': hasError(checkoutErrors, 'novaposhta_phone_number') }">
                  <label for="blankInput4" class="check-input i-form-control">
                    <input class="form-check-deliv position-static"
                           type="text"
                           name="blankRadio"
                           id="blankInput4"
                           v-model="confirmData.novaposhta_phone_number"
                           placeholder="Телефон" />
                  </label>

                  <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'novaposhta_phone_number')"></div>
                </div>

                <div class="i-form-col-sm-3" :class="{ 'has-error': hasError(checkoutErrors, 'novaposhta_city_id') }">
                  <label for="blankSelect2" class="check-input i-form-control">
                    <select class="form-check-deliv position-static input-post1_js" v-model="confirmData.novaposhta_city_id" id="blankSelect2">
                      <option class="val-select" value=null>Выберите город</option>
                      @foreach($novaposhtaCities as $city)
                      <option value="{{ resourceGet($city, 'id') }}">{{ resourceGet($city, 'description_ru') }}</option>
                      @endforeach
                    </select>
                  </label>

                  <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'novaposhta_city_id')"></div>
                </div>

                <div class="i-form-col-sm-3" :class="{ 'has-error': hasError(checkoutErrors, 'novaposhta_warehouse_id') }">
                  <label for="blankSelect3" class="check-input i-form-control">
                    <select class="form-check-deliv position-static input-post1_js" v-model="confirmData.novaposhta_warehouse_id" id="blankSelect3">
                      <option class="val-select" value=null>Выберите отделение</option>

                      <option v-for="warehouse in warehouses" :value="warehouse.id" v-text="warehouse.description_ru"></option>
                    </select>
                  </label>

                  <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'novaposhta_warehouse_id')"></div>
                </div>
              </div>

              <div class="input-delivery"
                   :class="{
                    'hidePayment_js' : confirmData.delivery_type != DELIVERY_TYPES.NOVA_POSHTA,
                    'has-error': hasError(checkoutErrors, 'delivery_general_info')
                   }">
                <label for="blankInput1" class="check-input">
                  <input class="form-check-deliv position-static"
                         type="text"
                         name="blankRadio"
                         id="blankInput3"
                         placeholder="Укажите всю контактную информацию для отправки"
                         v-model="confirmData.delivery_general_info" />
                </label>

                <div class="help-block" v-text="getErrorMessage(checkoutErrors, 'delivery_general_info')"></div>
              </div>

              <div class="btn-order">
                <button class="btn btn-primary">Создать заказ</button>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    var _ORDER = @json($order);
    var _ORDER_OPTIONS = @json(\App\Enums\OrderOptions::getConstants());
    var _PAYMENT_TYPES = @json(\App\Enums\PaymentTypes::getConstants());
    var _DELIVERY_TYPES = @json(\App\Enums\DeliveryTypes::getConstants());
  </script>

  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/cart.js') }}"></script>
@endsection

