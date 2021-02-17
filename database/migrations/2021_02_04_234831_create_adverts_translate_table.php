<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts_translate', function (Blueprint $table) {
            $table->id();
            $table->string('lang');
            $table->integer('advert_id')->index();
            $table->string('title');
            $table->longText('content');
            $table->float('price');
            $table->float('price_from')->nullable();
            $table->float('price_to')->nullable();
            $table->string('street')->nullable();
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
        Schema::dropIfExists('adverts_translate');
    }
}
