<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_location', function (Blueprint $table) {
            $table->id();
            $table->integer('ad_id')->index();
            $table->string('lan')->nullable();
            $table->string('log')->nullable();
            $table->string('address')->nullable();
            $table->string('place_id')->nullable();
            $table->string('text')->nullable();
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
        Schema::dropIfExists('ads_location');
    }
}
