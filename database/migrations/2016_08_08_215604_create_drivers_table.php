<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('drivers', function (Blueprint $table) {

            $table->integer('id')->unsigned()->primary();
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('image')->nullable();
            $table->enum('category', ['1', '2']);
            $table->enum('type', ['Interno', 'Registrado']);
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

        Schema::drop('drivers');
    }
}
