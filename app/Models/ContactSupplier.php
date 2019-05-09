<?php

namespace App\Models;

use App\Models\BaseModel;

class ContactSupplier extends BaseModel
{
    protected $table = 'ContactSupplier';
    protected $primaryKey = 'idContact_Supplier';

    public $fillable = [
        'idContact',
        'idSupplier'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    // public function accountBanks()
    // {
    //     return $this->hasOne(AccountBank::class, 'CtBc_idContaBancaria', 'Sim_idSimulacao');
    // }

    // public function bills()
    // {
    //     return $this->hasMany(Bill::class, 'Cta_idConta', 'Sim_idSimulacao');
    // }
}
