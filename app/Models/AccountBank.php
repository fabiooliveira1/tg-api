<?php

namespace App\Models;

use App\Models\BaseModel;

class AccountBank extends BaseModel
{

    protected $table = 'BankingAccounts';
    protected $primaryKey = 'CtBc_idContaBancaria';

    public $fillable = [
        'CtBc_numContaBancaria',
        'CtBc_idAgencia',
        'CtBc_Saldo'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function hasRelatedRecords()
    {
        return $this->simulations()->count() > 0;
    }

    public function agencyBanks()
    {
        return $this->belongsTo(AgencyBank::class, 'AgBc_idAgencia', 'CtBc_idAgencia');
    }

    public function simulations()
    {
        return $this->hasMany(Simulation::class, 'Sim_idContaBancaria', 'CtBc_idContaBancaria');
    }
}
