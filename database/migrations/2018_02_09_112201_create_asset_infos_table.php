<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->unsigned();
            $table->string('region')->nullable();
            $table->string('city');
            $table->string('neighborhood')->nullable();
            $table->string('street');
            $table->integer('size');
            $table->integer('price');
            $table->integer('floor');
            $table->decimal('rooms', 2,1);
            $table->boolean('elevator');
            $table->boolean('garden');
            $table->boolean('parking');
            $table->boolean('renovated');
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
        Schema::dropIfExists('asset_infos');
    }
}
