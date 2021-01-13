<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_token', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('userid');
            $table->integer('artistid');
            $table->integer('mediaid');
            $table->string('status');
            $table->integer('tokens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_token');
    }
}
