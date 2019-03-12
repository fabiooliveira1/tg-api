<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Risks', function (Blueprint $table) {
            $table->increments('Rsc_idRisco');
            $table->string('Rsc_descrRisco', 100);
            $table->string('Rsc_UsuIncReg', 20);
            $table->timestamps('Rsc_DatIncReg');
            $table->string('Rsc_UsuAltReg', 20);
            $table->timestamps('Rsc_DatAltReg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Risks');
    }
}
