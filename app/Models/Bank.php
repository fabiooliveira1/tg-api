<?php

namespace App\Models;

use App\Models\BaseModel;

class Bank extends BaseModel
{
    protected $table = 'Banks';
    // protected $primaryKey = 'Bc_idBanco';
    protected $primaryKey = 'Bc_numBanco';

    public $fillable = [
        'Bc_numBanco',
        'Bc_nomeBanco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        // static::updating(function ($model) {
        //     if($model->Cta_Status == 'Pago')
        //         throw new \Exception('Não é possível apagar contas já pagas!', 422);
        // });

    }

    public function agencyBanks()
    {
        return $this->hasMany(AgencyBank::class, 'AgBc_idBanco', 'Bc_numBanco');
    }
}
