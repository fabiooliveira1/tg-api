<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bills', function (Blueprint $table) {
            $table->increments('Cta_idConta')->unsigned()->unique();
            // $table->integer('Cta_idUser')->unsigned();
            // $table->integer('Cta_idGrupo')->unsigned();
            // $table->integer('Cta_idFornecedor')->unsigned();
            // $table->integer('Cta_idPedidoCompra')->nullable();
            // $table->integer('Cta_idAnexo')->nullable();
            // $table->integer('Cta_idPedidoCompra')->nullable();

            $table->string('Cta_descrConta', 100);
            $table->date('Cta_dataEmissao');
            $table->date('Cta_dataVencimento');
            $table->date('Cta_dataPagto')->nullable();
            $table->date('Cta_dataBaixa')->nullable();
            $table->string('Cta_codBarra');
            $table->double('Cta_valConta', 8, 2);
            $table->double('Cta_totalConta', 8, 2);
            $table->integer('Cta_tempoProtesto');
            $table->double('Cta_valProtesto', 8, 2);
            $table->double('Cta_Multa', 8, 2)->nullable();
            $table->double('Cta_Juros', 8, 2)->nullable();
            $table->string('Cta_Status', 1)->nullable();
            $table->timestamps();

            // $table->primary('Cta_idConta');
            // $table->primary(array('Sim_idSimulacao', 'Sim_idContaBancaria','Sim_idConta'));
            // $table->foreign('Sim_idContaBancaria')->references('CtBc_idContaBancaria')->on('BankingAccounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bills');
    }
}
