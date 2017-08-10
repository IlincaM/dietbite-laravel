<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToDietDaysTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('diet_days', function (Blueprint $table) {
            $table->foreign('diet_weeks_plan_id')
                    ->references('id')->on('diet_weeks_plan')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('diet_days', function (Blueprint $table) {
            $table->dropForeign(['diet_weeks_plan_id']);
        });
    }

}
