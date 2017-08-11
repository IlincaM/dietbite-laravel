<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignIdToDietMealsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('diet_meals', function (Blueprint $table) {
            $table->integer('diet_day_id')->unsigned();
            $table->integer('meal_time_id')->unsigned();
            $table->foreign('diet_day_id')
                    ->references('id')->on('diet_days')
                    ->onDelete('cascade');
            $table->foreign('meal_time_id')
                    ->references('id')->on('meal_time')
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
            $table->dropForeign(['diet_day_id']);
            $table->dropForeign(['meal_time_id']);
        });
    }

}
