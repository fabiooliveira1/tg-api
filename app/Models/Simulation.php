<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Notifications\SimulationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

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

        static::updating(function ($model) {
            if ($model->Sim_status != 'Pendente')
                throw new \Exception('Não é possível alterar simulações encerradas!', 422);
        });

        static::deleting(function ($model) {
            if ($model->Sim_status == 'Aprovada')
                throw new \Exception('Não é possível apagar simulações já aprovadas!', 422);
        });

        static::creating(function ($model) {
            $model->Sim_status = 'Pendente';
        });

        static::created(function ($model) {
            $managers = User::where('User_nivelAcesso', 'Gerente')->get();
            foreach ($managers as $manager) {
                $data = [
                    'name' => $manager->User_nome,
                    'email' => $manager->User_email
                ];

                Mail::send(new SimulationMail($data));
            }
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
