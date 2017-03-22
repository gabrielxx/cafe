<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('wait_night')->default(0);
            $table->integer('wait_daytime')->default(0);
            $table->integer('disposition_night')->default(0);
            $table->integer('disposition_daytime')->default(0);
            $table->integer('sprint_night')->default(0);
            $table->integer('sprint_daytime')->default(0);
            $table->integer('night_tour')->default(0);

            $table->decimal('factor_wait_night', 9, 2)->default(0.00);
            $table->decimal('factor_wait_daytime', 9, 2)->default(0.00);
            $table->decimal('factor_disposition_night', 9, 2)->default(0.00);
            $table->decimal('factor_disposition_daytime', 9, 2)->default(0.00);
            $table->decimal('factor_sprint_night', 9, 2)->default(0.00);
            $table->decimal('factor_sprint_daytime', 9, 2)->default(0.00);
            $table->decimal('factor_night_tour', 9, 2)->default(0.00);

            $table->decimal('wait_holiday', 9, 2)->default(0.00);
            $table->decimal('wait_night_subtotal', 9, 2)->default(0.00);
            $table->decimal('wait_daytime_subtotal', 9, 2)->default(0.00);
            $table->decimal('disposition_holiday', 9, 2)->default(0.00);
            $table->decimal('disposition_night_subtotal', 9, 2)->default(0.00);
            $table->decimal('disposition_daytime_subtotal', 9, 2)->default(0.00);
            $table->decimal('sprint_holiday', 9, 2)->default(0.00);
            $table->decimal('sprint_night_subtotal', 9, 2)->default(0.00);
            $table->decimal('sprint_daytime_subtotal', 9, 2)->default(0.00);
            $table->decimal('night_tour_subtotal', 9, 2)->default(0.00);

            $table->decimal('total', 9, 2)->default(0.00);
            $table->decimal('total_routes', 9, 2)->default(0.00);
            $table->decimal('overnight', 9, 2)->default(0.00);

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

        Schema::drop('invoices');
    }
}
