<?php
/* @var \App\Models\Order[] $orders */
?>

@extends('admin.layouts.app')

@section('content')
  <div id="adminPage" class="adminPage page">

    <div class="mcontainer">
      <div class="table-block">
        <table class="table">
          <thead>
          <tr class="header-tab">
            <th class="min-width" scope="col">Номер</th>
            <th scope="col">Заказ</th>
            <th class="min-width3" scope="col">Дропер</th>
            <th class="min-width3" scope="col">Клиент</th>
            <th class="min-width2" scope="col">Сумма</th>
            <th class="min-width" scope="col">Статус</th>
          </tr>
          </thead>
          <tbody>
          @foreach($orders as $order)
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>

              <td>
                @foreach(resourceGet($order, 'orderProducts', []) as $orderProduct)
                  {{ resourceGet($orderProduct, 'product.name') }}
                  <b>({{ resourceGet($orderProduct, 'quantity') }} шт.)</b>
                @endforeach
              </td>

              <td>
                {{ resourceGet($order, 'dropshipper_full_name') }}
                {{ resourceGet($order, 'dropshipper_phone_number') }}
              </td>

              <td>
                {{ resourceGet($order, 'delivery_name') }}<br><br>

                @if(resourceGet($order, 'delivery_type') !== \App\Enums\DeliveryTypes::NOVA_POSHTA)
                  {{ resourceGet($order, 'delivery_general_info') }}
                @else
                  {{ resourceGet($order, 'novaposhta_full_name') }}
                  {{ resourceGet($order, 'novaposhta_phone_number') }}<br>
                  {{ resourceGet($order, 'novaposhta_location') }}<br>
                  ТТН <b>{{ resourceGet($order, 'invoice_ttn') }}</b><br>
                  Наложенный платеж {{ resourceGet($order, 'amount_cash_delivery') }}
                @endif
              </td>

              <td>{{ resourceGet($order, 'total_amount') }}</td>

              <td class="close-table-admin">
                <span data-order-status="{{ \App\Enums\OrderStatuses::ARCHIVE }}"
                      data-id="{{ resourceGet($order, 'id') }}"
                      class="archive @if(!resourceGet($order, 'isArchived')) hide @endif">Закрыт</span>

                @if(resourceGet($order, 'isActive'))
                <button class="btn btn-admin-order--archive"
                        data-order-status="{{ \App\Enums\OrderStatuses::ARCHIVE }}"
                        data-id="{{ resourceGet($order, 'id') }}">Закрыть</button>
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>

        {{ $paginator->links() }}
      </div>
    </div>


  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/archive-order.js') }}"></script>
@endsection
