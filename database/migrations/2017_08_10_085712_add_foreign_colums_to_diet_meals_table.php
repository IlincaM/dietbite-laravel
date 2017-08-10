<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignColumsToDietMealsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('diet_meals', function (Blueprint $table) {

            $table->foreign('NDB_No_id')
                    ->references('NDB_No')->on('ABBREV')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('diet_meals', function (Blueprint $table) {
            $table->dropForeign(['NDB_No_id']);
        });
    }

}
