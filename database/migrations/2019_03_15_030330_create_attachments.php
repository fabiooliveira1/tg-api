<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Attachments', function (Blueprint $table) {
            $table->increments('Anx_idAnexo');
            $table->integer('Anx_idConta')->unsigned();

            $table->binary('Anx_conteudo');
            $table->timestamps();

            // $table->primary('Anx_idAnexo');
            $table->foreign('Anx_idConta')->references('Cta_idConta')->on('Bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Attachments');
    }
}
