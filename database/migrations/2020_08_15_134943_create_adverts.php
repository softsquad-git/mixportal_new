<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdverts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('id_category')->unsigned();
            $table->bigInteger('id_subcategory')->unsigned()->nullable();
            $table->string('title');
            $table->text('slug');
            $table->longText('content');
            $table->float('price');
            $table->integer('type');


            // Nocleg Only
            $table->float('price_from')->nullable();
            $table->float('price_to')->nullable();
            $table->string('street')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('emailVisible')->nullable();
            $table->string('www')->nullable();
            $table->string('fb')->nullable();
            $table->string('instagram')->nullable();
            $table->string('yt')->nullable();
            $table->string('soundcloud')->nullable();
            $table->string('mixcloud')->nullable();
            $table->string('beatport')->nullable();

            $table->boolean('disactive')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('categories_advert')->onDelete('cascade');
            $table->foreign('id_subcategory')->references('id')->on('child_categories_advert')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
