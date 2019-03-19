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
            $table->string('AgBc_idBanco', 3);
            $table->string('AgBc_idAgencia', 4);
            $table->string('AgBc_nomeAgencia', 50);
            $table->string('AgBc_nomeGerente', 50);
            $table->string('AgBc_phoneGerente', 15);
            $table->string('AgBc_emailGerente', 50);
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
        Schema::dropIfExists('BankingAgencies');
    }
}
