<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequiredsGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RequiredsGroup', function (Blueprint $table) {
            $table->increments('id_Requireds_Group')->primaryKey();
            $table->integer('idRequireds')->unsigned();
            $table->integer('idGroup')->unsigned();
            $table->timestamps();

            $table->foreign('idRequireds')->references('Rq_idRequeridos')->on('Requireds');
            $table->foreign('idGroup')->references('GrCt_idGrupo')->on('Bills_group');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RequiredsGroup');
    }
}
