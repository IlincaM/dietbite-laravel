<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbbrevMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abbrev_menu', function (Blueprint $table) {
           $table->integer('menu_id')->unsigned(); 

            $table->foreign('menu_id')
                    ->references('id')->on('diet_menu')
                    ->onDelete('cascade');
            $table->integer('food_id')->unsigned(); 

          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abbrev_menu');
    }
}
