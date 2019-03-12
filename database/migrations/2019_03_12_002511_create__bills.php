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
            $table->increments('Cta_idConta');
            $table->String('Cta_descrConta', 100);
            $table->date('Cta_dataInclusao');
            $table->date('Cta_dataEmissao');
            $table->date('Cta_dataVencimento');
            $table->date('Cta_dataPagto');
            $table->date('Cta_dataBaixa');
            $table->Integer('Cta_codBarra');
            $table->double('Cta_valConta', 8,2);
            $table->double('Cta_totalConta', 8,2);
            $table->date('Cta_tempoProtesto');
            $table->double('Cta_valProtesto', 8,2);
            $table->double('Cta_Multa', 8,2);
            $table->double('Cta_Juros', 8,2);
            $table->String('Cta_Status', 1);
            $table->String('Cta_UsuIncReg', 20);
            $table->timestamps('Cta_DatIncReg');
            $table->String('Cta_UsuAltReg', 20);
            $table->timestamps('Cta_DatAltReg');
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
