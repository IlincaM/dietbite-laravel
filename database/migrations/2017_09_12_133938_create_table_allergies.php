<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAllergies extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        $data = array(
            array('name' => 'egg'),
            array('name' => 'dairy'),
            array('name' => 'gluten'),
            array('name' => 'peanut'),
            array('name' => 'soy'),
            array('name' => 'fish'),
            array('name' => 'shellfish'),
            array('name' => 'tree nuts'),
        );
        DB::table('allergies')->insert(
                $data
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('allergies');
    }

}
