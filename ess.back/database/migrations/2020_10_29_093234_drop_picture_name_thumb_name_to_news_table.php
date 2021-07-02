<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPictureNameThumbNameToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
	        $table->dropColumn('picture_name', 'thumb_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
	        $table->string('picture_name')->nullable()->after('publication_date');
	        $table->string('thumb_name')->nullable()->after('picture_name');
        });
    }
}
