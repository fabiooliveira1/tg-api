<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentWays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Payment_Ways', function (Blueprint $table) {
            $table->increments('FrPg_idFormaPgto')->unsigned()->unique();

            $table->string('FrPg_descrFormaPgto', 52);
            $table->timestamps();

            // $table->primary( 'FrPg_idFormaPgto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Payment_Ways');
    }
}
