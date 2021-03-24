<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilities2advert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities2advert', function (Blueprint $table) {
            $table->bigInteger('id_facilities')->unsigned();
            $table->bigInteger('id_advert')->unsigned();

            $table->foreign('id_facilities')->references('id')->on('advert_facilities');
            $table->foreign('id_advert')->references('id')->on('adverts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities2advert');
    }
}
