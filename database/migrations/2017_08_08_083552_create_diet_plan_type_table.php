<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietPlanTypeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('diet_plan_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        $data = array(
            array('name' => 'normal'),
            array('name' => 'aggressive'),
        );
        DB::table('diet_plan_type')->insert(
                $data
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('diet_plan_type');
    }

}
