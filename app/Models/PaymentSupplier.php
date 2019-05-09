<?php

namespace App\Models;

use App\Models\BaseModel;

class PaymentSupplier extends BaseModel
{
    protected $table = 'PaymentSupplier';
    protected $primaryKey = 'idPayment_Supplier';

    public $fillable = [
        'idPaymentWay',
        'idSupplier'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function supplier(){

        return $this->belongTo(Supplier::class, 'idSupplier', 'Forn_idFornecedor');

    }

    public function paymentWay(){

        return $this->belongTo(PaymentWay::class, 'idPaymentWay', 'FrPg_idFormaPgto');

    }
}
