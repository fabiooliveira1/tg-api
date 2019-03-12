<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenegotiations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Renegotiations', function (Blueprint $table) {
            $table->increments('Rng_idProposta');
            $table->double('Rng_valProposta', 8,2);
            $table->date('Rng_vencProposta');
            $table->string('Rng_descrProposta', 100);
            $table->string('Rng_Iniciativa', 50);
            $table->string('Rng_Status', 1);
            $table->string('Rng_UsuIncReg', 20);
            $table->timestamps('Rng_DatIncReg');
            $table->string('Rng_UsuAltReg', 20);
            $table->timestamps('Rng_DatAltReg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Renegotiations');
    }
}
