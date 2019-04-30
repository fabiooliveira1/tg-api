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
            $table->increments('Sim_idSimulacao')->unsigned()->unique();
            $table->integer('Sim_idContaBancaria')->unsigned();
            $table->integer('Sim_idConta')->unsigned();

            $table->date('Sim_dataPagtoSimulacao');
            $table->double('Sim_valSimulacao', 8, 2);
            $table->double('Sim_valTotal', 8, 2);
            $table->string('Sim_status', 20)->nullable();
            $table->timestamps();

            // $table->primary(['Sim_idSimulacao', 'Sim_idContaBancaria', 'Sim_idConta']);
            // $table->foreign('Sim_idContaBancaria')->references('CtBc_idContaBancaria')->on('BankingAccounts');
            // $table->foreign('Sim_idConta')->references('Cta_idConta')->on('Bills');
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
