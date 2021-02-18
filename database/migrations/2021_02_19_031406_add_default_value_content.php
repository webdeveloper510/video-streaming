<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contentprovider', function (Blueprint $table) {
            //
            $table->string('firstname')->default('')->change();
            $table->string('country')->default('')->change();
            $table->string('dob')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contentprovider', function (Blueprint $table) {
            //
        });
    }
}
