<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyConstraints extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::enableForeignKeyConstraints();

        Schema::table('users', function($table){
            //
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('drivers', function($table){
            //
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('routes', function($table){
            //
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('subsidiaries', function($table){
            //
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('services', function($table){
            //
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('subsidiary_id')->references('id')->on('subsidiaries')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('internal_driver_id')->references('id')->on('drivers')->onDelete('cascade');
        });

        Schema::table('items', function($table){
            //
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });

        Schema::table('invoices', function($table){
            //
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::disableForeignKeyConstraints();
    }
}
