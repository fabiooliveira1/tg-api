<?php

namespace App\Models;

use App\Models\BaseModel;

class SimulationsBill extends BaseModel
{

    protected $table = 'SimulationsBill';
    protected $primaryKey = 'idSimulations_Bill';

    public $fillable = [
        'idSimulations',
        'idBill'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function simulation(){

        return $this->belongTo(Simulation::class, 'idSimulations', 'Sim_idSimulacao');

    }

    public function bill(){

        return $this->belongTo(Bill::class,'idBill','Cta_idConta');

    }
}
