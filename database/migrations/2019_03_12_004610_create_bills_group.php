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
            $table->increments('GrCt_idGrupo')->unique();
            $table->integer('GrCt_idRisco');
            $table->String('GrCt_NomeGrupo', 50);
            $table->String('GrCt_DescrGrupo', 100);
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
        Schema::dropIfExists('Bills_group');
    }
}
