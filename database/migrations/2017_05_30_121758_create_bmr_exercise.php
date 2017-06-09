<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBmrExercise extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bmr_exercise', function (Blueprint $table) {
            $table->increments('id');
            $table->float('none', 8, 2);
            $table->float('light', 8, 2);
            $table->float('moderate', 8, 2);
            $table->float('difficult', 8, 2);
            $table->float('intense', 8, 2);
            $table->timestamps();
        });

        DB::table('bmr_exercise')->insert(
                array(
                    'none' => 0,
                    'light' => 0.1,
                    'moderate' => 0.2,
                    'difficult' => 0.3,
                    'intense' => 0.4
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bmr_exercise');
    }

}
