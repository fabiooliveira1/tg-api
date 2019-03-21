<?php

namespace Api\Models;

class Simulation extends BaseModel
{
    
    public $fillable = [
        'Sim_valSimulacao',
        'Sim_valTotal'
    ];

    public $dates = ['created_at', 'updated_at', 'Sim_dataPagtoSimulacao'];

    public static function boot()
    {
        parent::boot();

    }


    public function hasRelatedRecords()
    {
        return $this->bill()->count() > 0;
    }

    public function accountBank()
    {
        return $this->hasOne(AccountBank::class, 'CtBc_idContaBancaria');
    }

    public function bill()
    {
        return $this->hasMany(Bill::class, 'Cta_idConta');
    }

}