<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankingAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BankingAccounts', function (Blueprint $table) {
            $table->increments('CtBc_idBanco');
            $table->string('CtBc_idAgencia', 4);
            $table->string('CtBc_idContaBancaria', 6);
            $table->double('CtBc_Saldo', 10, 2);
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
        Schema::dropIfExists('BankingAccounts');
    }
}
