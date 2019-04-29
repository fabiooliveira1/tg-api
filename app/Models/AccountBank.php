<?php

namespace Api\Models;

use App\Models\BaseModel;

class AccountBank extends BaseModel
{

    protected $table = 'BankingAccounts';
    protected $primaryKey = 'CtBc_idBanco';

    public $fillable = [
        'CtBc_idAgencia',
        'CtBc_idContaBancaria',
        'CtBc_Saldo',
        'created_at',
        'updated_at'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function hasRelatedRecords()
    {
        return $this->simulation()->count() > 0;
    }

    public function agencyBank()
    {
        return $this->belongsTo(AgencyBank::class, 'CtBc_idAgencia');
    }

    public function simulation()
    {
        return $this->hasMany(Simulation::class);
    }
}
