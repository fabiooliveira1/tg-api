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
            $table->increments('Cnt_idContato')->primaryKey();
            $table->integer('Cnt_idFornecedor')->unsigned();

            $table->string('Cnt_nomeContato', 100);
            $table->string('Cnt_phoneContato', 20);
            $table->string('Cnt_emailContato', 100);
            $table->timestamps();

            $table->foreign('Cnt_idFornecedor')->references('Forn_idFornecedor')->on('Suppliers');
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
