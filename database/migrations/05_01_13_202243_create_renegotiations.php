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
            $table->increments('Rng_idProposta')->primaryKey();
            $table->integer('Rng_idConta')->unsigned();
            $table->integer('Rng_idContato')->unsigned();

            $table->double('Rng_valProposta', 12, 2);
            $table->date('Rng_vencProposta');
            $table->double('Rng_valAntigo', 12, 2);
            $table->date('Rng_vencAntigo');
            $table->string('Rng_descrProposta', 500)->nullable();
            $table->string('Rng_Iniciativa', 50)->nullable();
            $table->string('Rng_Status', 20)->nullable();
            $table->timestamps();

            $table->foreign('Rng_idConta')->references('Cta_idConta')->on('Bills')->onDelete('cascade');
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
