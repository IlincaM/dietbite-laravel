<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeekNoColumsToDietMenuTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('diet_menu', function (Blueprint $table) {
            $table->integer('week_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('diet_menu', function (Blueprint $table) {
            $table->dropColumn('week_no');
        });
    }

}
