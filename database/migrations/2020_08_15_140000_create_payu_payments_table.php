<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayuPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payu_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('id_advert')->unsigned();
            $table->string('payable_id')->nullable();
            $table->string('payable_type')->nullable();
            $table->string('firstname');
            $table->string('surname')->nullable();
            $table->string('company')->nullable();
            $table->string('nip')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->double('amount');
            $table->double('discount')->default(0);
            $table->double('net_amount_debit')->default(0);
            $table->text('data')->nullable();
            $table->string('status')->nullable();
            $table->string('unmappedstatus')->nullable();
            $table->string('mode')->nullable();
            $table->string('bank_ref_num')->nullable();
            $table->string('bankcode')->nullable();
            $table->string('cardnum')->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('issuing_bank')->nullable();
            $table->string('card_type')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('payu_payments');
    }
}
