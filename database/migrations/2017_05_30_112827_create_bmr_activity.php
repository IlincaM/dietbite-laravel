<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBmrActivity extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bmr_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->float('sedentary', 8, 2);
            $table->float('light_activity', 8, 2);
            $table->float('normal_active', 8, 2);
            $table->float('very_active', 8, 2);
            $table->timestamps();
        });
        // Insert the default values for bmr_activity table
        DB::table('bmr_activity')->insert(
                array(
                    'sedentary' => 1.2,
                    'light_activity' => 1.4,
                    'normal_active' => 1.6,
                    'very_active' => 1.8     
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bmr_activity');
    }

}
