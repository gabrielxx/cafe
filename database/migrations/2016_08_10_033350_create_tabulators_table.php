<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabulatorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('tabulators', function(Blueprint $table){

            $table->increments('id');

            $table->decimal('km', 7, 2)->nullable();
            $table->decimal('wait', 7, 2)->nullable();
            $table->decimal('disposition', 7, 2)->nullable();
            $table->decimal('sprint', 7, 2)->nullable();
            $table->decimal('overnight', 7, 2)->nullable();
            $table->decimal('detour', 7, 2)->nullable();
            $table->decimal('shipping', 7, 2)->nullable();
            $table->decimal('night', 7, 2)->nullable();
            $table->decimal('holiday', 7, 2)->nullable();
            $table->enum('category', ['1', '2']);
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

        Schema::drop('tabulators');
    }
}
