<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('routes', function(Blueprint $table){

            $table->increments('id');
            $table->integer('rating');
            $table->string('route');
            $table->integer('km');
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

        Schema::drop('routes');
    }
}

