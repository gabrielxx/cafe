<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsidiariesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('subsidiaries', function(Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('rif');
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->integer('company_id')->unsigned();

            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('subsidiaries');
    }
}
