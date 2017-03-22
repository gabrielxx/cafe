<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color')->default('default');
            $table->string('rif');
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('owner')->nullable();
            $table->enum('status', ['active', 'inactive']);

            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('companies');
    }
}