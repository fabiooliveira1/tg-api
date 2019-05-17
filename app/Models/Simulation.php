<?php

namespace App\Models;

use App\Models\BaseModel;

class Simulation extends BaseModel
{
    protected $table = 'Simulations';
    protected $primaryKey = 'Sim_idSimulacao';

    public $fillable = [
        'Sim_idContaBancaria',
        'Sim_dataPagtoSimulacao',
        'Sim_valSimulacao',
        'Sim_valTotal',
        'Sim_status'
    ];

    public $dates = ['created_at', 'updated_at', 'Sim_dataPagtoSimulacao'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if ($model->Sim_status == 'A')
                throw new \Exception('Não é possível apagar simulações já aprovadas!', 422);
        });

        static::created(function ($model) {
            // Envia email $model
        });
    }

    public function accountBanks()
    {
        return $this->hasOne(AccountBank::class, 'CtBc_idContaBancaria', 'Sim_idSimulacao');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'Cta_idConta', 'Sim_idSimulacao');
    }

    public function simulationsBill()
    {
        return $this->belongsToMany(Bill::class, 'SimulationsBill','idBill', 'idSimulations');
    }
}
