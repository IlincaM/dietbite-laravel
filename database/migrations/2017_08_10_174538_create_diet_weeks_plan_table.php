<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietWeeksPlanTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('diet_weeks_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calories');
            $table->integer('week_no');

            $table->integer('diet_plan_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('diet_weeks_plan');
    }

}
