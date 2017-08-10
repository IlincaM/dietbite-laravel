<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToDietWeeksPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diet_weeks_plan', function (Blueprint $table) {
            $table->foreign('diet_plan_id')
                    ->references('id')->on('diet_plans')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diet_weeks_plan', function (Blueprint $table) {
                        $table->dropForeign(['diet_plan_id']);

        });
    }
}
