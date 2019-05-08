<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ContactSupplier', function (Blueprint $table) {
            $table->increments('idContact_Supplier')->primaryKey();
            $table->integer('idContact')->unsigned();
            $table->integer('idSupplier')->unsigned();
            $table->timestamps();

            $table->foreign('idContact')->references('Cnt_idContato')->on('Contacts');
            $table->foreign('idSupplier')->references('Forn_idFornecedor')->on('Suppliers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ContactSupplier');
    }
}
