<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Risks', function (Blueprint $table) {
            $table->increments('Rsc_idRisco')->unsigned()->unique();

            $table->string('Rsc_descrRisco', 100);
            $table->timestamps();

            // $table->primary('Rsc_idRisco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Risks');
    }
}
