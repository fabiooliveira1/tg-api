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

    
    // public function suppliers()
    // {
    //     return $this->hasMany(Supplier::class, 'Forn_idRisco', 'Rsc_idRisco');
    // }

    // public function billsGroups()
    // {
    //     return $this->hasMany(BillsGroup::class, 'GrCt_idGrupo', 'Rsc_idRisco');
    // }
}
