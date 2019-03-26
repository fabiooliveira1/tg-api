<?php

namespace Api\Models;

class AccountBank extends BaseModel
{

    public $fillable = [
        'CtBc_idBanco',
        'CtBc_idAgencia',
        'CtBc_idContaBancaria',
        'CtBc_Saldo'
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