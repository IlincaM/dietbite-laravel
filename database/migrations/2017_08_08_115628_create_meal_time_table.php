<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealTimeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('meal_time', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        $data = array(
            array('name' => 'breakfast'),
            array('name' => 'lunch'),
            array('name' => 'dinner'),
            array('name' => 'Snack1'),
            array('name' => 'Snack2'),
            array('name' => 'Snack3'),
            array('name' => 'Snack4'),
            array('name' => 'Snack5'),
            array('name' => 'Snack6'),
        );
        DB::table('meal_time')->insert(
                $data
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('meal_time');
    }

}
