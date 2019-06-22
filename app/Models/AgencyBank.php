<?php

namespace App\Models;

use App\Models\BaseModel;

class AgencyBank extends BaseModel
{
    protected $table = 'AgencyBanks';
    protected $primaryKey = 'AgBc_idAgencia';

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

    public function hasRelatedRecords()
    {
        return $this->accountsBank()->count() > 0;
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'AgBc_idBanco', 'Bc_idBanco');
    }

    public function accountsBank()
    {
        return $this->hasMany(AccountBank::class, 'CtBc_idAgencia', 'AgBc_idAgencia');
    }
}
