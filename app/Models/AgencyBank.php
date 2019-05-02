<?php

namespace App\Models;

use App\Models\BaseModel;

class AgencyBank extends BaseModel
{
    protected $table = 'BankingAgencies';
    // protected $primaryKey = 'AgBc_idAgencia';
    protected $primaryKey = 'AgBc_numAgencia';

    public $fillable = [
        'AgBc_idBanco',
        'AgBc_numAgencia',
        'AgBc_nomeAgencia',
        'AgBc_nomeGerente',
        'AgBc_phoneGerente',
        'AgBc_emailGerente'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function deleteRelations()
    {
        $this->accountsBank()->delete();

        return true;
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'AgBc_idBanco', 'AgBc_numAgencia');
    }

    public function accountsBank()
    {
        return $this->hasMany(AccountBank::class, 'CtBc_numContaBancaria', 'AgBc_numAgencia');
    }
}
