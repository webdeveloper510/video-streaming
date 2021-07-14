<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBankInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('artistid');
            $table->string('email')->defalut('');
            $table->string('refference')->defalut('');
            $table->string('acc_number')->defalut('');
            $table->string('company_name')->defalut('');
            $table->string('bank_name')->defalut('');
            $table->string('address')->defalut('');
            $table->string('bic')->defalut('');
            $table->string('bank_address')->defalut('');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_info');
    }
}
