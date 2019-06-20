<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PaymentSupplier', function (Blueprint $table) {
            $table->increments('idPayment_Supplier')->primaryKey();
            $table->integer('idPaymentWay')->unsigned();
            $table->integer('idSupplier')->unsigned();
            $table->timestamps();

            $table->foreign('idPaymentWay')->references('FrPg_idFormaPgto')->on('Payment_Ways');
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
        Schema::dropIfExists('PaymentSupplier');
    }
}
