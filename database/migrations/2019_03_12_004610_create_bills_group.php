<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bills_group', function (Blueprint $table) {
            $table->increments('GrCt_idGrupo')->unsigned()->unique();
            $table->integer('GrCt_idRisco')->unsigned();
            $table->integer('GrCt_idRequeridos')->unsigned();

            $table->String('GrCt_NomeGrupo', 50);
            $table->String('GrCt_DescrGrupo', 100);
            $table->timestamps();

            // $table->primary(['GrCt_idGrupo', 'GrCt_idRisco', 'GrCt_idRequeridos']);
            // $table->foreign('GrCt_idRisco')->references('Rsc_idRisco')->on('Risks');
            // $table->foreign('GrCt_idRequeridos')->references('Rq_idRequeridos')->on('Requereds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bills_group');
    }
}
