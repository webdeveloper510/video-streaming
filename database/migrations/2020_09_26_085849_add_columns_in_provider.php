<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provider', function (Blueprint $table) {
            //
            $table->string('category');
            $table->string('title');
            $table->string('description');
            $table->string('price');
            $table->string('keyword');
            $table->string('duration');
            $table->string('contentProviderid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provider', function (Blueprint $table) {
            //
            $table->dropColumn('category');
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('price');
            $table->dropColumn('keyword');
            $table->dropColumn('duration');
        });
    }
}
