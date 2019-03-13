<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contacts', function (Blueprint $table) {
            $table->increments('Cnt_idContato');
            $table->string('Cnt_nomeContato', 100);
            $table->string('Cnt_phoneContato', 12);
            $table->string('Cnt_emailContato', 100);
            $table->string('Cnt_UsuIncReg', 20);
            $table->timestamps('Cnt_DatIncReg');
            $table->string('Cnt_UsuAltReg', 20);
            $table->timestamps('Cnt_DatAltReg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contacts');
    }
}