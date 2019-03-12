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
            $table->increments('GrCt_idGrupo');
            $table->String('GrCt_NomeGrupo', 50);
            $table->String('GrCt_DescrGrupo', 100);
            $table->String('GrCt_UsuIncReg', 20);
            $table->timestamps('GrCt_DatIncReg');
            $table->String('GrCt_UsuAltReg', 20);
            $table->timestamps('Gr_Ct_DatAltReg');
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
