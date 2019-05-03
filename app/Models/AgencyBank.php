<?php

namespace App\Models;

use App\Models\BaseModel;

class AgencyBank extends BaseModel
{
    protected $table = 'BankingAgencies';
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

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'Bc_idBanco', 'AgBc_idBanco');
    }

    public function accountsBank()
    {
        return $this->hasMany(AccountBank::class, 'CtBc_idAgencia', 'AgBc_idAgencia');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($agency) { // before delete() method call this
            $agency->accountsBank()->delete();
            // do the rest of the cleanup...
       });

    }
}
