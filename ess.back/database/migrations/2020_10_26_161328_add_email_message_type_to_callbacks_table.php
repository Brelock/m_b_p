<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailMessageTypeToCallbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('callbacks', function (Blueprint $table) {
	        $table->string('phone')->nullable()->change();
	        $table->string('email')->nullable()->after('phone');
	        $table->text('message')->nullable()->after('email');
	        $table->unsignedTinyInteger('type')->nullable()->after('message');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('callbacks', function (Blueprint $table) {
	        $table->string('phone')->change();
	        $table->dropColumn('email', 'message', 'type');
        });
    }
}
