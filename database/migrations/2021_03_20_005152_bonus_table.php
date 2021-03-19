<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_bonus_passive', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('userid');
            $table->integer('artistid');
            $table->integer('passive_income');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('show_bonus_passive');
    }
}
