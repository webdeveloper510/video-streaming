<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('artistid');
            $table->integer('userid');
            $table->string('status');
            $table->text('keyword');
            $table->string('title');
            $table->string('media');
            $table->string('categoryid');
            $table->integer('delieveryspeed');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer');
    }
}
