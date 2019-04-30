<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('User_idUsuario')->unsigned()->unique();

            $table->string('User_nivelAcesso', 10);
            $table->string('User_matricula', 20);
            $table->string('User_senha', 10);
            $table->string('User_nome', 50);
            $table->string('User_email', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            // $table->primary('User_idUsuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
}
