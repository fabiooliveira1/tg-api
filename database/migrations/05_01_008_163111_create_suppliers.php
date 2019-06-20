<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Suppliers', function (Blueprint $table) {
            $table->increments('Forn_idFornecedor')->primaryKey();
            $table->integer('Forn_idRisco')->unsigned();

            $table->string('Forn_CNPJ', 30);
            $table->string('Forn_RazaoSocial', 100);
            $table->string('Forn_NomeFantasia', 100)->nullable();
            $table->string('Forn_InscrEstadual', 100);
            $table->string('Forn_Endereco', 150)->nullable();
            $table->string('Forn_Bairro', 50)->nullable();
            $table->string('Forn_Cidade', 50)->nullable();
            $table->string('Forn_UF', 2)->nullable();
            $table->string('Forn_CEP', 10)->nullable();
            $table->string('Forn_Banco', 50);
            $table->string('Forn_Agencia', 10);
            $table->string('Forn_ContaBancaria', 20);
            $table->timestamps();

            $table->foreign('Forn_idRisco')->references('Rsc_idRisco')->on('Risks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Suppliers');
    }
}
