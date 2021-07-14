<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDefaultBankeArtistVerified extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_info', function (Blueprint $table) {
            //
            $table->string('email')->defalut('NO')->change();
            $table->string('refference')->defalut('NO')->change();
            $table->string('acc_number')->defalut('NO')->change();
            $table->string('company_name')->defalut('NO')->change();
            $table->string('bank_name')->defalut('NO')->change();
            $table->string('address')->defalut('NO')->change();
            $table->string('bic')->defalut('NO')->change();
            $table->string('bank_address')->defalut('NO')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_info', function (Blueprint $table) {
            //
        });
    }
}
