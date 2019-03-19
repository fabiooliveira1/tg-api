<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Logins', function (Blueprint $table) {
            $table->string('CtrAc_idUsuario', 20);
            $table->string('CtrAc_nivelAcesso', 10);
            $table->string('CtrAc_matricula', 20);
            $table->string('CtrAc_Senha', 10);
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
        Schema::dropIfExists('Logins');
    }
}
