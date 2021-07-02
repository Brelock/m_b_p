<?php

namespace App\Http\Requests;

use App\DTO\OrderDto;
use App\Enums\DeliveryTypes;
use App\Enums\PaymentTypes;
use App\Models\NovaPoshtaCity;
use App\Models\NovaPoshtaWarehouse;
use Illuminate\Validation\Rule;

class CheckoutRequest extends JsonFormRequest {
  /**
   * @param  bool $isTrue
   * @return \Closure
   */
  protected function requiredIfDeliveryTypeIsNovaPoshta(bool $isTrue = true) : \Closure {
    return function() use($isTrue) {
      return ($this->get('delivery_type') == DeliveryTypes::NOVA_POSHTA) === $isTrue;
    };
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * @return OrderDto
   */
  public function createdDto() : OrderDto {
    return OrderDto::createFromArray($this->all());
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'dropshipper_full_name' => ['required', 'string', 'max:255'],
      'dropshipper_phone_number' => ['required', 'string', 'max:255'],
      'payment_type' => ['required', 'integer', Rule::in(PaymentTypes::getValues())],
      'delivery_type' => ['required', 'integer', Rule::in(DeliveryTypes::getValues())],

      'delivery_general_info' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta(false)),

        'nullable',
        'string',
        'max:4000',
      ],

      'novaposhta_first_name' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta()),

        'nullable',
        'max:255',
        'regex:/^[А-Яа-яЁё]{1,}$/iu',
      ],

      'novaposhta_middle_name' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta()),

        'nullable',
        'max:255',
        'regex:/^[А-Яа-яЁё]{1,}$/iu',
      ],

      'novaposhta_last_name' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta()),

        'nullable',
        'max:255',
        'regex:/^[А-Яа-яЁё]{1,}$/iu',
      ],

      'novaposhta_phone_number' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta()),

        'nullable',
        'string',
        'max:255',
      ],
      'novaposhta_city_id' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta()),

        'nullable',
        'integer',
        Rule::exists(NovaPoshtaCity::getTableName(), 'id')
      ],
      'novaposhta_warehouse_id' => [
        Rule::requiredIf($this->requiredIfDeliveryTypeIsNovaPoshta()),

        'nullable',
        'integer',
        Rule::exists(NovaPoshtaWarehouse::getTableName(), 'id')
      ],
      'amount_cash_delivery' => [
        Rule::requiredIf(function() {
          return $this->get('payment_type') == PaymentTypes::CASH_PAYMENT;
        }),
      ],
    ];
  }

  public function attributes() {
    return [
      'dropshipper_full_name'    => 'ФИО Дропшипера',
      'dropshipper_phone_number' => 'Телефон Дропшипера',
      'payment_type'             => 'Тип оплаты',
      'delivery_type'            => 'Тип доставки',
      'delivery_general_info'    => 'Информация о доставке',
      'novaposhta_first_name'    => 'Имя',
      'novaposhta_middle_name'   => 'Отчетство',
      'novaposhta_last_name'     => 'Фамилия',
      'novaposhta_phone_number'  => 'Телефон',
      'novaposhta_city_id'       => 'Город',
      'novaposhta_warehouse_id'  => 'Отделение',
      'amount_cash_delivery'     => 'Сумма наложенного платежа',
    ];
  }
}
