<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfiletableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiletable', function (Blueprint $table) {
            $table->id();
            $table->string('backupemail')->index();
            $table->longText('aboutme');
            $table->string('profilepicture');
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
        Schema::dropIfExists('profiletable');
    }
}
