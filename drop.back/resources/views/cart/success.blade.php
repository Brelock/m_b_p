@extends('layouts.app')

@section('content')
  <div id="ttnPage" class="basketPage page">
    <div class="mcontainer">
      <div class="dispatch-block">
        <div class="dispatch-title">
          Ваш заказ #{{ resourceGet($order, 'id') }} принят. Спасибо за сотрудничество с нами.
        </div>

        @if(!empty(resourceGet($order, 'invoice_ttn')))
        <div class="dispatch-number flex spaceBetween">
          <p class="dispatch-number_text">Номер ТТН</p>
          <p class="dispatch-number_item">{{ resourceGet($order, 'invoice_ttn') }}</p>
          <button class="dispatch-number_btn">Скопировать</button>
        </div>
        @endif
      </div>
      <div class="feedback-block">
        <div class="feedback-other-block " style="display: block;">
          <div class="feedback-title">Быстрая связь</div>
          <div class="feedback-other-contant">
            <div class="feedback-content-top">
              <div class="feedback-name-manadger"> Элина <span> +380508549400</span></div>
              <ul class="messendge-icon">
                <li><a href="viber://chat?number=+380508549400"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/viber-icon.svg') }}" alt=""></a></li>
                <li><a href="tg://resolve?domain=@Cityadrop1"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Telegram-icon.svg') }}" alt=""></a></li>
                <li><a href="tel:+380508549400"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/phone-icon.svg') }}" alt=""></a></li>
              </ul>
            </div>
            <div class="feedback-content">
              <div class="feedback-name-manadger"> Алина<span> +380681019400</span></div>
              <ul class="messendge-icon">
                <li><a href="https://vk.com/youngmao"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/vk-icon.svg') }}" alt=""></a></li>
                <li><a href="viber://chat?number=+380681019400"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/viber-icon.svg') }}" alt=""></a></li>
                <li><a href="tg://resolve?domain=@City_a"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/Telegram-icon.svg') }}" alt=""></a></li>
                <li><a href="tel:+380681019400"><img src="{{ \EscapeWork\Assets\Facades\Asset::v('img/phone-icon.svg') }}" alt=""></a></li>
              </ul>
            </div>
            <div class="feedback-content-bottom">
             <div class="feedback-name-manadger"> Каналы с обновами и новостями</div>
              <ul class="messendge-icon">
               <li><a href="https://t.me/cityadrop" target="_blank"><img src="/img/Telegram-icon.svg" alt=""></a></li>
                <li><a href="https://vk.com/cityadrop" target="_blank"><img src="/img/vk-icon.svg" alt=""></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection