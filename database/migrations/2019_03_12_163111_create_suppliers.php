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
            $table->increments('Forn_idFornecedor')->unsigned()->unique();
            $table->integer('Forn_idRisco')->unsigned();
            $table->integer('Forn_idFormaPgto')->unsigned();

            $table->string('Forn_CNPJ', 14);
            $table->string('Forn_RazaoSocial', 100);
            $table->string('Forn_NomeFantasia', 100)->nullable();
            $table->string('Forn_InscrEstadual', 12);
            $table->string('Forn_Endereco', 35)->nullable();
            $table->string('Forn_Bairro', 22)->nullable();
            $table->string('Forn_Cidade', 22)->nullable();
            $table->string('Forn_UF', 2)->nullable();
            $table->string('Forn_CEP', 8)->nullable();
            $table->string('Forn_Banco', 3);
            $table->string('Forn_Agencia', 5);
            $table->string('Forn_ContaBancaria', 4);
            $table->timestamps();

            // $table->primary(['Forn_idFornecedor', 'Forn_idContato', 'Forn_idRisco', 'Forn_idFormaPgto']);
            // $table->foreign('Forn_idContato')->references('Cnt_idContato')->on('Contacts');
            // $table->foreign('Forn_idRisco')->references('Rsc_idRisco')->on('Risks');
            // $table->foreign('Forn_idFormaPgto')->references('FrPg_idFormaPgto')->on('Payment_Ways');
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
