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
            $table->increments('CtBc_idContaBancaria')->primaryKey();
            $table->integer('CtBc_idAgencia')->unsigned();

            $table->string('CtBc_numContaBancaria', 50)->unique();
            $table->double('CtBc_Saldo', 10, 2);
            $table->timestamps();

            $table->foreign('CtBc_idAgencia')->references('AgBc_idAgencia')->on('BankingAgencies');
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
