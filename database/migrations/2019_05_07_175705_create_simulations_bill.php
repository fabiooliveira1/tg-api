<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationsBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SimulationsBill', function (Blueprint $table) {
            $table->increments('idSimulations_Bill')->primaryKey();
            $table->integer('idSimulations')->unsigned();
            $table->integer('idBill')->unsigned();
            $table->timestamps();

            $table->foreign('idSimulations')->references('Sim_idSimulacao')->on('Simulations');
            $table->foreign('idBill')->references('Cta_idConta')->on('Bills');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SimulationsBill');
    }
}
