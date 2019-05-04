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
            $table->increments('Anx_idAnexo')->primaryKey();
            $table->integer('Anx_idConta')->unsigned();

            $table->binary('Anx_conteudo');
            $table->timestamps();

            $table->foreign('Anx_idConta')->references('Cta_idConta')->on('Bills')->onDelete('cascade');
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
