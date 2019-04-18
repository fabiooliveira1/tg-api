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
            $table->integer('Rng_idConta');
            $table->double('Rng_valProposta', 8,2);
            $table->date('Rng_vencProposta');
            $table->double('Rng_valAntigo', 8,2);
            $table->date('Rng_vencAntigo');
            $table->string('Rng_descrProposta', 100)->nullable();
            $table->string('Rng_Iniciativa', 50)->nullable();
            $table->string('Rng_Status', 1)->nullable();
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
        Schema::dropIfExists('Renegotiations');
    }
}
