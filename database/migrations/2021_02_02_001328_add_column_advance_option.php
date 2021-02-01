<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAdvanceOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('add_request', function (Blueprint $table) {
            //
            $table->text('sexology');
            $table->text('titssize');
            $table->text('ass');
            $table->text('privy');
            $table->text('height');
            $table->text('eyecolor');
            $table->text('haircolor');
            $table->text('hairlength');
            $table->text('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_request', function (Blueprint $table) {
            //
        });
    }
}
