<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactSupplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ContactSuppliers', function (Blueprint $table) {
            $table->string('FrnCn_idFornecedor', 4);
            $table->string('FrnCn_idContato', 4);
            $table->string('FrnCn_UsuRegInc', 20);
            $table->timestamps('FrnCn_DatIncReg');
            $table->string('FrnCn_UsuAltReg', 20);
            $table->timestamps('FrnCn_DatAltReg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ContactSupplies');
    }
}
