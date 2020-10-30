<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->longText('aboutme');
            $table->string('profilepicture');
            $table->string('nickname');
            $table->string('password');
            $table->string('gender');
            $table->string('sexology');
            $table->string('titssize');
            $table->string('privy');
            $table->string('ass');
            $table->string('hairlength');
            $table->string('haircolor');
            $table->string('eyecolor');
            $table->string('height');
            $table->string('weight');
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
        Schema::dropIfExists('content');
    }
}
