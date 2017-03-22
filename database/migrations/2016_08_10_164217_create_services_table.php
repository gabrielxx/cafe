<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('services', function(Blueprint $table){

            $table->increments('id');

            $table->string('order')->nullable();
            $table->string('ccoo')->nullable();
            $table->string('user')->nullable();
            $table->string('user_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('contact')->nullable();
            $table->string('approver')->nullable();
            $table->string('approver_id')->nullable();
            $table->string('week')->nullable();
            $table->string('area')->nullable();
            $table->string('type')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('laggard')->nullable();
            $table->integer('position')->nullable();

            $table->enum('payment',     ['Credito', 'Contado'])->default('Credito');
            $table->enum('condition',   ['Facturado', 'Cancelado', 'Pendiente', 'Pagado'])->default('Pendiente');
            $table->enum('status',      ['active', 'inactive'])->default('active');

            $table->integer('route_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('internal_driver_id')->unsigned();
            $table->integer('subsidiary_id')->unsigned();
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

        Schema::drop('services');
    }
}
