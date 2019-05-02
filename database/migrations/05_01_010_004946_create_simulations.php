<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Simulations', function (Blueprint $table) {
            $table->increments('Sim_idSimulacao')->primaryKey();
            $table->integer('Sim_idContaBancaria')->unsigned();

            $table->date('Sim_dataPagtoSimulacao');
            $table->double('Sim_valSimulacao', 8, 2);
            $table->double('Sim_valTotal', 8, 2);
            $table->string('Sim_status', 20)->nullable();
            $table->timestamps();

            $table->foreign('Sim_idContaBancaria')->references('CtBc_idContaBancaria')->on('BankingAccounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Simulations');
    }
}
