<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBanks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AccountBanks', function (Blueprint $table) {
            $table->increments('CtBc_idContaBancaria')->primaryKey();
            $table->integer('CtBc_idAgencia')->unsigned();

            $table->string('CtBc_numContaBancaria', 50)->unique();
            $table->double('CtBc_Saldo', 12, 2);
            $table->timestamps();

            $table->foreign('CtBc_idAgencia')->references('AgBc_idAgencia')->on('AgencyBanks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AccountBanks');
    }
}
