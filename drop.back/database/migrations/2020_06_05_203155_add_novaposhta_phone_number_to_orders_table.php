<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNovaposhtaPhoneNumberToOrdersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('orders', function (Blueprint $table) {
      $table->string('novaposhta_phone_number')->nullable()->after('novaposhta_last_name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('orders', function (Blueprint $table) {
      $table->dropColumn('novaposhta_phone_number');
    });
  }
}
