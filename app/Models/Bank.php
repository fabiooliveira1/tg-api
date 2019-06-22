<?php

namespace App\Models;

use App\Models\BaseModel;

class Bank extends BaseModel
{
    protected $table = 'Banks';
    protected $primaryKey = 'Bc_idBanco';

    public $fillable = [
        'Bc_numBanco',
        'Bc_nomeBanco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }
    
    public function hasRelatedRecords()
    {
        return $this->agencyBanks()->count() > 0;
    }

    public function agencyBanks()
    {
        return $this->hasMany(AgencyBank::class, 'AgBc_idBanco', 'Bc_idBanco');
    }
}
