<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAssetInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asset_infos', function (Blueprint $table) {
            $table->integer('street_num')->after('street');
            $table->integer('apartment_num')->after('street_num')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_infos', function (Blueprint $table) {
            $table->dropColumn('street_num');
            $table->dropColumn('apartment_num');
        });
    }
}
