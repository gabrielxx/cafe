<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('items', function (Blueprint $table) {

            $table->increments('id');

            $table->string('km');
            $table->decimal('factor', 6, 2);
            $table->decimal('night', 8, 2)->default(0.00);
            $table->decimal('holiday', 8, 2)->default(0.00);
            $table->decimal('subtotal', 8, 2)->default(0.00);

            $table->integer('route_id')->unsigned();
            $table->integer('service_id')->unsigned();

            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('items');
    }
}
