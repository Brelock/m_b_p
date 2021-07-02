<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('sku')->unique();
            $table->string('name');
            $table->string('slug');
            $table->mediumText('description')->nullable();

            $table->float('price_user', 7,2);
            $table->float('price_3_opt', 7,2);
            $table->float('price_8_opt', 7,2);
            $table->float('price_dealer', 7,2);
            $table->float('price_vip', 7,2);

            $table->unsignedInteger('category_id');
            $table->unsignedInteger('stock');
            $table->boolean('sale')->default(false);
            $table->boolean('feature')->default(false);

            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('sales_count')->default(0);
            $table->float('rate')->default(0);

            $table->timestamps();

            $table->index('id');
            $table->index('slug');
            $table->index('sku');
            $table->index('name');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
