<?php

namespace Api\Models;

class AgencyBank extends BaseModel
{

    public $fillable = [
        'AgBc_idBanco',
        'AgBc_idAgencia',
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

    public function hasRelatedRecords()
    {
        return $this->accountsBank()->count() > 0;
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'AgBc_idBanco');
    }

    public function accountsBank()
    {
        return $this->hasMany(AccountsBank::class);
    }

}