<?php

namespace App\Models;

use App\Models\BaseModel;

class RequiredsGroup extends BaseModel
{
    protected $table = 'RequiredsGroup';
    protected $primaryKey = 'id_Requireds_Group';

    public $fillable = [
        'idRequireds',
        'idGroup'
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
