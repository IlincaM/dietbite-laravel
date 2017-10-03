<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NDB_No');
            $table->string('FdGrp_Cd');
            $table->string('FdSubgrp_id');
            $table->string('Long_Desc');
            $table->string('Shrt_Desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('food');
    }

}
