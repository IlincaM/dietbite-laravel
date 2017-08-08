<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlanTypeIdToDietPlansTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('diet_plans', function (Blueprint $table) {
            $table->integer('diet_plan_type_id')->unsigned(); 

            $table->foreign('diet_plan_type_id')
                    ->references('id')->on('diet_plan_type')
                    ->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('diet_plans', function (Blueprint $table) {
            
        });
    }

}
