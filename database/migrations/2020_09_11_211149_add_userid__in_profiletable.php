<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridInProfiletable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiletable', function (Blueprint $table) {
            $table->integer('userid');  
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiletable', function (Blueprint $table) {
            //
        });
    }
}
