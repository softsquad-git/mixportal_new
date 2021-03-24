<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildCategoriesAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_categories_advert', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('main')->unsigned();
            $table->timestamps();

            $table->foreign('main')->references('id')->on('categories_advert');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_categories_advert');
    }
}
