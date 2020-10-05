<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recentsearch', function (Blueprint $table) {
            //
            $table->rename('videoId', 'mediaId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recentsearch', function (Blueprint $table) {
            //
             $table->rename('mediaId', 'videoId');
        });
    }
}
