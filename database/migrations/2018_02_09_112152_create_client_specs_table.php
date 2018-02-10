<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_specs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('asset_type')->unisgned()->nullable();
            $table->integer('purpose_id')->unsigned()->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('street')->nullable();
            $table->integer('size')->nullable();
            $table->integer('price')->nullable();
            $table->integer('floor')->nullable();
            $table->decimal('rooms', 2,1)->nullable();
            $table->boolean('elevator')->nullable();
            $table->boolean('garden')->nullable();
            $table->boolean('parking')->nullable();
            $table->boolean('renovated')->nullable();
            $table->boolean('animals_allowed')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_specs');
    }
}
