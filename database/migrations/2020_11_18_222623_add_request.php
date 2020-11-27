<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_request', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('userid');
            $table->string('description');
            $table->integer('price');
            $table->integer('cat');
            $table->integer('title');
            $table->string('media');
            $table->integer('duration');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_request');
    }
}
