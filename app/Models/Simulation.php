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

        static::creating(function ($model) {
            $model->Sim_status = 'P';
        });

        static::created(function ($model) {
            // Envia email $model
        });
    }

    public function bankAccount()
    {
        return $this->hasOne(AccountBank::class, 'CtBc_idContaBancaria', 'Sim_idContaBancaria');
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class, 'SimulationsBill', 'idSimulations', 'idBill');
    }
}
