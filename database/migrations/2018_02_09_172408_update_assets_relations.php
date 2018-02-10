<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAssetsRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('referrer_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('asset_infos', function (Blueprint $table) {
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });

        Schema::table('asset_images', function (Blueprint $table) {
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });

        Schema::table('asset_purposes', function (Blueprint $table) {
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign('assets_owner_id_foreign');
            $table->dropForeign('assets_referrer_id_foreign');
        });

        Schema::table('asset_infos', function (Blueprint $table) {
            $table->dropForeign('asset_infos_asset_id_foreign');
        });

        Schema::table('asset_images', function (Blueprint $table) {
            $table->dropForeign('asset_images_asset_id_foreign');
        });

        Schema::table('asset_purposes', function (Blueprint $table) {
            $table->dropForeign('asset_purposes_asset_id_foreign');
        });
    }
}
