<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('category_id')->index();
            $table->integer('subcategory_id')->index()->nullable();
            $table->string('type');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('email_visible')->nullable();
            $table->string('www')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('yt')->nullable();
            $table->string('soundcloud')->nullable();
            $table->string('mixcloud')->nullable();
            $table->string('beatport')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('ads');
    }
}
