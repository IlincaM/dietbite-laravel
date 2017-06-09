<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBmrResults extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bmr_results', function (Blueprint $table) {
            $table->increments('id');
            $table->float('bmr_result', 8, 2);
            $table->float('weight', 8, 2);
            $table->float('goal_weight', 8, 2);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bmr_results');
    }

}
