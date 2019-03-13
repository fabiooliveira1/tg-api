<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Suppliers', function (Blueprint $table) {
            $table->increments('Forn_idFornecedor');
            $table->string('Forn_CNPJ', 14);
            $table->string('Forn_idRisco', 3);
            $table->string('Forn_NomeFantasia', 100);
            $table->string('Forn_InscrEstadual', 12);
            $table->string('Forn_Endereco', 35);
            $table->string('Forn_Bairro', 22);
            $table->string('Forn_Cidade', 22);
            $table->string('Forn_UF', 2);
            $table->string('Forn_CEP', 8);
            $table->string('Forn_Banco', 3);
            $table->string('Forn_Agencia', 5);
            $table->string('Forn_ContaBancaria', 4);
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
        Schema::dropIfExists('Distributors');
    }
}
