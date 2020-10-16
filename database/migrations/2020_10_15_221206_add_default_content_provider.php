<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultContentProvider extends Migration
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
              $table->string('profilepicture')->default('')->change();
             $table->string('aboutme')->default('')->change();
             $table->string('sexology')->default('')->change();
             $table->string('gender')->default('')->change();
             $table->string('titssize')->default('')->change();
             $table->string('privy')->default('')->change();
             $table->string('ass')->default('')->change();
             $table->string('hairlength')->default('')->change();
             $table->string('haircolor')->default('')->change();
             $table->string('eyecolor')->default('')->change();
             $table->string('height')->default('')->change();
             $table->string('weight')->default('')->change();
             $table->string('catid')->default('')->change();
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
