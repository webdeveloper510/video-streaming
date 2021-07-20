<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableConsent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consent_table', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('artistid');
            $table->string('coformer_nickname');
            $table->string('coformer_document');
            $table->string('DOC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consent_table');
    }
}
