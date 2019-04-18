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
            $table->increments('Forn_idFornecedor');
            $table->string('Forn_CNPJ', 14);
            $table->integer('Forn_idRisco');
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
