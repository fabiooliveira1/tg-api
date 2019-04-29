<?php

namespace Api\Models;
use App\Models\BaseModel;
class Simulation extends BaseModel
{

    public $fillable = [
        'Sim_valSimulacao',
        'Sim_dataPagtoSimulacao',
        'Sim_valTotal',
        'Sim_status'
    ];

    public $dates = ['created_at', 'updated_at', 'Sim_dataPagtoSimulacao'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if($model->Sim_status == 'Aprovado')
                throw new \Exception('Não é possível apagar simulações já aprovadas!', 422);
        });

        static::created(function ($model) {
            // Envia email $model
        });
    }

    public function accountBank()
    {
        return $this->hasOne(AccountBank::class, 'CtBc_idContaBancaria');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'Cta_idConta');
    }

}