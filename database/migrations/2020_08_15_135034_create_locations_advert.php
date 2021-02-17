<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_advert', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_advert')->unsigned();
            $table->float('lat')->nullable();
            $table->geometry('geocode');
            $table->string('address')->nullable();
            $table->integer('place_id')->nullable();
            $table->string('text');

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
        Schema::dropIfExists('locations_advert');
    }
}
