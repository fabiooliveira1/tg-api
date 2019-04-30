<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankingAgencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BankingAgencies', function (Blueprint $table) {
            $table->increments('AgBc_idAgencia')->unsigned()->unique();
            $table->integer('AgBc_idBanco')->unsigned();

            $table->string('AgBc_nomeAgencia', 50);
            $table->string('AgBc_nomeGerente', 50)->nullable();
            $table->string('AgBc_phoneGerente', 15)->nullable();
            $table->string('AgBc_emailGerente', 50)->nullable();
            $table->timestamps();

            // $table->primary(['AgBc_idAgencia', 'AgBc_idBanco']);
            // $table->foreign('AgBc_idBanco')->references('Bc_idBanco')->on('Banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BankingAgencies');
    }
}
