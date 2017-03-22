<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('users', function(Blueprint $table){

            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->enum('role', ['Administrador', 'root',]);
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('password');

            $table->integer('company_id')->unsigned();

            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('users');
    }
}
