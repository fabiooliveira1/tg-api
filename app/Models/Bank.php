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

        static::deleting(function($bank) { // before delete() method call this
             $bank->agencyBanks()->delete();
       });
    }

    public function agencyBanks()
    {
        return $this->hasMany(AgencyBank::class, 'AgBc_idBanco', 'Bc_idBanco');
    }
}
