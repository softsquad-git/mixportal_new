<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_advert')->unsigned();
            $table->string('url');
            $table->string('name')->nullable();
            $table->boolean('main')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('advert_photos');
    }
}
