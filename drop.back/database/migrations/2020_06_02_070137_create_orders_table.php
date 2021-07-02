<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PaymentTypes;
use App\Enums\DeliveryTypes;

class CreateOrdersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('orders', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->char('cookie_hash', 255)->nullable();

      $table->string('dropshipper_full_name')->nullable();
      $table->string('dropshipper_phone_number')->nullable();

      $table->enum('payment_type', PaymentTypes::getValues())->default(PaymentTypes::CASH_PAYMENT);
      $table->enum('delivery_type', DeliveryTypes::getValues())->default(DeliveryTypes::NOVA_POSHTA);

      $table->string('delivery_general_info', 4000)->nullable();

      $table->string('novaposhta_first_name')->nullable();
      $table->string('novaposhta_middle_name')->nullable();
      $table->string('novaposhta_last_name')->nullable();

      $table->integer('novaposhta_city_id')->nullable();
      $table->foreign('novaposhta_city_id')->references('id')->on('novaposhta_city');

      $table->integer('novaposhta_warehouse_id')->nullable();
      $table->foreign('novaposhta_warehouse_id')->references('id')->on('novaposhta_warehouse');

      $table->float('total_amount')->default(0.00)->comment('Общая сумма заказа');
      $table->float('amount_cash_delivery')->default(0.00)->comment('Сумма наложенного платежа');
      $table->float('amount_dropshipper_earnings')->default(0.00)->comment('Зароботк дропшипера');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('orders');
  }
}
