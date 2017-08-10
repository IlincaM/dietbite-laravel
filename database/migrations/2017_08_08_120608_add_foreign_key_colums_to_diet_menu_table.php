<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyColumsToDietMenuTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('diet_menu', function (Blueprint $table) {

            $table->foreign('meal_time_id')
                    ->references('id')->on('meal_time')
                    ->onDelete('cascade');

            $table->foreign('diet_plan_id')
                    ->references('id')->on('diet_plans')
                    ->onDelete('cascade');
            $table->foreign('diet_meal_id')
                    ->references('id')->on('diet_meals')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('diet_menu', function (Blueprint $table) {
            $table->dropForeign(['meal_time_id']);
            $table->dropForeign(['diet_plan_id']);
            $table->dropForeign(['diet_meal_id']);
        });
    }

}
